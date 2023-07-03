<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{

    public function get_all_data_tahun_ajaran()
    {
        $sql = "SELECT * 
                FROM tahun_ajaran a";
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

    public function update($params)
    {
        $this->db->where('id_akademik', $params['id_akademik']);
        return $this->db->update('set_akademik', $params);
    }

}
