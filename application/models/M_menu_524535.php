<?php

class M_menu_524535 extends CI_Model
{
    public function input_data($data)
    {
        $this->db->insert('user_menu_524535', $data);
    }
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function edit_menu($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user_menu_524535', $data);
        return TRUE;
    }
    public function edit_submenu($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu_524535', $data);
        return TRUE;
    }
    public function getSubmenu()
    {
        $query = "SELECT `user_sub_menu_524535`.*, `user_menu_524535`.`menu`
            FROM `user_sub_menu_524535` JOIN `user_menu_524535`
            ON `user_sub_menu_524535`.`menu_id` = `user_menu_524535`.`id`
        ";
        return $this->db->query($query)->result_array();
    }
}
