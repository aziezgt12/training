<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_InputSertifikat extends CI_Controller
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

                $data['title'] = 'List Of Sertifikat';
                $data['listTraining'] = $this->db->order_by('kode desc')->where('is_active = 1', false, false)->get('tb_mst_training')->result();

                $this->argon('index', $data);
        }

        function getAll()
        {
                $data['listPeserta'] = $this->db->order_by('id desc')->get('tb_trn_pesert')->result();

                
                foreach ($data['listPeserta'] as $item) {
                        $this->db->select('*');
                        $this->db->from('tb_trn_pesert_det_pelatihan a');
                        $this->db->join('tb_mst_training b', 'b.kode = a.id_training');
                        $this->db->where('a.id_peserta', $item->id);
                        
                        $detTraining = $this->db->get()->result(); // Use get() instead of result()
                $data['detPelatihan'][$item->id] = $detTraining ?? [];
        }
        echo $this->httpResponseCode(200, "OK", $data);
        }


        function save()
        {
                if (empty($this->session->userdata("userId"))) {
                        redirect("C_Auth");
                }
                try {
                        $param = $this->input->post();




                        $data = [
                                'nama_peserta' =>$param['nama_peserta'],
                                'nama_perusahaan' =>$param['nama_perusahaan'],
                                'nomor_whatsapp' =>$param['nomor_whatsapp'],
                                'pendidikan_terakhir' =>$param['pendidikan_terakhir'],
                                'alamat_rumah' =>$param['alamat_rumah'],
                                'no_sertifikat' => random_int(10000000, 99999999)
                        ];
                        $sql = $this->db->insert('tb_trn_pesert', $data);

                        foreach($param['id_training'] as $item)
                        {
                                $detTraining[] = [
                                        'id_peserta' => $this->db->insert_id(),
                                        'id_training' => $item
                                ];
                        }

                        
                        $this->db->insert_batch('tb_trn_pesert_det_pelatihan', $detTraining);
                        if($sql)
                        {
                            echo $this->httpResponseCode(200, "Save Data Berhasil", true);
                        }else{
                            echo $this->httpResponseCode(400, "Wrong Database", false);
                        }

                } catch (Exception $e) {
                        echo $this->httpResponseCode(500, $e->getMessage());
                        // error hadnling

                }
        }

        function updateData($param)
        {
                echo $this->httpResponseCode($param);
                die;
        }

        function deleted(){
                if (empty($this->session->userdata("userId"))) {
                        redirect("C_Auth");
                }
                try{
                        $param  = trim($this->input->post('id'));
                        $delete = $this->Master->delete_master($this->tblTrans, $this->kolom_id, $param);

                        if($delete)
                        {
                                echo $this->httpResponseCode(200, 'Delete Success');
                                die;
                        }
                        else
                        {
                                echo $this->httpResponseCode(400, 'Wrong Queries');
                                die;
                        }
                } catch (Exception $e) {
                        echo $this->httpResponseCode(400, $e->getMessage());
                        // error handling
                }
        }

        public function getRow()
        {
                if (empty($this->session->userdata("userId"))) {
                        redirect("C_Auth");
                }
                $param  = trim($this->input->post('id'));
                $data   = $this->Master->getRow($this->tblTrans, [$this->kolom_id => $param]);
                echo json_encode($data);
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

        function delete()
        {
                $id = $this->input->post("id");
                $this->db->where('id', $id);
                $sql = $this->db->delete('tb_trn_pesert');

                if($sql)
                {
                    echo $this->httpResponseCode(200,"Delete Data Berhasil");
                }else{
                    echo $this->httpResponseCode(400,"Wrong Database");
                }
        }

        function track($idPeserta = null)
        {
                $data['peserta'] = $this->db->get_where("tb_trn_pesert", ['id' => $idPeserta])->row();
                $this->db->select('*');
                $this->db->from('tb_trn_pesert_det_pelatihan a');
                $this->db->join('tb_mst_training b', 'b.kode = a.id_training');
                $this->db->where('a.id_peserta', $idPeserta);
                
                $detTraining = $this->db->get()->result();

                $data['listTraing']  = $detTraining;

                if(count($data['listTraing']) > 0)
                {
                        $this->load->view('sertifikat', $data);
                }else{
                        $this->load->view('notfound', $data);

                }
        }
function argon($template, $data = null)
    {



        // $data['listMenu'] = $this->getMenu($this->groupId);

        $data['_stylesheet']      = $this->load->view('layout/_partial/argon/stylesheet', $data, true);
        $data['_menu']       = $this->load->view('layout/_partial/argon/menu', $data, true);
        // $data['_navigation'] = $this->load->view('layout/_partial/argon/navigation', $data, true);
        $data['_titlePage'] = isset($data['titlePage']) ? $data['titlePage'] : "";
        $data['_content']    = $this->load->view($template, $data, true);
        $data['_script']     = $this->load->view('layout/_partial/argon/script', $data, true);


        $this->load->view('/layout/argonindex.php', $data);
    }

    protected function httpResponseCode($code, $message, $result=[])
    {
        return json_encode(["code" => $code, "message" => $message, "result" => $result]);
    }
}
