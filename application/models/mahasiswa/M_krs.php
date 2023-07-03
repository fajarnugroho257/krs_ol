<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_krs extends CI_Model
{
    public function get_matkul_by_id_mahasiswa($params)
    {
        $sql = "SELECT c.id_matkul'm_id_matkul', c.id_dosen, d.nama_dosen, c.id_prodi, c.sks,
                c.nama_matkul, c.semester, c.kelas, c.kode_mk, c.hari, c.dari_jam, c.sampai_jam, 
                res.id_matkul'mah_id_matkul', res.id_mahasiswa, res.status, res.id_list_krs, res.id_matkul
                FROM mata_kuliah c
                INNER JOIN dosen d ON c.id_dosen = d.id_dosen
                LEFT JOIN 
                (
                    SELECT a.id_krs, a.id_mahasiswa, a.status,
                    b.id_list_krs,b.id_matkul
                    FROM krs a
                    INNER JOIN list_krs b ON a.id_krs = b.id_krs
                    INNER JOIN mahasiswa e ON a.id_mahasiswa = e.id_mahasiswa
                    WHERE a.id_mahasiswa = ?
                    AND a.id_ta = ?
                ) res ON res.id_matkul = c.id_matkul
                WHERE c.semester = ? 
                AND c.id_prodi = ? ";
        $query = $this->db->query($sql, $params)->result_array();
        return $query;
    }

    public function get_detail_krs_by_id_mahasiswa($params)
    {
        $sql = "SELECT * FROM krs a
                WHERE a.id_mahasiswa = ? 
                AND a.id_ta = ?
                AND a.semester = ? ";
        $query = $this->db->query($sql, $params)->row_array();
        return $query;
    }

    public function get_detail_mahasiswa_by_id_mahasiswa($params)
    {
        $sql = "SELECT a.*, b.nama_dosen FROM mahasiswa a
                INNER JOIN dosen b ON a.id_dosen = b.id_dosen
                WHERE a.id_mahasiswa = ? ";
        $query = $this->db->query($sql, $params)->row_array();
        return $query;
    }

    public function insert($params)
    {
        $this->db->insert('krs', $params);
        return $this->db->insert_id();
    }

    // public function update($params)
    // {
    //     $this->db->where('id_dosen', $params['id_dosen']);
    //     return $this->db->update('dosen', $params);
    // }

    public function update_krs($params)
    {
        $this->db->where('id_krs', $params['id_krs']);
        return $this->db->update('krs', $params);
    }

    public function delete($params)
    {
        $this->db->where('id_krs', $params['id_krs']);
        return $this->db->delete('list_krs', $params);
    }

    
}
