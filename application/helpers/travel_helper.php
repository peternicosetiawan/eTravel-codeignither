<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth_524535');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $menu = trim($menu, '_524535');

        $queryMenu = $ci->db->get_where('user_menu_524535', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu_524535', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth_524535/blocked');
        }
    }
}
function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu_524535');

    //$result = $ci->db->get_where('user_access_menu', [
    //    'role_id' => $role_id,
    //    'menu_id' => $menu_id
    //]);

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
