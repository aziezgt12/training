<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Verifikasi extends BaseController
{
       
        public function index()
        {
                $no_setifikat = $this->input->get('no_sertifikat');

                 $data['peserta'] = $this->db->get_where("tb_trn_pesert", ['no_sertifikat' => $no_setifikat])->row();
                $this->db->select('*');
                $this->db->from('tb_trn_pesert_det_pelatihan a');
                $this->db->join('tb_mst_training b', 'b.kode = a.id_training');
                $this->db->where('a.id_peserta', $data['peserta']->id);
                
                $detTraining = $this->db->get()->result();

                $data['listTraing']  = $detTraining;
                $data['no_sertifikat'] = $no_setifikat;

                // echo "<pre>";
                // print_r($data)
                // die;

                $this->load->view('index', $data);
        }


}
