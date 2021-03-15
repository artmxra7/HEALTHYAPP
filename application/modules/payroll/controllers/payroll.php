<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payroll extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('payroll_model');
        $this->load->model('employe/employe_model');
        if (!$this->ion_auth->in_group('admin')) {
            redirect('home/permission');
        }
    }

    public function index() {
        $data['payrolls'] = $this->payroll_model->getPayroll();
         $data['employes'] = $this->employe_model->getEmploye();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('payroll', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function getSalary($employeId) {
        $employe = $this->db->get_where('employe', ['id' => $employeId])->row_array();
        if (!empty($employe)) {
            echo json_encode([
                'salary' => $employe['salary'],
                'subtraction' => $employe['s_subtraction']
            ]);
        } else {
            echo json_encode([
                'salary' => 0,
                'subtraction' => 0,
            ]);
        }
    }

    public function addNewView() {
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_new');
        $this->load->view('home/footer'); // just the header file
    }

    public function addNew() {
        $id = $this->input->post('id');
        $employe_id = $this->input->post('employe_id');
        $nama = $this->input->post('nama');
        $salary = $this->input->post('salary');
        $hadir = $this->input->post('hadir');
        $tdk_hadir = $this->input->post('tdk_hadir');
        $potongan = $this->input->post('potongan');
        $overtime = $this->input->post('overtime');
        $tanggal = $this->input->post('tanggal');


        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('employe_id', 'Employe', 'trim|required|xss_clean');
        // Validating Password Field
        // Validating Email Field

        // Validating Address Field
        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $data = array();
                $data['payroll'] = $this->payroll_model->getPayrollById($id);
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
                'employe' => $employe_id,
                'salary' => $salary,
                'potongan' => $potongan,
                'hadir' => $hadir,
                'bpjs' => $salary * (2.5 / 100),
                'gs_salary' => $salary + $overtime - $potongan,
                'overtime' => $overtime,
                'tdk_hadir' => $tdk_hadir,
                'tanggal' => $tanggal,

            );
            if (empty($id)) {     // Adding New department
                $this->payroll_model->insertPayroll($data);
                $this->session->set_flashdata('feedback', 'Added');
            } else { // Updating department
                $this->payroll_model->updatePayroll($id, $data);
                $this->session->set_flashdata('feedback', 'Updated');
            }
            // Loading View
            redirect('payroll');
        }
    }

    function getPayroll() {
        $data['payroll'] = $this->payroll_model->getPayroll();
        $this->load->view('payroll', $data);
    }

    function editPayroll() {
        $data = array();
        $id = $this->input->get('id');
        $data['payroll'] = $this->payroll_model->getPayrollById($id);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_new', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function editPayrollByJason() {
        $id = $this->input->get('id');
        $data['payroll'] = $this->payroll_model->getPayrollById($id);
        echo json_encode($data);
    }

    function delete() {
        $id = $this->input->get('id');
        $this->payroll_model->delete($id);
        $this->session->set_flashdata('feedback', 'Deleted');
        redirect('payroll');
    }

}

/* End of file department.php */
/* Location: ./application/modules/department/controllers/department.php */
