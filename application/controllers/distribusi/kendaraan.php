<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Kendaraan extends CI_Controller{
 public function __construct(){
  parent::__construct();
  if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata ('notif','Login gagal username dan passowrd tidak sesuai !');
			redirect(base_url());
        };
		
  $this->load->library('form_validation');
  $this->load->model('m_kendaraan');		  
 }
 
 public function index(){
  if($this->uri->segment(3)==""){
   $offset=0;
  }else{
   $offset=$this->uri->segment(3);
  }
  $limit = 50; 
  $data['tb_kendaraan'] = $this->m_kendaraan->getAllkendaraan($offset, $limit);
  $data['count'] = $this->m_kendaraan->getAllkendaraan_count(); 
  $config = array();
  $config['base_url'] = base_url().'distribusi/kendaraan/';
  $config['per_page'] = $limit;
  $config['uri_segment'] = 3;
  $config['num_links'] = 20;  
  $config['first_tag_open'] = '<li>';
  $config['first_link'] = 'First';
  $config['first_tag_close'] = '</li>';
  $config['prev_link'] = 'Prev';
  $config['prev_tag_open'] = '<li>';
  $config['prev_tag_close'] = '</li>';
  $config['cur_tag_open'] = '<li class="active"><a href>';
  $config['cur_tag_close'] = '</a></li>';
  $config['next_link'] = 'Next';
  $config['next_tag_open'] = '<li>';
  $config['next_tag_close'] = '</li>';
  $config['num_tag_open'] = '<li>';
  $config['num_tag_close'] = '</li>';
  $config['last_tag_open'] = '<li>';
  $config['last_link'] = 'Last';
  $config['last_tag_close'] = '</li>';
  $config['total_rows'] = $data['count'];
  $this->pagination->initialize($config);
  $this->session->set_userdata('row', $this->uri->segment(3));
  $data['id_kendaraan'] = $this->m_kendaraan->get_id_kendaraan();
  $data['error'] = "";    
  $this->load->model('m_kendaraan');  
  $this->load->view('distribusi/kendaraan/tampil_kendaraan', $data);
 } 
  
 
 public function tambah_kendaraan(){ 
 $this->_set_rules();
   if($this->form_validation->run() == TRUE){ 
	$id_kendaraan = $this->input->post('id_kendaraan'); 
	$jenis_truk = $this->input->post('jenis_truk');
	//$kapasitas = input->post('kapasitas');
	$plat = $this->input->post('plat');
	$nama_awal_sopir= $this->input->post('nama_awal_sopir');  
	$nama_akhir_sopir = $this->input->post('nama_akhir_sopir');
	$no_tlp = $this->input->post('no_tlp');
    $this->m_kendaraan->inputkendaraan($id_kendaraan, $jenis_truk, $plat, $nama_awal_sopir, $nama_akhir_sopir, $no_tlp);
    $data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
    $this->load->view('distribusi/kendaraan/tambah_kendaraan',$data);}
	else{ 
    $data['message']="";
    $data['id_kendaraan'] = $this->m_kendaraan->get_id_kendaraan();
    $this->load->view('distribusi/kendaraan/tambah_kendaraan',$data);
	}
 } 

  public function tambah(){  
  $data['id_kendaraan'] = $this->m_kendaraan->get_id_kendaraan();
  $this->load->view('distribusi/kendaraan/tambah_kendaraan',$data);
  }
  
   public function edit_kendaraan($id){
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $id_kendaraan=$this->input->post('id_kendaraan');
            
            $info=array(
				'id_kendaraan'=> $this->input->post('id_kendaraan'),
				'jenis_truk'=> $this->input->post('jenis_truk'),
				'plat'=> $this->input->post('plat'),
				//'kapasitas'=> $this->input->post('kapasitas'),
				'nama_awal_sopir'=> $this->input->post('nama_awal_sopir'), 
				'nama_akhir_sopir'=> $this->input->post('nama_akhir_sopir'),
			    'no_tlp'=> $this->input->post('no_tlp')
            );
            $this->m_kendaraan->update($id_kendaraan,$info);
			$data['message']="<div class='alert alert-success'>Data Berhasil diupdate</div>";
            $data['tb_kendaraan']=$this->m_kendaraan->cek($id)->row_array();
            $this->load->view('distribusi/kendaraan/edit_kendaraan',$data);
        }else{
            $data['tb_kendaraan']=$this->m_kendaraan->cek($id)->row_array();
			$data['message']="";
            $this->load->view('distribusi/kendaraan/edit_kendaraan',$data);
        }
    }
 
 public function hapus_kendaraan($id_kendaraan){   
  $this->m_kendaraan->hapus_kendaraan($id_kendaraan);
  redirect('distribusi/kendaraan');
 }
 
  public function getKendaraan()
  {
            
      $query = $this->m_kendaraan->get_allKendaraan();
      $plvs   =  array();
      foreach ($query as $d) {
        array_push($plvs, $d->id_kendaraan);          
      }
      echo json_encode($plvs); 
  }

  
   function cari(){
       $cari=$this->input->post('cari');
        $cek=$this->m_kendaraan->cari($cari);
        if($cek->num_rows()>0){
             $data['message']="";
             $data['tb_kendaraan']=$cek->result();
			 $data['count'] = $this->m_kendaraan->getAllkendaraan_count(); 
            $this->load->view('distribusi/kendaraan/cari_kendaraan',$data);
        }else{
            $data['message']="<div class='alert alert-danger'>Data tidak ditemukan</div>";
			 $data['tb_kendaraan']=$cek->result();
			 $data['count'] = $this->m_kendaraan->getAllkendaraan_count(); 
            $this->load->view('distribusi/kendaraan/cari_kendaraan',$data);
        }
    }
 
 public function _set_rules(){
	$this->form_validation->set_rules('jenis_truk','jenis_truk', 'required');
	//$this->form_validation->set_rules('kapasitas','kapasitas', 'required');
	$this->form_validation->set_rules('nama_awal_sopir','nama_awal_sopir', 'required|alpha');
	$this->form_validation->set_rules('nama_akhir_sopir','nama_akhir_sopir', 'required|alpha');
	$this->form_validation->set_rules('no_tlp','no_tlp', 'required|numeric');
   $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
 }
}
