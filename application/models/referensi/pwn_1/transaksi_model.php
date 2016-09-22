<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Transaksi_model extends MY_Model
{
    public $default_values = array(
        'no_anggota' => '',
        'keterangan'  => '',
        'judul_buku'  => '',
    );

    public function simpan_sementara($data_transaksi)
    {
        return $this->db->insert('tb_transaksi',$data_transaksi);
    }

    public function reset_transaksi()
    {
        $data_transaksi = array(
            'no_anggota' => '',
            'keterangan'  => '',
            'judul_buku'  => '',
        );
    }

    public function get_buku($judul)
    {
        $this->db->select('id_buku');
        $this->db->from('tb_buku');
        $this->db->where("(judul_buku LIKE '%$judul%')");

        $query = $this->db->get();
            
        if ($query->num_rows() > 0){
            foreach($query->result() as $row){
                $data[] = $row;
            }
        }
        return $data;

    }
}