<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kegiatan_model extends CI_Model {

    public $db_tabel = 'kegiatan';

	public function __construct()
	{
        parent::__construct();
		$this->load->helper('tanggal_indonesia');
	}

    public function load_form_rules_tambah()
    {
        $form_rules = array(
            array(
                'field' => 'nama_kegiatan',
                'label' => 'Nama Kegiatan',
                'rules' => "required|max_length[100]"
            ),
			array(
                'field' => 'gambar_kegiatan',
                'label' => 'Upload Foto Kegiatan',
                'rules' => "required|max_length[100]"
            ),
        );
        return $form_rules;
    }

    public function load_form_rules_edit()
    {
        $form_rules = array(
             array(
                'field' => 'nama_kegiatan',
                'label' => 'Nama Kegiatan',
                'rules' => "required|max_length[100]"
            ),
			array(
                'field' => 'gambar_kegiatan',
                'label' => 'Gambar Kegiatan',
                'rules' => "required|max_length[100]"
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
		$query = $this->db->query('SELECT * FROM kegiatan ORDER BY id_kegiatan ASC');
		return $query->result();		
    }
	
	public function jumlah_data()
	{
		return $this->db->count_all_results($this->db_tabel);
	}
	
    public function cari($id_kegiatan)
    {
        return $this->db->where('id_kegiatan', $id_kegiatan)
                        ->limit(1)
                        ->get($this->db_tabel)
                        ->row_array();
    }
	
    public function buat_tabel($data)
    {
        $this->load->library('table');

        // buat class zebra di <tr>,untuk warna selang-seling
		$tmpl = array('table_open'  => '<table class="w3-table w3-striped w3-bordered w3-border w3-white">');
        $this->table->set_template($tmpl);

        /// heading tabel
		$nama_kegiatan = array('data' => 'Nama Kegiatan', 'width' => '40%');
		$gambar = array('data' => 'Foto Kegiatan', 'width' => '35%'); 
        $this->table->set_heading('No', $nama_kegiatan, $gambar, 'Aksi');

        $no = 0;
        $slide = 0;
        foreach ($data as $row)
        {
            $this->table->add_row(
                ++$no,
                ucwords($row->nama_kegiatan),
				'<img src="'. base_url('asset/image/') . $row->thumb . '" title="'. $row->nama_kegiatan . '" style="width:20%; cursor: pointer;" onclick="openModal();currentSlide(' . ++$slide . ')" class="w3-hover-opacity">',
				//<img src="asset/image/k1.jpeg" style="width:100%" onclick="openModal();currentSlide(1)" class="w3-hover-opacity">
                anchor('admin/kegiatan/edit/'.$row->id_kegiatan,'<i class="fa fa-cog"></i> Edit',array('class' => 'w3-button w3-blue')).' '.
                anchor('/admin/kegiatan/hapus/'.$row->id_kegiatan,'<i class="fa fa-trash"></i> Hapus',array('class'=> 'w3-button w3-red','onclick'=>"return confirm('Anda yakin akan menghapus $row->nama_kegiatan?')"))
            );
        }
        $tabel = $this->table->generate();

        return $tabel;
    }

    public function tambah($gambar_kegiatan, $thumbs)
    {
        $kegiatan = array(
                      'id_kegiatan' => '',
                      'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                      'foto' => $gambar_kegiatan,
                      'thumb' => $thumbs
                      );
        $this->db->insert($this->db_tabel, $kegiatan);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function edit_tanpa_gambar($id_kegiatan)
    {
        $kegiatan = array(
            'nama_kegiatan' => $this->input->post('nama_kegiatan'),
        );

        // update db
        $this->db->where('id_kegiatan', $id_kegiatan);
		$this->db->update($this->db_tabel, $kegiatan);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function edit_dengan_gambar($id_kegiatan, $gambar_kegiatan, $thumbs)
    {
        $kegiatan = array(
            'nama_kegiatan' => $this->input->post('nama_kegiatan'),
            'foto' => $gambar_kegiatan,
            'thumb' => $thumbs
        );

        // update db
        $this->db->where('id_kegiatan', $id_kegiatan);
		$this->db->update($this->db_tabel, $kegiatan);

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function hapus($id_kegiatan)
    {
		$query = $this->db->query("SELECT * FROM kegiatan WHERE id_kegiatan = '$id_kegiatan'");
		$row = $query->row();
		
        $this->db->where('id_kegiatan', $id_kegiatan)->delete($this->db_tabel);

        if($this->db->affected_rows() > 0)
        {
            unlink('./asset/image/' . $row->foto);
            unlink('./asset/image/' . $row->thumb);
			
			return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}
/* End of file kegiatan_model.php */
/* Location: ./application/models/kegiatan_model.php */