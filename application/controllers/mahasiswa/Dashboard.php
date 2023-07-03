<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        cek_login('mahasiswa');
        // model
        $this->load->model('mahasiswa/M_dashboard');
    }


	public function index()
	{
		$data_user = $this->session->userdata('login_session');
		$data['data_user'] = $data_user;
		$data['mhs'] = $this->M_dashboard->get_detail_mhs($data_user['user']);
		// print_r($data);
		// die;
		$data['ta_sekarang'] = $this->M_dashboard->get_akademik_sekarang();
		$data['title'] = 'Dashboard';
		$this->load->view('template/mahasiswa/header', $data);
		$this->load->view('mahasiswa/dashboard/index');
		$this->load->view('template/mahasiswa/footer');

	}

}