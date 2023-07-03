<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_login', 'm_login');
    }


	public function index()
	{
		$this->_has_login();
		$this->load->view('v-login');
	}

	private function _has_login()
    {
        if ($this->session->has_userdata('login_session')) {
            $data_user = $this->session->userdata('login_session');
            if ($data_user['role'] == 'admin') {
                redirect('admin/dashboard');
            } elseif ($data_user['role'] == 'dosen') {
                redirect('dosen/dashboard');
            } elseif (($data_user['role'] == 'mahasiswa')) {
            	redirect('mahasiswa/dashboard');
            }
        }
    }


	public function login_aksi()
	{
		$input = $this->input->post(null, true);

		$cek_username = $this->m_login->cek_username($input['username']);
		if (!empty($cek_username)) {
			$password = $this->m_login->get_password($input['username']);
			if ($input['password'] == $password) {
				$user_db = $this->m_login->userdata(array($cek_username['username'], $cek_username['role']));
				// print_r($user_db);
				if ($cek_username['role'] == 'mahasiswa') {
					$userdata = [
						'user'  => $user_db['id_mahasiswa'],
						'role'  => $user_db['role'],
						'nama_mahasiswa'  => $user_db['nama_mahasiswa'],
						'npm'  => $user_db['npm'],
						'id_prodi'  => $user_db['id_prodi'],
						'timestamp' => time()
					];
				} elseif ($cek_username['role'] == 'dosen') {
					$userdata = [
						'user'  => $user_db['id_dosen'],
						'role'  => $user_db['role'],
						'nama_dosen'  => $user_db['nama_dosen'],
						'nip'  => $user_db['nip'],
						'timestamp' => time()
					];
				} elseif ($cek_username['role'] == 'admin') {
					$userdata = [
						'user'  => $user_db['id_user'],
						'role'  => 'admin',
						'nama_admin'  => "ADMIN KRS",
						'nip'  => '',
						'timestamp' => time()
					];
				}
				$this->session->set_userdata('login_session', $userdata);
				if ($user_db['role'] == 'mahasiswa') {
					redirect('mahasiswa/dashboard');
				} elseif ($user_db['role'] == 'dosen') {
					redirect('dosen/dashboard');
				} elseif($user_db['role'] == 'admin'){
					redirect('admin/dashboard');
				}
			} else {
				$this->session->set_flashdata('flash_error', 'Username / password salah');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('flash_error', 'Username / password salah');
			redirect('login');
		}
	}

	public function logout()
    {
        $this->session->unset_userdata('login_session');

        $this->session->set_flashdata('flash_error', 'Berhasil logout');
        redirect('login');
    }

}
