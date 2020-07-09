<?php

class M_fee_524535 extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('destination_524535');
    }
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function input_data($data)
    {
        $this->db->insert('destination_524535', $data);
    }
    public function edit_data($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('destination_524535', $data);
        return TRUE;
    }
}
