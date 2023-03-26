<?php
defined('BASEPATH') or exit('No direct script access allowed');
// mahasiswa model
class Mod_peminjaman extends CI_Model
{

    function getTotalRows()
    {
        return $this->db->query("SELECT * FROM peminjaman WHERE status='N' ")->num_rows();
    }

    //  function to get buku from db
    public function getPeminjaman()
    {
        // connect db tb peminjaman
        $result = $this->db->get('peminjaman');
        return $result;
    }

    //  function to get buku from db
    public function getPengembalian()
    {
        $query = $this->db->query("SELECT * FROM peminjaman WHERE status='N' ");
        return $query;
    }


    // function to make format numbering kode transaksi
    function AutoNumbering()
    {
        $today = date('Ymd');

        $data = $this->db->query("SELECT MAX(kode_transaksi) AS last FROM peminjaman")->row_array();

        $lastNoFaktur = $data['last'];

        $lastNoUrut   = substr($lastNoFaktur, 8, 3);

        $nextNoUrut   =  (int) $lastNoUrut + (int) 1;

        $nextNoTransaksi = $today . sprintf('%03s', $nextNoUrut);

        return $nextNoTransaksi;
    }


    // function check transaksi based on kode transaksi
    public function cekTransaksi($data)
    {
        $this->db->where("kode_transaksi", $data);
        return $this->db->get("peminjaman");
    }

    // function add
    public function addTransaksi($data)
    {

        $data['kode_transaksi'] = $data['kode_transaksi'];
        $data['tgl_pinjam'] = $data['tgl_pinjam'];
        $data['tgl_kembali'] = $data['tgl_kembali'];
        $data['kode_member'] = $data['kode_member'];
        $data['status'] = $data['status'];

        $query = $this->db->insert('peminjaman', $data);
    }
}
