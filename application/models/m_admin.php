<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	public function admin_cek()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$query = $this->db->where('username', $username)
			->where('password', $password)
			->get('admin');
			
		if($query->num_rows() > 0){
			$data = array(
				'username' => $username,
				'id_user' => $query->row()->id_admin,
				'userlevel' => 'admin',
				'logged_in' => TRUE
				);
			$this->session->set_userdata($data);

			return TRUE;	
		} else {
			return FALSE;
		}
	}

	public function get_mahasiswa()
	{
		return $this->db->get('mahasiswa')->result();
	}

	public function getdetailmahasiswa($id)
	{
		return $this->db->where('id_mahasiswa', $id)->get('mahasiswa')->row();
	}

	public function tambahmahasiswa()
	{
		$data = array(
				'id_mahasiswa' => NULL,
				'nim' => $this->input->post('nim'),
				'pass' => $this->input->post('password'),
				'nama_mhs' => $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jk'),
				'no_telp' => $this->input->post('telp'),
				'alamat' => $this->input->post('alamat')
			);

		$this->db->insert('mahasiswa', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}	
	}

	public function editmahasiswa($id)
	{
		$data = array(
				'nim' => $this->input->post('nim'),
				'pass' => $this->input->post('password'),
				'nama_mhs' => $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jk'),
				'no_telp' => $this->input->post('telp'),
				'alamat' => $this->input->post('alamat')
			);

		$this->db->where('id_mahasiswa', $id)->update('mahasiswa', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}	
	}

	public function hapusmahasiswa($kd)
	{
		$this->db->where('id_mahasiswa', $kd)->delete('mahasiswa');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}	
	}

	public function get_barang()
	{
		return $this->db->get('barang')->result();
	}

	public function tambahbarang($foto)
	{
		$data = array(
				'id_barang' => NULL,
				'nama_barang' => $this->input->post('nama'),
				'harga' => $this->input->post('harga'),
				'ukuran' => $this->input->post('ukuran'),
				'foto' => 'assets/images/'.$foto['file_name']
			);

		$this->db->insert('barang', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}	
	}

	public function editbarang($id, $foto = "")
	{
		$data = array(
				'nama_barang' => $this->input->post('nama'),
				'harga' => $this->input->post('harga'),
				'ukuran' => $this->input->post('ukuran')
			);
		if ($foto != "") {
			$data['foto'] = 'assets/images/'.$foto;
		}
		$this->db->where('id_barang', $id)
						 ->update('barang', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}	
	}

	public function deletebarang($id)
	{
		$this->db->where('id_barang', $id)->delete('barang');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}	
	}

	public function get_detail_admin($id)
	{
		return $this->db->where('id_admin', $id)->get('admin')->row();
	}

	public function editAdmin($id)
	{
		$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);

		$this->db->where('id_admin', $id)->update('admin', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}	
	}

	public function hapusAdmin($id)
	{
		$this->db->where('id_admin', $id)->delete('admin');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}	
	}

	public function get_admin()
	{
		return $this->db->get('admin')
										->result();
	}

	public function getDetailBarang($id)
	{
		return $this->db->where('id_barang', $id)->get('barang')->row();
	}

	public function tambahadmin()
	{
		$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'id_hakakses' => 1
			);

		$this->db->insert('admin', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}	
	}

	public function confirmOrder($id)
	{
		$this->db->where('id_trans', $id)->update('transaksi', [ 'status' => 'TERKIRIM' ]);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function rejectOrder($id)
	{
		$this->db->where('id_trans', $id)->update('transaksi', [ 'status' => 'DITOLAK' ]);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function hapusOrder($kd)
	{
		$this->db->where('id_trans', $kd)->delete('transaksi');
		$this->db->where('id_trans', $kd)->delete('detail');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}	
	}

	public function get_transaksi()
	{
		return $this->db->select('*, mahasiswa.id_mahasiswa')
										->from('transaksi')
										->join('mahasiswa', 'mahasiswa.id_mahasiswa = transaksi.id_mahasiswa', 'inner')
										->get()->result();
	}

}

/* End of file m_admin.php */
/* Location: ./application/models/m_admin.php */