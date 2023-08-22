<?php
require('assets/phpqrcode/qrlib.php');

class PDF2 extends FPDF {
    // ... (Kode kelas PDF2 lainnya)
}

$pdf = new PDF2();
$pdf->AddPage("L", "A4");

// ... (Kode lain seperti penambahan elemen ke sertifikat)

ob_clean(); // Membersihkan output buffer sebelum mengirim PDF
$pdf->Output('Sertifikat.pdf', 'I'); // Menampilkan PDF di browser
?>