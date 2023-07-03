<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Krs extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        cek_login('admin');
        // model
        $this->load->model('admin/M_krs', 'krs');
    }
    
	public function index()
	{	
		$data_user = $this->session->userdata('login_session');
		$data['data_user'] = $data_user;
		/* start of pagination --------------------- */
        $this->load->library('pagination');
        // pagination
        $config['base_url'] = site_url('/admin/krs/');
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->krs->get_total_data();
		$config['per_page'] = 5;

		$config['attributes'] = array('class' => 'page-link');
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

		$this->pagination->initialize($config);
		$limit = $config['per_page'];
		$offset = (int) html_escape($this->input->get('per_page'));
		// ta 
		$ta = $this->krs->get_akademik_sekarang();
        // data matkul
        $params = array($ta['id_ta'], $ta['semester'], $offset, $limit);
		$data['rs_krs'] = $this->krs->get_all_data_krs($params);
		$data['ta_sekarang'] = $ta;

		// title
		$data['title'] = 'KRS';
		$data['no'] = $offset+1;
		$this->load->view('template/admin/header', $data);
		$this->load->view('admin/krs/index');
		$this->load->view('template/admin/footer');

	}

}