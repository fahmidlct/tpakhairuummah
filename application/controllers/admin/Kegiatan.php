<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kegiatan extends MY_Controller {

    public function __construct()
	{
		parent::__construct();		
		$this->load->model('Kegiatan_model', 'kegiatan', TRUE);
    }

	public function index()
	{
		$data['title'] = ucwords($this->uri->segment(1)) . ' - ' . ucwords($this->uri->segment(2));
		$data['nama'] = $this->session->userdata('username');
		$data['main_view'] = 'admin/kegiatan';
		$data['breadcrumb'] = 'Kegiatan';
        // Cari semua data kegiatan
        $data['kegiatan'] = $this->kegiatan->cari_semua();
		$data['jumlah'] = $this->kegiatan->jumlah_data();
        // data kegiatan ada, tampilkan
        if ($data['kegiatan'])
        {
            // buat tabel
            $tabel = $this->kegiatan->buat_tabel($data['kegiatan']);
            $data['tabel_data'] = $tabel;
            $this->load->view('admin/panel', $data);
        }
        // data kegiatan tidak ada
        else
        {
            $data['pesan'] = 'Tidak ada data kegiatan.';
            $this->load->view('admin/panel', $data);
        }
	}

    public function tambah()
    {

        // submit
        if($this->input->post('submit'))
        {
				$config['upload_path']          = './asset/image/';
                $config['allowed_types']        = 'jpeg|jpg|png';
                $config['max_size']             = 300;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config['encrypt_name']         = TRUE;

                $this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('gambar_kegiatan'))
				{					
					$this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('admin/kegiatan');
				}
				else
				{
					//$this->kegiatan->tambah();
					$data_gambar = $this->upload->data();
                    $nama_gambar = $data_gambar['file_name'];
                    
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './asset/image/' . $nama_gambar;
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = TRUE;
                    $config['width']         = 216;
                    $config['height']       = 162;

                    $thumb = explode('.', $nama_gambar);
                    $thumbs = $thumb[0] . '_thumb.' . $thumb[1];

                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();

					$this->kegiatan->tambah($nama_gambar, $thumbs);
					//$data = array('upload_data' => $this->upload->data());
					$this->session->set_flashdata('pesan', "Proses tambah kegiatan berhasil!");
					//$this->load->view('admin/kegiatan', $data);
					redirect('admin/kegiatan');
				}
        }
        // no submit
        else
        {
			redirect('admin/kegiatan');
        }
    }

    public function edit($id_kegiatan = NULL)
    {
		$data['title'] = ucwords($this->uri->segment(1)) . ' - ' . ucwords($this->uri->segment(3)) . ' ' . ucwords($this->uri->segment(2));
		$data['nama'] = $this->session->userdata('username');
        $data['breadcrumb']  = 'Edit Kegiatan';
        $data['main_view']   = 'admin/kegiatan_form';
		$data['id_kegiatan'] = $id_kegiatan;
		$data['form'] = $this->kegiatan->cari($id_kegiatan);

        // pastikan id_kegiatan ada
        if( ! empty($id_kegiatan))
        {
            $row = $this->kegiatan->cari($id_kegiatan);
            // submit
            if($this->input->post('submit'))
            {
                // validasi berhasil
                //if($this->kegiatan->validasi_edit() === TRUE)
                //{

                $config['upload_path']          = './asset/image/';
                $config['allowed_types']        = 'jpeg|jpg|png';
                $config['max_size']             = 300;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config['encrypt_name']         = TRUE;

                $this->load->library('upload', $config);
                
                if($_FILES["gambar_kegiatan"]["tmp_name"] == NULL)
                {
                    $this->kegiatan->edit_tanpa_gambar($id_kegiatan);
                    $this->session->set_flashdata('pesan', 'Proses edit kegiatan berhasil!');
                    redirect('admin/kegiatan');
                }
                else
                {
                    if ( ! $this->upload->do_upload('gambar_kegiatan'))
				    {					
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        $this->session->set_flashdata('pesan');
                        redirect('admin/kegiatan');
				    }
				    else
				    {
                        $data_gambar = $this->upload->data();
                        $nama_gambar = $data_gambar['file_name'];

                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './asset/image/' . $nama_gambar;
                        $config['create_thumb'] = TRUE;
                        $config['maintain_ratio'] = TRUE;
                        $config['width']         = 216;
                        $config['height']       = 162;

                        $thumb = explode('.', $nama_gambar);
                        $thumbs = $thumb[0] . '_thumb.' . $thumb[1];

                        $this->load->library('image_lib', $config);

                        $this->image_lib->resize();

                        $this->kegiatan->edit_dengan_gambar($id_kegiatan, $nama_gambar, $thumbs);
                        unlink('./asset/image/' . $row['foto']);
                        unlink('./asset/image/' . $row['thumb']);
                        $this->session->set_flashdata('pesan', "Proses edit kegiatan dengan gambar berhasil!");
                        redirect('admin/kegiatan');
				    }
                }
            }
			// tidak disubmit, form pertama kali dimuat
            else
            {
                // ambil data dari database
                $kegiatan = $this->kegiatan->cari($id_kegiatan);
                if($kegiatan)
                {
                    $this->load->view('admin/panel', $data);
                }
                else
                {
                    redirect('admin/kegiatan');
                }
                
            }
        }
        // tidak ada parameter id_kelas, kembalikan ke halaman kelas
        else
        {
            redirect('admin/kegiatan');
        }
    }

    public function hapus($id_kegiatan = NULL)
    {
        // pastikan id_kegiatan yang akan dihapus
        if( ! empty($id_kegiatan))
        {
            if($this->kegiatan->hapus($id_kegiatan))
            {
                $this->session->set_flashdata('pesan', 'Proses hapus kegiatan berhasil.');
                redirect('admin/kegiatan');
            }
            else
            {
                $this->session->set_flashdata('pesan', 'Proses hapus kegiatan gagal.');
                redirect('admin/kegiatan');
            }
        }
        else
        {
            $this->session->set_flashdata('pesan', 'Proses hapus kegiatan gagal.');
            redirect('admin/kegiatan');
        }
    }

}
/* End of file kegiatan.php */
/* Location: ./application/controllers/kegiatan.php */