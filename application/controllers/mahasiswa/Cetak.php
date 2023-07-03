<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        cek_login('mahasiswa');
        // model
        $this->load->model('mahasiswa/M_cetak');
    }


	public function index()
	{
		$data_user = $this->session->userdata('login_session');
		$data['data_user'] = $data_user;
		$data['mhs'] = $this->M_cetak->get_detail_mhs($data_user['user']);
		// print_r($data);
		// die;
		$ta = $this->M_cetak->get_akademik_sekarang();
		$data['ta_sekarang'] = $ta;
		$data['res_krs'] = $this->M_cetak->get_result_krs(array($data['mhs']['id_mahasiswa'], $ta['id_ta'], $ta['semester']));
		$data['title'] = 'Cetak';
		$this->load->view('template/mahasiswa/header', $data);
		$this->load->view('mahasiswa/cetak/index');
		$this->load->view('template/mahasiswa/footer');

	}

	public function pdf()
    {
    	include_once APPPATH . '/third_party/tecnickcom/tcpdf/tcpdf.php';
        $pdf = new \TCPDF();
        $pdf->SetTitle('KRS');
        $pdf->SetHeaderMargin(10);
        $pdf->SetTopMargin(10);
        $pdf->setFooterMargin(10);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor('Author');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetDisplayMode('real', 'default');
        $pdf->AddPage('L');
        // data mahasiswa 
        $data_user = $this->session->userdata('login_session');
        $ta = $this->M_cetak->get_akademik_sekarang();
        $mahasiswa = $this->M_cetak->get_detail_mhs($data_user['user']);
        // rs
        $rs_krs = $this->M_cetak->get_result_krs(array($mahasiswa['id_mahasiswa'], $ta['id_ta'], $ta['semester']));
        // data
        $html = '';
        $html .= '	<table>
			          <tr>
			            <td width="200px">Nama</td>
			            <td width="100px">:</td>
			            <td width="200px">'. $mahasiswa["nama_mahasiswa"].'</td>
			          </tr>
			          <tr>
			            <td width="200px">NPM</td>
			            <td width="100px">:</td>
			            <td width="200px">'. $mahasiswa["npm"].'</td>
			          </tr>
			          <tr>
			            <td width="200px">Program Studi</td>
			            <td width="100px">:</td>
			            <td width="200px">'. $mahasiswa["nama_prodi"].'</td>
			          </tr>
			          <tr>
			            <td width="200px">Dosen Pembimbing</td>
			            <td width="100px">:</td>
			            <td width="200px">'. $mahasiswa["nama_dosen"].'</td>
			          </tr>
			          <tr>
			            <td width="200px">Semester</td>
			            <td width="100px">:</td>
			            <td width="200px">'. $mahasiswa["semester"].'</td>
			          </tr>
			        </table>';
        $html .= '<br>';
        $no = 1; 
        $html .= '	<table border="1">
			          <tr>
			            <td width="5%" align="center" >No</td>
			            <td width="10%" align="center" >Smt</td>
			            <td width="5%" align="center" >Kelas</td>
			            <td width="10%" align="center" >KodeMK</td>
			            <td width="20%" align="center" >Mata Kuliah</td>
			            <td width="5%" align="center" >SKS</td>
			            <td width="20%" align="center" >Dosen</td>
			            <td width="15%" align="center" >Hari</td>
			            <td width="15%" align="center" >Jam</td>
			          </tr>';
			          foreach ($rs_krs as $key => $value) {
		$html .= '	<tr>
			              <td align="center">'. $no++ .'</td>
			              <td align="center">'. $value['smtr'] .'</td>
			              <td align="center">'. $value['kelas'] .'</td>
			              <td align="center">'. $value['kode_mk'] .'</td>
			              <td align="center">'. $value['nama_matkul'] .'</td>
			              <td align="center">'. $value['sks'] .'</td>
			              <td align="center">'. $value['nama_dosen'] .'</td>
			              <td align="center">'. $value['hari'] .'</td>
			              <td align="center">'. $value['dari_jam'] .' - '.$value['sampai_jam'] .'</td>
			          </tr>';
			          }
		$html .= '	</table>';
		$nama_file = $mahasiswa["nama_mahasiswa"].'_'.str_replace('/', '_', $ta['tahun']).'_'.$ta['semester'];
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output('KRS_'.$nama_file.'.pdf', 'D');
    }

}
