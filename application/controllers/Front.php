<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

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
	 
	public function __construct()
	{
        parent::__construct();
		$this->load->model('Front_model', 'front', TRUE);
		$this->load->helper('cek_array');
	} 
	 
	public function index()
	{
		$data['profil'] = $this->front->cari_profil();
		$data['kelas'] = $this->front->cari_kelas();
		$data['kegiatan'] = $this->front->cari_kegiatan();
		//$data['murid'] = $this->front->cari_murid();
		
		$this->load->view('front', $data);
	}
}
