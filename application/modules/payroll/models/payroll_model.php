<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payroll_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertPayroll($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('payroll', $data2);
    }

    function getPayroll() {
        $this->db->select('payroll.*, employe.name AS employe_name')
            ->join('employe', 'employe.id = payroll.employe')
            ->where('payroll.hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('payroll');
        return $query->result();
    }

    function getPayrollById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('payroll');
        return $query->row();
    }

    function updatePayroll($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('payroll', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('payroll');
    }

}
