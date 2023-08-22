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

    function qrcode($qrcode, $iascb, $vrc)
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

        $this->Image($signature,  15, 215, 25, 25);

        $this->SetTextColor(0, 0, 0);
        $this->SetFont('times','B',10);
        $this->SetXY(22, 235);
        $this->Cell(15, 5, "Director", 0, 1, 'R');
    }

    function judul($teks1, $teks2, $teks3, $teks4, $teks5, $teks7, $teks8, $teks9)

    {


        $this->SetXY(0, 75);
        $this->Cell(10);

        $this->SetFont('Helvetica', 'B', '12');

        $this->Cell(0, 10, $teks1, 0, 1, 'C');

        $this->Cell(10);

        $this->SetTextColor(0, 0, 258);

        $this->SetX(45);

        $this->SetFont('ARIAL', 'B', '20');
        // $this->Cell(0, 8, $teks2, 0, 1, 'C');
        $this->MultiCell( 120, 15, $teks2, 0, 'C', false);

        $this->SetX(45);

        $this->SetTextColor(0, 0, 0);


        $this->SetFont('ARIAL', '', '11');
        // $this->Cell(0, 8, $teks2, 0, 1, 'C');
        $this->MultiCell( 120, 5, $teks3, 0, 'C', false);

        // $this->SetX(45);
        // $this->Cell(0, 50);
        $this->SetFont('ARIAL', '', '11');
        $this->Cell(0, 10, $teks4, 0, 1, 'C');

        $this->SetTextColor(0, 0, 258);

        $this->SetX(45);

        $this->SetFont('ARIAL', 'B', '20');
        // $this->Cell(0, 8, $teks2, 0, 1, 'C');
        $this->MultiCell( 120, 15, $teks5, 0, 'C', false);


        // Scope
        $this->SetX(40);
        $this->SetTextColor(0, 0, 258);


        $this->SetFont('ARIAL', 'B', '10');
        $this->MultiCell(130, 5, $teks7, 0, 'C', false);


        $this->Cell(10);

        $this->SetTextColor(0, 0, 0);


        $this->SetFont('Helvetica', 'B', '12');

        $this->Cell(0, 10, $teks8, 0, 1, 'C');

        $this->SetX(45);

        $this->SetTextColor(0, 0, 0);


        $this->SetFont('ARIAL', '', '11');
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

    //menampilan tulisan PENGUMUMAN dan NOMOR
    function surat($hal, $nomor){
        $this->Ln(8);
        $this->SetFont('Times','ub',12);
        $this->Cell(200,5,$hal,0,1,'C');
        $this->SetFont('Times','B',10);
        $this->Cell(200,5,'NOMOR : '.$nomor,0,1,'C');
    }
    
    function body1($teks, $teks2){
        $this->Ln(3);
        $this->SetFont('Times','',12);
        // for ($i=0;$i < count((array)$teks);$i++)
        // {
            $this->MultiCell(0,5,$teks, '', 'C');
            $this->MultiCell(0,10,$teks2, '', 'C');
        // }
    }

    function body2($teks, $teks2, $teks3, $teks4, $teks5){
        $this->Ln(1);
        $this->SetFont('Times','',12);
        // for ($i=0;$i < count((array)$teks);$i++)
        // {
            $this->MultiCell(0,5,$teks, '', 'C');
            $this->MultiCell(0,5,$teks2, '', 'C');
            $this->MultiCell(0,5,$teks3, '', 'C');
            $this->MultiCell(0,5,$teks4, '', 'C');
            $this->SetFont('Times','B',12);
            $this->MultiCell(0,10,$teks5, '', 'C');
        // }
    }

    function footer(){


        $this->SetTextColor(0, 0, 0);
        $this->SetFont('times','',8);
        $this->SetXY(160, 210);
        $this->Cell(15, 5, "CERTIFICATION NUMBER : SSI-46302-11-8171", 0, 1, 'R');

        $this->SetXY(160, 215);
        $this->Cell(15, 5, "CERTIFICATION DATE : SSI-46302-11-8171", 0, 1, 'R');


        $this->SetXY(160, 220);
        $this->Cell(15, 5, "DATE OF EXPIRY : SSI-46302-11-8171", 0, 1, 'R');


        $this->SetXY(160, 230);
        $this->Cell(15, 5, "1ST SURVEILLANCE ON OR BERFORE : SSI-46302-11-8171", 0, 1, 'R');

        $this->SetXY(160, 235);
        $this->Cell(15, 5, "2ST SURVEILLANCE ON OR BERFORE : SSI-46302-11-8171", 0, 1, 'R');

        $this->SetXY(160, 240);
        $this->Cell(15, 5, "RECERTIFICATION ON OR BERFORE : SSI-46302-11-8171", 0, 1, 'R');

        $this->SetXY(160, 250);
        $this->Cell(15, 5, "TO VERIFY THE VALIDATY OF THIS CERTIFACTE : SSI-46302-11-8171", 0, 1, 'R');


        $this->SetXY(160, 255);
        $this->Cell(15, 5, "PLEASE VISIT SSICERTIFY.COM OR SCAN THIS : SSI-46302-11-8171", 0, 1, 'R');

        $this->SetXY(160, 260);
        $this->Cell(15, 5, "QRCODE", 0, 1, 'R');

        // certificate no




    }


   

}

//instantisasi objek


$pdf = new Pdf2();

//Mulai dokumen

$pdf->AddPage('P', 'A4');

//meletakkan gambar

$pdf->letak('assets/images/sertifikat.jpeg');

// //meletakkan judul disamping logo diatas

$pdf->judul('This is to certify that:', 'PT. PAPUA MANDIRI SEJATI','Jl. Sultan Sulaiman Kel. Kampung Bulang, Keca. Tanjung Pinang Timur, Kota Tanjung Pinang, Prov. Kepulauan Riau, Bagus', 'confoms to the requirements of', 'ISO 9001:2015', 'Occupational Health And Safety Management System', 'SCOPE REGISTRATION', 'Provision of Industry for Vessel Including Reparation, Suppplier for Sea Transportation Equipment and Spareparts, Construction for Building, Roads, Bridge, Everpass, Telecommunication and Electrical Installation ');

// //membuat garis ganda tebal dan tipis

$pdf->footer();
$pdf->qrcode('assets/images/qrcode/code.png', 'assets/images/iascb.png', 'assets/images/vrc.png');
// $pdf->garis();
$pdf->signature('assets/images/ttd/ttd-director.png');

// $pdf->surat('SURAT KETERANGAN LULUS SELEKSI', 'B-0110/PMB-IAINBTH/2022');
// $pdf->body1('Pantia Penerimaan Mahasiswa Baru Insitut Agama Islam Nusantara Batang Hari Tahun','Akademik '.date('Y').'/'.date('Y', strtotime('+1 years')).' Menerangkan Bahwa');
// $pdf->idSiswa(ucwords($row->fullname), strtoupper($row->no_pendaftaran), ucwords($row->prodi_terpilih), ucwords($jalur->jalur_name), $row->hasil_seleksi == 1 ? "Lulus" : "Tidak Lulus");
// $pdf->body2('Dinyatakan LULUS Dalam Seleksi sebagai calon Mahasiswa Baru Institut Agama Islam', 'Nusantara Batang Hari Tahun Akademik '.date('Y').'/'.date('Y', strtotime('+1 years')).', yang bersangkutan berkewajiban', 'melakukan Daftar Ulang/Registrasi Mulai Tanggal ditetapkannya surat keterangan ini sampai
// ','dengan :', date('d F Y', strtotime($setting->jadwal_daftar_ulang)));

// $pdf->garis2();
// $pdf->catatan("TEST");

// $pdf->form_register($row->no_pendaftaran, $row->fullname, $row->prodi_terpilih, $row->tempat_lahir, date("d D Y", strtotime($row->tanggal_lahir)));





$pdf->Output('kopsurat.pdf', 'I');