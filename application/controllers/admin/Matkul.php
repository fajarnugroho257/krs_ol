<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matkul extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        cek_login('admin');
        // model
        $this->load->model('admin/M_mata_kuliah', 'matkul');
    }
    
	public function index()
	{	
		$data_user = $this->session->userdata('login_session');
		$data['data_user'] = $data_user;
		/* start of pagination --------------------- */
        $this->load->library('pagination');
        // pagination
        $config['base_url'] = site_url('/admin/matkul/');
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->matkul->get_total_data();
		$config['per_page'] = 5;

		$config['attributes'] = array('class' => 'page-link');
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

		$this->pagination->initialize($config);
		$limit = $config['per_page'];
		$offset = (int) html_escape($this->input->get('per_page'));

        // data matkul
        $params = array($offset, $limit);
		$data['rs_matkul'] = $this->matkul->get_all_data_matkul($params);
		$data['rs_dosen'] = $this->matkul->get_all_dosen();
		$data['rs_prodi'] = $this->matkul->get_all_prodi();
		$data['ta_sekarang'] = $this->matkul->get_akademik_sekarang();

		// title
		$data['title'] = 'Mata Kuliah';
		$data['no'] = $offset+1;
		$this->load->view('template/admin/header', $data);
		$this->load->view('admin/matkul/index');
		$this->load->view('template/admin/footer');

	}

	public function get_matkul_by_id($id_matkul)
	{
		$matkul = $this->matkul->get_detail_matkul($id_matkul);
		echo json_encode($matkul);
	}

	public function insert()
	{
		$data = $this->input->post();
		if($this->matkul->insert($data)){
			$this->session->set_flashdata('flash', 'Berhasil tambah');
			redirect('admin/matkul');
		} else {
			$this->session->set_flashdata('flash', 'gagal');
			redirect('admin/matkul');
		}
	}

	public function update()
	{
		$data = $this->input->post();
		if($this->matkul->update($data)){
			$this->session->set_flashdata('flash', 'Berhasil update');
			redirect('admin/matkul');
		} else {
			$this->session->set_flashdata('flash', 'gagal');
			redirect('admin/matkul');
		}
	}

	public function delete()
	{
		$data = $this->input->post();
		if($this->matkul->delete($data)){
			$this->session->set_flashdata('flash', 'Berhasil hapus');
			redirect('admin/matkul');
		} else {
			$this->session->set_flashdata('flash', 'gagal');
			redirect('admin/matkul');
		}
	}

}