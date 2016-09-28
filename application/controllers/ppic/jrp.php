<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jrp extends CI_Controller{
 public function __construct(){
  parent::__construct();
  if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata ('notif','Login gagal username dan passowrd tidak sesuai !');
			redirect(base_url());
        };
  $this->load->library('form_validation');
  $this->load->model('m_jrp');
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
  $data['tb_jrp'] = $this->m_jrp->getAlljrp($offset, $limit);
  $data['count'] = $this->m_jrp->getAlljrp_count(); 
  $config = array();
  $config['base_url'] = base_url().'ppic/jrp/';
  $config['per_page'] = $limit;
  $config['uri_segment'] = 3;
  $config['num_links'] = 20;  
  $config['total_rows'] = $data['count'];
  $this->pagination->initialize($config);
  $this->session->set_userdata('row', $this->uri->segment(3));
  $data['id_jrp'] = $this->m_jrp->get_id_jrp();
  $data['error'] = "";    
  $this->load->model('m_jrp');  
  $this->load->view('ppic/tampil_jrp', $data);
  $this->load->library('input');
  $this->load->library('session');
 
 } 

  public function tambah(){  
  $data['id_jrp'] = $this->m_jrp->get_id_jrp();
  $this->load->view('ppic/tambah_jrp',$data);
  }
  
   public function barang(){
	// $kode = $this->input->get('kode',TRUE); 
  log_message('error', "parameters: ".$_GET['term']);
		if(isset($_GET['term'])) {
			$query = $this->m_jrp->get_all_barang($_GET['term']); 
		if(count($query) > 0) {
        foreach ($query as $d)
            $barang[]     = array(
                'label' => $d->id_barang,
				'id_barang' => $d->id_barang,
                'type' => $d->type,
				//'unit' => $d->unit,
				'warna' => $d->warna
				//'berat' => $d->berat,
				//'warehouse' => $d->warehouse
            );
		echo json_encode($barang);
		} else{
			$barang[] = "Id barang tidak tersedia!";
            echo json_encode($barang); }
	}
}

 public function tambah_jrp(){ 
  $this->_set_rules();
   if($this->form_validation->run() == TRUE){ 
    	$id_jrp = $this->input->post('id_jrp');
    	$ship_date = $this->input->post('ship_date');
    	$sales_order = $this->input->post('sales_order');
    	$delivery_name = $this->input->post('delivery_name');  
    	$delivery_city = $this->input->post('delivery_city');
    	$delivery_address = $this->input->post('delivery_address');
    	$id_barang = $this->input->post('id_barang');
    	$type = $this->input->post('type');
    	$warna = $this->input->post('warna');
    	$quantity = $this->input->post('quantity');
    	$delivery_remender = $this->input->post('delivery_remender');
    	$delivery_now = $this->input->post('delivery_now');
    	$tonase = $this->input->post('tonase');
      $this->m_jrp->inputjrp($id_jrp, $ship_date, $sales_order, $delivery_name, $delivery_city, $delivery_address, $id_barang, $type, $warna, $quantity, $delivery_remender, $delivery_now, $tonase);
    	$data['id_jrp'] = $this->m_jrp->get_id_jrp();
    	$data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
      $this->load->view('ppic/tambah_jrp',$data);}
	else{ 
      $data['message']="";
      $data['id_jrp'] = $this->m_jrp->get_id_jrp();
      $data['ship_date'] = $this->input->post('ship_date');
      $data['sales_order'] = $this->input->post('sales_order');
      $data['delivery_name'] = $this->input->post('delivery_name');  
      $data['delivery_city'] = $this->input->post('delivery_city');
      $data['delivery_address'] = $this->input->post('delivery_address');
      $data['id_barang'] = $this->input->post('id_barang');
      $data['type'] = $this->input->post('type');
      $data['warna'] = $this->input->post('warna');
      $data['quantity'] = $this->input->post('quantity');
      $data['delivery_remender'] = $this->input->post('delivery_remender');
      $data['delivery_now'] = $this->input->post('delivery_now');
      $data['tonase'] = $this->input->post('tonase');
      $this->load->view('ppic/tambah_jrp',$data);
	}
 } 
 

 
   public function edit_jrp($id){
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $id_jrp=$this->input->post('id_jrp');
            $info=array(
				'id_jrp'=> $this->input->post('id_jrp'),
				'ship_date'=> $this->input->post('ship_date'),
				'sales_order'=> $this->input->post('sales_order'),
				'delivery_name'=> $this->input->post('delivery_name'), 
				'delivery_city'=> $this->input->post('delivery_city'),
				'delivery_address'=> $this->input->post('delivery_address'),
				'id_barang'=> $this->input->post('id_barang'),
				'type'=> $this->input->post('type'),
				'warna'=> $this->input->post('warna'),
			    'quantity'=> $this->input->post('quantity'),
			    // 'delivery_remender'=> $this->input->post('delivery_remender'),
			    // 'delivery_now'=> $this->input->post('delivery_now'),
			    // 'tonase'=> $this->input->post('tonase')
            );
            $this->m_jrp->update($id_jrp,$info);
			$data['message']="<div class='alert alert-success'>Data Berhasil diupdate</div>";
            $data['tb_jrp']=$this->m_jrp->cek($id)->row_array();
            $this->load->view('ppic/edit_jrp',$data);
        }else{
            $data['tb_jrp']=$this->m_jrp->cek($id)->row_array();
			$data['message']="";
            $this->load->view('ppic/edit_jrp',$data);
        }
    }
 
 public function hapus_jrp($id_jrp){   
  $this->m_jrp->hapus_jrp($id_jrp);
  redirect('ppic/jrp');
 }
 
   function cari(){
       $cari=$this->input->post('cari');
        $cek=$this->m_jrp->cari($cari);
        if($cek->num_rows()>0){
             $data['message']="";
             $data['tb_jrp']=$cek->result();
			 $data['count'] = $this->m_jrp->getAlljrp_count(); 
            $this->load->view('ppic/cari_jrp',$data);
        }else{
            $data['message']="<div class='alert alert-danger'>Data tidak ditemukan</div>";
			 $data['tb_jrp']=$cek->result();
			 $data['count'] = $this->m_jrp->getAlljrp_count(); 
            $this->load->view('ppic/cari_jrp',$data);
        }
    }
 
 public function _set_rules(){
	$this->form_validation->set_rules('ship_date','ship_date', 'required');
	$this->form_validation->set_rules('sales_order','sales_order', 'required');
	$this->form_validation->set_rules('delivery_name','delivery_name', 'required|alpha');
	$this->form_validation->set_rules('delivery_city','delivery_city', 'required|alpha');
	$this->form_validation->set_rules('delivery_address','dellivery_address', 'required');
	$this->form_validation->set_rules('id_barang','id_barang', 'required');
	$this->form_validation->set_rules('quantity','quantity', 'required|numeric');
	// $this->form_validation->set_rules('delivery_remender','delivery_remender', 'required|numeric|max_length[4]');
	// $this->form_validation->set_rules('delivery_now','delivery_now', 'required|numeric|max_length[4]');
	//$this->form_validation->set_rules('tonase','tonase', 'required|numeric|max_length[4]');
   $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
 }
}
