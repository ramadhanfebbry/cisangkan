<?php 
class M_kendaraan extends CI_Model{
 public function __construct(){
  parent::__construct();
 
 }
 
 public function get_id_kendaraan() {
  $kode = 'Ac';
  $query = $this->db->query("SELECT MAX(id_kendaraan) as max_id FROM tb_kendaraan"); 
  $row = $query->row_array();
  $max_id = $row['max_id']; 
  $max_id1 =(int) substr($max_id,3);
   $id_kendaraan= $max_id1+1;
  $maxkode_kendaraan= $kode.''.sprintf("%03s",$id_kendaraan);
  return $maxkode_kendaraan;
 }
 
 public function getAllkendaraan($offset, $limit){
  $query = $this->db->query("SELECT * FROM tb_kendaraan ORDER BY id_kendaraan DESC LIMIT $offset, $limit");
  return $query;
 }
 
 public function getAllkendaraan_count(){
  $query = $this->db->query("
   SELECT * FROM tb_kendaraan
  ");
  return $query->num_rows();
 }
 
 public function inputkendaraan($id_kendaraan, $jenis_truk, $plat, $nama_awal_sopir, $nama_akhir_sopir, $no_tlp){
  $query = $this->db->query("INSERT INTO tb_kendaraan VALUES('$id_kendaraan', '$jenis_truk', '$plat', '$nama_awal_sopir', '$nama_akhir_sopir', '$no_tlp')");

 }
                 
function cek($id_kendaraan){
        $this->db->where('id_kendaraan',$id_kendaraan);
        $query=$this->db->get('tb_kendaraan');
        
        return $query;
	}
	
	function update($id_kendaraan,$jenis){
			$this->db->where('id_kendaraan',$id_kendaraan);
			$this->db->update('tb_kendaraan',$jenis);
		}
 public function hapus_kendaraan($id_kendaraan){
  $this->db->query("DELETE FROM tb_kendaraan WHERE id_kendaraan = '$id_kendaraan' ");
 }
  function cari($cari){
        $this->db->like('id_kendaraan',$cari);
		$this->db->or_like("nama_awal_sopir",$cari);
		$this->db->or_like("nama_akhir_sopir",$cari);
		$this->db->or_like("jenis_truk",$cari);
		$this->db->or_like("plat",$cari);
		
        return $this->db->get('tb_kendaraan');
    }


    function get_allKendaraan(){
      $this->db->select('id_kendaraan');
    $query = $this->db->get('tb_kendaraan');
    return $query->result();         

    }
}



	