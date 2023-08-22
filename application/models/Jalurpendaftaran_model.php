<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jalurpendaftaran_model extends CI_Model
{
    private $tableJalur = "tbl_mst_jalur";
    private $tableDetDoc = "tbl_utl_jalur_det_doc";
    private $tableMstDocument = "tbl_mst_document_pendataran";


    function getJalurActive()
    {
        return $this->db->get_where($this->tableJalur, ['status' => 1])->result();
    }

    function getAll($id = null)
    {
        $this->db->where('is_active', 1);
        if($id > 0)
        {
            $this->db->where('status', 1);
        }
        $this->db->order_by('jalur_name');
        $hdr = $this->db->get($this->tableJalur)->result();

        $detailDoc = [];
        foreach($hdr as $key => $val):
            $detailDoc = $this->db->join($this->tableMstDocument." b", "a.doc_id = b.doc_id")->where('a.jalur_id', $val->jalur_id)->get($this->tableDetDoc." a")->result();
            
            $data[] = [
                "jalur_id"      => $val->jalur_id,
                "jalur_name"    => $val->jalur_name,
                "biaya"        => $val->biaya,
                "status"        => $val->status,
                "is_active"     => $val->is_active,
                "jadwal_pendaftaran"     => $val->jadwal_pendaftaran,
                "jadwal_seleksi"     => $val->jadwal_seleksi,
                "create_at"     => $val->create_at,
                "create_date"   => $val->create_date,
                "update_at"     => $val->update_at,
                "update_date"   => $val->update_date,
                "delete_at"     => $val->delete_at,
                "delete_by"     => $val->delete_by,
                "require_document" => $detailDoc
            ];
        endforeach;

        return $data;
    }

    function save($param)
    {
        $this->db->trans_begin();

            $data = [
                "jalur_name" => $param['jalur_name'],
                "jadwal_pendaftaran" => date("Y-m-d", strtotime($param['jadwal_pendaftaran'])),
                "jadwal_seleksi" => date("Y-m-d", strtotime($param['jadwal_seleksi'])),
                "biaya" => $param['biaya'],
                "status" => 0,
                "create_at" => $param['create_at'],
                "create_date" => $param['create_date']
            ];

            $save = $this->db->insert($this->tableJalur, $data);
            $hdrId = $this->db->insert_id();

            if($save)
            {
                foreach ($param['document'] as $key => $value) {
                    $dataDoc[] = [
                        "jalur_id" => $hdrId,
                        "doc_id" => $value,
                    ];
                }
                $saveDocDtl = $this->db->insert_batch($this->tableDetDoc, $dataDoc);
            }


        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return false;
        }
        else
        {
                $this->db->trans_commit();
                return true;
        }

    }

    function update($param)
    {
        $this->db->trans_begin();

            $hdrId = $param['jalur_id'];
            $data = [
                "biaya" => $param['biaya'],
                "jalur_name" => $param['jalur_name'],
                "jadwal_pendaftaran" => date("Y-m-d", strtotime($param['jadwal_pendaftaran'])),
                "jadwal_seleksi" => date("Y-m-d", strtotime($param['jadwal_seleksi'])),
                "update_at" => $param['create_at'],
                "update_date" => $param['create_date']
            ];

            $this->db->where("jalur_id", $hdrId);
            $save = $this->db->update($this->tableJalur, $data);

            if($save)
            {
                $this->db->where("jalur_id", $hdrId);
                $this->db->delete($this->tableDetDoc);
                foreach ($param['document'] as $key => $value) {
                    $dataDoc[] = [
                        "jalur_id" => $hdrId,
                        "doc_id" => $value,
                    ];
                }
                $saveDocDtl = $this->db->insert_batch($this->tableDetDoc, $dataDoc);
            }


        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return false;
        }
        else
        {
                $this->db->trans_commit();
                return true;
        }

    }

    function active($param)
    {
        $this->db->where('jalur_id', $param['jalur_id']);
        $save = $this->db->update($this->tableJalur, $param);

        if($save) return true;


        return false;
    }

}
