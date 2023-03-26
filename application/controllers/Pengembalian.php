<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// controller peminjaman
class Pengembalian extends CI_Controller
{
    // autentication user login
    function __construct()
    {
        //validasi if the user is not login
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        }
        //load model 
        $this->load->model(array('Mod_member', 'Mod_buku', 'Mod_pengembalian', 'Mod_peminjaman'));
    }

    //main function
    function index()
    {

        // GET function from member model
        $data['member'] = $this->Mod_member->getMember();
        $data['buku'] = $this->Mod_buku->getBuku();
        $data['peminjaman'] = $this->Mod_peminjaman->getPengembalian();
        // if login admin
        if ($this->session->userdata('access') == 'Admin') {
            //view page transaksi/peminjaman
            $this->load->view('transaksi/pengembalian', $data);
        }
        // forbidden access
        else {
            $this->load->view('errors/403');
        }
    }

    //function to search member
    // public function search_member()
    // {
    //     $kode_member = $this->input->post('kode_member');
    //     $search = $this->Mod_member->cekMember($kode_member);
    //     //jika ada data member
    //     if ($search->num_rows() > 0) {
    //         $dMember = $search->row_array();
    //         echo $dMember['nama'];
    //     }
    // }

    // function to search transaksi
    public function search_transaksi()
    {
        $kode_transaksi = $this->input->post('kode_transaksi');

        $search = $this->Mod_peminjaman->cekTransaksi($kode_transaksi);
        //if there is data member
        if ($search->num_rows() > 0) {
            $dTransaksi = $search->row_array();
            $data = array(
                'tgl_pinjam' =>  $dTransaksi['tgl_pinjam'],
                'tgl_kembali' =>  $dTransaksi['tgl_kembali'],
                'kode_member' =>  $dTransaksi['kode_member'],
            );
            //view data
            echo json_encode($data);
        }
    }

    // function to save pengembalian
    public function save()
    {

        $save = array(
            'kode_transaksi'     => $this->input->post('kode_transaksi'),
            'tgl_kembali' => date('Y-m-d')
        );
        $this->Mod_pengembalian->savePengembalian($save);

        //update status peminjaman dari N menjadi Y
        $kode_transaksi = $this->input->post('kode_transaksi');
        $data = array(
            'status' => "Y"
        );

        $this->Mod_pengembalian->updateStatus($kode_transaksi, $data);

        // set alert success add data
        $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Berhasil!</strong> Data Berhasil Ditambahkan
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>');
        // to index of controller
        redirect('pengembalian');
    }
}
