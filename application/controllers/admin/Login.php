<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public $data = array('pesan' => '', 'title' => '');
	
	public function __construct() 
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Login_model', 'login', TRUE);
	}
	
	public function index()
	{
		//jika status tidak login maka pindah ke halaman admin
		if ($this->session->userdata('login') == FALSE) 
		{
			if($this->login->validasi()) 
			{
				if($this->login->cek_user())
				{
					redirect('admin/panel');
				}
				else
				{
					$this->data['title'] = ucwords($this->uri->segment(1));
					$this->data['pesan'] = $this->session->flashdata('pesan'); //nanti ganti dengan flash_data
					$this->load->view('admin/login', $this->data); //coba ganti $data
				}	
			}
			else
			{
				$this->data['title'] = ucwords($this->uri->segment(1));
				$this->load->view('admin/login', $this->data);
			}
		}
		//jika status login maka pindah ke halaman login
		else 
		{
			redirect('admin/panel');	
		}
	}
	
	public function logout()
	{
			$this->login->logout();
			
			redirect('login');
	}
}
/* End of file login.php */
/* Location: ./application/controllers/login.php */
