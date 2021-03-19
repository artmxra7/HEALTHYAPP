<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Antigen extends MX_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('suket/suket_model');
	}

	//redirect if needed, otherwise display the user list
	function suket($suket_code)
	{
        $data['suket'] = $this->suket_model->getSuketBySuketCode($suket_code);
		$this->_render_page('suket/suket', $data);
	}

	function _render_page($view, $data=null, $render=false)
	{

		$this->viewdata = (empty($data)) ? $data: $data;

		$view_html = $this->load->view($view, $this->viewdata, $render);

		if (!$render) return $view_html;
	}

}
