<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('userlevel') == 'admin') {
			$this->data['tampilan_admin'] = 'admin/v_dashboard';
			$this->load->view('admin/v_template', $this->data);
		}else{
			redirect('admin/login');
		}	
	}

	public function admin()
	{
		/*$this->data['tampilan_admin'] = 'admin/v_admin';
		$this->load->view('admin/v_template',$this->data);*/

		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('userlevel') == 'admin') {
			// tambah pelanggan
			if ($this->uri->segment(3) == 'insert') {
				if ($this->input->post('sbm')) {
					$this->form_validation->set_rules('username', 'Username', 'trim|required');
					$this->form_validation->set_rules('password', 'Password', 'trim|required');

						if ($this->form_validation->run() == TRUE) {
								if ($this->m_admin->tambahadmin() == TRUE) {
									$this->session->set_flashdata('notif', 'Data Berhasil ditambahkan');
									redirect('admin/admin');
								}else{
									$this->session->set_flashdata('notif', 'Data Gagal ditambahkan');
									redirect('admin/admin');
								}
						}else{
							$this->session->set_flashdata('notif', validation_errors());
							redirect('admin/admin');
						}
				}
			}
			// get data pelanggan
			if ($this->uri->segment(3) == 'get' && $this->uri->segment(4)) {
				$resp = $this->m_admin->get_detail_admin($this->uri->segment(4));
				echo json_encode($resp);
				return;
			}
			// update pelanggan
			if ($this->uri->segment(3) == 'update' && $this->uri->segment(4)) {
				if ($this->input->post('sbm')) {
					$this->form_validation->set_rules('username', 'Username', 'trim|required');
					$this->form_validation->set_rules('password', 'Password', 'trim|required');

						if ($this->form_validation->run() == TRUE) {
							$kd = $this->uri->segment(4);
							if ($this->m_admin->editAdmin($kd) == TRUE) {
								$this->session->set_flashdata('notif', 'Update Berhasil');
								redirect('admin/admin');
							}else{
								$this->session->set_flashdata('notif', 'Update Gagal');
								redirect('admin/admin');
							}
						}else{
							$this->session->set_flashdata('notif', validation_errors());
							redirect('admin/admin');
						}
				}
			}
			// hapus pelanggan
			if ($this->uri->segment(3) == 'remove' && $this->uri->segment(4)) {
				if ($this->m_admin->hapusAdmin($this->uri->segment(4))) {
					$this->session->set_flashdata('notif', 'Berhasil dihapus');
					redirect('admin/admin');
				} else {
					$this->session->set_flashdata('notif', 'Gagal dihapus');
					redirect('admin/admin');
				}
			}
			$data['tampilan_admin']= 'admin/v_admin';
			$data['admin'] = $this->m_admin->get_admin();
			$this->load->view('admin/v_template', $data);
		} else {
			redirect('admin/login');
		}
	}

	public function mahasiswa()			//sama kayak function student
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('userlevel') == 'admin') {
			// tambah mahasiswa
			if ($this->uri->segment(3) == 'insert') {
				if ($this->input->post('sbm')) {
					$this->form_validation->set_rules('nim', 'NIM', 'trim|required');
					$this->form_validation->set_rules('password', 'Password', 'trim|required');
					$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
					$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
					$this->form_validation->set_rules('telp', 'No Telp', 'trim|required');
					$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

						if ($this->form_validation->run() == TRUE) {
								if ($this->m_admin->tambahmahasiswa() == TRUE) {
									$this->session->set_flashdata('notif', 'Data Berhasil ditambahkan');
									redirect('admin/mahasiswa');
								}else{
									$this->session->set_flashdata('notif', 'Data Gagal ditambahkan');
									redirect('admin/mahasiswa');
								}
						}else{
							$this->session->set_flashdata('notif', validation_errors());
							redirect('admin/mahasiswa');
						}
				}
			}
			// get data mahasiswa
			if ($this->uri->segment(3) == 'get' && $this->uri->segment(4)) {
				$resp = $this->m_admin->getdetailmahasiswa($this->uri->segment(4));
				echo json_encode($resp);
				return;
			}
			// update mahasiswa
			if ($this->uri->segment(3) == 'update' && $this->uri->segment(4)) {
				if ($this->input->post('sbm')) {
					$this->form_validation->set_rules('nim', 'NIM', 'trim|required');
					$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
					$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
					$this->form_validation->set_rules('telp', 'No Telp', 'trim|required');
					$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

						if ($this->form_validation->run() == TRUE) {
							$kd = $this->uri->segment(4);
							if ($this->m_admin->editmahasiswa($kd) == TRUE) {
								$this->session->set_flashdata('notif', 'Update Berhasil');
								redirect('admin/mahasiswa');
							}else{
								$this->session->set_flashdata('notif', 'Update Gagal');
								redirect('admin/mahasiswa');
							}
						}else{
							$this->session->set_flashdata('notif', validation_errors());
							redirect('admin/mahasiswa');
						}
				}
			}
			// hapus mahasiswa
			if ($this->uri->segment(3) == 'remove' && $this->uri->segment(4)) {
				if ($this->m_admin->hapusmahasiswa($this->uri->segment(4))) {
					$this->session->set_flashdata('notif', 'Berhasil dihapus');
					redirect('admin/mahasiswa');
				} else {
					$this->session->set_flashdata('notif', 'Gagal dihapus');
					redirect('admin/mahasiswa');
				}
			}
			$data['tampilan_admin']= 'admin/v_mahasiswa';
			$data['mahasiswa'] = $this->m_admin->get_mahasiswa();
			$this->load->view('admin/v_template', $data);
		} else {
			redirect('admin/login');
		}
	}

	public function login()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			redirect('admin');
		}else{
			if ($this->input->post('submit')) {
				$this->form_validation->set_rules('username', 'Username', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required');

				if ($this->form_validation->run() == TRUE)
					{
						if ($this->m_admin->admin_cek() == TRUE){
							redirect('admin');
						} else {
							$data['notif'] = 'Login gagal';
							$this->load->view('admin/v_login', $data);
						}
					// jika sukses

				} else {
					// jika gagal
					$data['notif'] = validation_errors();
					$this->load->view('admin/v_login', $data);
				}
			}else{
				$this->load->view('admin/v_login');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin');
	}

	public function barang() {
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('userlevel') == 'admin') {
			if ($this->uri->segment(3) == 'insert') {
				if ($this->input->post('sbm')) {
					$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
					$this->form_validation->set_rules('ukuran', 'Ukuran', 'trim|required');
					$this->form_validation->set_rules('harga', 'Harga', 'trim|required');

						if ($this->form_validation->run() == TRUE) {
							$kd = $this->uri->segment(4);
								$config['upload_path'] = './assets/images/';
								$config['allowed_types'] = 'jpg|png|jpeg';
								$config['max_size'] = '2000';

								$this->load->library('upload', $config);

								if ($this->upload->do_upload('foto')) {
										if ($this->m_admin->tambahbarang($this->upload->data()) == TRUE) {
											$this->session->set_flashdata('notif', 'Data Berhasil ditambahkan');
											redirect('admin/barang');
										}else{
											$this->session->set_flashdata('notif', 'Data Gagal ditambahkan');
											redirect('admin/barang');
										}
									}
									else {
										$this->session->set_flashdata('notif', $this->upload->display_errors());
										redirect('admin/barang');
									}
						}else{
							$this->session->set_flashdata('notif', validation_errors());
							redirect('admin/barang');
						}
				}
			}
			if ($this->uri->segment(3) == 'get' && $this->uri->segment(4)) {
				$resp = $this->m_admin->getDetailBarang($this->uri->segment(4));
				echo json_encode($resp);
				return;
			}
			if ($this->uri->segment(3) == 'delete' && $this->uri->segment(4)) {
				$kd = $this->uri->segment(4);
				if ($this->m_admin->deletebarang($kd) == TRUE) {
					$this->session->set_flashdata('notif', 'Hapus Berhasil');
					redirect('admin/barang');
				}else{
					$this->session->set_flashdata('notif', 'Hapus Gagal');
					redirect('admin/barang');
				}
			}
			if ($this->uri->segment(3) == 'update' && $this->uri->segment(4)) {
				if ($this->input->post('sbm')) {
					$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
					$this->form_validation->set_rules('ukuran', 'Ukuran', 'trim|required');
					$this->form_validation->set_rules('harga', 'Harga', 'trim|required');

						if ($this->form_validation->run() == TRUE) {
							$kd = $this->uri->segment(4);
								$config['upload_path'] = './assets/images/';
								$config['allowed_types'] = 'jpg|png|jpeg';
								$config['max_size'] = '2000';

								$this->load->library('upload', $config);

								if ($_FILES['foto']['name'] != "") {
									if ($this->upload->do_upload('foto')) {
										if ($this->m_admin->editbarang($kd, $this->upload->data()['file_name']) == TRUE) {
											$this->session->set_flashdata('notif', 'Update Berhasil');
											redirect('admin/barang');
										}else{
											$this->session->set_flashdata('notif', 'Update Gagal');
											redirect('admin/barang');
										}
									}
									else {
										$this->session->set_flashdata('notif', $this->upload->display_errors());
										redirect('admin/barang');
									}
								} else {
									if ($this->m_admin->editbarang($kd) == TRUE) {
											$this->session->set_flashdata('notif', 'Update Berhasil');
											redirect('admin/barang');
										}else{
											$this->session->set_flashdata('notif', 'Update Gagal');
											redirect('admin/barang');
										}
								}
						}else{
							$this->session->set_flashdata('notif', validation_errors());
							redirect('admin/barang');
						}
				}
			}
			$barang = $this->m_admin->get_barang();
			$data['tampilan_admin']= 'admin/v_barang';
			$data['barang'] = $barang;
			$this->load->view('admin/v_template', $data);
		} else {
			redirect('admin/login');
		}
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */