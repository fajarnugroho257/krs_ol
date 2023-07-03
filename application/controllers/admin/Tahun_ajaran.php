<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_ajaran extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        cek_login('admin');
        // model
        $this->load->model('admin/M_ta');
    }
    
	public function index()
	{
		$data_user = $this->session->userdata('login_session');
		$data['ta_sekarang'] = $this->M_ta->get_akademik_sekarang();
		$data['rs_ta'] = $this->M_ta->get_all_data_tahun_ajaran();

		$data['data_user'] = $data_user;
		$data['title'] = 'Tahun Ajaran';
		$this->load->view('template/admin/header', $data);
		$this->load->view('admin/tahun_ajaran/index');
		$this->load->view('template/admin/footer');
	}

	public function insert()
	{
		$data = $this->input->post();
		if($this->M_ta->insert($data)){
			$this->session->set_flashdata('flash', 'Berhasil tambah');
			redirect('admin/tahun_ajaran');
		} else {
			$this->session->set_flashdata('flash', 'gagal');
			redirect('admin/tahun_ajaran');
		}
	}

	public function get_ta_by_id($id_ta)
	{
		$ta = $this->M_ta->get_detail_ta($id_ta);
		echo json_encode($ta);
	}

	public function update()
	{
		$data = $this->input->post();
		if($this->M_ta->update($data)){
			$this->session->set_flashdata('flash', 'Berhasil update');
			redirect('admin/tahun_ajaran');
		} else {
			$this->session->set_flashdata('flash', 'gagal');
			redirect('admin/tahun_ajaran');
		}
	}

}