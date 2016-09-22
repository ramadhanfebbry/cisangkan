<?php 
class M_plv extends CI_Model{
 public function __construct(){
  parent::__construct();
 
 }
 
 public function get_id_plv() {
  $kode = 'PL';
  $query = $this->db->query("SELECT MAX(id_plv) as max_id FROM tb_plv"); 
  $row = $query->row_array();
  $max_id = $row['max_id']; 
  $max_id1 =(int) substr($max_id,5);
  $id_plv = $max_id1+1;
  $maxkode_plv= $kode.''.sprintf("%05s",$id_plv);
  return $maxkode_plv;
 }
 public function getAllplv($offset, $limit){
  $query = $this->db->query("SELECT * FROM tb_plv ORDER BY id_plv DESC LIMIT $offset, $limit");
  return $query;
 }
 
 public function getAllplv_count(){
  $query = $this->db->query("SELECT * FROM tb_plv ");
  return $query->num_rows();
 }   
 
public function inputplv($id_plv, $date_plv, $id_jrp, $id_kendaraan, $quantity_confirm, $delivery_remender){
  $query = $this->db->query("INSERT INTO tb_plv VALUES('$id_plv', '$date_plv', '$id_jrp', '$id_kendaraan', '$quantity_confirm', '$delivery_remender')");
 }
 
/*function cek($id_plv){
		$this->db->select('*');
		$this->db->from('tb_plv');
        $this->db->where('id_plv', $id_plv);
        
		$query=$this->db->get();
        
		if($query->num_rows() > 0){
			foreach($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}*/
	
	function cek($id_plv){
        $this->db->where('id_plv',$id_plv);
        $query=$this->db->get('tb_plv');
        
        return $query;
	}

 function update($id_plv,$jenis){
		$this->db->where('id_plv',$id_plv);
		$this->db->update('tb_plv',$jenis);
		}
		
  function cari($cari){
        $this->db->like('id_plv',$cari);
		$this->db->or_like("delivery_name",$cari);
		$this->db->or_like("delivery_city",$cari);
		
        return $this->db->get('tb_plv');
    }
	
}
?>


	