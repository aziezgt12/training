<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload_model extends CI_Model
{


    function getBerkasUploadByJalur($jalurId, $userid = null)
    {

        $this->db->join("tbl_mst_document_pendataran b", "a.doc_id  = b.doc_id", "left");
        $this->db->where("a.jalur_id", $jalurId);
        $sql =  $this->db->get("tbl_utl_jalur_det_doc a")->result();

        $data = [];
        foreach($sql as $val){
            $row = $this->db->get_where("ch_gen_tbl_user", ["userid" => $userid])->row();
            $isUploaded = $this->db->get_where("tbl_trn_upload_document_persyaratan", ['jalur_id' => $row->jalur_id, 'userid' => $userid, 'file_attr' => $val->attr_name ])->row();
            $data[] = [
                "id"           => $val->id,
                "jalur_id"     => $val->jalur_id,
                "doc_name"     => $val->doc_name,
                "attr_name"    => $val->attr_name,
                "uploaded"     => $isUploaded
            ];
        }

        return $data;

    }



    function getUploadBerkasByUserid($userid)
    {
        return $this->db->get_where("tbl_trn_upload_document_persyaratan", ['userid' => $userid])->result();
    }

    function getUploadBerkasByParam($param)
    {
        return $this->db->get_where("tbl_trn_upload_document_persyaratan", $param)->row();
    }



}
