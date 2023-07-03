<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_cetak extends CI_Model
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

    public function get_result_krs($params)
    {
        $sql = "SELECT e.semester'smtr', a.*, b.id_list_krs,b.id_matkul,
                c.*, d.nama_dosen
                FROM krs a
                INNER JOIN list_krs b ON a.id_krs = b.id_krs
                INNER JOIN mata_kuliah c ON b.id_matkul = c.id_matkul
                INNER JOIN dosen d ON c.id_dosen = d.id_dosen
                INNER JOIN mahasiswa e ON a.id_mahasiswa = e.id_mahasiswa
                WHERE a.id_mahasiswa = ?
                AND a.id_ta = ?
                AND a.semester = ?
                AND a.status = 'approve'";
        $query = $this->db->query($sql, $params)->result_array();
        return $query;
    }

}
