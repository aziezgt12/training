<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Docpendaftaran_model extends CI_Model
{
    private $tableJalur = "tbl_mst_jalur";
    private $tableDetDoc = "tbl_utl_jalur_det_doc";
    private $tableMstDocument = "tbl_mst_document_pendataran";



    function getAll()
    {
        $hdr = $this->db->get($this->tableMstDocument)->result();

        return $hdr;
    }

    function getAllByParam($param)
    {
        $this->db->join($this->tableMstDocument." b", "a.doc_id = b.doc_id");
        if(isset($param['jalur_id']))
        {
            $this->db->where('a.jalur_id', $param['jalur_id']);
        }
        $response = $this->db->get($this->tableDetDoc." a")->result();


        return $response;

    }

    // function save($param)
    // {
    //     $save = $this->db->insert($this->tableJalur, $param);

    //     if($save) return true;


    //     return false;
    // }

    // function update($param)
    // {
    //     $this->db->where('prodi_id', $param['prodi_id']);
    //     $save = $this->db->update($this->tableJalur, $param);

    //     if($save) return true;


    //     return false;
    // }

}
