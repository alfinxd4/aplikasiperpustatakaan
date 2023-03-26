<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mod_laporan extends CI_Model
{

    function cariPinjaman($tanggal1, $tanggal2)
    {
        return $this->db->query("SELECT a.*,  
        CASE 
           WHEN a.status = 'N' THEN 'Dipinjam'
        ELSE 'Dikembalikan' 
        END AS status_pinjam
        FROM peminjaman a WHERE a.tgl_pinjam  BETWEEN '$tanggal1' AND '$tanggal2' GROUP BY a.kode_transaksi");
    }

    function cariPengembalian($tanggal1, $tanggal2)
    {
        return $this->db->query("SELECT *
        FROM pengembalian WHERE tgl_kembali BETWEEN '$tanggal1' AND '$tanggal2'
                                  GROUP BY kode_transaksi");
    }
}
