<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        cek_login('admin');
        // model
        $this->load->model('admin/M_dosen', 'dosen');
    }
    
	public function index()
	{
		$data_user = $this->session->userdata('login_session');
		$data['data_user'] = $data_user;
		/* start of pagination --------------------- */
        $this->load->library('pagination');
        // pagination
        $config['base_url'] = site_url('/admin/dosen/');
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->dosen->get_total_data();
		$config['per_page'] = 5;

		$config['attributes'] = array('class' => 'page-link');
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

		$this->pagination->initialize($config);
		$limit = $config['per_page'];
		$offset = (int) html_escape($this->input->get('per_page'));

        // data dosen
        $params = array($offset, $limit);
		$data['rs_dosen'] = $this->dosen->get_all_data_dosen($params);
		$data['ta_sekarang'] = $this->dosen->get_akademik_sekarang();

		// title
		$data['no'] = $offset+1;
		$data['title'] = 'Dosen';
		$this->load->view('template/admin/header', $data);
		$this->load->view('admin/dosen/index');
		$this->load->view('template/admin/footer');

	}

	public function get_dosen_by_id($id_dosen)
	{
		$dosen = $this->dosen->get_detail_dosen($id_dosen);
		echo json_encode($dosen);
	}

	public function insert()
	{
		$data = $this->input->post();
		// 
		$data_dosen = [
			'nama_dosen' =>  $data['nama_dosen'],
			'nip' =>  $data['nip'],
			'alamat' =>  $data['alamat']
		];
		// 
		$id_pengguna = $this->dosen->insert($data_dosen);
		if($id_pengguna){
			$user = [
				'id_pengguna' =>  $id_pengguna,
				'username' =>  $data['nip'],
				'password' =>  $data['password'],
				'role' => 'dosen'
			];
			if ($this->dosen->insert_user($user)) {
				$this->session->set_flashdata('flash', 'Berhasil tambah');
				redirect('admin/dosen');
			}
		} else {
			$this->session->set_flashdata('flash', 'gagal');
			redirect('admin/dosen');
		}
	}

	public function update()
	{
		$data = $this->input->post();
		
		$data_dosen = [
			'id_dosen' =>  $data['id_dosen'],
			'nama_dosen' =>  $data['nama_dosen'],
			'nip' =>  $data['nip'],
			'alamat' =>  $data['alamat']
		];

		$user = [
			'id_user'  =>  $data['id_user'],
			'username' =>  $data['nip'],
			'password' =>  $data['password']
		];

		if($this->dosen->update($data_dosen)){
			// 
			if($this->dosen->update_user($user)){
				$this->session->set_flashdata('flash', 'Berhasil update');
				redirect('admin/dosen');
			}
		} else {
			$this->session->set_flashdata('flash', 'gagal');
			redirect('admin/dosen');
		}
	}

	public function delete()
	{
		$data = $this->input->post();
		// 
		$data_dosen = [
			'id_dosen' => $data['id_dosen'],
		];
		$user = [
			'id_user' => $data['id_user'],
		];
		if($this->dosen->delete($data_dosen)){
			$this->dosen->delete_user($user);
			$this->session->set_flashdata('flash', 'Berhasil hapus');
			redirect('admin/dosen');
		} else {
			$this->session->set_flashdata('flash', 'gagal');
			redirect('admin/dosen');
		}
	}

}