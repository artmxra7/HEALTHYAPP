<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Antigen extends MX_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('suket/suket_model');
        $this->load->model('patient/patient_model');
        $this->load->model('doctor/doctor_model');
	}
	
	function suket($suket_code)
	{
        $data['suket'] = $this->suket_model->getSuketBySuketCode($suket_code);
        $data['doctor'] = null;
        if($data['suket']->id_pasien){
            $user = $this->patient_model->getPatientById($data['suket']->id_pasien);
            $data['user'] = $user;
            $dokter = null;
            if($user->doctor != ''){
                $dokter = $this->doctor_model->getDoctorById($user->doctor);
            }
            $data['doctor'] = $dokter;
        }
		$this->_render_page('suket/suket', $data);
	}

	function _render_page($view, $data=null, $render=false)
	{

		$this->viewdata = (empty($data)) ? $data: $data;

		$view_html = $this->load->view($view, $this->viewdata, $render);

		if (!$render) return $view_html;
	}

}
