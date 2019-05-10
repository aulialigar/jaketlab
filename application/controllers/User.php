<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	public function index()
	{
		if ($this->session->)
		// $this->data['main_view'] = 'user/v_index';
		// $this->load->view('user/v_template',$this->data);
	}
}