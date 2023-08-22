<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Container_model extends CI_Model
{
    private $tblContHdr = "ship_tbl_trn_cont_hdr";
    private $tblContLocalDet = "ship_tbl_trn_cont_local_dtl";
    private $tblContAccept = "ship_tbl_trn_cont_acceptance_dtl";


    private $tblContainer = "zhl_mar_tblmst_container";

    function getAllContainer()
    {
        $this->db->where('not_active', 0);
        $this->db->order_by('container_id', "asc");
        return $this->db->get($this->tblContainer)->result();
    }


}
