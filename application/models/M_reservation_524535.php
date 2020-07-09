<?php

class M_reservation_524535 extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('reservation_524535');
    }
    public function input_data($data)
    {
        $this->db->insert('reservation_524535', $data);
    }
    public function get_kode()
    {
        $kode = "RSV";
        $query = "SELECT max(id_reservation) as kode_auto FROM reservation_524535";
        $data = $this->db->query($query)->row_array();
        $max_kode = $data['kode_auto'];
        $max_kode2 = (int) substr($max_kode, -4, 4);
        $kodecount = $max_kode2 + 1;
        $kode_auto = $kode . "-" . Date('dmy') . sprintf('%03s', $kodecount);

        return $kode_auto;
    }
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function edit_rsv($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('reservation_524535', $data);
        return TRUE;
    }
}
