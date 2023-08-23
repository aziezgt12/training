<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Report extends BaseController
{
        public function __construct()
        {
                // Load the constructer from MY_Controller
                parent::__construct();
                $this->load->library('Pdf');
                // error_reporting(1);
        }

        /**
         * Index Page for this controller.
         *
         * Maps to the following URL
         *              http://example.com/index.php/welcome
         *      - or -
         *              http://example.com/index.php/welcome/index
         *      - or -
         * Since this controller is set as the default controller in
         * config/routes.php, it's displayed at http://example.com/
         *
         * So any other public methods not prefixed with an underscore will
         * map to /index.php/welcome/<method_name>
         * @see http://codeigniter.com/user_guide/general/urls.html
         */
        public function index()
        {
                if (empty($this->session->userdata("userId"))) {
                        redirect("C_Auth");
                }

                $data['title'] = 'Rekap Sertifikat';
                $data['listTraining'] = $this->db->order_by('kode desc')->get('tb_mst_training')->result();
                
                
                $data['listCompany'] = $this->db->select('nama_perusahaan')->distinct()->order_by('nama_perusahaan')->where('nama_perusahaan != "" ', false, false)->get('tb_trn_pesert')->result();




                $this->argon('index', $data);
        }

        function getAll()
        {
                $param = $this->input->get();
                $this->db->order_by('id desc');
                if(!empty($param['company']))
                {
                        $this->db->like('nama_perusahaan', $param['company']);
                }
                if(!empty($param['no_sertifikat']))
                {
                        $this->db->like('no_sertifikat', $param['no_sertifikat']);
                }
                $data['listPeserta'] = $this->db->get('tb_trn_pesert')->result();
                

                
                foreach ($data['listPeserta'] as $item) {
                        $this->db->select('*');
                        $this->db->from('tb_trn_pesert_det_pelatihan a');
                        $this->db->join('tb_mst_training b', 'b.kode = a.id_training');
                        $this->db->where('a.id_peserta', $item->id);
                        if(!empty($param['training']))
                        {
                                $this->db->where('nama', $param['training']);
                        }
                        // if(!empty($param['training']))
                        // {
                        //         $this->db->where('nama', $param['training']);
                        // }
                        
                        $detTraining = $this->db->get()->result(); // Use get() instead of result()
                $data['detPelatihan'][$item->id] = $detTraining ?? [];
        }
        echo $this->httpResponseCode(200, "OK", $data);
        }



        function print($idPeserta)
        {
                // if (empty($this->session->userdata("userId"))) {
                //         redirect("C_Auth");
                // }
                $data['peserta'] = $this->db->get_where("tb_trn_pesert", ['id' => $idPeserta])->row();
                $this->db->select('*');
                $this->db->from('tb_trn_pesert_det_pelatihan a');
                $this->db->join('tb_mst_training b', 'b.kode = a.id_training');
                $this->db->where('a.id_peserta', $idPeserta);
                
                $detTraining = $this->db->get()->result();

                $data['listTraing']  = $detTraining;
                // echo json_encode($data);
                // die;
                
                $this->load->view('print-sertifikat', $data);
        }
}
