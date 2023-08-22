<?php

class pdfgen extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->library('Pdf');
                error_reporting(1);
        }

        function print($tipe, $regno)
        {


                $this->db->select("a.*, b.ea_code, b.deskripsi as nace_desc, c.nama_sales, d.nama_standar, d.deskripsi as layanan_desc");

                $this->db->join('ch_gen_tbl_nace_code b','a.ea_code=b.nace_id', 'left');
                $this->db->join('ch_gen_tbl_mst_sales c','a.kode_sales=c.sales_id', 'left');
                $this->db->join('ch_gen_tbl_mst_layanan d','a.kode_standar = d.layanan_id', 'left');
                $this->db->where('a.nomor_sertifikat', $regno);

                $sql = $this->db->get('ch_gen_tbl_trans_sertifikat a')->row();

          
                $data['title'] = '';
                $data['tipe'] = $tipe;
                $data['row'] = $sql;
                
                // echo "pre>";
                // print_r($data['row']);
                // die;
                $this->load->view('print', $data);
        }

        function audit_report($regno)
        {

                $this->db->select("a.*, b.ea_code, b.deskripsi as nace_desc, c.nama_sales, d.nama_standar, d.deskripsi as layanan_desc");

                $this->db->join('ch_gen_tbl_nace_code b','a.ea_code=b.nace_id', 'left');
                $this->db->join('ch_gen_tbl_mst_sales c','a.kode_sales=c.sales_id', 'left');
                $this->db->join('ch_gen_tbl_mst_layanan d','a.kode_standar = d.layanan_id', 'left');
                $this->db->where('a.nomor_sertifikat', $regno);

                $sql = $this->db->get('ch_gen_tbl_trans_sertifikat a')->row();

          
                $data['title'] = '';
                $data['tipe'] = $tipe;
                $data['row'] = $sql;
                
                // echo "pre>";
                // print_r($data['row']);
                // die;
                $this->load->view('audit_report', $data);
        }

        function buktiDaftar($userid)
        {



                $data['row'] = $this->db->get_where('ch_gen_tbl_user', ['userid' => $userid])->row();
                // if($data['row']->hasil_seleksi == 2)
                // {
                $data['jalur'] = $this->db->get_where('tbl_mst_jalur', ['jalur_id' => $data['row']->jalur_id])->row();
                $data['setting'] = $this->db->get('setting_web')->row();
                $data['getPhoto'] = $this->db->get_where('tbl_trn_upload_document_persyaratan', ['file_attr' => 'foto', 'userid' => $userid])->row();


                // echo "<pre>";
                // // echo json_encode($data['getPhoto']);
                // die;
                $this->load->view('welcome2', $data);
                // }else{
                //         redirect(base_url());
                // }
               // error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
               //  $pdf = new FPDF('L', 'mm','Letter');
               //  $pdf->AddPage();
               //  $pdf->SetFont('TIMES','B',16);
               //  $pdf->Cell(0,7,'DAFTAR PEGAWAI AYONGODING.COM',0,1,'C');
               //  $pdf->Cell(10,7,'',0,1);
               //  $pdf->SetFont('Arial','B',10);
               //  $pdf->Cell(10,6,'No',1,0,'C');
               //  $pdf->Cell(90,6,'Nama Pegawai',1,0,'C');
               //  $pdf->Cell(120,6,'Alamat',1,0,'C');
               //  $pdf->Cell(40,6,'Telp',1,1,'C');
               //  $pdf->SetFont('Arial','',10);
               //  $pegawai = $this->db->get('ch_gen_tbl_utl_menu_hdr')->result();
               //  $no=0;
               //  foreach ($pegawai as $data){
               //      $no++;
               //      $pdf->Cell(10,6,$no,1,0, 'C');
               //      $pdf->Cell(90,6,$data->nama,1,0);
               //      $pdf->Cell(120,6,$data->alamat,1,0);
               //      $pdf->Cell(40,6,$data->telp,1,1);
               //  }
               //  $pdf->Output();
        }

}