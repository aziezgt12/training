<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_MstTraining extends BaseController
{
        public function __construct()
        {
                // Load the constructer from MY_Controller
                parent::__construct();
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
                $data['title'] = 'List Of Master Training';

                $this->argon('index', $data);
        }

        function getAll()
        {
            $result = $this->db->order_by('kode desc')->get('tb_mst_training')->result();

            echo $this->httpResponseCode(200, "OK", $result);
        }

        function save()
        {
                try {
                        $param = $this->input->post();

                        
                        if($param['kode'] > 0)
                        {
                                $this->db->where('kode', $param['kode']);
                                $sql = $this->db->update('tb_mst_training', $param);       
                        }else{                                
                                $sql = $this->db->insert('tb_mst_training', $param);
                        }
                        
                        if($sql)
                        {
                                $text = $param['kode'] > 0 ? "Update" : "Save";
                            echo $this->httpResponseCode(200, "$text Data Berhasil", true);
                        }else{
                            echo $this->httpResponseCode(400, "Wrong Database", false);
                        }

                } catch (Exception $e) {
                        echo $this->httpResponseCode(500, $e->getMessage());
                        // error hadnling

                }
        }

        function delete()
        {
                $id = $this->input->post("id");
                $this->db->where('kode', $id);
                $sql = $this->db->delete('tb_mst_training');

                if($sql)
                {
                    echo $this->httpResponseCode(200,"Delete Data Berhasil");
                }else{
                    echo $this->httpResponseCode(400,"Wrong Database");
                }
        }
        public function getRow()
        {
                $param  = trim($this->input->post('id'));
                $data   = $this->Master->getRow($this->tblTrans, [$this->kolom_id => $param]);
                echo json_encode($data);
        }

}
