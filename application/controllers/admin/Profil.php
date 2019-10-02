<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends MY_Controller {
	 
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Profil_model', 'profil', TRUE);
		
		if($this->session->userdata('level') != 'super')
		{
			redirect('admin/panel');
		}
	}
	
	public function index()
	{
		$data['title'] = ucwords($this->uri->segment(1)) . ' - ' . ucwords($this->uri->segment(2));
		$data['nama'] = $this->session->userdata('username');
		$data['main_view'] = 'admin/profil';
		$data['breadcrumb'] = 'Profil Website';
		$data['profil'] = $this->profil->cari_profil();
		
		
		$this->load->view('admin/panel', $data);
	}
	
	public function edit()
	{
		$data['title'] = ucwords($this->uri->segment(1)) . ' - ' . ucwords($this->uri->segment(2));
		$data['nama'] = $this->session->userdata('username');
		$data['main_view'] = 'admin/profil';
		$data['breadcrumb'] = 'Profil Website';
		$data['profil'] = $this->profil->cari_profil();
		$data['pesan'] = '';
		
		// submit
        if($this->input->post('submit'))
        {
            // validasi berhasil
            if($this->profil->validasi_edit() === TRUE)
            {
                //update db
				$this->profil->edit_profil();
                $this->session->set_flashdata('pesan', 'Proses update data berhasil.');

                redirect('admin/profil');
            }
            // validasi gagal
            else
            {
                $this->load->view('admin/panel', $data);
            }
        }
		
		$this->load->view('admin/panel', $data);
	}
}
/* End of file panel.php */
/* Location: ./application/controllers/admin/panel.php */
