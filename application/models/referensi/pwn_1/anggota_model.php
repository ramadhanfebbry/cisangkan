<?php
class Anggota_model extends MY_Model
{
    protected $_per_page = 5;

    public function cari($offset)
    {
        $this->get_real_offset($offset);
        $kata_kunci = $this->input->get('kata_kunci', true);
        $id = get_nomor_pengguna($kata_kunci);

        return $this->db->where("(id_anggota = '$id' OR nama LIKE '%$kata_kunci%')")
                        ->limit($this->_per_page, $this->_offset)
                        ->order_by('id_anggota', 'ASC')
                        ->get($this->_tabel)
                        ->result();
    }

    public function cari_num_rows()
    {
        $kata_kunci = $this->input->get('kata_kunci', true);
        $id = get_nomor_pengguna($kata_kunci);

        return $this->db->where("(id_anggota = '$id' OR nama LIKE '%$kata_kunci%')")
                        ->order_by('id_anggota', 'ASC')
                        ->get($this->_tabel)
                        ->num_rows();
    }

    public function delete($id_anggota)
    {
        $this->db->where('id_anggota',$id_anggota);
        return $this->db->delete('tb_anggota');
    }
}