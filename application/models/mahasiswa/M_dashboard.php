<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
    
    public function get_akademik_sekarang()
    {
        $sql = "SELECT * FROM set_akademik a
                INNER JOIN tahun_ajaran b ON a.id_ta = b.id_ta";
        $query = $this->db->query($sql)->row_array();
        return $query;
    }

    public function get_detail_mhs($params)
    {
        $sql = "SELECT a.id_mahasiswa, a.id_dosen, a.npm,
				a.semester, a.nama_mahasiswa, a.alamat,
				b.nama_dosen, c.nama_prodi
				FROM mahasiswa a
				INNER JOIN dosen b ON a.id_dosen = b.id_dosen
				INNER JOIN prodi c ON a.id_prodi = c.id_prodi
				WHERE a.id_mahasiswa = ? ";
        $query = $this->db->query($sql, $params)->row_array();
        return $query;
    }

}
