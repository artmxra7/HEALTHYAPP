<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Suket extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('patient/patient_model');
        $this->load->model('hospital_model');
        $this->load->model('suket_model');
        $this->load->model('doctor/doctor_model');
    }

    public function add_antigen() {
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_atigen', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    public function add_antibody() {
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_antibody', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    public function add_suket_sehat() {
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_suket_sehat', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    public function view_list() {
        $data['suket'] = $this->suket_model->getSuket();
        $data['patients'] = $this->patient_model->getPatient();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('view_list', $data);
        $this->load->view('home/footer'); // just the header file
    }

    function generateSuketCode() {
        $result = '';
        $result .= date('d');
        $result .= date('m');
        $result .= date('y').'-';
        $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';

        for ($i=0; $i < 3; $i++) { 
            $result .= $string[rand(0, strlen($string) - 1)];
        }
        return $result;
    }

    public function addNew() {
        $id_patient = $this->input->post('name_select');
        $name = '';
        $ktp = $this->input->post('ktp');
        $place_birth = $this->input->post('place_birth');
        $address = $this->input->post('address');
        $birth_date = $this->input->post('birth_date');
        $p_name = $this->input->post('p_name');
        $p_email = $this->input->post('p_email');
        $p_phone = $this->input->post('p_phone');
        $p_age = $this->input->post('p_age');
        $p_gender = $this->input->post('p_gender');
        $status_sehat = $this->input->post('status_sehat');
        $butuh_istirahat = $this->input->post('butuh_istirahat');
        $date = $this->input->post('date');
        date_default_timezone_set('Asia/Jakarta');
        $add_date = date('m/d/y');
        $status_ig_m = $this->input->post('status_ig_m');
        $status_ig_g = $this->input->post('status_ig_g');
        $status = $this->input->post('status');
        $suket_type = $this->input->post('suket_type');
        $id = $this->input->post('id');
        $spesimen = $this->input->post('spesimen');
        $keterangan = $this->input->post('keterangan');
        $note = $this->input->post('note');
        $tensi = $this->input->post('tensi');
        $suhu = $this->input->post('suhu');
        $buta_warna = $this->input->post('buta_warna');
        $pekerjaan = $this->input->post('pekerjaan');
        $doctor = $this->input->post('doctor');

        $previous_email = $this->ion_auth->user()->row()->email;

        if ($previous_email != $p_email) {
            if ($this->ion_auth->email_check($p_email)) {
                $this->session->set_flashdata('feedback', 'This Email Address Is Already Registered');
                if(!empty($id)){
                    redirect('suket/view_list');
                } else if($suket_type == 1){
                    redirect('suket/add_antigen');
                } else if($suket_type == 2) {
                    redirect('suket/add_antibody');
                } else if($suket_type == 3) {
                    redirect('suket/add_suket_sehat');
                }
            }
        }
        if ($id_patient == 'add_new') {
            $limit = $this->patient_model->getLimit();
            if ($limit <= 0) {
                $this->session->set_flashdata('feedback', lang('patient_limit_exceed'));
                if(!empty($id)){
                    redirect('suket/view_list');
                } else if($suket_type == 1){
                    redirect('suket/add_antigen');
                } else if($suket_type == 2) {
                    redirect('suket/add_antibody');
                } else if($suket_type == 3) {
                    redirect('suket/add_suket_sehat');
                }
            }
            $patient_id = rand(10000, 1000000);
            $registration_time = time();
            if (!empty($p_name)) {
                $password = $p_name . '-' . rand(1, 100000000);
            }

            $data_p = array(
                'patient_id' => $patient_id,
                'name' => $p_name,
                'email' => $p_email,
                'phone' => $p_phone,
                'sex' => $p_gender,
                'age' => $p_age,
                'add_date' => $add_date,
                'registration_time' => $registration_time,
                'how_added' => 'from_suket',
                'ktp' => $ktp,
                'birth_place' => $place_birth,
                'birthdate' => $birth_date,
                'address' => $address
            );
            $username = $this->input->post('p_name');
            // Adding New Patient
            if ($this->ion_auth->email_check($p_email)) {
                $this->session->set_flashdata('feedback', 'Email Address of Patient Is Already Registered');
            } else {
                $dfg = 5;
                $this->ion_auth->register($username, $password, $p_email, $dfg);
                $ion_user_id = $this->db->get_where('users', array('email' => $p_email))->row()->id;
                $this->patient_model->insertPatient($data_p);
                $patient_user_id = $this->db->get_where('patient', array('email' => $p_email))->row()->id;
                $id_info = array('ion_user_id' => $ion_user_id);
                $this->patient_model->updatePatient($patient_user_id, $id_info);
                $this->hospital_model->addHospitalIdToIonUser($ion_user_id, $this->hospital_id);
            }

            $id_patient = $patient_user_id;
            $name = $p_name;
        } else {
            $user = $this->patient_model->getPatientById($id_patient);
            $name = $user->name;
        }
        if($suket_type == 1){
            $data = array(
                'id_pasien' => $id_patient,
                'ktp' => $ktp,
                'place_birth' => $place_birth,
                'birth_date' => $birth_date,
                'address' => $address,
                'name' => $name,
                'add_date' => $add_date,
                'suket_type' => $suket_type,
                'status_positif' => $status,
                'spesimen' => $spesimen,
                'keterangan' => $keterangan,
                'note' => $note,
                'tensi' => $tensi,
                'suhu' => $suhu,
                'buta_warna' => $buta_warna,
                'pekerjaan' => $pekerjaan,
                'doctor' => $doctor,
            );
        } else if ($suket_type == 2){
            $data = array(
                'id_pasien' => $id_patient,
                'ktp' => $ktp,
                'place_birth' => $place_birth,
                'birth_date' => $birth_date,
                'address' => $address,
                'name' => $name,
                'add_date' => $add_date,
                'suket_type' => $suket_type,
                'status_ig_g' => $status_ig_g,
                'status_ig_m' => $status_ig_m,
                'spesimen' => $spesimen,
                'keterangan' => $keterangan,
                'note' => $note,
                'tensi' => $tensi,
                'suhu' => $suhu,
                'buta_warna' => $buta_warna,
                'pekerjaan' => $pekerjaan,
                'doctor' => $doctor,
            );
        } else if ($suket_type == 3){
            $data = array(
                'id_pasien' => $id_patient,
                'istirahat' => $butuh_istirahat,
                'tanggal' => $date,
                'status_sehat' => $status_sehat,
                'ktp' => $ktp,
                'place_birth' => $place_birth,
                'birth_date' => $birth_date,
                'address' => $address,
                'name' => $name,
                'add_date' => $add_date,
                'suket_type' => $suket_type,
                'spesimen' => $spesimen,
                'keterangan' => $keterangan,
                'note' => $note,
                'tensi' => $tensi,
                'suhu' => $suhu,
                'buta_warna' => $buta_warna,
                'pekerjaan' => $pekerjaan,
                'doctor' => $doctor,
            );
        }
        if(empty($id)){
            $data['suket_code'] = $this->generateSuketCode();
            $this->suket_model->insertSuket($data);
            $this->session->set_flashdata('feedback', 'Added');
        } else {
            $this->suket_model->updateSuket($id, $data);
            $this->session->set_flashdata('feedback', 'Update');
        }
        if(!empty($id)){
            redirect('suket/view_list');
        } else if($suket_type == 1){
            redirect('suket/add_antigen');
        } else if($suket_type == 2) {
            redirect('suket/add_antibody');
        } else if($suket_type == 3) {
            redirect('suket/add_suket_sehat');
        }
    }

    public function delete()
    {
        $id = $this->input->get('id');
        $this->suket_model->delete($id);
        $this->session->set_flashdata('feedback', 'Deleted');
        redirect('suket/view_list');
    }

    function editSuketByJason() {
        $id = $this->input->get('id');
        $data['patients'] = $this->patient_model->getPatient();
        $data['suket'] = $this->suket_model->getSuketById($id);
        $data['doctors'] = $this->doctor_model->getDoctor();
        echo json_encode($data);
    }

    function getSuketByJason() {
        $id = $this->input->get('id');
        $data['patients'] = $this->patient_model->getPatient();
        $data['suket'] = $this->suket_model->getSuketById($id);
        $data['user'] = $this->patient_model->getPatientById($data['suket']->id_pasien);
        $data['doctor'] = $this->doctor_model->getDoctorById($data['suket']->doctor);
        echo json_encode($data);
    }

}

/* End of file Suket.php */
/* Location: ./application/modules/suket/controllers/Suket.php */
