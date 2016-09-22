<?php 
class M_jrp extends CI_Model{
 public function __construct(){
  parent::__construct();
 
 }
 
 public function get_id_jrp() {
  $kode = 'Jrp';
  $query = $this->db->query("SELECT MAX(id_jrp) as max_id FROM tb_jrp"); 
  $row = $query->row_array();
  $max_id = $row['max_id']; 
  $max_id1 =(int) substr($max_id,5);
  $id_jrp = $max_id1+1;
  $maxkode_jrp= $kode.'-'.sprintf("%05s",$id_jrp).'-'.date(ymd);
  return $maxkode_jrp;
 }
 public function getAlljrp($offset, $limit){
  $query = $this->db->query("SELECT * FROM tb_jrp ORDER BY id_jrp DESC LIMIT $offset, $limit");
  return $query;
 }
 
 public function getAlljrp_count(){
  $query = $this->db->query("SELECT * FROM tb_jrp ");
  return $query->num_rows();
 }   
 
public function inputjrp($id_jrp, $ship_date, $sales_order, $delivery_name, $delivery_city, $delivery_address, $id_barang, $type, $warna, $quantity, $delivery_remender, $delivery_now, $tonase){
  $query = $this->db->query("INSERT INTO tb_jrp VALUES('$id_jrp', '$ship_date', '$sales_order', '$delivery_name', '$delivery_city', '$delivery_address', '$id_barang', '$type', '$warna', '$quantity', '$delivery_remender', '$delivery_now', '$tonase')");

 }
  function join_jrp($offset, $limit) {
	$this->db->select('*');
	$this->db->from('tb_jrp');
	$this->db->join('tb_genteng', 'tb_genteng.id_barang= tb_jrp');
    $this->db->limit($limit, $offset);
    $this->db->order_by('id_jrp','asc');
    return $this->db->get()->result();
}
  
 function get_all_barang($id_barang) {
   $this->db->like('id_barang',$id_barang);
   $query = $this->db->get('tb_genteng');
   return $query->result();     
 }
 
        
function cek($id_jrp){
        $this->db->where('id_jrp',$id_jrp);
        $query=$this->db->get('tb_jrp');
        
        return $query;
	}
	
function update($id_jrp,$jenis){
		$this->db->where('id_jrp',$id_jrp);
		$this->db->update('tb_jrp',$jenis);
	}
	
 public function hapus_jrp($id_jrp){
  $this->db->query("DELETE FROM tb_jrp WHERE id_jrp = '$id_jrp'");
 }
  function cari($cari){
        $this->db->like('id_jrp',$cari);
		$this->db->or_like("delivery_name",$cari);
		$this->db->or_like("delivery_city",$cari);
        return $this->db->get('tb_jrp');
    }
}
?>



	