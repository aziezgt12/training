<?php
// require('fpdf.php');
require('assets/phpqrcode/qrlib.php');

class PDF2 extends FPDF {
    function Background($image) {
        $this->Image($image, -2, -2, 300);
    }

    private $xPos = 10;
    private $yPos = 10;

    function SetXPos($x) {
        $this->xPos = $x;
    }

    function SetYPos($y) {
        $this->yPos = $y;
    }
    
    function SetPos($x, $y) {
        $this->xPos = $x;
        $this->yPos = $y;
    }

    function Header() {
        // Tambahkan header jika diperlukan
    }

    function Footer() {
        // Tambahkan footer jika diperlukan
    }

    function AddText($text, $align = 'C') {
        $this->SetXY($this->xPos, $this->yPos);
        $this->Cell(0, 10, $text, 0, 1, $align);
        $this->yPos += 10; // Tambahkan jarak antar elemen
    }
}

$pdf = new PDF2();
$pdf->AddPage("L", "A4");

$pdf->Background('assets/images/blanko-sertifikat.png');

$pdf->SetFont('arial', 'B', 36);
// $pdf->SetFont('Helvetica', 'B', 40);

$pdf->SetPos(10, 88); 
$pdf->AddText($peserta->nama_peserta);
$pdf->SetFont('arial', '', 20);
$pdf->SetPos(10, 105); 
$pdf->AddText('telah mengikuti pelatihan');

$pdf->SetFont('arial', 'B', 22);
$x = 115;

$pdf->SetTextColor(36, 33, 48);

foreach($listTraing as $val):
    $pdf->SetPos(10, $x); 
    $pdf->AddText($val->nama);
    $x = $x + 10;
endforeach;

$pdf->SetPos(10, $x+10); 
$pdf->AddText( $listTraing[0]->durasi);


$pdf->SetFont('arial', 'B', 14);

$data = base_url()."C_InputSertifikat/track/$peserta->id";
// Generate QR code image
$qrCodePath = "assets/qrcode/$peserta->no_sertifikat.png";
QRcode::png($data, $qrCodePath, QR_ECLEVEL_L, 10);



// Menyisipkan gambar QR code dalam PDF
$pdf->Image($qrCodePath, 5.5, 152, 23);

$pdf->SetPos(5.5, 175); 
$pdf->AddText($peserta->no_sertifikat, "L");
// ob_clean();
$pdf->Output('Sertifikat.pdf', 'I'); // Menampilkan PDF atau simpan dengan 'I' untuk tampilan di browser
?>
