<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_user extends CI_Model {

	public function cek_user($data)
	{
		$query = $this->db->get_where('users', $data);
		return $query;
	}

	public function register()
	{
		$data = array(
            'id_users' => NULL,
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'level' => "mahasiswa"

        );
		 $this->db->insert('users', $data);

        $cek = $this->db->query('SELECT * FROM users order by id_users DESC LIMIT 1')->row();
        
        $mhs = array(
        	'user_id' => $cek->id_users , 
        	'nim' => $this->input->post('nim'), 
        	'nama' => $this->input->post('nama'), 
        	'nomormhs' => $this->input->post('nomormhs'), 
        	'nomorortu' => $this->input->post('nomorortu'), 
        	'kodeprodi' => $this->input->post('kodeprodi'), 
        	'kelas' => $this->input->post('kelas'), 
        );

		// User data array
		$this->db->insert('mahasiswa', $mhs);

		if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
	}

}

/* End of file model_user.php */
/* Location: ./application/models/model_user.php */