<?php
defined('BASEPATH') or exit('No direct script access allowed');

// controller dashboard
class Dashboard extends CI_Controller
{
    // autentication user login
    function __construct()
    {
        parent::__construct();
        //validation if the user's not login
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        }
        //load model
        $this->load->model(array('Mod_member', 'Mod_buku', 'Mod_peminjaman', 'Mod_pengembalian'));
    }

    //function default
    function index()
    {
        //count total 
        $data['countmember'] = $this->Mod_member->getTotalRows('member');
        $data['countbuku'] = $this->Mod_buku->getTotalRows('buku');
        $data['countpeminjaman'] = $this->Mod_peminjaman->getTotalRows('peminjaman');
        $data['countpengembalian'] = $this->Mod_pengembalian->getTotalRows('pengembalian');

        // if login admin
        if ($this->session->userdata('access') == 'Admin') {
            // view dashboard page
            $this->load->view('dashboard/admin', $data);
        }
        // forbidden access
        else {
            // view dashboard page
            $this->load->view('dashboard/member', $data);
        }
    }
}
