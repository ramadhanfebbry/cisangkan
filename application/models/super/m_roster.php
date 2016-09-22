<?php 
class M_roster extends CI_Model{
 public function __construct(){
  parent::__construct();
 
 }
 
 public function get_id_barang() {
  $kode = 'R';
  $query = $this->db->query("SELECT MAX(id_barang) as max_id FROM tb_roster"); 
  $row = $query->row_array();
  $max_id = $row['max_id']; 
  $max_id1 =(int) substr($max_id,6);
  $id_barang = $max_id1+1;
  $maxkode_barang= $kode.'-'.sprintf("%05s",$id_barang);
  return $maxkode_barang;
 }
 
 public function getAllroster($offset, $limit){
  $query = $this->db->query("SELECT * FROM tb_roster ORDER BY id_barang DESC LIMIT $offset, $limit");
  return $query;
 }
 
 public function getAllroster_count(){
  $query = $this->db->query("
   SELECT * FROM tb_roster
  ");
  return $query->num_rows();
 }
 
 public function inputroster($id_barang, $type, $berat, $warehouse){
  $query = $this->db->query("INSERT INTO tb_roster VALUES('$id_barang', '$type', '$berat', '$warehouse')");

 }
                 
function cek($id_barang){
        $this->db->where('id_barang',$id_barang);
        $query=$this->db->get('tb_roster');
        
        return $query;
	}
	
	// function update($id_barang,$jenis){
			// $this->db->where('id_barang',$id_barang);
			// $this->db->update('tb_roster',$jenis);
		// }
 public function hapus_roster($id_barang){
  $this->db->query("DELETE FROM tb_roster WHERE id_barang = '$id_barang' ");
 }
  function cari($cari){
        $this->db->like('id_barang',$cari);
		$this->db->or_like("type",$cari);
		$this->db->or_like("berat",$cari);
		$this->db->or_like("warehouse",$cari);
		
        return $this->db->get('tb_roster');
    }
}



	