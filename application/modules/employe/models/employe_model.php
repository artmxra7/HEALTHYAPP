<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employe_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertEmploye($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('employe', $data2);
    }

    function getEmploye() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('employe');
        return $query->result();
    }

    function getEmployeById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('employe');
        return $query->row();
    }

    function updateEmploye($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('employe', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('employe');
    }

    function updateIonUser($username, $email, $password, $ion_user_id) {
        $uptade_ion_user = array(
            'username' => $username,
            'email' => $email,
            'password' => $password
        );
        $this->db->where('id', $ion_user_id);
        $this->db->update('users', $uptade_ion_user);
    }

}
