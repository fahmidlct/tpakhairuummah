<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends MY_Controller {

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
		$this->load->model('Front_model', 'front');
	}
	
	public function index()
	{
		$data['title'] = ucwords($this->uri->segment(1)) . ' - ' . ucwords($this->uri->segment(2));
		$data['nama'] = $this->session->userdata('username');
		$data['main_view'] = 'admin/dashboard';
		$data['breadcrumb'] = 'Dashboard';
		$data['jumlah_siswa'] = $this->front->jumlah_siswa();
		$data['jumlah_user'] = $this->front->jumlah_user();
		$data['jumlah_guru'] = $this->front->jumlah_guru();
		$data['jumlah_kegiatan'] = $this->front->jumlah_kegiatan();
		$data['jumlah_kelas'] = $this->front->jumlah_kelas();

		$this->load->view('admin/panel', $data);
	}


}
/* End of file panel.php */
/* Location: ./application/controllers/admin/panel.php */
