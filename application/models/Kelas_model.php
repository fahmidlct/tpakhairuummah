<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kelas_model extends CI_Model {

    public $db_tabel = 'kelas';
    public $db_tabel_murid = 'murid';

	public function __construct()
	{
        parent::__construct();
	}

    public function load_form_rules_tambah()
    {
        $form_rules = array(
            array(
                'field' => 'nama_kelas',
                'label' => 'Nama Kelas',
                'rules' => "required|max_length[24]"
            ),
        );
        return $form_rules;
    }

    public function load_form_rules_edit()
    {
        $form_rules = array(
            array(
                'field' => 'nama_kelas',
                'label' => 'Nama Kelas',
                'rules' => "required|max_length[24]"
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
        return $this->db->order_by('id_kelas', 'ASC')
                        ->get($this->db_tabel)
                        ->result();
    }
	
	public function cari_semua_array()
    {
        return $this->db->order_by('id_kelas', 'ASC')
                        ->get($this->db_tabel)
                        ->result_array();
    }

    public function cari($id_kelas)
    {
        return $this->db->where('id_kelas', $id_kelas)
                        ->limit(1)
                        ->get($this->db_tabel)
                        ->row_array();
    }

    public function jumlah_murid($id_kelas)
    {
        return $this->db->where('id_kelas', $id_kelas)
                        ->get($this->db_tabel_murid)
                        ->num_rows();
    }
	
    public function buat_tabel($data)
    {
        $this->load->library('table');

        // buat class zebra di <tr>,untuk warna selang-seling
		$tmpl = array('table_open'  => '<table class="w3-table w3-striped w3-bordered w3-border w3-white">');
        $this->table->set_template($tmpl);

        /// heading tabel
        $this->table->set_heading('No', 'Nama Kelas', 'Jumlah Murid', 'Aksi');

        $no = 0;
        foreach ($data as $row)
        {
            $this->table->add_row(
                ++$no,
                ucwords($row->nama_kelas),
                $this->jumlah_murid($row->id_kelas),
                anchor('/admin/kelas/edit/'.$row->id_kelas,'<i class="fa fa-cog"></i> Edit',array('class' => 'w3-button w3-blue')).' '.
                anchor('/admin/kelas/hapus/'.$row->id_kelas,'<i class="fa fa-trash"></i> Hapus',array('class'=> 'w3-button w3-red','onclick'=>"return confirm('Anda yakin akan menghapus $row->nama_kelas?')"))
            );
        }
        $tabel = $this->table->generate();

        return $tabel;
    }

    public function tambah()
    {
        $kelas = array(
                      'id_kelas' => '',
                      'nama_kelas' => $this->input->post('nama_kelas')
                      );
        $this->db->insert($this->db_tabel, $kelas);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function edit($id_kelas)
    {
        $kelas = array(
            'nama_kelas'=>$this->input->post('nama_kelas'),
        );

        // update db
        $this->db->where('id_kelas', $id_kelas);
		$this->db->update($this->db_tabel, $kelas);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function hapus($id_kelas)
    {
        $this->db->where('id_kelas', $id_kelas)->delete($this->db_tabel);

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