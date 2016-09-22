<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rdo extends CI_Controller{
 public function __construct(){
  parent::__construct();
  if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata ('notif','Login gagal username dan passowrd tidak sesuai !');
			redirect(base_url());
        };
  $this->load->library('form_validation');
  $this->load->model('m_rdo');
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
  $data['tb_rdo'] = $this->m_rdo->getAllrdo();
  $data['count'] = $this->m_rdo->getAllrdo_count(); 
  $config = array();
  $config['base_url'] = base_url().'distribusi/rdo/';
  $config['per_page'] = $limit;
  $config['uri_segment'] = 3;
  $config['num_links'] = 20;  
  
  $config['total_rows'] = $data['count'];
  $this->pagination->initialize($config);
  $this->session->set_userdata('row', $this->uri->segment(3));
  $data['id_rdo'] = $this->m_rdo->get_id_rdo();
  $data['error'] = "";    
  $this->load->model('m_rdo');  
  $data['date'] = date("d-m-Y");
  $this->load->view('distribusi/rdo/tampil_rdo', $data);
 } 

  public function tambah(){  
  $data['date'] = date("d-m-Y");
  $data['id_rdo'] = $this->m_rdo->get_id_rdo();
  $this->load->view('distribusi/rdo/tambah_rdo',$data);
  }
  
 public function tambah_rdo(){ 
  $this->_set_rules();
   if($this->form_validation->run() == TRUE){ 
	$id_rdo = $this->input->post('id_rdo');
	$date_rdo =  date("Y-m-d",strtotime($this->input->post('date_rdo')));
	$id_do= $this->input->post('id_do');  
	$data['date'] = date("d-m-Y");
    $this->m_rdo->inputrdo($id_rdo, $date_rdo, $id_do);
	$data['id_rdo'] = $this->m_rdo->get_id_rdo();
	$data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
    $this->load->view('distribusi/rdo/tambah_rdo',$data);}
	else{ 
    $data['message']="";
	$data['date'] = date("d-m-Y");
    $data['id_rdo'] = $this->m_rdo->get_id_rdo();
    $this->load->view('distribusi/rdo/tambah_rdo',$data);
	}
 } 
 
   public function edit_rdo($id){
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $id_rdo=$this->input->post('id_rdo');
			
            $info=array(
				'id_rdo'=> $this->input->post('id_rdo'),
				'date_rdo'=> $this->input->post('date_rdo'),
				'id_do'=> $this->input->post('id_do')
            );
            $this->m_rdo->update($id_rdo,$info);
			$data['message']="<div class='alert alert-success'>Data Berhasil diupdate</div>";
            $data['tb_rdo']=$this->m_rdo->cek($id)->row_array();
            $this->load->view('distribusi/rdo/edit_rdo',$data);
        }else{
            $data['tb_rdo']=$this->m_rdo->cek($id)->row_array();
			$data['message']="";
            $this->load->view('distribusi/rdo/edit_rdo',$data);
        }
    }
 
 public function hapus_rdo($id_rdo){   
  $this->m_rdo->hapus_rdo($id_rdo);
  redirect('distribusi/rdo');
 }
 
   function cari(){
       $cari=$this->input->post('cari');
        $cek=$this->m_rdo>cari($cari);
        if($cek->num_rows()>0){
             $data['message']="";
             $data['tb_rdo']=$cek->result();
			 $data['count'] = $this->m_rdo->getAllrdo_count(); 
            $this->load->view('distribusi/cari_rdo',$data);
        }else{
            $data['message']="<div class='alert alert-danger'>Data tidak ditemukan</div>";
			 $data['tb_rdo']=$cek->result();
			 $data['count'] = $this->m_rdo->getAllrdo_count(); 
            $this->load->view('distribusi/cari_rdo',$data);
        }
    }
 
 public function _set_rules(){
	$this->form_validation->set_rules('id_do','id_do', 'required');
   $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
 }
}
