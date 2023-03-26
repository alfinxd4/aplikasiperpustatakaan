<?php
defined('BASEPATH') or exit('No direct script access allowed');
// model buku
class Mod_buku extends CI_Model
{
    // function get total buku 
    public function getTotalRows()
    {
        return $this->db->get('buku')->num_rows();
    }

    //  function to get buku from db
    public function getBuku()
    {
        // connect db tb mahasiswa
        $result = $this->db->get('buku');
        return $result;
    }

    //  function check kode buku based on sequence
    public function cekKodeBuku()
    {
        $query = $this->db->query("SELECT MAX(kode_buku) as kode_buku from buku");
        $hasil = $query->row();
        return $hasil->kode_buku;
    }

    // function check buku based on kode buku
    public function cekBuku($data)
    {
        $this->db->where("kode_buku", $data);
        return $this->db->get("buku");
    }

    // add data by form input 
    public function add($data)
    {

        $data['kode_buku'] = $data['kode_buku'];
        $data['judul'] = $data['judul'];
        $data['pengarang'] = $data['pengarang'];
        $data['deskripsi'] = $data['deskripsi'];
        $data['foto_buku'] = $data['foto_buku'];

        $this->db->insert('buku', $data);
    }


    // delete data by id
    public function delete($data)
    {
        $this->db->where('kode_buku', $data);
        $this->db->delete('buku');
    }


    // update data to db
    public function update($data)
    {
        $this->db->where('kode_buku', $data['kode_buku']);
        $this->db->update('buku', $data);
    }
}
