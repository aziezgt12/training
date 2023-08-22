<?php


class Pdf2 extends FPDF

{

    function letak($gambar)

    {

        //memasukkan gambar untuk header
        // draft
        // $this->Image($gambar, 0, 0, -170);
        $this->Image($gambar, -2, -2, -87);

        //menggeser posisi sekarang

    }

    function qrcode($qrcode)
    {

        //memasukkan gambar untuk header
        // draft
        // $this->Image($gambar, 0, 0, -170);
        // $this->SetXY(40, 80);

        $this->Image($qrcode,  180, 225, 25, 25);
        // $this->Image($iascb,  150, 205, 25, 25);
        // $this->Image($vrc,  120, 205, 25, 25);

        //menggeser posisi sekarang

    }

    function signature($signature)
    {

        $this->Image($signature,  15, 180, 30, 50);

        $this->SetTextColor(0, 0, 0);
        $this->SetFont('times','B',12);
        $this->SetXY(22, 220);
        $this->Cell(15, 5, "Director", 0, 1, 'R');
    }

    function judul($teks1, $teks2, $teks3, $teks4, $teks5, $teks7, $teks8, $teks9)

    {

        // 30 = $this->GetX()+30;
        $y = $this->GetY();


        $this->SetFont('arial', '', '14');

        $this->Cell(0, 132, $teks1, 0, 1, 'C');

        $this->SetTextColor(0, 43, 95);


        $this->SetFont('arial', 'B', '25');
        $this->Cell(0, -108, $teks2, 0, 1, 'C');

        $this->SetTextColor(0, 0, 0);


        $this->SetFont('arial', '', '14');
        $y = $this->GetY();

        $this->SetXY(45, $y+70);
        $this->MultiCell(120, 6, $teks3, 0, 'C', false);

        // $this->SetY(110);
        // $this->Cell(0, 50);
        $this->SetFont('arial', '', '13');
        $this->Cell(0, 45, $teks4, 0, 1, 'C');

        $this->SetTextColor(0, 43, 95);

        $y = $this->GetY();
        $this->SetXY(45, $y-20);
        $this->SetFont('arial', 'B', '25');
        // $this->Cell(0, 8, $teks2, 0, 1, 'C');
        $this->MultiCell(120, 15, $teks5, 0, 'C', false);


        // // Scope
        $this->SetX(45);
        $this->SetTextColor(0, 43, 95);
        $this->SetFont('arial', 'B', '16');
        $this->MultiCell(120, 5, $teks7, 0, 'C', false);


        // $this->Cell(10);

        $this->SetTextColor(0, 0, 0);

        // $this->SetY($y+158);

        $this->SetFont('arial', 'B', '14');

        $this->Cell(0, 10, $teks8, 0, 1, 'C');

        $this->SetX(45);

        $this->SetTextColor(0, 0, 0);


        $this->SetFont('arial', '', '14');
        // $this->Cell(0, 8, $teks2, 0, 1, 'C');
        $this->MultiCell( 120, 5, $teks9, 0, 'C', false);


        // $this->MultiCell(120, 5, $teks4, 0, 'C', false);


        // $this->SetFont('Helvetica', 'B', '12');

        // $this->MultiCell( 150, 10, $teks3, 0, );
        // // $this->Cell(0, 5, $teks3, 0, , 'C');

        // $this->Cell(10);

        // $this->SetFont('Helvetica', 'B', '12');

        // $this->Cell(0, 5, $teks4, 0, 1, 'C');

        // $this->Cell(20);
        // $this->SetFont('Helvetica', '', '8');
        // $this->Cell(0, 2, $teks5, 0, 1, 'C');

    }

    function garis()

    {

        $this->SetLineWidth(1);

        $this->Line(6, 195, 180, 195);

        // $this->SetLineWidth(0);

        // $this->Line(25, 37, 185, 37);

    }


    function garis2()

    {

        $this->SetLineWidth(1);

        $this->Line(25, 150, 185, 150);

        $this->SetLineWidth(0);

        $this->Line(25, 37, 185, 37);

    }


    function footer($regno =null, $terbit = null, $exp = null, $st= null, $nd=null, $recertificate=null, $teks1 =null, $teks2=null, $teks3=null){


        $this->SetTextColor(0, 0, 0);
        $this->SetFont('arial','',8);
        $this->SetXY(160, 210);
        $this->Cell(15, 5, $regno, 0, 1, 'R');

        $this->SetXY(160, 215);
        $this->Cell(15, 5, $terbit, 0, 1, 'R');


        $this->SetXY(160, 220);
        $this->Cell(15, 5, $exp, 0, 1, 'R');


        $this->SetXY(160, 230);
        $this->Cell(15, 5, $st, 0, 1, 'R');

        $this->SetXY(160, 235);
        $this->Cell(15, 5, $nd, 0, 1, 'R');

        $this->SetXY(160, 240);
        $this->Cell(15, 5, $recertificate, 0, 1, 'R');

        $this->SetXY(160, 250);
        $this->Cell(15, 5, $teks1, 0, 1, 'R');


        $this->SetXY(160, 255);
        $this->Cell(15, 5, $teks2, 0, 1, 'R');

        $this->SetXY(160, 260);
        $this->Cell(15, 5, $teks3, 0, 1, 'R');


    }


   

}

//instantisasi objek


$pdf = new Pdf2();

//Mulai dokumen

$pdf->AddPage('P', 'A4');

//meletakkan gambar

if($tipe == 'draft')
{
    $pdf->letak('assets/images/draft.jpeg');
    // $pdf->letak('assets/images/sertifikat.jpeg');
}

if($tipe == 'final-sertifikat')
{
    $pdf->letak('assets/images/sertifikat.jpeg');
    // $pdf->letak('assets/images/sertifikat.jpeg');
}

// //meletakkan judul disamping logo diatas

$pdf->judul('This is to certify that:', strtoupper($row->nama_perusahaan),ucwords($row->alamat_lengkap), 'confoms to the requirements of', strtoupper($row->nama_standar), ucwords($row->layanan_desc), 'SCOPE REGISTRATION', ucwords($row->scope));

// //membuat garis ganda tebal dan tipis

$pdf->footer(
    'CERTIFICATION NUMBER :'.strtoupper($row->nomor_sertifikat), 
    'CERTIFICATION DATE : '. date('d-M-Y', strtotime($row->tanggal_terbit)), 
    'DATE OF EXPIRY : '. date('d-M-Y', strtotime($row->tanggal_kedaluarsa)),
    '1ST SURVEILLANCE ON OR BERFORE : '. date('d-M-Y', strtotime($row->tanggal_surveillance_1)),
    '2ST SURVEILLANCE ON OR BERFORE : '. date('d-M-Y', strtotime($row->tanggal_surveillance_2)),
    'RECERTIFICATION ON OR BERFORE : '. date('d-M-Y', strtotime($row->tanggal_resertifikasi)),
    'TO VERIFY THE VALIDATY OF THIS CERTIFACTE',
    'PLEASE VISIT SSICERTIFY.COM OR SCAN',
    'QRCODE',
);
$pdf->qrcode('assets/images/'.$row->qr_code);
// $pdf->garis();
$pdf->signature('assets/images/ttd/ttd-director.png');

// $pdf->surat('SURAT KETERANGAN LULUS SELEKSI', 'B-0110/PMB-IAINBTH/2022');
// $pdf->body1('Pantia Penerimaan Mahasiswa Baru Insitut Agama Islam Nusantara Batang Hari Tahun','Akademik '.date('Y').'/'.date('Y', strtotime('+1 years')).' Menerangkan Bahwa');
// $pdf->idSiswa(ucwords($row->fullname), strtoupper($row->no_pendaftaran), ucwords($row->prodi_terpilih), ucwords($jalur->jalur_name), $row->hasil_seleksi == 1 ? "Lulus" : "Tidak Lulus");
// $pdf->body2('Dinyatakan LULUS Dalam Seleksi sebagai calon Mahasiswa Baru Institut Agama Islam', 'Nusantara Batang Hari Tahun Akademik '.date('Y').'/'.date('Y', strtotime('+1 years')).', yang bersangkutan berkewajiban', 'melakukan Daftar Ulang/Registrasi Mulai Tanggal ditetapkannya surat keterangan ini sampai
// ','dengan :', date('d F Y', strtotime($setting->jadwal_daftar_ulang)));


// $pdf->form_register($row->no_pendaftaran, $row->fullname, $row->prodi_terpilih, $row->tempat_lahir, date("d D Y", strtotime($row->tanggal_lahir)));





$pdf->Output('kopsurat.pdf', 'I');