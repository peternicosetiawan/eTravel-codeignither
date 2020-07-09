<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Admin_524535 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_chart_524535');
        $this->load->model('M_fee_524535');
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('tb_user_524535', ['email' => $this->session->userdata('email')])->row_array();
        //echo 'selamat datang ' . $data['user']['name'];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer');
    }
    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('tb_user_524535', ['email' => $this->session->userdata('email')])->row_array();
        //echo 'selamat datang ' . $data['user']['name'];

        $data['role'] = $this->db->get('tb_role_524535')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('template/footer');
    }
    public function roleaccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('tb_user_524535', ['email' => $this->session->userdata('email')])->row_array();
        //echo 'selamat datang ' . $data['user']['name'];

        $data['role'] = $this->db->get_where('tb_role_524535', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu_524535')->result_array();


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/roleaccess', $data);
        $this->load->view('template/footer');
    }
    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu_524535', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu_524535', $data);
        } else {
            $this->db->delete('user_access_menu_524535', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Chaged!</div>');
    }
    public function fee()
    {
        $data['title'] = 'Travel Fee';
        $data['user'] = $this->db->get_where('tb_user_524535', ['email' => $this->session->userdata('email')])->row_array();
        //echo 'selamat datang ' . $data['user']['name'];


        $data['fee'] = $this->M_fee_524535->tampil_data()->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/fee', $data);
        $this->load->view('template/footer');
    }
    public function inputDestination()
    {

        $this->form_validation->set_rules('destination', 'Destination', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');

        $destination      = $this->input->post('destination');
        $price            = $this->input->post('price');
        $data = array(
            'destination'   => $destination,
            'price'         => $price
        );

        $this->M_fee_524535->input_data($data, 'destination_524535');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h6><i class="fas fa-ban"></i><b> Success!</b></h6>
            Destination has Added!
            </div>');
        redirect('admin_524535/fee');
    }
    public function deleteDestination()
    {
        $id = $this->input->get('id');
        $where = array('id' => $id);
        $this->M_fee_524535->hapus_data($where, 'destination_524535');
    }
    function editDestination()
    {
        $id = $this->input->post('id');
        $data = array(
            'destination'  => $this->input->post('destination'),
            'price'        => $this->input->post('price'),
        );

        $this->M_fee_524535->edit_data($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h6><i class="fas fa-ban"></i><b> Success!</b></h6>
            Destination has Edited!
            </div>');
        redirect('admin_524535/fee');
    }
    public function reservationData()
    {
        $data['title'] = 'Reservation Data';
        $data['user'] = $this->db->get_where('tb_user_524535', ['email' => $this->session->userdata('email')])->row_array();
        //echo 'selamat datang ' . $data['user']['name'];

        $this->load->model('M_reservation_524535');
        //$data['reserv'] = $this->M_reservation_524535->tampil_data()->result_array();

        $data['destination'] = $this->db->get('reservation_524535')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/reservation', $data);
        $this->load->view('template/footer');
    }
    public function getExcel()
    {
        $data = $this->db->get('reservation_524535')->result();

        $filename = 'ADMIN RESERVATION ' . date('dmy') . '.xlsx';
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $styleArray = [
            'font' => [
                'bold' => true,
            ]
        ];

        $sheet->getStyle('A1:G1')->applyFromArray($styleArray);

        $sheet->setCellValue('A1', 'Id User');
        $sheet->setCellValue('B1', 'Reservation Id');
        $sheet->setCellValue('C1', 'Name');
        $sheet->setCellValue('D1', 'Address');
        $sheet->setCellValue('E1', 'Gender');
        $sheet->setCellValue('F1', 'Reservation For');
        $sheet->setCellValue('G1', 'No Tlp');
        $sheet->setCellValue('H1', 'Reservation Date');
        $sheet->setCellValue('I1', 'Destination');
        $sheet->setCellValue('J1', 'Price');

        $rowCount = 2;

        foreach ($data as $d) {
            $sheet->setCellValue('A' . $rowCount, $d->id_user);
            $sheet->setCellValue('B' . $rowCount, $d->id_reservation);
            $sheet->setCellValue('C' . $rowCount, $d->name);
            $sheet->setCellValue('D' . $rowCount, $d->address);
            $sheet->setCellValue('E' . $rowCount, $d->sex);
            $sheet->setCellValue('F' . $rowCount, $d->birth_date);
            $sheet->setCellValue('G' . $rowCount, $d->no_tlp);
            $sheet->setCellValue('H' . $rowCount, $d->reservation_date);
            $sheet->setCellValue('I' . $rowCount, $d->destination);
            $sheet->setCellValue('J' . $rowCount, $d->price);

            $rowCount++;
        }

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        $writer->save("php://output");
    }

    public  function getChart()
    {
        $destination = array();
        $val = array();
        $data['title'] = 'Reservation Data';
        $data['user'] = $this->db->get_where('tb_user_524535', ['email' => $this->session->userdata('email')])->row_array();

        $year = $this->input->post('year');
        $month =  $this->input->post('month');

        $d = $year . '-' . $month;

        $data['date'] = $this->M_chart_524535->fetch_year($d)->result_array();
        $result = $this->db->select('destination')->get('destination_524535')->result();

        foreach ($result as $r) {
            array_push($destination, $r->destination);

            $out = $this->M_chart_524535->getVal($d, $r->destination)->result();

            foreach ($out as $o) {
                array_push($val, $o->val);
            }
        }

        array_push($val, 10);
        array_push($val, 15);
        array_push($val, 20);
        // foreach ($result as $out) {
        // $data['val'] = $this->M_chart_524535->getVal($d, 'Bandung')->row_array();
        // }

        $data['destination'] = $destination;
        $data['val'] = $val;
        $data['periode'] = $d;
        //echo json_encode($data);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/chart', $data);
        $this->load->view('template/footer');
    }
}
