<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Suket_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertSuket($data) {
        $this->db->insert('suket', $data);
    }

    function getSuket() {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('suket');
        return $query->result();
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('suket');
    }

    function getSuketById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('suket');
        return $query->row();
    }

    function updateSuket($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('suket', $data);
    }

    function getSuketBySuketCode($code) {
        $this->db->where('suket_code', $code);
        $query = $this->db->get('suket');
        return $query->row();
    }

}
