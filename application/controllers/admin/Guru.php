<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Guru extends MY_Controller {

    public function __construct()
	{
		parent::__construct();		
		$this->load->model('Guru_model', 'guru', TRUE);
		$this->load->model('Kelas_model', 'kelas', TRUE);
    }

	public function index()
	{
		$data['title'] = ucwords($this->uri->segment(1)) . ' - ' . ucwords($this->uri->segment(2));
		$data['nama'] = $this->session->userdata('username');
		$data['main_view'] = 'admin/guru';
		$data['breadcrumb'] = 'Guru';
		$data['select_guru'] = 'w3-green';
        // Cari semua data guru
        $guru = $this->guru->cari_semua();
		$data['kelas'] = $this->guru->cari_kelas();
        // data guru ada, tampilkan
        if ($guru)
        {
            // buat tabel
            $tabel = $this->guru->buat_tabel($guru);
            $data['tabel_data'] = $tabel;
            $this->load->view('admin/panel', $data);
        }
        // data guru tidak ada
        else
        {
            $data['pesan'] = 'Tidak ada data guru.';
            $this->load->view('admin/panel', $data);
        }
	}

    public function tambah()
    {

        // submit
        if($this->input->post('submit'))
        {
            // validasi sukses
            if($this->guru->validasi_tambah())
            {
                if($this->guru->tambah())
                {
                    $this->session->set_flashdata('pesan', 'Proses tambah guru berhasil.');
                    redirect('admin/guru');
                }
                else
                {
                    $this->data['pesan'] = 'Proses tambah guru gagal.';
                    $this->load->view('admin/guru', $this->data);
                }
            }
            // validasi gagal
            else
            {
				$this->data['pesan'] = 'Validasi gagal';
                $this->load->view('admin/guru', $this->data);
            }
        }
        // no submit
        else
        {
            $this->load->view('admin/guru', $this->data);
        }
    }

    public function edit($id_guru = NULL)
    {
		$data['title'] = ucwords($this->uri->segment(1)) . ' - ' . ucwords($this->uri->segment(3)) . ' ' . ucwords($this->uri->segment(2));
		$data['nama'] = $this->session->userdata('username');
        $data['breadcrumb']  = 'Edit Guru';
        $data['main_view']   = 'admin/guru_form';
		$data['id_guru'] = $id_guru;
		$data['form'] = $this->guru->cari($id_guru);
		$data['kelas'] = $this->kelas->cari_semua_array();

        // pastikan id_guru ada
        if( ! empty($id_guru))
        {
            // submit
            if($this->input->post('submit'))
            {
                // validasi berhasil
                if($this->guru->validasi_edit() === TRUE)
                {
                    //update db
                    $this->guru->edit($id_guru);
                    $this->session->set_flashdata('pesan', 'Proses update guru berhasil.');

                    redirect('admin/guru');
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
                $guru = $this->guru->cari($id_guru);
                if($guru)
                {
                    $this->load->view('admin/panel', $data);
                }
                else{
                    redirect('admin/guru');
                }
                
            }
        }
        // tidak ada parameter id_kelas, kembalikan ke halaman kelas
        else
        {
            redirect('admin/guru');
        }
    }

    public function hapus($id_guru = NULL)
    {
        // pastikan id_kelas yang akan dihapus
        if( ! empty($id_guru))
        {
            if($this->guru->hapus($id_guru))
            {
                $this->session->set_flashdata('pesan', 'Proses hapus guru berhasil.');
                redirect('admin/guru');
            }
            else
            {
                $this->session->set_flashdata('pesan', 'Proses hapus guru gagal.');
                redirect('admin/guru');
            }
        }
        else
        {
            $this->session->set_flashdata('pesan', 'Proses hapus guru gagal.');
            redirect('admin/guru');
        }
    }

}
/* End of file guru.php */
/* Location: ./application/controllers/guru.php */