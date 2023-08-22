<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Trans_ssi_model extends CI_Model
{
    public function getAll($tabel, $kolom){
        $this->db->where('status', 1);
        $this->db->where('is_active', 1);
        $this->db->order_by($kolom);
        return $this->db->get($tabel)->result();
    }
}
