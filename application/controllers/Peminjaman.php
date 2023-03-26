<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// controller peminjaman
class Peminjaman extends CI_Controller
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
        $this->load->model(array('Mod_member', 'Mod_buku', 'Mod_peminjaman'));
    }

    //main function
    function index()
    {
        // set format date input
        $data['tglpinjam']  = date('Y-m-d');
        // set date peminjaman
        $data['tglkembali'] = date('Y-m-d', strtotime('+7 day', strtotime($data['tglpinjam'])));
        // set format kode_transaksi
        $data['autonumber'] = $this->Mod_peminjaman->AutoNumbering();

        // GET function from member model
        $data['member'] = $this->Mod_member->getMember();
        $data['buku'] = $this->Mod_buku->getBuku();
        // if login admin
        if ($this->session->userdata('access') == 'Admin') {
            //view page transaksi/peminjaman
            $this->load->view('transaksi/peminjaman', $data);
        }
        // forbidden access
        else {
            $this->load->view('errors/403');
        }
    }

    //function to search member
    public function search_member()
    {
        $kode_member = $this->input->post('kode_member');
        $search = $this->Mod_member->cekMember($kode_member);
        //jika ada data member
        if ($search->num_rows() > 0) {
            $dMember = $search->row_array();
            echo $dMember['nama'];
        }
    }

    //function to search member
    public function search_book()
    {
        $kode_buku = $this->input->post('kode_buku');
        $search = $this->Mod_buku->cekBuku($kode_buku);
        //if there is data member
        if ($search->num_rows() > 0) {
            $dBuku = $search->row_array();
            $data = array(
                'judul' =>  $dBuku['judul'],
                'pengarang' =>  $dBuku['pengarang'],
            );
            //view data
            echo json_encode($data);
        }
    }

    // function add
    public function add()
    {
        $data['kode_transaksi'] = $this->input->post('kode_transaksi');
        $data['tgl_pinjam'] = $this->input->post('tgl_pinjam');
        $data['tgl_kembali'] = $this->input->post('tgl_kembali');
        $data['kode_member'] = $this->input->post('kode_member');
        $data['status'] = $this->input->post('status');
        // load model
        $this->Mod_peminjaman->addTransaksi($data);
        // set alert success add data
        $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> Data Berhasil Ditambahkan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        // to index of controller
        redirect('peminjaman');
    }
}
