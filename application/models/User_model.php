<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

    public $db_tabel = 'admin';

	public function __construct()
	{
        parent::__construct();
	}

    public function load_form_rules_tambah()
    {
        $form_rules = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => "required|max_length[24]"
            ),
			array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => "required|max_length[24]"
            ),
			array(
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => "required|max_length[32]"
            ),
			array(
                'field' => 'level',
                'label' => 'Level',
                'rules' => "required"
            ),
        );
        return $form_rules;
    }

    public function load_form_rules_edit1()
    {
        $form_rules = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => "required|max_length[24]"
            ),
			array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => "max_length[24]"
            ),
			array(
                'field' => 'repassword',
                'label' => 'Ulangi Password',
                'rules' => "max_length[24]" //|mathecs[password]
            ),
			array(
                'field' => 'nama',
                'label' => 'nama',
                'rules' => "required|max_length[32]"
            ),
			array(
                'field' => 'level',
                'label' => 'Level',
                'rules' => "required"
            ),
			array(
                'field' => 'status',
                'label' => 'Status',
                'rules' => "required"
            ),
        );
        return $form_rules;
    }
	
	public function load_form_rules_edit2()
    {
        $form_rules = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => "required|max_length[24]"
            ),
			array(
                'field' => 'nama',
                'label' => 'nama',
                'rules' => "required|max_length[32]"
            ),
			array(
                'field' => 'level',
                'label' => 'Level',
                'rules' => "required"
            ),
			array(
                'field' => 'status',
                'label' => 'Status',
                'rules' => "required"
            ),
        );
        return $form_rules;
    }
	
    public function validasi_tambah()
    {
        $form = $this->load_form_rules_tambah();
        $this->form_validation->set_rules($form);

        if ($this->form_validation->run())
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function validasi_edit1()
    {
        $form = $this->load_form_rules_edit1();
        $this->form_validation->set_rules($form);

        if ($this->form_validation->run())
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
	
	public function validasi_edit2()
    {
        $form = $this->load_form_rules_edit2();
        $this->form_validation->set_rules($form);

        if ($this->form_validation->run())
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function cari_semua()
    {
        return $this->db->order_by('id_admin', 'ASC')
                        ->get($this->db_tabel)
                        ->result();
    }

    public function cari($id_admin)
    {
        return $this->db->where('id_admin', $id_admin)
                        ->limit(1)
                        ->get($this->db_tabel)
                        ->row_array();
    }

    public function cek($id_admin)
    {
        return $this->db->where('id_admin', $id_admin)
                        ->limit(1)
                        ->get($this->db_tabel)
                        ->num_rows();
    }
	
    public function buat_tabel($data)
    {
        $this->load->library('table');

        // buat class zebra di <tr>,untuk warna selang-seling
		$tmpl = array('table_open'  => '<table class="w3-table w3-striped w3-bordered w3-border w3-white">');
        $this->table->set_template($tmpl);

        /// heading tabel
        $this->table->set_heading('No', 'Username', 'Nama', 'Level', 'Status', 'Aksi');
		
        $no = 0;
        foreach ($data as $row)
        {
			if($this->session->userdata('username') == $row->username)
			{
				$data_hapus = '';
			}
			else
			{
				$data_hapus = anchor('/admin/user/hapus/'.$row->id_admin,'<i class="fa fa-trash"></i> Hapus',array('class'=> 'w3-button w3-red','onclick'=>"return confirm('Anda yakin akan menghapus $row->username?')"));
			}
            $this->table->add_row(
                ++$no,
                $row->username,
                ucwords($row->nama),
                ucwords($row->level),
                ucwords($row->status),
                anchor('/admin/user/edit/'.$row->id_admin,'<i class="fa fa-cog"></i> Edit',array('class' => 'w3-button w3-blue')).' '. $data_hapus
				
			);
        }
        $tabel = $this->table->generate();

        return $tabel;
    }

    public function tambah()
    {
        $user = array(
                      'id_admin' => '',
                      'username' => $this->input->post('username'),
                      'password' => md5($this->input->post('password')),
                      'nama' => $this->input->post('nama'),
                      'level' => $this->input->post('level'),
                      'status' => 'aktif'
                      );
        $this->db->insert($this->db_tabel, $user);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
	
	//fungsi edit jika password mau diganti
    public function edit1($id_user)
    {
		//parameter jika password diisi/diganti
        $query = array(
            'password'=>md5($this->input->post('password')),
            'nama'=>$this->input->post('nama'),
            'level'=>$this->input->post('level'),
            'status'=>$this->input->post('status'),
        );
		
		$this->db->where('id_admin', $id_user);
		$this->db->update($this->db_tabel, $query);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;	
		}
		else
		{
			return FALSE;
		}
	}
	
	//fungsi edit jika password tidak diganti
	public function edit2($id_user)
	{
		$data = array(
            'nama'=>$this->input->post('nama'),
            'level'=>$this->input->post('level'),
            'status'=>$this->input->post('status'),
        );
		
		$this->db->where('id_admin', $id_user);
		$this->db->update($this->db_tabel, $data);
		
		if($this->db->affected_rows() > 0)
		{
			return TRUE;	
		}
		else
		{
			return FALSE;
		}
    }
    
    //fungsi edit level dan status member lain oleh admin
    public function edit3($id_user)
    {
        $data = array(
            'level' => $this->input->post('level'),
            'status' => $this->input->post('status')
        );

        $this->db->where('id_admin', $id_user);
        $this->db->update($this->db_tabel, $data);

        if($this->db->affected_rows() > 0)
		{
			return TRUE;	
		}
		else
		{
			return FALSE;
		}
    }

    public function hapus($id_user)
    {
        $this->db->where('id_admin', $id_user)->delete($this->db_tabel);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}
/* End of file kelas_model.php */
/* Location: ./application/models/kelas_model.php */