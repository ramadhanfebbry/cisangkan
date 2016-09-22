<?php 
class M_genteng extends CI_Model{
 public function __construct(){
  parent::__construct();
 
 }
 
 public function get_id_barang() {
  $kode = 'GTG';
  $query = $this->db->query("SELECT MAX(id_barang) as max_id FROM tb_genteng"); 
  $row = $query->row_array();
  $max_id = $row['max_id']; 
  $max_id1 =(int) substr($max_id,5);
  $id_barang = $max_id1+1;
  $maxkode_barang= $kode.'-'.sprintf("%05s",$id_barang);
  return $maxkode_barang;
 }
 
 public function getAllgenteng($offset, $limit){
  $query = $this->db->query("SELECT * FROM tb_genteng ORDER BY id_barang DESC LIMIT $offset, $limit");
  return $query;
 }
 
 public function getAllgenteng_count(){
  $query = $this->db->query("
   SELECT * FROM tb_genteng
  ");
  return $query->num_rows();
 }
 
 public function inputgenteng($id_barang, $type, $unit, $warna, $berat, $warehouse){
  $query = $this->db->query("INSERT INTO tb_genteng VALUES('$id_barang', '$type', '$unit', '$warna', '$berat', '$warehouse')");

 }
                 
function cek($id_barang){
        $this->db->where('id_barang',$id_barang);
        $query=$this->db->get('tb_genteng');
        
        return $query;
	}
	
	// function update($id_barang,$jenis){
			// $this->db->where('id_barang',$id_barang);
			// $this->db->update('tb_genteng',$jenis);
		// }
 public function hapus_genteng($id_barang){
  $this->db->query("DELETE FROM tb_genteng WHERE id_barang = '$id_barang' ");
 }
  function cari($cari){
        $this->db->like('id_barang',$cari);
		$this->db->or_like("type",$cari);
		$this->db->or_like("warna",$cari);
		$this->db->or_like("berat",$cari);
		$this->db->or_like("warehouse",$cari);
		
        return $this->db->get('tb_genteng');
    }
}



	