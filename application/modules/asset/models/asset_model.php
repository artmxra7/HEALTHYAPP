<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Asset_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertAsset($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('asset', $data2);
    }

    function getAsset() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('asset');
        return $query->result();
    }

    function getAssetById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('asset');
        return $query->row();
    }

    function updateAsset($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('asset', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('asset');
    }

}
