<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plv extends CI_Controller{
 public function __construct(){
  parent::__construct();
  if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata ('notif','Login gagal username dan passowrd tidak sesuai !');
			redirect(base_url());
        };
    $this->load->library('form_validation');
	$this->load->model('m_plv');
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
 $data['tb_plv'] = $this->m_plv->getAllplv($offset, $limit);
  $data['count'] = $this->m_plv->getAllplv_count(); 
  $config = array();
   $config['base_url'] = base_url(). 'distribusi/plv/';
  $config['per_page'] = $limit;
  $config['uri_segment'] = 3;
  $config['num_links'] = 20;  
  
  $config['total_rows'] = $data['count'];
  $this->pagination->initialize($config);
  $this->session->set_userdata('row', $this->uri->segment(3));
  $data['id_plv'] = $this->m_plv->get_id_plv();
  $data['error'] = "";    
  $this->load->model('m_plv');  
  $data['date'] = date("d-m-Y");
  $this->load->view('distribusi/plv/tampil_plv', $data);
 } 

  public function tambah(){  
   $data['date'] = date("d-m-Y");
   $data['id_plv'] = $this->m_plv->get_id_plv();
   $this->load->view('distribusi/plv/tambah_plv', $data);
 }
  
   /*public function barang(){
	$kode = $this->input->post('kode',TRUE); 
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
*/
 public function tambah_plv(){ 
  $this->_set_rules();
	if($this->form_validation->run() == TRUE){ 
		$id_plv = $this->input->post('id_plv'); 
		$date_plv =  date("Y-m-d",strtotime($this->input->post('date_plv')));
		$id_jrp = $this->input->post('id_jrp');
		$id_kendaraan = $this->input->post('id_kendaraan'); 
		$this->m_plv->inputplv($id_plv, $date_plv, $id_jrp, $id_kendaraan);
		$data['date'] = date("d-m-Y");  
		$data['id_plv'] = $this->m_plv->get_id_plv();
		$data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
		$this->load->view('distribusi/plv/tambah_plv',$data);}
	 else{ 
	   $data['message']="";
	   $data['date'] = date("d-m-Y");
	   $data['id_plv'] = $this->m_plv->get_id_plv();
	   $this->load->view('distribusi/plv/tambah_plv',$data);
	 }
 }
 /*function update($id_plv,$jenis){
		$this->db->where('id_plv',$id_plv);
		$this->db->update('tb_plv',$jenis);
		}
		
   public function edit_plv($id){
        $data_edit = $this->m_plv->cek($id);
		if($data_edit){
			$this->data['data_plv']=$data_edit;
		} else{
			$this->session->set_flashdata('message','Data tidak dapat ditampilkan !');
		}
        $this->load->view('distribusi/plv/edit_plv',$this->data);
    }*/
 
	public function edit_plv($id){
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $id_plv=$this->input->post('id_plv');
			
            $info=array(
				'id_plv'=> $this->input->post('id_plv'),
				'date_plv'=> $this->input->post('date_plv'),
				'id_jrp'=> $this->input->post('id_jrp'),
				'id_kendaraan'=> $this->input->post('id_kendaraan')
            );
            $this->m_plv->update($id_plv,$info);
			$data['message']="<div class='alert alert-success'>Data Berhasil diupdate</div>";
            $data['tb_plv']=$this->m_plv->cek($id)->row_array();
            $this->load->view('distribusi/plv/edit_plv',$data);
        }else{
            $data['tb_plv']=$this->m_plv->cek($id)->row_array();
			$data['message']="";
            $this->load->view('distribusi/plv/edit_plv',$data);
        }
    }
 
   function cari(){
       $cari=$this->input->get('cari');
        $cek=$this->m_plv->cari($cari);
        if($cek->num_rows()>0){
      log_message('error', 'DATA');
          $data['message']="";
          $data['tb_plv']=$cek;
			    $data['count'] = $this->m_plv->getAllplv_count(); 
          $this->load->view('distribusi/plv/tampil_plv',$data);
        }else{
          log_message('error', "NO DATA : ". $this->m_plv->getAllplv_count());
          $data['message']="<div class='alert alert-danger'>Data tidak ditemukan</div>";
  			  $data['tb_plv']=$cek;
  			  $data['count'] = $this->m_plv->getAllplv_count(); 
          $this->load->view('distribusi/plv/tampil_plv',$data);
        }
    }
 
 public function _set_rules(){
	$this->form_validation->set_rules('id_jrp','id_jrp', 'required');
	$this->form_validation->set_rules('id_kendaraan','id_kendaraan', 'required');
	$this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
 }
}