<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_524535 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_menu_524535');
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('tb_user_524535', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu_524535')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('template/footer');
    }
    public function addMenu()
    {

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h6><i class="fas fa-ban"></i><b> Sorry!</b></h6>
            Menu field is required!
            </div>');
            redirect('menu_524535');
        } else {
            $menu = $this->input->post('menu');

            $data = array(
                'menu'        => $menu,
            );
            $this->M_menu_524535->input_data($data, 'user_menu_524535');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h6><i class="fas fa-ban"></i><b> Success!</b></h6>
            Menu has Added!
            </div>');
            redirect('menu_524535');
        }
    }
    public function delete()
    {
        $id = $this->input->get('id');
        $where = array('id' => $id);
        $this->M_menu_524535->hapus_data($where, 'user_menu_524535');
    }
    function edit()
    {
        $id = $this->input->post('id');
        $data = array(
            'menu'  => $this->input->post('menu')
        );
        $this->M_menu_524535->edit_menu($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h6><i class="fas fa-ban"></i><b> Success!</b></h6>
            Menu has Edited!
            </div>');
        redirect('menu_524535');
    }
    public function submenu()
    {
        $data['title'] = 'SubMenu Management';
        $data['user'] = $this->db->get_where('tb_user_524535', ['email' => $this->session->userdata('email')])->row_array();

        $data['subMenu'] = $this->M_menu_524535->getSubmenu();
        $data['menu'] = $this->db->get('user_menu_524535')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu_524535', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h6><i class="fas fa-ban"></i><b> Success!</b></h6>
            SubMenu has Added!
            </div>');
            redirect('menu_524535/submenu');
        }
    }
    public function deleteSub()
    {
        $id = $this->input->get('id');
        $where = array('id' => $id);
        $this->M_menu_524535->hapus_data($where, 'user_sub_menu_524535');
    }
    function editSub()
    {
        $id = $this->input->post('id');
        $data = array(
            'title'  => $this->input->post('title'),
            'menu_id'  => $this->input->post('menu_id'),
            'url'  => $this->input->post('url'),
            'icon'  => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active')
        );
        $this->M_menu_524535->edit_submenu($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h6><i class="fas fa-ban"></i><b> Success!</b></h6>
            Menu has Edited!
            </div>');
        redirect('menu_524535/submenu');
    }
}
