<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register_model extends CI_Model
{
    private $tableUser = "ch_gen_tbl_user";
    // private $tblContLocalDet = "ship_tbl_trn_cont_local_dtl";
    // private $tblContAccept = "ship_tbl_trn_cont_acceptance_dtl";

    function updatePersonalData($param)
    {
        $this->db->where("userid", $param['userid']);
        $sql = $this->db->update($this->tableUser, $param);

        return $sql;

    }


    function getDetailRegisterById($id)
    {
        $this->db->select("a.*, jalur_name");
        $this->db->join("tbl_mst_jalur b", "a.jalur_id = b.jalur_id");
        $this->db->where("userid", $id);
        return $this->db->get($this->tableUser." a")->row();
    }

    function getAllDocVerified()
    {
        return $this->db->get_where("ch_gen_tbl_user", ['status_berkas' => 2])->result();
    }

    function getAllByParam($param)
    {
        $this->db->select("a.*, jalur_name, biaya");
        $this->db->join("tbl_mst_jalur b", "a.jalur_id = b.jalur_id", "left");
        if(isset($param['is_bayar']) && $param['is_bayar'] == 1)
        {
            $this->db->where("status_pembayaran = 2", false,false);
        }

        return $this->db->get($this->tableUser." a")->result();
    }

    function konfirmasiBayar($param)
    {
        if($param['status_pembayaran'] == 3)
        {
            $this->db->where("userid", $param['userid']);
            $sql  =  $this->db->update("ch_gen_tbl_user", $param);            
        }else{
            $this->db->where("userid", $param['userid']);
            $sql  = $this->db->update("ch_gen_tbl_user", ['status_pembayaran' => 4, "file_pembayaran" => null, "remark_pembayaran" => $param['remark_pembayaran']]);            
        }

        return $sql;
    }

    function getDataCalonMahsiswaByJalur($jalurId)
    {
        $this->db->select("a.*");
        $this->db->where("jalur_id", $jalurId);
        return $this->db->get("ch_gen_tbl_user a")->result();
    }

    




    function getById($id)
    {
        return $this->db->get_where($this->tableUser, ['userid' => $id])->row();
    }


}
