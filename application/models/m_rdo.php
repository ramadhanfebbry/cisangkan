<?php 
class M_rdo extends CI_Model{
 public function __construct(){
  parent::__construct();
 
 }
 
 public function get_id_rdo() {
  $kode = 'RDO';
  $query = $this->db->query("SELECT MAX(id_rdo) as max_id FROM tb_rdo"); 
  $row = $query->row_array();
  $max_id = $row['max_id']; 
  $max_id1 =(int) substr($max_id,5);
  $id_rdo = $max_id1+1;
  $maxkode_rdo= $kode.''.sprintf("%05s",$id_rdo);
  return $maxkode_rdo;
 }
 public function getAllrdo(){
  $query = $this->db->query("SELECT * FROM tb_rdo ORDER BY id_rdo ");
  return $query;
 }
 
 public function getAllrdo_count(){
  $query = $this->db->query("SELECT * FROM tb_rdo");
  return $query->num_rows();
 }   
 
public function inputrdo($id_rdo, $date_rdo, $id_do){
  $query = $this->db->query("INSERT INTO tb_rdo VALUES('$id_rdo', '$date_rdo', '$id_do')");

 }
 
        
function cek($id_rdo){
        $this->db->where('id_rdo',$id_rdo);
        $query=$this->db->get('tb_rdo');
        
        return $query;
	}
	
function update($id_rdo,$jenis){
		$this->db->where('id_rdo',$id_rdo);
		$this->db->update('tb_rdo',$jenis);
	}
	
 public function hapus_rdo($id_rdo){
  $this->db->query("DELETE FROM tb_rdo WHERE id_rdo= '$id_rdo' ");
 }
 
  function cari($cari){
        $this->db->like('id_rdo',$cari);
        return $this->db->get('tb_rdo');
    }
}
?>



	