<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_mahasiswa extends CI_Model
{
    public function get_all_data_mahasiswa($params)
    {
        $sql = "SELECT * FROM mahasiswa a
                LEFT JOIN user b ON a.id_mahasiswa = b.id_pengguna AND role = 'mahasiswa' AND a.npm = b.username
                LIMIT ?,?";
        $query = $this->db->query($sql, $params)->result_array();
        return $query;
    }

    public function get_detail_mahasiswa($params)
    {
        $sql = "SELECT * FROM mahasiswa a
                LEFT JOIN user b ON a.id_mahasiswa = b.id_pengguna AND role = 'mahasiswa'
                WHERE a.id_mahasiswa = ? ";
        $query = $this->db->query($sql, $params)->row_array();
        return $query;
    }
    
    public function get_total_data()
    {
        $sql = "SELECT COUNT(*)'total' 
                FROM mahasiswa a";
        $query = $this->db->query($sql)->row_array();
        return $query['total'];
    }

    public function get_all_data_prodi()
    {
        $sql = "SELECT * FROM prodi ";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }

    public function get_all_dosen($value='')
    {
        $sql = "SELECT * FROM dosen ";
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
        $this->db->insert('mahasiswa', $params);
        return $this->db->insert_id();
    }

    public function insert_user($params)
    {
        return $this->db->insert('user', $params);
    }

    public function update($params)
    {
        $this->db->where('id_mahasiswa', $params['id_mahasiswa']);
        return $this->db->update('mahasiswa', $params);
    }

    public function update_user($params)
    {
        $this->db->where('id_user', $params['id_user']);
        return $this->db->update('user', $params);
    }

    public function delete($params)
    {
        $this->db->where('id_mahasiswa', $params['id_mahasiswa']);
        return $this->db->delete('mahasiswa', $params);
    }

    public function delete_user($params)
    {
        $this->db->where('id_user', $params['id_user']);
        return $this->db->delete('user', $params);
    }
    
}
