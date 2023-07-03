<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        cek_login('dosen');
        // model
        $this->load->model('dosen/M_dosen', 'dosen');
    }


	public function index()
	{
		$data_user = $this->session->userdata('login_session');
		$data['data_user'] = $data_user;
		/* start of pagination --------------------- */
        $this->load->library('pagination');
        // pagination
        $config['base_url'] = site_url('/dosen/mahasiswa/');
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->dosen->get_total_data($data_user['user']);
		$config['per_page'] = 5;

		$config['attributes'] = array('class' => 'page-link');
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

		$this->pagination->initialize($config);
		$limit = $config['per_page'];
		$offset = (int) html_escape($this->input->get('per_page'));

		$data['no'] = $offset+1;

		// ta
		$ta = $this->dosen->get_akademik_sekarang();
        // data dosen
        $params = array($data_user['user'], 'waiting', $ta['id_ta'], $ta['semester'], $offset, $limit);
		$data['rs_mahasiswa'] = $this->dosen->get_all_data_mahasiswa($params);
		$data['ta_sekarang'] = $ta;

		$data['title'] = 'Approve Krs';
		$this->load->view('template/dosen/header', $data);
		$this->load->view('dosen/mahasiswa/index');
		$this->load->view('template/dosen/footer');
	}

	public function get_list_krs_by_id_krs($value)
	{
		$html = '';
		$data = $this->dosen->get_list_krs_by_id_krs($value);
		foreach ($data as $key => $value) {
			$html .= '<p><b>'.($key+1).'. '.$value['nama_matkul'] . '<b/></p>';
		}
		echo json_encode($html);
	}

	public function update_status_krs()
	{
		$data = $this->input->post();
		$data_mahasiswa = [
			'id_krs' =>  $data['id_krs'],
			'status' => $data['status']
		];
		if($this->dosen->update_status_krs($data_mahasiswa)){
			$this->session->set_flashdata('flash', 'Berhasil update');
			redirect('dosen/mahasiswa');
		}
	}

	public function setuju($value='')
	{
		$data_user = $this->session->userdata('login_session');
		$data['data_user'] = $data_user;
		/* start of pagination --------------------- */
        $this->load->library('pagination');
        // pagination
        $config['base_url'] = site_url('/dosen/mahasiswa/setuju');
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->dosen->get_total_data($data_user['user']);
		$config['per_page'] = 5;

		$config['attributes'] = array('class' => 'page-link');
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

		$this->pagination->initialize($config);
		$limit = $config['per_page'];
		$offset = (int) html_escape($this->input->get('per_page'));

		$data['no'] = $offset+1;

		// ta
		$ta = $this->dosen->get_akademik_sekarang();
        // data dosen
        $params = array($data_user['user'], 'approve', $ta['id_ta'], $ta['semester'], $offset, $limit);
		$data['rs_mahasiswa'] = $this->dosen->get_all_data_mahasiswa($params);
		$data['ta_sekarang'] = $ta;

		$data['title'] = 'Setuju';
		$this->load->view('template/dosen/header', $data);
		$this->load->view('dosen/mahasiswa/index');
		$this->load->view('template/dosen/footer');
	}

	public function tolak($value='')
	{
		$data_user = $this->session->userdata('login_session');
		$data['data_user'] = $data_user;
		/* start of pagination --------------------- */
        $this->load->library('pagination');
        // pagination
        $config['base_url'] = site_url('/dosen/mahasiswa/tolak');
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->dosen->get_total_data($data_user['user']);
		$config['per_page'] = 5;

		$config['attributes'] = array('class' => 'page-link');
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

		$this->pagination->initialize($config);
		$limit = $config['per_page'];
		$offset = (int) html_escape($this->input->get('per_page'));

		$data['no'] = $offset+1;

		// ta
		$ta = $this->dosen->get_akademik_sekarang();
        // data dosen
        $params = array($data_user['user'], 'reject', $ta['id_ta'], $ta['semester'], $offset, $limit);
		$data['rs_mahasiswa'] = $this->dosen->get_all_data_mahasiswa($params);
		$data['ta_sekarang'] = $ta;

		$data['title'] = 'Tolak';
		$this->load->view('template/dosen/header', $data);
		$this->load->view('dosen/mahasiswa/index');
		$this->load->view('template/dosen/footer');
	}

}