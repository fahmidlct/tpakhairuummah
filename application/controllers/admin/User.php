<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {

    public function __construct()
	{
		parent::__construct();		
		$this->load->model('user_model', 'user', TRUE);
    }

	public function index()
	{
		$data['title'] = ucwords($this->uri->segment(1)) . ' - ' . ucwords($this->uri->segment(2));
		$data['nama'] = $this->session->userdata('username');
		$data['main_view'] = 'admin/user';
		$data['breadcrumb'] = 'User';
		
        // Cari semua data user
        $user = $this->user->cari_semua();

        if($this->session->userdata('level') != 'user')
        {
            // data user ada, tampilkan
            if ($user)
            {
                // buat tabel
                $tabel = $this->user->buat_tabel($user);
                $data['tabel_data'] = $tabel;
                $this->load->view('admin/panel', $data);
            }
            // data user tidak ada
            else
            {
                $data['pesan'] = 'Tidak ada data user.';
                $this->load->view('admin/panel', $data);
            }
        }
        else
        {
            $id_user = $this->session->userdata('id_user');
            redirect('admin/user/edit/' . $id_user);
        }
        
	}

    public function tambah()
    {

        // submit
        if($this->input->post('submit'))
        {
            // validasi sukses
            if($this->user->validasi_tambah())
            {
                if($this->user->tambah())
                {
                    $this->session->set_flashdata('pesan', 'Proses tambah user berhasil.');
                    redirect('admin/user');
                }
                else
                {
                    $this->data['pesan'] = 'Proses tambah data gagal.';
                    $this->load->view('admin/user', $this->data);
                }
            }
            // validasi gagal
            else
            {
                $this->load->view('admin/user', $this->data);
            }
        }
        // no submit
        else
        {
            $this->load->view('admin/user', $this->data);
        }
    }

    public function edit($id_user = NULL)
    {
		$data['title'] = ucwords($this->uri->segment(1)) . ' - ' . ucwords($this->uri->segment(3)) . ' ' . ucwords($this->uri->segment(2));
		$data['nama'] = $this->session->userdata('username');
        $data['breadcrumb']  = 'Edit User';
        $data['main_view']   = 'admin/user_form';
		$data['id_user'] = $id_user;
		$data['form'] = $this->user->cari($id_user);

        //jika level = user
        if($this->session->userdata('level') !== 'super')
        {
            if( ! empty($id_user))
            {
                if($this->session->userdata('id_user') != $id_user)
                {
                    redirect('admin/user/edit/' . $this->session->userdata('id_user'));
                }
                else
                {
                    //submit
                    if($this->input->post('submit'))
                    {
                        // jika password dan repassword terisi dan keduanya sama
                        if( ! empty($this->input->post('password')) AND ! empty($this->input->post('repassword')))
                        {
                            // jika password dan repassword sama
                            if($this->input->post('password') == $this->input->post('repassword'))
                            {
                                //update db
                                $this->user->edit1($id_user);
                                $this->session->set_flashdata('berhasil', 'Proses update user berhasil');
                                
                                redirect('admin/user/edit/' . $this->session->userdata('id_user'));
                            }
                            else
                            {
                                $this->session->set_flashdata('error', 'Password dan ulangi password harus sama!');
                                
                                redirect('admin/user/edit/' . $this->session->userdata('id_user'));
                            }
                        }
                        elseif ($this->input->post('password') == NULL AND $this->input->post('repassword') == NULL AND $this->input->post('nama') != $data['form']['nama'])
                        {
                            
                            //update db
                                $this->user->edit2($id_user);
                                $this->session->set_flashdata('berhasil', 'Proses update user berhasil');
                                
                                redirect('admin/user/edit/' . $this->session->userdata('id_user'));
                        }
                        else
                        {
                            $this->session->set_flashdata('error', 'Untuk mengganti password, kotak isian password dan ulangi password harus terisi!');
                            
                            redirect('admin/user/edit/' . $this->session->userdata('id_user'));
                        }
                    }
                    else
                    {
                        // ambil data dari database
                        $user = $this->user->cari($id_user);
                        if($user)
                        {
                            $this->load->view('admin/panel', $data);
                        }
                    }
                }
            }
            else{
                redirect('admin/user/edit/' . $this->session->userdata('id_user'));
            }
        }
        // jika level = admin
        else
        {
            //jika id tidak kosong
            if( ! empty($id_user))
            {
                //jika sessi id user = id sessi login (akun milik sendiri)
                if($this->session->userdata('id_user') == $id_user)
                {
                    //submit
                    if($this->input->post('submit'))
                    {
                        // jika password dan repassword terisi dan keduanya sama
                        if( ! empty($this->input->post('password')) AND ! empty($this->input->post('repassword')))
                        {
                            // jika password dan repassword sama
                            if($this->input->post('password') == $this->input->post('repassword'))
                            {
                                //update db
                                $this->user->edit1($id_user);
                                $this->session->set_flashdata('berhasil', 'Proses update user berhasil');
                                
                                redirect('admin/user/edit/' . $this->session->userdata('id_user'));
                            }
                            else
                            {
                                //jika password dan repassword tidak sama
                                $this->session->set_flashdata('error', 'Password dan ulangi password harus sama!');
                                
                                redirect('admin/user/edit/' . $this->session->userdata('id_user'));
                            }
                        }
                        //jika password dan repassword sama
                        elseif ($this->input->post('password') == NULL AND $this->input->post('repassword') == NULL AND $this->input->post('nama') != $data['form']['nama'])
                        {
                            
                            //update db
                                $this->user->edit2($id_user);
                                $this->session->set_flashdata('berhasil', 'Proses update user berhasil');
                                
                                redirect('admin/user/edit/' . $this->session->userdata('id_user'));
                        }
                        else
                        {
                            //jika kotak isian tidak diisi
                            $this->session->set_flashdata('error', 'Untuk mengganti password, kotak isian password dan ulangi password harus terisi!');
                            
                            redirect('admin/user/edit/' . $this->session->userdata('id_user'));
                        }
                    }
                    else
                    {
                        // ambil data dari database
                        $user = $this->user->cari($id_user);
                        if($user)
                        {
                            $this->load->view('admin/panel', $data);
                        }
                    }
                }
                else
                {
                    //jika id user tidak sama dengan parameter yg ingin diedit dan tekan tombol submit
                    if($this->input->post('submit'))
                    {
                        $this->user->edit3($id_user);
                        $this->session->set_flashdata('berhasil', 'Proses update user berhasil');
                                
                        redirect('admin/user/edit/' . $id_user);
                    }
                    //jika tidak tekan tombol submit (menampilkan data)
                    else
                    {
                        // ambil data dari database
                        $user = $this->user->cari($id_user);
                        if($user)
                        {
                            $this->load->view('admin/panel', $data);
                        }
                    }
                }
            }
            else
            {
                redirect('admin/user/edit/' . $this->session->userdata('id_user'));
            }
        }			
    }

    public function hapus($id_user = NULL)
    {
        // pastikan id_user yang akan dihapus
        if( ! empty($id_user))
        {
            if($this->user->hapus($id_user))
            {
                $this->session->set_flashdata('pesan', 'Proses hapus user berhasil.');
                redirect('admin/user');
            }
            else
            {
                $this->session->set_flashdata('pesan', 'Proses hapus user gagal.');
                redirect('admin/user');
            }
        }
        else
        {
            $this->session->set_flashdata('pesan', 'Proses hapus user gagal.');
            redirect('admin/user');
        }
    }

}
/* End of file User.php */
/* Location: ./application/controllers/User.php */