<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Guru_model extends CI_Model {

    public $db_tabel = 'guru';

	public function __construct()
	{
        parent::__construct();
		$this->load->helper('tanggal_indonesia');
	}

    public function load_form_rules_tambah()
    {
        $form_rules = array(
            array(
                'field' => 'nama_guru',
                'label' => 'Nama Guru',
                'rules' => "required|max_length[32]"
            ),
			array(
                'field' => 'tempat_lahir',
                'label' => 'Tempat Lahir',
                'rules' => "required|max_length[32]"
            ),
			array(
                'field' => 'tanggal_lahir',
                'label' => 'Tanggal Lahir',
                'rules' => "required"
            ),
			array(
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => "required|max_length[500]"
            ),
			array(
                'field' => 'nomor_hp',
                'label' => 'Nomor HP',
                'rules' => "required|max_length[14]"
            ),
			array(
                'field' => 'id_kelas',
                'label' => 'Id Kelas',
                'rules' => "required"
            ),
        );
        return $form_rules;
    }

    public function load_form_rules_edit()
    {
        $form_rules = array(
             array(
                'field' => 'nama_guru',
                'label' => 'Nama Guru',
                'rules' => "required|max_length[32]"
            ),
			array(
                'field' => 'tempat_lahir',
                'label' => 'Tempat Lahir',
                'rules' => "required|max_length[32]"
            ),
			array(
                'field' => 'tanggal_lahir',
                'label' => 'Tanggal Lahir',
                'rules' => "required"
            ),
			array(
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => "required|max_length[500]"
            ),
			array(
                'field' => 'nomor_hp',
                'label' => 'Nomor HP',
                'rules' => "required|max_length[14]"
            ),
			array(
                'field' => 'status',
                'label' => 'Status',
                'rules' => "required"
            ),
			array(
                'field' => 'id_kelas',
                'label' => 'Kelas',
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

    public function validasi_edit()
    {
        $form = $this->load_form_rules_edit();
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
        //return $this->db->order_by('id_guru', 'ASC')
                        //->get($this->db_tabel)
                        //->result();
						
		/*return $this->db->select('*')
						->order_by('id_guru', 'ASC')
						->from($this->db_tabel)
						->join('kelas', 'kelas.id_kelas = guru.id_guru')
						->result();*/
				
				$query = $this->db->query('SELECT * FROM kelas INNER JOIN guru ON kelas.id_kelas = guru.id_kelas');
				return $query->result();
				/*$this->db->select('*');
				$this->db->from($this->db_tabel);
				$this->db->join('kelas', 'kelas.id_kelas = guru.id_guru');
				$this->db->get();
				$query = $this->db->get();
				return $query->result();*/
		
    }
	
	public function cari_kelas()
	{
		$query = $this->db->query('SELECT * FROM kelas');
		return $query->result_array();
	}

    public function cari($id_guru)
    {
        return $this->db->where('id_guru', $id_guru)
                        ->limit(1)
                        ->get($this->db_tabel)
                        ->row_array();
    }
	
    public function buat_tabel($data)
    {
        $this->load->library('table');

        // buat class zebra di <tr>,untuk warna selang-seling
		$tmpl = array('table_open'  => '<table class="w3-tiny w3-table w3-striped w3-bordered w3-border w3-white">');
        $this->table->set_template($tmpl);

        /// heading tabel
        $this->table->set_heading('No', 'Nama Guru', 'Tempat Lahir', 'Tanggal Lahir', 'Alamat', 'Nomor HP', 'Status', 'Kelas', 'Aksi');

        $no = 0;
        foreach ($data as $row)
        {
            $this->table->add_row(
                ++$no,
                ucwords($row->nama_guru),
                ucwords($row->tempat_lahir),
				tgl_indo($row->tanggal_lahir),
				ucwords($row->alamat),
				ucwords($row->nomor_hp),
				ucwords($row->status),
				ucwords($row->nama_kelas),
                anchor('admin/guru/edit/'.$row->id_guru,'<i class="fa fa-cog"></i> Edit',array('class' => 'w3-button w3-blue')).' '.
                anchor('/admin/guru/hapus/'.$row->id_guru,'<i class="fa fa-trash"></i> Hapus',array('class'=> 'w3-button w3-red','onclick'=>"return confirm('Anda yakin akan menghapus $row->nama_guru?')"))
            );
        }
        $tabel = $this->table->generate();

        return $tabel;
    }

    public function tambah()
    {
        $guru = array(
                      'id_guru' => '',
                      'nama_guru' => $this->input->post('nama_guru'),
                      'tempat_lahir' => $this->input->post('tempat_lahir'),
                      'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                      'alamat' => $this->input->post('alamat'),
                      'nomor_hp' => $this->input->post('nomor_hp'),
                      'status' => 'aktif',
                      'id_kelas' => $this->input->post('id_kelas')
                      );
        $this->db->insert($this->db_tabel, $guru);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function edit($id_guru)
    {
        $guru = array(
            'nama_guru' => $this->input->post('nama_guru'),
                      'tempat_lahir' => $this->input->post('tempat_lahir'),
                      'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                      'alamat' => $this->input->post('alamat'),
                      'nomor_hp' => $this->input->post('nomor_hp'),
                      'status' => $this->input->post('status'),
                      'id_kelas' => $this->input->post('id_kelas')
        );

        // update db
        $this->db->where('id_guru', $id_guru);
		$this->db->update($this->db_tabel, $guru);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function hapus($id_guru)
    {
        $this->db->where('id_guru', $id_guru)->delete($this->db_tabel);

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
/* End of file guru_model.php */
/* Location: ./application/models/guru_model.php */