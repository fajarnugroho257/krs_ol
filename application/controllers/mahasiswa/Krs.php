<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Krs extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        cek_login('mahasiswa');
        // model
        $this->load->model('mahasiswa/M_krs', 'M_krs');
        $this->load->model('mahasiswa/M_dashboard');
    }


	public function index()
	{
		$data_user = $this->session->userdata('login_session');
		$data['data_user'] = $data_user;
		
		$ta = $this->M_dashboard->get_akademik_sekarang();
		$data['detail_mahasiswa'] = $this->M_krs->get_detail_mahasiswa_by_id_mahasiswa($data_user['user']);
		$data['rs_krs'] = $this->M_krs->get_matkul_by_id_mahasiswa(array($data_user['user'], $ta['id_ta'], $ta['semester'], $data['detail_mahasiswa']['id_prodi']));
		$data['detail_krs'] = $this->M_krs->get_detail_krs_by_id_mahasiswa(array($data_user['user'], $ta['id_ta'], $ta['semester']));
		
		$data['ta_sekarang'] = $ta;
		// 
		$data['title'] = 'Krs';
		// echo "<pre>";
		// print_r($data);
		// die;
		
		$this->load->view('template/mahasiswa/header', $data);
		$this->load->view('mahasiswa/krs/index');
		$this->load->view('template/mahasiswa/footer');
	}

	public function add_krs()
	{
		$data_user = $this->session->userdata('login_session');
		$ta = $this->M_dashboard->get_akademik_sekarang();
		// 
		$data = $this->input->post();

		// insert data baru
		if ($data['aksi'] == 'simpan') {
			$data_krs = [
				'id_mahasiswa' =>  $data_user['user'],
				'id_ta' =>  $ta['id_ta'],
				'semester' =>  $ta['semester'],
				'status' =>  'waiting',
			];
			// 
			$id_krs = $this->M_krs->insert($data_krs);
			if ($id_krs) {
				$res_krs = array();
				// loop
				foreach ($data['pilih'] as $key => $value) {
					$res_krs[$key] = 
					[
						'id_krs'	=> $id_krs,
						'id_matkul'	=> $value,
					];
				}

				if($this->db->insert_batch('list_krs', $res_krs)){
					$this->session->set_flashdata('flash', 'Berhasil tambah');
					redirect('mahasiswa/krs');
				}
			}
		} elseif ($data['aksi'] == 'update') {
			// update krs status
			$data_krs = [
				'id_krs' =>  $data['id_krs'],
				'status' =>  'waiting',
			];
			// 
			$id_krs = $this->M_krs->update_krs($data_krs);
			// delete
			$data_list_krs = [
				'id_krs' => $data['id_krs'],
			];
			if($this->M_krs->delete($data_list_krs)){
				$res_krs = array();
				// loop
				foreach ($data['pilih'] as $key => $value) {
					$res_krs[$key] = 
					[
						'id_krs'	=> $data['id_krs'],
						'id_matkul'	=> $value,
					];
				}
				// insert lagi
				if($this->db->insert_batch('list_krs', $res_krs)){
					$this->session->set_flashdata('flash', 'Berhasil update');
					redirect('mahasiswa/krs');
				}
			}
		}
	}

}