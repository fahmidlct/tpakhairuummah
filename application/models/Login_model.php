<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

    public $db_tabel = 'admin';
	
	public function load_form_rules()
	{
		$form_rules = array(array('field' => 'username', 'label' => 'Username', 'rules' => 'required'),
							array('field' => 'password', 'password' => 'Password', 'rules' => 'required'),
						);
		return $form_rules;
	}
	
	public function validasi()
	{
		$form = $this->load_form_rules();
		$this->form_validation->set_rules($form);
		
		if($this->form_validation->run())
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	public function cek_user()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		
		$query = $this->db->where('username', $username)->where('password', $password)->limit(1)->get($this->db_tabel);
		//where aktif ??
		$hasil = $query->row();
		
		if($query->num_rows() == 1)
		{
			if($hasil->status == 'aktif')
			{
				$data = array('username' => $username, 'login' => TRUE, 'level' => $hasil->level, 'id_user' => $hasil->id_admin);
			
				$this->session->set_userdata($data);
				return TRUE;
			}
			else{
				$this->session->set_flashdata('pesan', 'Akun Anda nonaktif!');
				return FALSE;
			}
		}
		else
		{
			$this->session->set_flashdata('pesan', 'Username atau Password salah!');
			return FALSE;
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata(array('username' => '', 'login' => FALSE, 'level' => '', 'id_user' => ''));
		$this->session->sess_destroy();
	}
}
/* End of file login_model.php */
/* Location: ./application/models/login_model.php */