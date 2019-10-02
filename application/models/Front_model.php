<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Front_model extends CI_Model {

    public $db_profil = 'profil';
    public $db_kelas = 'kelas';
	public $db_murid = 'murid';
	public $db_kegiatan = 'kegiatan';
	public $db_guru = 'guru';
	public $db_user = 'admin';
	public $id_profil = 1;

	public function __construct()
	{
        parent::__construct();
	}

    public function cari_profil()
    {
		return $this->db->get_where($this->db_profil, ["id_profil" => $this->id_profil])->row_array();
		
    }
	
	public function cari_kelas()
    {
		//$query = $this->db->get($this->db_kelas);
        //return $query->result_array();
		$query = $this->db->query('SELECT * FROM kelas INNER JOIN guru ON kelas.id_kelas = guru.id_kelas');
		return $query->result_array();
    }
	
	public function jumlah_kegiatan()
	{
		$query = $this->db->query("SELECT * FROM $this->db_kegiatan");
		return $query->num_rows();
	}

	public function jumlah_siswa()
	{
		$query = $this->db->query("SELECT * FROM $this->db_murid");
		return $query->num_rows();
	}

	public function jumlah_guru()
	{
		$query = $this->db->query("SELECT * FROM $this->db_guru");
		return $query->num_rows();
	}

	public function jumlah_kelas()
	{
		$query = $this->db->query("SELECT * FROM $this->db_kelas");
		return $query->num_rows();
	}
	
	public function jumlah_user()
	{
		$query = $this->db->query("SELECT * FROM $this->db_user");
		return $query->num_rows();
	}

	public function cari_kegiatan()
    {
		//$query = $this->db->get($this->db_kelas);
        //return $query->result_array();
		if($this->jumlah_kegiatan() > 8)
		{
			$query = $this->db->query("SELECT * FROM $this->db_kegiatan ORDER BY id_kegiatan LIMIT 8");
		}
		else
		{
			$query = $this->db->query("SELECT * FROM $this->db_kegiatan ORDER BY id_kegiatan");
		}
		return $query->result_array();
    }
	
	public function cari_murid($id_kelas)
	{
		//$query = $this->db->query("SELECT * FROM $this->db_murid ORDER BY nama_murid ASC");
		$query = $this->db->query("SELECT * FROM $this->db_murid WHERE id_kelas = '$id_kelas' ORDER BY nama_murid ASC");
		return $query->result_array();
	}
	
	public function jumlah_murid($id_kelas)
	{
		$query = $this->db->query("SELECT * FROM $this->db_murid WHERE id_kelas = '$id_kelas'");
		return $query->num_rows();
	}
	
}
/* End of file front_model.php */
/* Location: ./application/models/front_model.php */