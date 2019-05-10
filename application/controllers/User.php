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
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('userlevel') == 'mahasiswa') {
			$this->data['tampilan_user'] = 'user/v_dashboard';
			$this->load->view('user/v_template', $this->data);
		}else{
			redirect('user/login');
		}	
	}

	public function login()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			redirect('user');
		}else{
			if ($this->input->post('submit')) {
				$this->form_validation->set_rules('username', 'Username', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required');

				if ($this->form_validation->run() == TRUE)
					{
						if ($this->m_user->user_cek() == TRUE){
							redirect('user');
						} else {
							$data['notif'] = 'Login gagal';
							$this->load->view('user/v_login', $data);
						}
					// jika sukses

				} else {
					// jika gagal
					$data['notif'] = validation_errors();
					$this->load->view('user/v_login', $data);
				}
			}else{
				$this->load->view('user/v_login');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('user');
	}

}