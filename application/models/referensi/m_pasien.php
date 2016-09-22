<?php 

class M_pasien extends CI_Model{
 
 public function __construct(){
  parent::__construct();
 
 }
 public function get_id_pasien($id_kategori) {
	if($id_kategori=='1'){
		$kode = 'B';
		$query = $this->db->query("SELECT MAX(id_pasien) as max_id FROM tb_pasien WHERE id_pasien LIKE \"%B%\"");}
	else{	
		$kode = 'U';
		$query = $this->db->query("SELECT MAX(id_pasien) as max_id FROM tb_pasien WHERE id_pasien LIKE \"%U%\"");
 }if ($query->num_rows()>0){
		$row = $query->row_array();
		$max_id = $row['max_id']; 
		$max_id1 =(int) substr($max_id,6);
		$id_pasien = $max_id1+1;
		$maxkode_pasien= $kode.'-'.sprintf("%06s",$id_pasien);
		}elseif ($id_kategori=='1'){
		$maxkode_pasien= '';
	}elseif ($id_kategori=='2'){
		$maxkode_pasien= '';
	}
	return $maxkode_pasien;
 }
 
 public function get_pasien()     
    { 
        $this->db->select('id_kategori');
        $this->db->select('nm_kategori');
        $this->db->from('tb_kategori_pendaftaran');
        $query = $this->db->get();
        $result = $query->result();

        //array to store department id & department name
        $id_kategori = array('-Pilih Kategori Pasien-');
        $nm_kategori = array('-Pilih Kategori Pasien-');

        for ($i = 0; $i < count($result); $i++)
        {
            array_push($id_kategori, $result[$i]->id_kategori);
            array_push($nm_kategori, $result[$i]->nm_kategori);
        }
        return $kategori_result = array_combine($id_kategori, $nm_kategori);
    }

 public function getAllPasien(){
    $query = $this->db->query(
        "SELECT *
        FROM tb_pasien
        JOIN tb_kategori_pendaftaran ON tb_kategori_pendaftaran.id_kategori=tb_pasien.id_kategori
        ORDER BY id_pasien asc ");
    return $query;
}
 
 public function getAllPasien_count(){
  $query = $this->db->query("SELECT * FROM tb_pasien");
  return $query->num_rows();
 }
 

                 
public function cek($id_pasien){
		$this->db->select('*');
		$this->db->from('tb_pasien');
        $this->db->where('id_pasien',$id_pasien);
		//$this->db->join('tb_kategori_pendaftaran','tb_pasien.id_kategori = tb_kategori_pendaftaran.id_kategori',$id_pasien);
        $query=$this->db->get();      
        return $query;
	}
	
public function update($id_pasien,$jenis){
        $this->db->where('id_pasien',$id_pasien);
		//$this->db->join('tb_kategori_pendaftaran','tb_pasien.id_kategori = tb_kategori_pendaftaran.id_kategori',$id_pasien);
        $this->db->update('tb_pasien',$jenis);
    }

public function hapus_pasien($id_pasien){
  $this->db->query("DELETE FROM tb_pasien WHERE id_pasien = '$id_pasien' ");
 }

public function cari($cari){
$this->db->select('*');
$this->db->from('tb_pasien');
$this->db->like('tb_pasien.id_pasien',$cari);
$this->db->or_like('tb_pasien.nm_pasien',$cari);
$this->db->or_like('tb_kategori_pendaftaran.id_kategori',$cari);
$this->db->or_like('tb_kategori_pendaftaran.nm_kategori',$cari);
$this->db->join('tb_kategori_pendaftaran','tb_pasien.id_kategori = tb_kategori_pendaftaran.id_kategori');
$query = $this->db->get();
return $query;
}
}