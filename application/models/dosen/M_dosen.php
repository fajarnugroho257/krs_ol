<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dosen extends CI_Model
{
    public function get_all_data_mahasiswa($params)
    {
        $sql = "SELECT a.*, b.nama_mahasiswa, b.jk, b.nama_mahasiswa, b.npm, c.nama_prodi
				FROM krs a
				INNER JOIN mahasiswa b ON a.id_mahasiswa = b.id_mahasiswa
				INNER JOIN prodi c ON b.id_prodi = c.id_prodi
				WHERE b.id_dosen = ?
				AND a.status = ?
                AND a.id_ta = ?
                AND a.semester = ?
                LIMIT ?,?";
        $query = $this->db->query($sql, $params)->result_array();
        // 
        foreach ($query as $key => $value) {
        	$query[$key]['list_krs'] = $this->get_list_krs_by_id_krs($value['id_krs']);
        }
        return $query;
    }

    public function get_total_data($params)
    {
    	$sql = "SELECT COUNT(*)'total'
				FROM krs a
				INNER JOIN mahasiswa b ON a.id_mahasiswa = b.id_mahasiswa
				INNER JOIN prodi c ON b.id_prodi = c.id_prodi
				WHERE b.id_dosen = ?
				AND a.status = 'waiting'";
		$query = $this->db->query($sql, $params)->row_array();
		return $query['total'];
    }

    public function get_list_krs_by_id_krs($id_krs)
    {
    	$sql = "SELECT a.id_list_krs,a.id_krs,a.id_matkul,
				b.nama_matkul, b.semester
				FROM list_krs a
				INNER JOIN mata_kuliah b ON a.id_matkul = b.id_matkul
				WHERE a.id_krs = '".$id_krs."'";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }

    public function update_status_krs($params)
    {
        $this->db->where('id_krs', $params['id_krs']);
        return $this->db->update('krs', $params);
    }

    public function get_akademik_sekarang()
    {
        $sql = "SELECT * FROM set_akademik a
                INNER JOIN tahun_ajaran b ON a.id_ta = b.id_ta";
        $query = $this->db->query($sql)->row_array();
        return $query;
    }
    
}
