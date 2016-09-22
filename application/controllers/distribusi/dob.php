<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dob extends CI_Controller{
 public function __construct(){
  parent::__construct();
     if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata ('notif','Login gagal username dan passowrd tidak sesuai !');
			redirect(base_url());
        };
  $this->load->library('form_validation');
  $this->load->model('m_dob');
  $this->load->library('input');
  $this->load->library('session');  
 }

 public function index(){
  if($this->uri->segment(3)==""){
   $offset=0;
  }else{
   $offset=$this->uri->segment(3);
  }
  $limit = 50; 
  $data['tb_do'] = $this->m_dob->getAlldo($offset, $limit);
  $data['count'] = $this->m_dob->getAlldo_count(); 
  $config = array();
  $config['base_url'] = base_url().'distribusi/dob/';
  $config['per_page'] = $limit;
  $config['uri_segment'] = 3;
  $config['num_links'] = 20; 
 
  $config['total_rows'] = $data['count'];
  $this->pagination->initialize($config);
  $this->session->set_userdata('row', $this->uri->segment(3));
  $data['id_do'] = $this->m_dob->get_id_do();
  $data['error'] = "";    
  $this->load->model('m_dob');  
  $data['date'] = date("d-m-Y");
  $this->load->view('distribusi/dob/tampil_dob', $data);
 } 
 
   public function tambah_dob(){ 
  $this->_set_rules();
  if($this->form_validation->run() == TRUE){ 
	$id_do = $this->input->post('id_do'); 
	$date_do =  date("Y-m-d",strtotime($this->input->post('date_do')));
	$id_plv = $this->input->post('id_plv');
	$this->m_dob->inputdo($id_do, $date_do, $id_plv);
	$data['date'] = date("d-m-Y");  
	$data['id_do'] = $this->m_dob->get_id_do();
	$data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
	$this->load->view('distribusi/dob/tambah_dob',$data);}
  else{ 
   $data['message']="";
   $data['date'] = date("d-m-Y");
   $data['id_do'] = $this->m_dob->get_id_do();
   $this->load->view('distribusi/dob/tambah_dob',$data);
  }
 }

  public function tambah(){ 
	  $data['date'] = date("d-m-Y");  
	  $data['id_do'] = $this->m_dob->get_id_do();
	  $this->load->view('distribusi/dob/tambah_dob',$data);
  }
  
   // public function barang(){
	// $kode = $this->input->post('kode',TRUE); 
		// if(isset($_GET['term'])) {
			// $query = $this->m_jrp->getAllbarang($_GET['term']); 
		// if(count($query) > 0) {
        // foreach ($query as $d)
            // $brg[]     = array(
                // 'label' => $d->id_barang,
				// 'id_barang' => $d->id_barang,
                // 'type' => $d->type,
				// 'warna' => $d->warna,
				// 'berat' => $d->berat,
				// 'warehouse' => $d->warehouse
            // );
			// echo json_encode($brg);
		// } else{
			// $brg[] = "Id barang tidak tersedia!";
            // echo json_encode($brg);}
	// }
// }
 
   public function edit_dob($id){
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $id_do=$this->input->post('id_do');
            
            $info=array(
				'id_do'=> $this->input->post('id_do'),
				'date_do'=> $this->input->post('date_do'),
				'id_plv'=> $this->input->post('id_plv'),
	             );
            $this->m_dob->update($id_do,$info);
			$data['message']="<div class='alert alert-success'>Data Berhasil diupdate</div>";
            $data['tb_do']=$this->m_dob->cek($id)->row_array();
            $this->load->view('distribusi/dob/edit_dob',$data);
        }else{
            $data['tb_do']=$this->m_dob->cek($id)->row_array();
			$data['message']="";
            $this->load->view('distribusi/dob/edit_dob',$data);
        }
    }
 
 // public function hapus_do($id_do){   
  // $this->m_do->hapus_do($id_do);
  // redirect('distribusi/dob//do');
 // }
 
   // function cari(){
       // $cari=$this->input->post('cari');
        // $cek=$this->m_jrp->cari($cari);
        // if($cek->num_rows()>0){
             // $data['message']="";
             // $data['tb_jrp']=$cek->result();
			 // $data['count'] = $this->m_jrp->getAlljrp_count(); 
            // $this->load->view('ppic/cari_jrp',$data);
        // }else{
            // $data['message']="<div class='alert alert-danger'>Data tidak ditemukan</div>";
			 // $data['tb_jrp']=$cek->result();
			 // $data['count'] = $this->m_jrp->getAlljrp_count(); 
            // $this->load->view('ppic/cari_jrp',$data);
        // }
    // }
 
 public function _set_rules(){
	$this->form_validation->set_rules('id_plv','id_plv', 'required');
   $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
 }

 public function getPlv()
  {
            
      $query = $this->m_dob->get_allplv();
      $plvs   =  array();
      foreach ($query as $d) {
        array_push($plvs, $d->id_plv);          
      }
      echo json_encode($plvs); 
  }

  public function getJrp()
  {
            
      $query = $this->m_dob->get_alljrp();
      $plvs   =  array();
      foreach ($query as $d) {
        $plvs[]     = array(
                  'label' => $d->id_jrp."-".$d->ship_date."-".$d->sales_order."-".$d->delivery_name."-".$d->delivery_city."-".$d->delivery_address."-".$d->id_barang."-".$d->type."-".$d->warna."-".$d->quantity."-".$d->delivery_reminder."-".$d->quantity_confirm."-".$d->tonase,
                  'value' => $d->id_jrp
              );      
      }
      echo json_encode($plvs); 

  }
}
