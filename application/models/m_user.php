
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

}

/* End of file m_user.php */
/* Location: ./application/models/m_user.php */