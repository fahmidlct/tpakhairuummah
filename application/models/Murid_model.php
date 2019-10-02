<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Murid_model extends CI_Model {

    public $db_tabel = 'murid';

	public function __construct()
	{
        parent::__construct();
		$this->load->helper('tanggal_indonesia');
	}

    public function load_form_rules_tambah()
    {
        $form_rules = array(
            array(
                'field' => 'nama_murid',
                'label' => 'Nama Murid',
                'rules' => "required|max_length[32]"
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
                'field' => 'nama_murid',
                'label' => 'Nama Murid',
                'rules' => "required|max_length[32]"
            ),
			array(
                'field' => 'id_kelas',
                'label' => 'Id Kelas',
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
        //return $this->db->order_by('id_murid', 'ASC')
                        //->get($this->db_tabel)
                        //->result();
						
		/*return $this->db->select('*')
						->order_by('id_guru', 'ASC')
						->from($this->db_tabel)
						->join('kelas', 'kelas.id_kelas = guru.id_guru')
						->result();*/
				
		$query = $this->db->query('SELECT * FROM kelas INNER JOIN murid ON kelas.id_kelas = murid.id_kelas');
		return $query->result();
    }

    public function cari_semua_array()
    {
        $query = $this->db->query('SELECT * FROM kelas INNER JOIN murid ON kelas.id_kelas = murid.id_kelas');
		return $query->result_array();
    }
	
	public function cari_paging($limit, $offset)
	{
		$query = $this->db->query("SELECT * FROM kelas INNER JOIN murid ON kelas.id_kelas = murid.id_kelas ORDER BY murid.id_murid ASC LIMIT $limit, $offset");
		return $query->result();
	}
	
	public function cari_kelas()
	{
		$query = $this->db->query('SELECT * FROM kelas');
		return $query->result_array();
	}
	
    public function cari($id_murid)
    {
        return $this->db->where('id_murid', $id_murid)
                        ->limit(1)
                        ->get($this->db_tabel)
                        ->row_array();
    }
	
    public function buat_tabel($data)
    {
        $this->load->library('table');

        // buat class zebra di <tr>,untuk warna selang-seling
		$tmpl = array('table_open'  => '<table class="w3-normal w3-table w3-striped w3-bordered w3-border w3-white">');
        $this->table->set_template($tmpl);

        /// heading tabel
        $this->table->set_heading('No', 'Nama Murid', 'Kelas', 'Aksi');

        $no = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        foreach ($data as $row)
        {
            $this->table->add_row(
                ++$no,
                ucwords($row->nama_murid),
				ucwords($row->nama_kelas),
                anchor('/admin/murid/edit/'.$row->id_murid,'<i class="fa fa-cog"></i> Edit',array('class' => 'w3-button w3-blue')).' '.
                anchor('/admin/murid/hapus/'.$row->id_murid,'<i class="fa fa-trash"></i> Hapus',array('class'=> 'w3-button w3-red','onclick'=>"return confirm('Anda yakin akan menghapus $row->nama_murid?')"))
            );
        }
        $tabel = $this->table->generate();

        return $tabel;
    }

    public function tambah()
    {
        $murid = array(
                      'id_murid' => '',
                      'nama_murid' => $this->input->post('nama_murid'),
                      'id_kelas' => $this->input->post('id_kelas')
                      );
        $this->db->insert($this->db_tabel, $murid);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function edit($id_murid)
    {
        $murid = array(
            'nama_murid' => $this->input->post('nama_murid'), 
            'id_kelas' => $this->input->post('id_kelas')
        );

        // update db
        $this->db->where('id_murid', $id_murid);
		$this->db->update($this->db_tabel, $murid);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function hapus($id_murid)
    {
        $this->db->where('id_murid', $id_murid)->delete($this->db_tabel);

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
/* End of file murid_model.php */
/* Location: ./application/models/murid_model.php */