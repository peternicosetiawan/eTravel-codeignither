<?php

class M_user_524535 extends CI_Model
{
    public function get_kode_usr()
    {
        $kode = "USR";
        $query = "SELECT max(id_user) as kode_auto FROM tb_user_524535";
        $data = $this->db->query($query)->row_array();
        $max_kode = $data['kode_auto'];
        $max_kode2 = (int) substr($max_kode, 3, 3);
        $kodecount = $max_kode2 + 1;
        $kode_auto = $kode . sprintf('%03s', $kodecount);

        return $kode_auto;
    }
}
