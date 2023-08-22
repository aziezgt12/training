<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_model extends CI_Model
{
    public function getAll($tabel, $kolom){
        $this->db->where('is_active', 1);
        $this->db->order_by($kolom);
        return $this->db->get($tabel)->result();
    }

    public function getRow($tabel, $param){
        return $this->db->get_where($tabel, $param)->result();
    }

    public function save($tabel, $param)
    {
        $this->db->trans_begin();
        $this->db->insert($tabel, $param);
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return false;
        }else{
            $this->db->trans_commit();
            return true;
        }
    }

    public function update($tabel, $kolom, $param, $id)
    {
        $this->db->trans_begin();
        $this->db->where($kolom, $id);
        $this->db->update($tabel, $param);
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return false;
        }else{
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_master($tabel, $kolom, $id)
    {
        $this->db->trans_begin();
        $this->db->where($kolom, $id);
        $this->db->update($tabel, ['is_active' => 0]);
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return false;
        }else{
            $this->db->trans_commit();
            return true;
        }
    }

    public function cekValidation($tabel, $param){
        return $this->db->get_where($tabel, $param)->result();
    }

}
