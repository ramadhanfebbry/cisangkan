<?php 

class M_barang extends CI_Model{
 
 public function __construct(){
  parent::__construct();
 
 }
 public function get_id_barang($id_kategori) {
	if($id_kategori=='1'){
		$kode = 'GTG';
		$query = $this->db->query("SELECT MAX(id_barang) as max_id FROM tb_barang WHERE id_barang LIKE \"%GTG%\""); }
	 else{
		$kode = 'PB';
		$query = $this->db->query("SELECT MAX(id_barang) as max_id FROM tb_barang WHERE id_barang LIKE \"%PB%\"");
	 // }elseif($id_kategori=='3'){
		// $kode = 'CB';
		// $query = $this->db->query("SELECT MAX(id_barang) as max_id FROM tb_barang WHERE id_barang LIKE \"%CB%\"");
	 // }elseif($id_kategori=='4'){
		// $kode = 'R';
		// $query = $this->db->query("SELECT MAX(id_barang) as max_id FROM tb_barang WHERE id_barang LIKE \"%R%\"");
	 // }elseif($id_kategori=='5'){
		// $kode = 'CTP';
		// $query = $this->db->query("SELECT MAX(id_barang) as max_id FROM tb_barang WHERE id_barang LIKE \"%CTP%\"");
	 // }elseif($id_kategori=='6'){
		// $kode = 'KS';
		// $query = $this->db->query("SELECT MAX(id_barang) as max_id FROM tb_barang WHERE id_barang LIKE \"%KS%\"");
	 // }elseif($id_kategori=='7'){
		// $kode = 'BA';
		// $query = $this->db->query("SELECT MAX(id_barang) as max_id FROM tb_barang WHERE id_barang LIKE \"%BA%\"");
	 // }else{	
		// $kode = 'BB';
		// $query = $this->db->query("SELECT MAX(id_barang) as max_id FROM tb_barang WHERE id_barang LIKE \"%BB%\"");
 }if ($query->num_rows()>0){
		$row = $query->row_array();
		$max_id = $row['max_id']; 
		$max_id1 =(int) substr($max_id,5);
		$id_barang = $max_id1+1;
		$maxkode_barang= $kode.'-'.sprintf("%05s",$id_barang);
	}elseif ($id_kategori=='1'){
		$maxkode_barang= '';
	}elseif ($id_kategori=='2'){
		$maxkode_barang= '';
	// }elseif ($id_kategori=='3'){
		// $maxkode_barang= '';
	// }elseif ($id_kategori=='4'){
		// $maxkode_barang= '';
	// }elseif ($id_kategori=='5'){
		// $maxkode_barang= '';
	// }elseif ($id_kategori=='6'){
		// $maxkode_barang= '';
	// }elseif ($id_kategori=='7'){
		// $maxkode_barang= '';
	// }elseif ($id_kategori=='8'){
		// $maxkode_barang= '';
	 }
	return $maxkode_barang;
 }
 
 public function get_barang()     
    { 
        $this->db->select('id_kategori');
        $this->db->select('nm_kategori');
        $this->db->from('tb_kategori');
        $query = $this->db->get();
        $result = $query->result();

        //array to store department id & department name
        $id_kategori = array('-Pilih Kategori Barang-');
        $nm_kategori = array('-Pilih Kategori Barang-');

        for ($i = 0; $i < count($result); $i++)
        {
            array_push($id_kategori, $result[$i]->id_kategori);
            array_push($nm_kategori, $result[$i]->nm_kategori);
        }
        return $kategori_result = array_combine($id_kategori, $nm_kategori);
    }

 public function getAllBarang(){
    $query = $this->db->query(
        "SELECT *
        FROM tb_barang
        JOIN tb_kategori ON tb_kategori.id_kategori=tb_barang.id_kategori
        ORDER BY id_barang asc ");
    return $query;
}
 
 public function getAllBarang_count(){
  $query = $this->db->query("SELECT * FROM tb_barang");
  return $query->num_rows();
 }
                 
public function cek($id_barang){
		$this->db->select('*');
		$this->db->from('tb_barang');
        $this->db->where('id_barang',$id_barang);
	$this->db->join('tb_kategori','tb_barang.id_kategori = tb_kategori.id_kategori',$id_barang);
        $query=$this->db->get();      
        return $query;
	}
	
public function update($id_barang,$jenis){
        $this->db->where('id_barang',$id_barang);
	$this->db->join('tb_kategori','tb_barang.id_kategori = tb_kategori.id_kategori',$id_barang);
        $this->db->update('tb_barang',$jenis);
    }

public function hapus_pasien($id_barang){
  $this->db->query("DELETE FROM tb_barang WHERE id_barang = '$id_barang' ");
 }

public function cari($cari){
$this->db->select('*');
$this->db->from('tb_barang');
$this->db->like('tb_barang.id_barang',$cari);
$this->db->or_like('tb_barang.type',$cari);
$this->db->or_like('tb_kategori.id_kategori',$cari);
$this->db->or_like('tb_kategori.nm_kategori',$cari);
$this->db->join('tb_kategori','tb_barang.id_kategori = tb_kategori.id_kategori');
$query = $this->db->get();
return $query;
}
}