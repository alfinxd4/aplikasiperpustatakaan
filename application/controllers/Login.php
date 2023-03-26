<?php
// controller login
class Login extends CI_Controller
{
    function __construct()
    {
        // connect to login model
        parent::__construct();
        $this->load->model('Mod_login');
    }
    function index()
    {
        // view login page
        $this->load->view('formlogin');
    }

    // function autentication user 
    function auth()
    {
        // get value input form field usn and pass
        $username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);
        // get autentication admin
        $check = $this->Mod_login->auth($username, $password);
        if ($check->num_rows() > 0) {
            $data = $check->row_array();
            $this->session->set_userdata('masuk', TRUE);
            // access control 'Admin'
            if ($data['level'] == 'Admin') {
                $this->session->set_userdata('access', 'Admin');
                $this->session->set_userdata('name', $data['name']);
                // redirect to controller dashboard
                redirect('dashboard');
            }
            // access control 'Member'
            elseif ($data['level'] == 'Member') {
                $this->session->set_userdata('access', 'Member');
                $this->session->set_userdata('name', $data['name']);
                // redirect to controller dashboard

                redirect('dashboard');
            }
        } else {
            $url = base_url();
            echo $this->session->set_flashdata('msg', '*Username atau Password Salah');
            redirect($url);
        }
    }
    // function logout
    function logout()
    {
        $this->session->sess_destroy();
        $url = base_url('');
        redirect($url);
    }
}
