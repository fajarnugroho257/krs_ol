<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        cek_login('admin');
        // model
        $this->load->model('admin/M_dashboard');
    }


	public function index()
	{
		$data_user = $this->session->userdata('login_session');
		$data['data_user'] = $data_user;
		// print_r($data_user);
		// die;
		$data['rs_ta'] = $this->M_dashboard->get_all_data_tahun_ajaran();
		$data['ta_sekarang'] = $this->M_dashboard->get_akademik_sekarang();
		$data['title'] = 'Dashboard';
		$this->load->view('template/admin/header', $data);
		$this->load->view('admin/dashboard/index');
		$this->load->view('template/admin/footer');
	}

	public function update_akademik()
	{
		$data = $this->input->post();
		// 
		$params = [
			'id_akademik' 	=> '1',
			'id_ta'			=> $data['id_ta'],
			'semester'		=> $data['semester']
		];
		if ($this->M_dashboard->update($params)) {
			$this->session->set_flashdata('flash', 'Berhasil update tahun ajaran');
			redirect('admin/dashboard');
		} else {
			$this->session->set_flashdata('flash', 'gagal');
			redirect('admin/dashboard');
		}
	}

}