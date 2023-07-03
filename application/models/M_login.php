<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{

    public function cek_username($username)
    {
        $sql = "SELECT * FROM user a 
                WHERE a.username = ? ";
        $query = $this->db->query($sql, $username)->row_array();
        return $query;
    }

    public function get_password($username)
    {
        // cari dari mahasiswa
        $sql = "SELECT a.password FROM user a 
                WHERE a.username = ? ";
        $query = $this->db->query($sql, $username)->row_array();
        return $query['password'];
    }

    public function userdata($params)
    {   
        if ($params[1] == 'mahasiswa') {
            $sql = "SELECT * FROM user a
                    INNER JOIN mahasiswa b ON a.username = b.npm 
                    WHERE b.npm = '".$params['0']."' ";
            $query = $this->db->query($sql)->row_array();
            return $query;
        } elseif ($params[1] == 'dosen') {
            $sql = "SELECT * FROM user a
                    INNER JOIN dosen b ON a.username = b.nip 
                    WHERE b.nip = '".$params['0']."' ";
            $query = $this->db->query($sql)->row_array();
            return $query;
        } elseif ($params[1] == 'admin') {
             $sql = "SELECT * FROM user a
                    WHERE a.username = '".$params['0']."' ";
            $query = $this->db->query($sql)->row_array();
            return $query;
        }
        
    }
}
