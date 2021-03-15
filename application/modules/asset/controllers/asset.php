<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Asset extends MX_Controller {

    function __construct() { 
        parent::__construct();
        $this->load->model('asset_model');
        if (!$this->ion_auth->in_group('admin')) {
            redirect('home/permission');
        }
    }

    public function index() {
        $data['assets'] = $this->asset_model->getAsset();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('asset', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function addNewView() {
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_new');
        $this->load->view('home/footer'); // just the header file
    }

    public function addNew() {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $jumlah = $this->input->post('jumlah');
        $waktu = $this->input->post('waktu');
        $harga = $this->input->post('harga');
        $note = $this->input->post('note');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[2]|max_length[100]|xss_clean');
        // Validating Password Field    
        // Validating Email Field
        $this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required|min_length[1]|max_length[1000]|xss_clean');
        $this->form_validation->set_rules('waktu', 'waktu', 'trim|required|min_length[1]|max_length[1000]|xss_clean');
        
        // Validating Address Field   
        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $data = array();
                $data['Asset'] = $this->asset_model->getAssetById($id);
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('add_new', $data);
                $this->load->view('home/footer'); // just the footer file
            } else {
                $data['setval'] = 'setval';
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('add_new', $data);
                $this->load->view('home/footer'); // just the header file
            }
        } else {
            //$error = array('error' => $this->upload->display_errors());
            $data = array();
            $data = array(
                'nama' => $nama,
                'jumlah' => $jumlah,
                'note' => $note,
                'harga' => $harga,
                'waktu' => $waktu
            );
            if (empty($id)) {     // Adding New department
                $this->asset_model->insertAsset($data);
                $this->session->set_flashdata('feedback', 'Added');
            } else { // Updating department
                $this->asset_model->updateAsset($id, $data);
                $this->session->set_flashdata('feedback', 'Updated');
            }
            // Loading View
            redirect('asset');
        }
    }

    function getAsset() {
        $data['asset'] = $this->asset_model->getAsset();
        $this->load->view('asset', $data);
    }

    function editAsset() {
        $data = array();
        $id = $this->input->get('id');
        $data['asset'] = $this->asset_model->getAssetById($id);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_new', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function editAssetByJason() {
        $id = $this->input->get('id');
        $data['asset'] = $this->asset_model->getAssetById($id);
        echo json_encode($data);
    }

    function delete() {
        $id = $this->input->get('id');
        $this->asset_model->delete($id);
        $this->session->set_flashdata('feedback', 'Deleted');
        redirect('asset');
    }

}

/* End of file department.php */
/* Location: ./application/modules/department/controllers/department.php */
