<?php
defined('BASEPATH') or exit('No direct script access allowed');
// mahasiswa model
class Mod_member extends CI_Model
{

    // function to get total member
    public function getTotalRows()
    {
        return $this->db->get('member')->num_rows();
    }

    // function to get member from db
    public function getMember()
    {
        // connect db tb mahasiswa
        $result = $this->db->get('member');
        return $result;
    }

    
    // function to check member by kode member
    public function cekMember($data)
    {
        $this->db->where("kode_member", $data);
        return $this->db->get("member");
    }


    //  function check kode member based on sequence
    public function cekKodeMember()
    {
        $query = $this->db->query("SELECT MAX(kode_member) as kode_member from member");
        $hasil = $query->row();
        return $hasil->kode_member;
    }

    // function add
    public function add($data)
    {

        $data['kode_member'] = $data['kode_member'];
        $data['nama'] = $data['nama'];
        $data['ttl'] = $data['ttl'];
        $data['jk'] = $data['jk'];
        $data['alamat'] = $data['alamat'];
        $data['foto_member'] = $data['foto_member'];


        $query = $this->db->insert('member', $data);
    }


    // delete data by id
    public function delete($data)
    {
        $this->db->where('kode_member', $data);
        $this->db->delete('member');
    }


    // update data to db
    public function update($data)
    {
        $this->db->where('kode_member', $data['kode_member']);
        $this->db->update('member', $data);
    }
}
