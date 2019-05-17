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
			$this->data['tampilan_user'] = 'user/v_index';
			$this->load->view('user/v_template', $this->data);
	}

	public function login()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			redirect('user');
		}else{
			if ($this->input->post('submit')) {
				$this->form_validation->set_rules('nim', 'NIM', 'trim|required');
				$this->form_validation->set_rules('pass', 'Password', 'trim|required');

				if ($this->form_validation->run() == TRUE)
					{
						if ($this->m_user->login_cek() == TRUE){
							redirect('user');
						} else {
							$data['notif'] = 'Login gagal';
							$data['tampilan_user'] = 'user/v_login';
							$this->load->view('user/v_template', $data);
						}
					// jika sukses

				} else {
					// jika gagal
					$data['notif'] = validation_errors();
					$data['tampilan_user'] = 'user/v_login';
					$this->load->view('user/v_template', $data);
				}
			}else{
				$data['tampilan_user'] = 'user/v_login';
				$this->load->view('user/v_template', $data);
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('user');
	}

	public function pesan(){
		$this->data['tampilan_user'] = 'user/v_form';
		$this->load->view('user/v_template', $this->data);	
	}

	public function info()
	{
		$this->data['tampilan_user'] = 'user/v_info';
		$this->load->view('user/v_template', $this->data);	
	}

	public function about()
	{
		$this->data['tampilan_user'] = 'user/v_about';
		$this->load->view('user/v_template', $this->data);	
	}

	public function contact()
	{
		$this->data['tampilan_user'] = 'user/v_contact';
		$this->load->view('user/v_template', $this->data);	
	}

}
