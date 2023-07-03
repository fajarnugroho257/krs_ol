<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_mata_kuliah extends CI_Model
{

    public function get_all_data_matkul($params)
    {
        $sql = "SELECT * 
                FROM mata_kuliah a
                INNER JOIN dosen b ON a.id_dosen = b.id_dosen
                INNER JOIN prodi c ON a.id_prodi = c.id_prodi
                ORDER BY a.nama_matkul ASC
                LIMIT ?,?";
        $query = $this->db->query($sql, $params)->result_array();
        return $query;
    }

    public function get_total_data()
    {
        $sql = "SELECT COUNT(*)'total' 
                FROM mata_kuliah a
                INNER JOIN dosen b ON a.id_dosen = b.id_dosen
                INNER JOIN prodi c ON a.id_prodi = c.id_prodi";
        $query = $this->db->query($sql)->row_array();
        return $query['total'];
    }
    
    public function get_detail_matkul($params)
    {
        $sql = "SELECT * 
                FROM mata_kuliah a
                WHERE a.id_matkul = ? ";
        $query = $this->db->query($sql, $params)->row_array();
        return $query;
    }

    public function get_all_dosen()
    {
        $sql = "SELECT * FROM dosen;";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }
    
    public function get_all_prodi()
    {
        $sql = "SELECT * FROM prodi;";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }

    public function get_akademik_sekarang()
    {
        $sql = "SELECT * FROM set_akademik a
                INNER JOIN tahun_ajaran b ON a.id_ta = b.id_ta";
        $query = $this->db->query($sql)->row_array();
        return $query;
    }

    public function insert($params)
    {
        return $this->db->insert('mata_kuliah', $params);
    }

    public function update($params)
    {
        $this->db->where('id_matkul', $params['id_matkul']);
        return $this->db->update('mata_kuliah', $params);
    }

    public function delete($params)
    {
        $this->db->where('id_matkul', $params['id_matkul']);
        return $this->db->delete('mata_kuliah', $params);
    }
}
