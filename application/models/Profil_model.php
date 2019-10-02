<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profil_model extends CI_Model {

    public $db_tabel = 'profil';
	public $id_profil = 1;

	public function __construct()
	{
        parent::__construct();
	}
	
	public function load_form_rules_edit()
    {
        $form_rules = array(
            array(
                'field' => 'judul_kata_pembuka',
                'label' => 'Judul Kata Pembuka',
                'rules' => "required|max_length[50]"
            ),
            array(
                'field' => 'kata_pembuka',
                'label' => 'Kata Pembuka',
                'rules' => "required|max_length[500]"
            ),
			array(
                'field' => 'nama_sekolah',
                'label' => 'Nama Sekolah',
                'rules' => "required|max_length[32]"
            ),
			array(
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => "required|max_length[500]"
            ),
			array(
                'field' => 'no_telepon',
                'label' => 'No Telepon',
                'rules' => "required|max_length[12]"
            ),
			array(
                'field' => 'kode_pos',
                'label' => 'Kode Pos',
                'rules' => "required|exact_length[5]"
            ),
			array(
                'field' => 'instagram',
                'label' => 'Instagram',
                'rules' => "max_length[50]|valid_url"
            ),
			array(
                'field' => 'facebook',
                'label' => 'Facebook',
                'rules' => "max_length[50]|valid_url"
            ),
			array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => "max_length[50]|valid_email"
            ),
			array(
                'field' => 'penerima_donatur',
                'label' => 'Penerima Donatur',
                'rules' => "required|max_length[30]"
            ),
			array(
                'field' => 'nomor_kontak',
                'label' => 'Nomor Kontak',
                'rules' => "required|max_length[20]"
            ),
			array(
                'field' => 'no_rekening',
                'label' => 'Nomor Rekening',
                'rules' => "required|max_length[200]"
            ),
        );
        return $form_rules;
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
	
    public function cari_profil()
    {
		return $this->db->get_where($this->db_tabel, ["id_profil" => $this->id_profil])->row_array();
		
    }
	
	public function edit_profil()
    {
        $kelas = array(
            'judul_kata_pembuka' => $this->input->post('judul_kata_pembuka'),
            'kata_pembuka' => $this->input->post('kata_pembuka'),
            'nama_sekolah' => $this->input->post('nama_sekolah'),
            'alamat' => $this->input->post('alamat'),
            'no_telepon' => $this->input->post('no_telepon'),
            'kode_pos' => $this->input->post('kode_pos'),
            'email' => $this->input->post('email'),
            'instagram' => $this->input->post('instagram'),
            'facebook' => $this->input->post('facebook'),
            'penerima_donatur' => $this->input->post('penerima_donatur'),
            'nomor_kontak' => $this->input->post('nomor_kontak'),
            'no_rekening' => $this->input->post('no_rekening'),
        );

        // update db
        $this->db->where('id_profil', 1);
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

}
/* End of file profil_model.php */
/* Location: ./application/models/profil_model.php */