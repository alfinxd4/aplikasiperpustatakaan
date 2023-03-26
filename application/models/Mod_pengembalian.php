<?php
defined('BASEPATH') or exit('No direct script access allowed');
// mahasiswa model
class Mod_pengembalian extends CI_Model
{

    function getTotalRows()
    {
        return $this->db->get('pengembalian')->num_rows();
    }

    public function savePengembalian($data)
    {
        $this->db->insert('pengembalian', $data);
    }


    public function updateStatus($kode_transaksi, $data)
    {
        $this->db->where("kode_transaksi", $kode_transaksi);
        $this->db->update('peminjaman', $data);
    }
}
