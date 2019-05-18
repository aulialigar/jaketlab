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

	public function order()
	{
		/*if ($this->session->userdata('logged_in') == TRUE) {
			redirect('user');
		}else{
			if ($this->input->post('submit')) {
				$this->form_validation->set_rules('ukuran', 'Ukuran', 'trim|required');
				$this->form_validation->set_rules('barang', 'Jenis Jaket', 'trim|required');
				$this->form_validation->set_rules('jml', 'Jumlah', 'trim|required');

				if ($this->form_validation->run() == TRUE)
					{
						if ($this->m_user->insert_pesan() == TRUE){
								$data = [
								'content'	=> 'user/v_form',
								'notif_s'	=> 'Berhasil Memesan'
							];
								$this->load->view('user/v_template', $data);
						} else {
							$data = [
								'content'	=> 'user/v_form',
								'notif'		=> 'Gagal memesan'
							];
							$this->load->view('user/v_template', $data);
						}
					// jika sukses

				} else {
					// jika gagal
					$data = [
								'content'	=> 'user/v_form',
								'notif'		=> validation_errors()
							];
					$this->load->view('user/v_template', $data);
				}
			}else{
				$data['tampilan_user'] = 'user/v_form';
				$this->load->view('user/v_template', $data);
			}
		}*/

		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->input->post('submit')) {
				$this->form_validation->set_rules('nim', 'NIM', 'trim|required');
				$this->form_validation->set_rules('ukuran', 'Ukuran', 'trim|required');
				$this->form_validation->set_rules('barang', 'Jenis Jaket', 'trim|required');
				$this->form_validation->set_rules('jml', 'Jumlah', 'trim|required');
				if ($this->form_validation->run() == TRUE)
					{
						if ($this->m_user->insert_pesan() == TRUE) {
							$this->session->set_flashdata('notif', 'Berhasil Memesan, Menunggu Konfirmasi');
							$this->session->set_flashdata('notifClass', 'success');
							//redirect('history');
						}else{
							$this->session->set_flashdata('notif', 'Gagal Memesan');
							$this->session->set_flashdata('notifClass', 'danger');
							redirect('user/pesan','refresh');
						}
					}else{
						$this->session->set_flashdata('notif', validation_errors());
						$this->session->set_flashdata('notifClass', 'danger');
						redirect('user/pesan','refresh');
					}
				$this->data['tampilan_user'] = 'user/v_form';
				$this->load->view('user/v_template', $this->data);	
			}
		}else{
			redirect('user/login');
		}
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

	public function stock()
	{
		$this->m_user->get_stockBrg();
	}

}
