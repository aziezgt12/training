<?php


class Pdf2 extends FPDF

{

    function letak($gambar)

    {

        //memasukkan gambar untuk header

        $this->Image($gambar, 5, 15, 20, 25);

        //menggeser posisi sekarang

    }

    function photo($file)
    {
        $this->SetXY(40, 80);
        $this->Image($file, 110, 54, 20, 25);        
    }

    function judul($teks1, $teks2, $teks3)

    {
        $this->SetFont('Helvetica','i',8);
        $this->Cell(5,0,'Panitia PMB IAI Nusantara Batang Hari Tahun 2023',0,0,'L');
        $this->SetLineWidth(0);
        $this->Line(10, 12, 185, 12);


        $this->setY('20');
        $this->Cell(15);

        $this->SetFont('Helvetica', 'B', '8');

        $this->Cell(20, 5, $teks1, 0, 1, 'L');

        $this->Cell(15);

        $this->SetFont('Helvetica', 'B', '10');

        $this->Cell(20, 8, $teks2, 0, 1, 'L');

        $this->Cell(15);
        $this->SetFont('Helvetica', '', '6');
        $this->Cell(20, 5, $teks3, 0, 1, 'L');

        $this->Cell(10);

        
    }

    function garis()

    {

        $this->SetLineWidth(1);

        $this->Line(25, 36, 185, 36);

        $this->SetLineWidth(0);

        $this->Line(25, 37, 185, 37);

    }
    function garis2()

    {

        $this->SetLineWidth(1);

        $this->Line(25, 150, 185, 150);

        $this->SetLineWidth(0);

        $this->Line(25, 37, 185, 37);

    }

    //menampilan tulisan PENGUMUMAN dan NOMOR
    function body($no_pendaftaran, $fullname, $mobilenumber, $jalur_name, $prodi_terpilih, $ket, $created_date, $jadwal_seleksi, $tempat_lahir, $tanggal_lahir){
        $this->SetXY(5, 50);
        $this->Cell(100,8,'',1,0,'L');
        $this->SetX(55);
        $this->Cell(15, 5, "BUKTI PENDAFTARAN", 0, 1, 'C');
        $this->SetXY(5, 58);
        $this->Cell(100,15,'',1,0,'L');
        $this->SetX(55);
        $this->Cell(15, 5, "NOMOR REGISTRASI :", 0, 1, 'C');
        $this->SetX(55);
        $this->SetFont('Helvetica', 'B', '8');
        $this->Cell(15, 5, "$no_pendaftaran", 0, 1, 'C');
        // BINGKAI FOTO
        $this->SetXY(105, 50);
        $this->Cell(30,33,'',1,0,'L');
        // nama
        $this->SetXY(5, 68);
        $this->Cell(100,5,'',1,0,'L');
        $this->SetX(5);
        $this->SetFont('Helvetica', '', '6');
        $this->Cell(15, 5, "NAMA", 0, 1, 'L');
        $this->SetXY(40, 68);
        $this->Cell(15, 5, ": ".strtoupper($fullname), 0, 1, 'L');

        // TEMPAT TGL LAHIR
        $this->SetXY(5, 73);
        $this->Cell(100,5,'',1,0,'L');
        $this->SetX(5);
        $this->Cell(15, 5, "TEMPAT / TANGGAL LAHIR", 0, 1, 'L');
        $this->SetXY(40, 73);
        $this->Cell(15, 5, ": ".strtoupper($tempat_lahir).','.($tanggal_lahir), 0, 1, 'L');

        // HP / WA
        $this->SetXY(5, 78);
        $this->Cell(100,5,'',1,0,'L');
        $this->SetX(5);
        $this->Cell(15, 5, "HP /WA ", 0, 1, 'L');
        $this->SetXY(40, 78);
        $this->Cell(15, 5, ": ".$mobilenumber, 0, 1, 'L');

        // JALUR PENDAFTARAN
        $this->SetXY(5, 83);
        $this->Cell(130,5,'',1,0,'L');
        $this->SetX(5);
        $this->Cell(15, 5, "JALUR PENDAFTARAN ", 0, 1, 'L');
        $this->SetXY(40, 83);
        $this->Cell(15, 5, ": ".strtoupper($jalur_name), 0, 1, 'L');

        // PRODI PILIHAN
        $this->SetXY(5, 88);
        $this->Cell(130,5,'',1,0,'L');
        $this->SetX(5);
        $this->Cell(15, 5, "PRODI PILIHAN ", 0, 1, 'L');
        $this->SetXY(40, 88);
        $this->Cell(15, 5, ": ".strtoupper($prodi_terpilih), 0, 1, 'L');

        // KETERANGAN
        $this->SetXY(5, 93);
        $this->Cell(130,5,'',1,0,'L');
        $this->SetX(5);
        $this->Cell(15, 5, "KETERANGAN ", 0, 1, 'L');
        $this->SetXY(40, 93);
        $this->Cell(15, 5, ": ".strtoupper($ket), 0, 1, 'L');

        // TANGGAL DAFTAR
        $this->SetXY(5, 98);
        $this->Cell(130,5,'',1,0,'L');
        $this->SetX(5);
        $this->Cell(15, 5, "TANGGAL DAFTAR ", 0, 1, 'L');
        $this->SetXY(40, 98);
        $this->Cell(15, 5, ": ".$created_date, 0, 1, 'L');

        // TANGGAL TEST
        $this->SetXY(5, 103);
        $this->Cell(130,5,'',1,0,'L');
        $this->SetX(5);
        $this->Cell(15, 5, "TANGGAL PELAKSANAAN TES ", 0, 1, 'L');
        $this->SetXY(40, 103);
        $this->Cell(15, 5, ": ".$jadwal_seleksi, 0, 1, 'L');


        // TEMPAT TES
        $this->SetXY(5, 108);
        $this->Cell(130,5,'',1,0,'L');
        $this->SetX(5);
        $this->Cell(15, 5, "TEMPAT ", 0, 1, 'L');
        $this->SetXY(40, 108);
        $this->Cell(15, 5, ": Kampus IAI Nusantara Batang Hari", 0, 1, 'L');

        // // TEMPAT TES
        $this->SetXY(5, 113);
        $this->Cell(130,25,'',1,0,'L');
        $this->SetX(85);
        $this->Cell(15, 5, "KETUA PANITIA", 0, 1, 'L');
        $this->SetX(85);
        $this->Cell(15, 5, "PENERIMAAN MAHASISWA BARU (PMB)", 0, 1, 'L');

        $this->SetXY(85, 133);
        $this->Cell(15, 5, "KHOLID ANSORI, S.E., MM", 0, 1, 'L');

        // TEMPAT TES
        $this->SetXY(5, 138);
        $this->Cell(130,5,'',1,0,'L');
        $this->SetX(5);
        $this->Cell(15, 5, "- Bukti Pendaftaran ini harus dibawa pada saat Tes PMB dan pada saat melakukan Registrasi Ulang", 0, 1, 'L');

        // TEMPAT TES
        $this->SetXY(5, 143);
        $this->Cell(130,5,'',1,0,'L');
        $this->SetX(5);
        $this->Cell(15, 5, "- Fotocopy berkas yang di Upload dibawa saat registrasi ulang apabila telah di nyatakan Tes PMB", 0, 1, 'L');

        // CATATAN
        $this->SetXY(5, 148);
        $this->Cell(130,40,'',1,0,'L');
        $this->SetX(5);
        $this->SetFont('Helvetica', 'B', '6');
        $this->Cell(15, 5, "CATATAN BAGI YANG MENGIKUTI TES", 0, 1, 'L');
        $this->SetFont('Helvetica', '', '6');
        $this->Cell(15, 3, "1. Bukti Pendaftaran ini di Cetak dan dibawa saat pelaksanaan Tes PMB", 0, 1, 'L');
        $this->Cell(15, 3, "2. Peserta Wajib Hadir 1 Jam sebelum Pelaksanaan Tes", 0, 1, 'L');
        $this->Cell(15, 3, "3. pelaksanaan Tes terdiri dari 2 Jenis yakni Tes CBT dan Wawancara", 0, 1, 'L');
        $this->Cell(15, 3, "(Materi CBT : Potensi akademik, Pengetahuan Umum, Pengetahuan", 0, 1, 'L');
        $this->Cell(15, 3, "4. Peserta membawa Gadget/Smartphone Untuk pelaksanaan Tes", 0, 1, 'L');
        $this->Cell(15, 3, "dan pastikan tersedia Kuota Internet;", 0, 1, 'L');
        $this->Cell(15, 3, "5. Pakaian saat Tes PMB, celana dasar warna hitam, baju kemeja", 0, 1, 'L');
        $this->Cell(15, 3, "Putih dan kopiah hitam bagi laki-laki dan Rok warna hitam , baju Putih serta jilbab putih bagi perempuan", 0, 1, 'L');
        $this->Cell(15, 3, "6. Bagi peserta yang berhalangan hadir agar segera melapor kepada", 0, 1, 'L');
        $this->Cell(15, 3, "7. Panitia Maks. 1 Hari sebelum pelaksanaan Tes PMB.", 0, 1, 'L');

        // CONTAK
        $this->SetXY(5, 183);
        $this->Cell(130,5,'',1,0,'L');
        $this->SetXY(15, 183);
        $this->Cell(15, 5, "WA Center Panitia PMB : 0857-5890-8621", 0, 1, 'L');

        $this->SetXY(5, 183);
        $this->Cell(130,5,'',1,0,'L');
        $this->SetXY(70, 183);
        $this->Cell(15, 5, "Update Info : www.pmb.iaianbatanghari.ac.id", 0, 1, 'L');



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

    function catatan($ctt){
        $this->Ln(2);
        $this->SetFont('Helvetica','B',11);
        $this->Cell(35);
        $this->Cell(30,5,'PERSYARATAN DAFTAR ULANG',0,0,'L');
        $this->Cell(5);
        $this->Ln(5);
        $this->SetFont('Helvetica','',10);
        $this->Cell(35);
        $this->Cell(30,5,'1. Membawa Print Out Bukti Pendaftaran, Surat Keterangan Ini dan Form registrasi Ulang',0,0,'L');
        $this->Ln(5);
        $this->Cell(35);
        $this->Cell(30,5,'2. Membawa Fotocopy Slip Bukti Pembayaran Registrasi Ulang (Pembayaran dapat',0,0,'L');
        $this->Ln(7);
        $this->Cell(35);
        $this->Cell(30,5,'dilakukan di kantor YPI Batang Hari dibelakang Aula Utama IAI N Batang Hari) Rincian Biaya',0,0,'L');
        $this->Ln(7);
        $this->Cell(35);
        $this->Cell(30,5,'Kuliah dapat di lihat disini : https://pmb.iaianbatanghari.ac.id',0,0,'L');

        $this->Ln(7);
        $this->Cell(35);
        $this->Cell(30,5,'3. Membawa fotocopy berkas Pendaftaran yang di Upload pada saat mendaftar',0,0,'L');

        $this->Ln(7);
        $this->Cell(35);
        $this->Cell(30,5,'   - Foto Warna 3x4 2 Lembar',0,0,'L');

        $this->Ln(7);
        $this->Cell(35);
        $this->Cell(30,5,'   - Foto Copy Ijasah/SKHU yang dilegalisir 2 Lembar',0,0,'L');

        $this->Ln(7);
        $this->Cell(35);
        $this->Cell(30,5,'   - Foto Copy KTP/KK 1 Lembar',0,0,'L');

        $this->Ln(7);
        $this->Cell(35);
        $this->Cell(30,5,'   - Fotocopy Piagam Prestasi (Bagi yang mendaftar Jalur Prestasi)',0,0,'L');

        $this->Ln(7);
        $this->Cell(35);
        $this->Cell(30,5,'4. Seluruh Berkas dimasukan dalam Map dan diserahkan kebagian Akademik di Kampus IAI',0,0,'L');

        $this->Ln(7);
        $this->Cell(35);
        $this->Cell(30,5,'Nusantara Batang Hari',0,0,'L');

        $this->Ln(7);
        $this->Cell(35);
        $this->Cell(30,5,'5. MAP untuk FPIK (Warna Hijau), FASYA (Warna Merah), FEBI (Warna Kuning)',0,0,'L');


        $this->Ln(9);
        $this->Cell(35);
        $this->Cell(220,5,'Muara Bulian, '.date('d F Y'),0,0,'C');

        $this->Ln(9);
        $this->Cell(35);
        $this->Cell(220,5,'Ketua Panitia PMB',0,0,'C');



        $this->Ln(20);
        $this->Cell(35);
        $this->Cell(220,5,'Kholid Ansori, S.E., MM',0,0,'C');
        $this->Ln();
    }

    function idSiswa($nama, $no_pendaftaran, $prodi, $jalur, $hasil){
        $this->Ln(2);
        $this->SetFont('Times','',12);
        $this->Cell(35);
        $this->Cell(30,5,'Nama',0,0,'L');
        $this->Cell(5);
        $this->Cell(1,5,': '.$nama,0,1,'L');
        $this->Cell(35);
        $this->Cell(30,5,'No. Pendaftaran',0,0,'L');
        $this->Cell(5);
        $this->Cell(1,5,': '.$no_pendaftaran,0,1,'L');
        $this->Cell(35);
        $this->Cell(30,5,'Program Studi',0,0,'L');
        $this->Cell(5);
        $this->Cell(1,5,': '.$prodi,0,1,'L');
        $this->Cell(35);
        $this->Cell(30,5,'Jalur Pendaftaran',0,0,'L');
        $this->Cell(5);
        $this->Cell(1,5,': '.$jalur,0,1,'L');
        $this->Cell(35);
        $this->Cell(30,15,'Dinyatakan',0,0,'L');
        $this->Cell(5);
        $this->SetFont('Times','B',14);
        $this->Cell(30,25,'LULUS',0,1,'C','');

    }
    function form_register($no_pendaftaran, $nama, $prodi, $tempat_lahir, $tgl_lahir)
    {
        $this->AddPage('P');
        $this->SetFont('Helvetica','i',8);
        $this->Cell(5,0,'Panitia PMB IAI Nusantara Batang Hari Tahun 2023',0,0,'L');
        $this->SetLineWidth(0);
        $this->Line(10, 12, 185, 12);
        

        // $this->SetFont('Helvetica','B',14);
        $this->ln(5);
        $this->SetFont('Helvetica','B',14);
        $this->Cell(5,10,'FORMULIR REGISTRASI ULANG',0,0,'L');

        $this->ln(5);
        $this->SetFont('Helvetica','B',11);
        $this->Cell(5,13,'MAHASISWA BARU INSTITUT AGAMA ISLAM NUSANTARA BATANG HARI',0,0,'L');

        $this->ln(5);
        $this->SetFont('Helvetica','B',11);
        $this->Cell(5,15,'TAHUN AKADEMIK'.date('Y').'/'.date('Y', strtotime('+1 years')),0,0,'L');

        $this->SetLineWidth(0);
        $this->Line(10, 35, 185, 35);

        $this->Ln(10);
        $this->SetFont('Times','',10);
        $this->Cell(5);
        $this->Cell(5,8,'1. NOMOR PENDAFTARAN',0,0,'L');
        $this->Cell(55);
        $this->Cell(5,8,': '.strtoupper($no_pendaftaran),0,1,'L');


        $this->Cell(5);
        $this->Cell(5,8,'2. NAMA LENGKAP',0,0,'L');
        $this->Cell(55);
        $this->Cell(5,8,': '.strtoupper($nama),0,1,'L');

        $this->Cell(5);
        $this->Cell(5,8,'3. FAK./PROGRAM STUDI ',0,0,'L');
        $this->Cell(55);
        $this->Cell(5,8,': '.ucwords($prodi),0,1,'L');

        $this->Cell(5);
        $this->Cell(5,8,'4. TEMPAT/TANGGAL LAHIR',0,0,'L');
        $this->Cell(55);
        $this->Cell(5,8,': '.strtoupper($tempat_lahir).', '.$tgl_lahir,0,1,'L');

        $this->Cell(5);
        $this->Cell(5,8,'5. PILIHAN HARI PERKULIAHAN',0,0,'L');
        $this->Cell(55);
        $this->Cell(5,8,': - REGULAR I',0,1,'B');

        $this->SetXY(125, 68);
        $this->Cell(10,8,'',1,0,'L');

        $this->SetXY(77, 76);
        $this->Cell(5,8,'- REGULAR II',0,1,'B');


        $this->SetXY(125, 76);
        $this->Cell(10,8,'',1,0,'L');


        $this->SetXY(77, 84);
        $this->Cell(5,8,'- REGULAR III',0,1,'B');
        

        $this->SetXY(125, 84);
        $this->Cell(10,8,'',1,0,'L');

        $this->SetXY(5, 95);
        $this->Cell(11);
        $this->Cell(5,8,'6. KELENGKAPAN BERKAS',0,0,'L');
        $this->Cell(55);
        $this->SetFont('Helvetica','B',10);
        $this->Cell(5,8,': - FOTO 3X4',0,1,'B');

        $this->SetXY(5, 100);
        $this->Cell(11);
        $this->SetFont('Helvetica','BI',10);
        $this->Cell(5,8,'( Diisi Oleh Petugas Akademik)',0,0,'');

        $this->SetFont('Helvetica','B',10);
        $this->SetXY(77, 103);
        $this->Cell(5,8,'- FC IJASAH/SKHUN',0,1,'B');
        

        $this->SetXY(125, 103);
        $this->Cell(10,8,'',1,0,'L');

        $this->SetXY(125, 95);
        $this->Cell(10,8,'',1,0,'L');


        $this->SetXY(77, 111);
        $this->Cell(5,8,'-  FC KTP/KK',0,1,'B');
        

        $this->SetXY(125, 111);
        $this->Cell(10,8,'',1,0,'L');

        $this->SetXY(77, 119);
        $this->Cell(5,8,'- FCSLIP PEMBAYARAN',0,1,'B');
        

        $this->SetXY(125, 119);
        $this->Cell(10,8,'',1,0,'L');

        $this->SetXY(77, 127);
        $this->Cell(5,8,'- FC PIAGAM PRESTASI',0,1,'B');
        

        $this->SetXY(125, 127);
        $this->Cell(10,8,'',1,0,'L');

        $this->SetFont('Helvetica','',12);

        $this->SetXY(77, 140);
        $this->Cell(5,8,'MA. BULIAN ,       -                   -  2023',0,1,'B');

        $this->SetXY(77, 145);
        $this->Cell(5,8,'Mahasiswa',0,1,'B');

        $this->SetXY(20, 150);
        $this->Cell(5,8,'Keterangan',0,1,'B');
        
        $this->SetFont('Helvetica','',10);


        $this->SetXY(20, 155);
        $this->Cell(5,8,'- Reguler I (Hari Kuliah Selasa, Rabu dan Kamis)',0,1,'B');

        $this->SetXY(20, 158);
        $this->Cell(5,8,'- Reguler II (Hari Kuliah Jumat,Sabtu dan Minggu)',0,1,'B');

        $this->SetXY(20, 161);
        $this->Cell(5,8,'- Reguler III ( Hari Kuliah Senin, Selasa dan Rabu)',0,1,'B');


        $this->SetFont('Helvetica','B',10);
        $this->SetXY(100, 165);
        $this->Cell(5,8,strtoupper($nama),0,1,'C');

        $this->SetFont('Helvetica','i',8);
        $this->Cell(5,0,'Potong Disini (Petugas)',0,0,'L');
        $this->SetLineWidth(0);
        $this->Line(10, 175, 185, 175);
        

        // $this->SetFont('Helvetica','B',14);
        $this->ln(5);
        $this->SetFont('Helvetica','B',14);
        $this->Cell(5,10,'FORMULIR REGISTRASI ULANG',0,0,'L');

        $this->ln(5);
        $this->SetFont('Helvetica','B',11);
        $this->Cell(5,13,'MAHASISWA BARU INSTITUT AGAMA ISLAM NUSANTARA BATANG HARI',0,0,'L');

        $this->ln(5);
        $this->SetFont('Helvetica','B',11);
        $this->Cell(5,15,'TAHUN AKADEMIK'.date('Y').'/'.date('Y', strtotime('+1 years')),0,0,'L');

        $this->SetLineWidth(0);
        $this->Line(10, 35, 185, 35);

        $this->Ln(10);
        $this->SetFont('Times','',11);
        $this->Cell(5);
        $this->Cell(5,8,'1. NOMOR PENDAFTARAN',0,0,'L');
        $this->Cell(55);
        $this->Cell(5,8,': '.strtoupper($no_pendaftaran),0,1,'L');

        $this->Cell(5);
        $this->Cell(5,8,'2. NAMA LENGKAP',0,0,'L');
        $this->Cell(55);
        $this->Cell(5,8,': '.strtoupper($nama),0,1,'L');

        $this->Cell(5);
        $this->Cell(5,8,'3. FAK./PROGRAM STUDI ',0,0,'L');
        $this->Cell(55);
        $this->Cell(5,8,': '.ucwords($prodi),0,1,'L');

        $this->Cell(5);
        $this->Cell(5,8,'4. TEMPAT/TANGGAL LAHIR',0,0,'L');
        $this->Cell(55);
        $this->Cell(5,8,': '.strtoupper($tempat_lahir).', '.$tgl_lahir,0,1,'L');

         $this->Cell(5);
        $this->Cell(5,8,'5. PILIHAN HARI PERKULIAHAN ',0,0,'L');
        $this->Cell(55);
        $this->Cell(5,8,': ',0,1,'L');

        $this->SetXY(17, 237);

        $this->Cell(60,20,'',1,0,'L');

        $this->SetXY(17, 236);
        $this->Cell(5,8,'Catatan : ',0,1,'B');
        


        $this->SetXY(77, 230.5);
        $this->SetFont('Times','B',11);

        $this->Cell(5,8,'- REGULAR I',0,1,'B');
        

        $this->SetXY(125, 230.5);
        $this->Cell(10,8,'',1,0,'L');

        $this->SetXY(77, 238.5);
        $this->Cell(5,8,'- REGULAR II',0,1,'B');
        

        $this->SetXY(125, 238.5);
        $this->Cell(10,8,'',1,0,'L');

        $this->SetXY(77, 246.5);
        $this->Cell(5,8,'- REGULAR II',0,1,'B');
        

        $this->SetXY(125, 246.5);
        $this->Cell(10,8,'',1,0,'L');

        $this->SetXY(77, 260.5);
        $this->Cell(5,8,'PETUGAS',0,1,'B');


        $this->SetLineWidth(0);
        $this->Line(120, 281, 55, 281);
        


        //  $this->SetXY(77, 145);
        // $this->Cell(5,8,'(Bagi Yang Mendaftar Jalur Prestasi/Tahfidz)',0,1,'B');
        

        // $this->SetXY(125, 142);
        // $this->Cell(10,8,'',1,0,'L');

        // // $this->Cell(55);
        // $this->SetXY(100, 60);
        // $this->Cell(5,8,'',0,1,'L');


        // $this->Cell(5);
        // $this->Ln(5);
        // $this->SetFont('Helvetica','',10);
        // $this->Cell(35);
        // $this->Cell(30,5,'1. Membawa Print Out Bukti Pendaftaran, Surat Keterangan Ini dan Form registrasi Ulang',0,0,'L');
        // $this->Ln(5);
        // $this->Cell(35);
        // $this->Cell(30,5,'2. Membawa Fotocopy Slip Bukti Pembayaran Registrasi Ulang (Pembayaran dapat',0,0,'L');
        // $this->Ln(7);
        // $this->Cell(35);
        // $this->Cell(30,5,'dilakukan di kantor YPI Batang Hari dibelakang Aula Utama IAI N Batang Hari) Rincian Biaya',0,0,'L');
        // $this->Ln(7);
        // $this->Cell(35);
        // $this->Cell(30,5,'Kuliah dapat di lihat disini : https://pmb.iaianbatanghari.ac.id',0,0,'L');



    }

}

//instantisasi objek


$pdf = new Pdf2();

//Mulai dokumen

$pdf->AddPage('P', 'A5');

//meletakkan gambar

$pdf->letak('assets/images/logo.png');

//meletakkan judul disamping logo diatas

$pdf->judul('PANITIA PENERIMAAN MAHASISWA BARU TAHUN AKADEMIK 2022/2023', 'INSTITUT AGAMA ISLAM (IAI) NUSANTARA BATANG HARI', 'Alamat : Jl. Gajah Mada Teratai Muara Bulian, 36612 Telp. (0743) 21479, Website: http://iaianbatanghari.ac.id');

$pdf->body($row->no_pendaftaran, $row->fullname, $row->mobilenumber, $jalur->jalur_name, $row->prodi_terpilih, $row->is_ujian == 0 ? "Lulus Tanpa Tes" : "", date("d F Y", strtotime($row->created_date)), date("d F Y", strtotime($jalur->jadwal_seleksi)), $row->tempat_lahir, date('d F Y', strtotime($row->tanggal_lahir)));

$pdf->photo('assets/document_persyaratan/'.$row->userid.'/'.$getPhoto->file_name);

//membuat garis ganda tebal dan tipis

// $pdf->garis();






$pdf->Output('kopsurat.pdf', 'I');