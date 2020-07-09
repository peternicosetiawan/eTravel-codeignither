<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User_524535 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('tb_user_524535', ['email' => $this->session->userdata('email')])->row_array();
        //echo 'selamat datang ' . $data['user']['name'];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer');
    }
    public function pdf($id_reservation)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('tb_user_524535', ['email' => $this->session->userdata('email')])->row_array();

        //$data['res'] = $this->db->get_where('reservation_524535', ['id_reservation' => $id_reservation])->row_array();
        //echo phpversion();

        $data = $this->db->get_where('reservation_524535', ['id_reservation' => $id_reservation])->result_object();

        $data = array(
            'data' => $data
        );

        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [210, 100]]);
        //$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);
        //$data = array();
        $html = $this->load->view('tiket', $data, TRUE);
        $mpdf->WriteHTML($html);
        $mpdf->Output('.pdf', 'I');
    }

    public function reservation()
    {
        $data['title'] = 'Reservation';
        $data['user'] = $this->db->get_where('tb_user_524535', ['email' => $this->session->userdata('email')])->row_array();
        //echo 'selamat datang ' . $data['user']['name'];

        $this->load->model('M_reservation_524535');
        $id_user = $this->session->id_user;
        //$data['reserv'] = $this->M_reservation_524535->tampil_data()->result_array();
        $data['reserv'] = $this->db->get_where('reservation_524535', ['id_user' => $id_user])->result_array();
        $data['kode'] = $this->M_reservation_524535->get_kode();

        $data['destination'] = $this->db->get('destination_524535')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('user/reservation', $data);
        $this->load->view('template/footer');
    }
    public function inputReservation()
    {
        $id_user              = $this->session->id_user;
        $id_reservation       = $this->input->post('id_reservation');
        $name                 = $this->input->post('name');
        $address              = $this->input->post('address');
        $sex                  = $this->input->post('sex');
        $birth_date           = $this->input->post('birth_date');
        $no_tlp               = $this->input->post('no_tlp');
        $reservation_date     = date('Y-m-d');
        $destination          = $this->input->post('dst');
        $price                = $this->input->post('price');

        $data = array(
            'id_user'          => $id_user,
            'id_reservation'   => $id_reservation,
            'name'             => $name,
            'address'          => $address,
            'sex'              => $sex,
            'birth_date'       => $birth_date,
            'no_tlp'           => $no_tlp,
            'reservation_date' => $reservation_date,
            'destination'      => $destination,
            'price'            => $price
        );
        $this->load->model('M_reservation_524535');
        $this->M_reservation_524535->input_data($data, 'reservation_524535');
        redirect('user_524535/reservation');
    }
    public function deletersv()
    {
        $this->load->model('M_reservation_524535');
        $id = $this->input->get('id');
        $where = array('id' => $id);
        $this->M_reservation_524535->hapus_data($where, 'reservation_524535');
    }
    function edit()
    {
        $id = $this->input->post('id');
        $data = array(
            'id_reservation'  => $this->input->post('id_reservation'),
            'name'            => $this->input->post('name'),
            'address'         => $this->input->post('address'),
            'sex'             => $this->input->post('sex'),
            'birth_date'      => $this->input->post('birth_date'),
            'no_tlp'          => $this->input->post('no_tlp'),
        );
        $this->load->model('M_reservation_524535');
        $this->M_reservation_524535->edit_rsv($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h6><i class="fas fa-ban"></i><b> Success!</b></h6>
            Reservation has Edited!
            </div>');
        redirect('user_524535/reservation');
    }
}
