<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_524535 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_user_524535');
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Login';
            $this->load->view('auth/login', $data);
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_user_524535', ['email' => $email])->row_array();

        if ($user) {
            //jika user aktif
            if ($user['is_active'] == 'active') {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'id_user' => $user['id_user']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin_524535');
                    } else {
                        redirect('user_524535');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h6><i class="fas fa-ban"></i><b> Sorry!</b></h6>
                    Wrong password!
                    </div>');
                    redirect('auth_524535');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h6><i class="fas fa-ban"></i><b> Sorry!</b></h6>
            Email has not been activated
            </div>');
                redirect('auth_524535');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h6><i class="fas fa-ban"></i><b> Sorry!</b></h6>
            Email is not registered
            </div>');
            redirect('auth_524535');
        }
    }
    public function register()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        $data['kode'] = $this->M_user_524535->get_kode_usr();

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Register';
            $this->load->view('auth/register', $data);
        } else {
            $data = [
                'id_user'   => $this->input->post('id_user', true),
                'name'      => htmlspecialchars($this->input->post('name', true)),
                'email'     => htmlspecialchars($this->input->post('email', true)),
                'image'     => 'default.jpg',
                'password'  => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'is_active' => 'active',
                'role_id'   => '2',
                'date_created' => time()
            ];
            $this->db->insert('tb_user_524535', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h6><i class="fas fa-check"></i><b> Congratulation!</b></h6>
            Your account has been created!
            </div>');
            redirect('auth_524535');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h6><i class="fas fa-check"></i><b> Succsess!</b></h6>
            You have been logout!
            </div>');
        redirect('auth_524535');
    }
    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
