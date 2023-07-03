<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dosen extends CI_Model
{
    public function get_all_data_dosen($params)
    {
        $sql = "SELECT * FROM dosen a
                LEFT JOIN user b ON a.id_dosen = b.id_pengguna AND role = 'dosen' AND a.nip = b.username
                LIMIT ?,?";
        $query = $this->db->query($sql, $params)->result_array();
        return $query;
    }

    public function get_detail_dosen($params)
    {
        $sql = "SELECT * FROM dosen a
                LEFT JOIN user b ON a.id_dosen = b.id_pengguna AND role = 'dosen'
                WHERE a.id_dosen = ? ";
        $query = $this->db->query($sql, $params)->row_array();
        return $query;
    }
    
    public function get_total_data()
    {
        $sql = "SELECT COUNT(*)'total' 
                FROM dosen a";
        $query = $this->db->query($sql)->row_array();
        return $query['total'];
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
        $this->db->insert('dosen', $params);
        return $this->db->insert_id();
    }

    public function insert_user($params)
    {
        return $this->db->insert('user', $params);
    }

    public function update($params)
    {
        $this->db->where('id_dosen', $params['id_dosen']);
        return $this->db->update('dosen', $params);
    }

    public function update_user($params)
    {
        $this->db->where('id_user', $params['id_user']);
        return $this->db->update('user', $params);
    }

    public function delete($params)
    {
        $this->db->where('id_dosen', $params['id_dosen']);
        return $this->db->delete('dosen', $params);
    }

    public function delete_user($params)
    {
        $this->db->where('id_user', $params['id_user']);
        return $this->db->delete('user', $params);
    }
    
}
