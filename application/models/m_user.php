
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {
//coba push
	public function user_cek()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$query = $this->db->where('username', $username)
			->where('password', $password)
			->get('user');
			
		if($query->num_rows() > 0){
			$data = array(
				'username' => $username,
				'id_user' => $query->row()->id_admin,
				'userlevel' => 'mahasiswa',
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