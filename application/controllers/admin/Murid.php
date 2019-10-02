<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Murid extends MY_Controller {

    public function __construct()
	{
		parent::__construct();		
		$this->load->model('Murid_model', 'murid', TRUE);
		$this->load->model('Kelas_model', 'kelas', TRUE);
		$this->load->library('pagination');
    }

	public function index($page = NULL)
	{
		$data['title'] = ucwords($this->uri->segment(1)) . ' - ' . ucwords($this->uri->segment(2));
		$data['nama'] = $this->session->userdata('username');
		$data['main_view'] = 'admin/murid';
		$data['breadcrumb'] = 'Murid';
		
        // Cari semua data murid
        $murid = $this->murid->cari_semua();
		$data['kelas'] = $this->murid->cari_kelas();
        // data murid ada, tampilkan
        if ($murid)
        {
			//pagination
			$config['base_url'] = site_url('admin/murid'); //site url
			$config['total_rows'] = $this->db->count_all('murid'); //total row
			$config['per_page'] = 10;  //show record per halaman
			$config['uri_segment'] = 3;  // uri parameter
			$choice = $config['total_rows'] / $config['per_page'];
			$config['num_links'] = floor($choice);
	 
			// Membuat Style pagination untuk BootStrap v4
			$config['first_link']       = 'First';
			$config['last_link']        = 'Last';
			$config['next_link']        = 'Next';
			$config['prev_link']        = 'Prev';
			$config['full_tag_open']    = '<div class="w3-bar w3-border">';
			$config['full_tag_close']   = '</div>';
			$config['num_tag_open']     = '<li class="w3-bar-item w3-button">';
			$config['num_tag_close']    = '</li>';
			$config['cur_tag_open']     = '<li class="w3-bar-item w3-button w3-green">';
			$config['cur_tag_close']    = '</li>';
			$config['next_tag_open']    = '<li class="w3-bar-item w3-button">';
			$config['next_tagl_close']  = '</li>';
			$config['prev_tag_open']    = '<li class="w3-bar-item w3-button">';
			$config['prev_tagl_close']  = '</li>';
			$config['first_tag_open']   = '<li class="w3-bar-item w3-button">';
			$config['first_tagl_close'] = '</li>';
			$config['last_tag_open']    = '<li class="w3-bar-item w3-button">';
			$config['last_tagl_close']  = '</li>';
	 
			$this->pagination->initialize($config);
			
			$data['page'] = ($page = $this->uri->segment(3)) ? $this->uri->segment(3) : 0;	 
			
			//panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
			//$data_tabel = $this->murid->murid_paging($config['per_page'], $data['page']);           
			$data_tabel = $this->murid->cari_paging($data['page'], $config['per_page']);
			$data['pagination'] = $this->pagination->create_links();
				
            // buat tabel
            $tabel = $this->murid->buat_tabel($data_tabel);
            $data['tabel_data'] = $tabel;
            $this->load->view('admin/panel', $data);
        }
        // data murid tidak ada
        else
        {
            $data['pesan'] = 'Tidak ada data murid.';
            $this->load->view('admin/panel', $data);
        }
	}
	
    public function tambah()
    {

        // submit
        if($this->input->post('submit'))
        {
            // validasi sukses
            if($this->murid->validasi_tambah())
            {
                if($this->murid->tambah())
                {
                    $this->session->set_flashdata('pesan', 'Proses tambah murid berhasil.');
                    redirect('admin/murid');
                }
                else
                {
                    $this->data['pesan'] = 'Proses tambah murid gagal.';
                    $this->load->view('admin/murid', $this->data);
                }
            }
            // validasi gagal
            else
            {
				$this->data['pesan'] = 'Validasi gagal';
                $this->load->view('admin/murid', $this->data);
            }
        }
        // no submit
        else
        {
            $this->load->view('admin/murid', $this->data);
        }
    }

    public function edit($id_murid = NULL)
    {
		$data['title'] = ucwords($this->uri->segment(1)) . ' - ' . ucwords($this->uri->segment(3)) . ' ' . ucwords($this->uri->segment(2));
		$data['nama'] = $this->session->userdata('username');
        $data['breadcrumb']  = 'Edit Murid';
        $data['main_view']   = 'admin/murid_form';
		$data['id_murid'] = $id_murid;
		$data['form'] = $this->murid->cari($id_murid);
		$data['kelas'] = $this->kelas->cari_semua_array();
		
        // pastikan id_murid ada
        if( ! empty($id_murid))
        {
            // submit
            if($this->input->post('submit'))
            {
                // validasi berhasil
                if($this->murid->validasi_edit() === TRUE)
                {
                    //update db
                    $this->murid->edit($id_murid);
                    $this->session->set_flashdata('pesan', 'Proses update murid berhasil.');

                    redirect('admin/murid');
                }
                // validasi gagal
                else
                {
                    $this->load->view('admin/panel', $data);
                }
            }
			// tidak disubmit, form pertama kali dimuat
            else
            {
                // ambil data dari database
                $murid = $this->murid->cari($id_murid);

                if($murid)
                {
                    $this->load->view('admin/panel', $data);
                }
                else{
                    redirect('admin/murid');
                }
                
            }
        }
        // tidak ada parameter id_kelas, kembalikan ke halaman kelas
        else
        {
            redirect('admin/murid');
        }
    }

    public function hapus($id_murid = NULL)
    {
        // pastikan id_murid yang akan dihapus
        if( ! empty($id_murid))
        {
            if($this->murid->hapus($id_murid))
            {
                $this->session->set_flashdata('pesan', 'Proses hapus murid berhasil.');
                redirect('admin/murid');
            }
            else
            {
                $this->session->set_flashdata('pesan', 'Proses hapus murid gagal.');
                redirect('admin/murid');
            }
        }
        else
        {
            $this->session->set_flashdata('pesan', 'Proses hapus murid gagal.');
            redirect('admin/murid');
        }
    }

}
/* End of file murid.php */
/* Location: ./application/controllers/murid.php */