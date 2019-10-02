<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kelas extends MY_Controller {

    public function __construct()
	{
		parent::__construct();		
		$this->load->model('Kelas_model', 'kelas', TRUE);
    }

	public function index()
	{
		$data['title'] = ucwords($this->uri->segment(1)) . ' - ' . ucwords($this->uri->segment(2));
		$data['nama'] = $this->session->userdata('username');
		$data['main_view'] = 'admin/kelas';
		$data['breadcrumb'] = 'Kelas';
		
        // Cari semua data kelas
        $kelas = $this->kelas->cari_semua();

        // data kelas ada, tampilkan
        if ($kelas)
        {
            // buat tabel
            $tabel = $this->kelas->buat_tabel($kelas);
            $data['tabel_data'] = $tabel;
            $this->load->view('admin/panel', $data);
        }
        // data kelas tidak ada
        else
        {
            $data['pesan'] = 'Tidak ada data kelas.';
            $this->load->view('admin/panel', $data);
        }
	}

    public function tambah()
    {

        // submit
        if($this->input->post('submit'))
        {
            // validasi sukses
            if($this->kelas->validasi_tambah())
            {
                if($this->kelas->tambah())
                {
                    $this->session->set_flashdata('pesan', 'Proses tambah kelas berhasil.');
                    redirect('admin/kelas');
                }
                else
                {
                    $this->data['pesan'] = 'Proses tambah data gagal.';
                    $this->load->view('admin/kelas', $this->data);
                }
            }
            // validasi gagal
            else
            {
                $this->load->view('admin/kelas', $this->data);
            }
        }
        // no submit
        else
        {
            $this->load->view('admin/kelas', $this->data);
        }
    }

    public function edit($id_kelas = NULL)
    {
		$data['title'] = ucwords($this->uri->segment(1)) . ' - ' . ucwords($this->uri->segment(3)) . ' ' . ucwords($this->uri->segment(2));
		$data['nama'] = $this->session->userdata('username');
        $data['breadcrumb']  = 'Edit Kelas';
        $data['main_view']   = 'admin/kelas_form';
		$data['id_kelas'] = $id_kelas;
		$data['form'] = $this->kelas->cari($id_kelas);

        // pastikan id_kelas ada
        if( ! empty($id_kelas))
        {
            // submit
            if($this->input->post('submit'))
            {
                // validasi berhasil
                if($this->kelas->validasi_edit() === TRUE)
                {
                    //update db
                    $this->kelas->edit($id_kelas);
                    $this->session->set_flashdata('pesan', 'Proses update kelas berhasil.');

                    redirect('admin/kelas');
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
                $kelas = $this->kelas->cari($id_kelas);
                if($kelas)
                {
                    $this->load->view('admin/panel', $data);
                }
                else
                {
                    redirect('admin/kelas');
                }
                
            }
        }
        // tidak ada parameter id_kelas, kembalikan ke halaman kelas
        else
        {
            redirect('admin/kelas');
        }
    }

    public function hapus($id_kelas = NULL)
    {
        // pastikan id_kelas yang akan dihapus
        if( ! empty($id_kelas))
        {
            if($this->kelas->hapus($id_kelas))
            {
                $this->session->set_flashdata('pesan', 'Proses hapus kelas berhasil.');
                redirect('admin/kelas');
            }
            else
            {
                $this->session->set_flashdata('pesan', 'Proses hapus kelas gagal.');
                redirect('admin/kelas');
            }
        }
        else
        {
            $this->session->set_flashdata('pesan', 'Proses hapus kelas gagal.');
            redirect('admin/kelas');
        }
    }

}
/* End of file kelas.php */
/* Location: ./application/controllers/kelas.php */