<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		// print_r($data_user);
		// die;
		$ta = $this->dosen->get_akademik_sekarang();
		$data['ta_sekarang'] = $ta;
		$data['title'] = 'Dashboard';
		$this->load->view('template/dosen/header', $data);
		$this->load->view('dosen/dashboard/index');
		$this->load->view('template/dosen/footer');

	}

}