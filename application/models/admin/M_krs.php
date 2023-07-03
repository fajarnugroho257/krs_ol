<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_krs extends CI_Model
{
    
    public function get_akademik_sekarang()
    {
        $sql = "SELECT * FROM set_akademik a
                INNER JOIN tahun_ajaran b ON a.id_ta = b.id_ta";
        $query = $this->db->query($sql)->row_array();
        return $query;
    }

    public function get_all_data_krs($params)
    {
        $sql = "SELECT a.*, b.nama_mahasiswa, b.npm,b.semester'mhs_smtr',
                b.jk, b.id_dosen, b.id_prodi, c.nama_dosen, c.nip,
                d.nama_prodi
                FROM krs a 
                INNER JOIN mahasiswa b ON a.id_mahasiswa = b.id_mahasiswa
                INNER JOIN dosen c ON b.id_dosen = c.id_dosen
                INNER JOIN prodi d ON b.id_prodi = d.id_prodi
                WHERE a.id_ta = ?
                AND a.semester = ?
                LIMIT ?, ?";
        $query = $this->db->query($sql, $params)->result_array();
        return $query;
    }

    public function get_total_data()
    {
        $sql = "SELECT COUNT(*)'total'
                FROM krs a 
                INNER JOIN mahasiswa b ON a.id_mahasiswa = b.id_mahasiswa
                INNER JOIN dosen c ON b.id_dosen = c.id_dosen
                INNER JOIN prodi d ON b.id_prodi = d.id_prodi";
        $query = $this->db->query($sql)->row_array();
        return $query['total'];
    }

    
}
