<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        cek_login('admin');
        // model
        $this->load->model('admin/M_mahasiswa', 'mahasiswa');
    }
    
	public function index()
	{
		$data_user = $this->session->userdata('login_session');
		$data['data_user'] = $data_user;
		/* start of pagination --------------------- */
        $this->load->library('pagination');
        // pagination
        $config['base_url'] = site_url('/admin/mahasiswa/');
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->mahasiswa->get_total_data();
		$config['per_page'] = 5;

		$config['attributes'] = array('class' => 'page-link');
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

		$this->pagination->initialize($config);
		$limit = $config['per_page'];
		$offset = (int) html_escape($this->input->get('per_page'));

        // data mahasiswa
        $params = array($offset, $limit);
		$data['rs_mahasiswa'] = $this->mahasiswa->get_all_data_mahasiswa($params);
		$data['rs_prodi'] = $this->mahasiswa->get_all_data_prodi();
		$data['rs_dosen'] = $this->mahasiswa->get_all_dosen();
		$data['ta_sekarang'] = $this->mahasiswa->get_akademik_sekarang();

		// title
		$data['no'] = $offset+1;

		$data['title'] = 'Mahasiswa';
		$this->load->view('template/admin/header', $data);
		$this->load->view('admin/mahasiswa/index');
		$this->load->view('template/admin/footer');
	}

	public function get_mahasiswa_by_id($id_mahasiswa)
	{
		$mahasiswa = $this->mahasiswa->get_detail_mahasiswa($id_mahasiswa);
		echo json_encode($mahasiswa);
	}

	public function insert()
	{
		$data = $this->input->post();
		// 
		$data_mahasiswa = [
			'nama_mahasiswa' =>  $data['nama_mahasiswa'],
			'id_dosen' =>  $data['id_dosen'],
			'npm' =>  $data['npm'],
			'jk' =>  $data['jk'],
			'semester' =>  $data['semester'],
			'id_prodi' =>  $data['id_prodi'],
			'alamat' =>  $data['alamat']
		];
		// 
		$id_pengguna = $this->mahasiswa->insert($data_mahasiswa);
		if($id_pengguna){
			$user = [
				'id_pengguna' =>  $id_pengguna,
				'username' =>  $data['npm'],
				'password' =>  $data['password'],
				'role' => 'mahasiswa'
			];
			if ($this->mahasiswa->insert_user($user)) {
				$this->session->set_flashdata('flash', 'Berhasil tambah');
				redirect('admin/mahasiswa');
			}
		} else {
			$this->session->set_flashdata('flash', 'gagal');
			redirect('admin/mahasiswa');
		}
	}

	public function update()
	{
		$data = $this->input->post();
		
		$data_mahasiswa = [
			'id_mahasiswa' =>  $data['id_mahasiswa'],
			'id_dosen' => $data['id_dosen'],
			'id_prodi' => $data['id_prodi'],
			'jk' => $data['jk'],
			'semester' =>  $data['semester'],
			'nama_mahasiswa' =>  $data['nama_mahasiswa'],
			'npm' =>  $data['npm'],
			'alamat' =>  $data['alamat']
		];

		$user = [
			'id_user'  =>  $data['id_user'],
			'username' =>  $data['npm'],
			'password' =>  $data['password']
		];
		if($this->mahasiswa->update($data_mahasiswa)){
			// 
			if($this->mahasiswa->update_user($user)){
				$this->session->set_flashdata('flash', 'Berhasil update');
				redirect('admin/mahasiswa');
			}
		} else {
			$this->session->set_flashdata('flash', 'gagal');
			redirect('admin/mahasiswa');
		}
	}

	public function delete()
	{
		$data = $this->input->post();
		// 
		$data_mahasiswa = [
			'id_mahasiswa' => $data['id_mahasiswa'],
		];
		$user = [
			'id_user' => $data['id_user'],
		];
		if($this->mahasiswa->delete($data_mahasiswa)){
			$this->mahasiswa->delete_user($user);
			$this->session->set_flashdata('flash', 'Berhasil hapus');
			redirect('admin/mahasiswa');
		} else {
			$this->session->set_flashdata('flash', 'gagal');
			redirect('admin/mahasiswa');
		}
	}

}