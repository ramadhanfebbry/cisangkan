<?php 
class M_dob extends CI_Model{
 public function __construct(){
  parent::__construct();
 
 }
 
 public function get_id_do() {
  $kode = 'DO';
  $query = $this->db->query("SELECT MAX(id_do) as max_id FROM tb_do"); 
  $row = $query->row_array();
  $max_id = $row['max_id']; 
  $max_id1 =(int) substr($max_id,5);
  $id_do = $max_id1+1;
  $maxkode_do= $kode.'-'.sprintf("%05s",$id_do);
  return $maxkode_do;
 }
 public function getAlldo($offset, $limit){
  $query = $this->db->query("SELECT * FROM tb_do ORDER BY id_do DESC LIMIT $offset, $limit");
  return $query;
 }
 
 public function getAlldo_count(){
  $query = $this->db->query("SELECT * FROM tb_do ");
  return $query->num_rows();
 }   
 
public function inputdo($id_do, $date_do, $id_plv){
  $query = $this->db->query("INSERT INTO tb_do VALUES('$id_do', '$date_do', '$id_plv')");

 }
 
function cek($id_do){
        $this->db->where('id_do',$id_do);
        $query=$this->db->get('tb_do');
        
        return $query;
	}
	
	function update($id_do,$jenis){
			$this->db->where('id_do',$id_do);
			$this->db->update('tb_do',$jenis);
		}
 
  function cari($cari){
        $this->db->like('id_do',$cari);
		$this->db->or_like("date_do",$cari);
		$this->db->or_like("id_plv",$cari);
		
        return $this->db->get('tb_do');
    }

  public function get_allplv() {
    $this->db->select('id_plv');
    $query = $this->db->get('tb_plv');
    return $query->result();         
  }

  public function get_alljrp() {
    $this->db->select('*');
    $query = $this->db->get('tb_jrp');
    return $query->result();         
  }
}
?>



	