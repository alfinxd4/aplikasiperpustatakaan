<?php
defined('BASEPATH') or exit('No direct script access allowed');

// controller dashboard
class Laporan extends CI_Controller
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
        $this->load->model(array('Mod_member', 'Mod_buku', 'Mod_laporan'));
    }


    function peminjaman()
    {
        $this->load->view('laporan/peminjaman');
    }

    function data_pinjam()
    {

        $tanggal1 = $this->input->post('tanggal1');
        $tanggal2 = $this->input->post('tanggal2');
        $data['laporan'] = $this->Mod_laporan->cariPinjaman($tanggal1, $tanggal2)->result();
        $this->load->view('laporan/data_pinjam', $data);
    }


    function pengembalian()
    {
        $this->load->view('laporan/pengembalian');
    }


    function data_pengembalian()
    {
        // $tanggal1 = '2018-04-19';
        // $tanggal2 = '2018-04-21';
        $tanggal1 = $this->input->post('tanggal1');
        $tanggal2 = $this->input->post('tanggal2');
        $data['laporan'] = $this->Mod_laporan->cariPengembalian($tanggal1, $tanggal2)->result();
        $this->load->view('laporan/data_pengembalian', $data);
    }
}
