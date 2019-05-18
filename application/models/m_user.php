
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function login_cek()
	{
		$nim = $this->input->post('nim');
		$password = $this->input->post('pass');

		$query = $this->db->where('nim', $nim)
			->where('pass', $password)
			->get('mahasiswa');
			
		if($query->num_rows() > 0){
			$data = array(
				'nim' => $nim,
				'id_mahasiswa' => $query->row()->id_mahasiswa,
				'userlevel' => 'user',
				'logged_in' => TRUE
				);
			$this->session->set_userdata($data);

			return TRUE;	
		} else {
			return FALSE;
		}
	}	

	public function get_stock($stock)
	{
		return $this->db->where('stock', $stock)->get('barang')->row();
	}

	public function insert_pesan()
	{
		$data = array(
				'id_trans' => NULL,
				'nim' => $this->input->post('nim'),
				'id_barang' => $this->input->post('barang'),
				'ukuran' => $this->input->post('ukuran'),
				'jml' => $this->input->post('jml'),
				'keterangan' => $this->input->post('keterangan'),
				'STATUS' => 'Menunggu Konfirmasi'
			);

		$this->db->insert('transaksi', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		}else{
			return FALSE;
		}	
	}

}

/* End of file m_user.php */
/* Location: ./application/models/m_user.php */