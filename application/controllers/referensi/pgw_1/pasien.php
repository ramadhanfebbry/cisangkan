<?php

class Pasien extends CI_Controller{
 
 public function __construct(){
  parent::__construct();
  
  $this->load->model('m_pasien');
  $this->load->library('form_validation');
 }
 
 public function index(){
  if($this->uri->segment(3)==""){
   $offset=0;
  }else{
   $offset=$this->uri->segment(3);
  }
  $limit = 50; 
  $data['tb_jkn'] = $this->m_pasien->getAllPasien($offset, $limit);
  $data['count'] = $this->m_pasien->getAllPasien_count(); 
  $config = array();
  $config['base_url'] = base_url(). 'pgw_1/pasien/';
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
  $data['id_pasien'] = $this->m_pasien->get_id_pasien();
  $data['error'] = "";    
  $this->load->model('m_pasien');  
  $this->load->view('pgw_1/pasien_jkn/tampil_pasien', $data);
 } 
  
 
 public function tambah_pasien(){ 
  $this->_set_rules();
  if($this->form_validation->run() == TRUE){ 
   
   $input_id_pasien = $this->input->post('id_pasien');  
	$input_no_kartu = $this->input->post('no_kartu');   
   $input_nm_pasien = $this->input->post('nm_pasien');
	$input_jk = $this->input->post('jk');  
	$input_usia = $this->input->post('usia');   
   $input_alamat = $this->input->post('alamat');
   $ganti = array("'");
   $oleh = "&#039;";   
   $id_pasien = str_replace($ganti, $oleh, $input_id_pasien);
   $no_kartu = str_replace($ganti, $oleh, $input_no_kartu);
   $nm_pasien = str_replace($ganti, $oleh, $input_nm_pasien);
   $jk = str_replace($ganti, $oleh, $input_jk);
   $usia = str_replace($ganti, $oleh, $input_usia);
   $alamat = str_replace($ganti, $oleh, $input_alamat);
   $this->m_pasien->inputPasien($id_pasien, $no_kartu, $nm_pasien, $jk, $usia, $alamat);
   $data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
   $this->load->view('pgw_1/pasien_jkn/tambah_pasien',$data);}
  else{ 
  $data['message']="";
  $data['id_pasien'] = $this->m_pasien->get_id_pasien();
  $this->load->view('pgw_1/pasien_jkn/tambah_pasien',$data);
 }
}
 
  public function tambah(){  
  $data['id_pasien'] = $this->m_pasien->get_id_pasien();
  $this->load->view('pgw_1/pasien_jkn/tambah_pasien',$data);
 }
 
 public function edit_pasien($id){
       
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $id_pasien=$this->input->post('id_pasien');
            
            $info=array(
              'id_pasien'=>$this->input->post('id_pasien'),
				'no_kartu'=>$this->input->post('no_kartu'),
				'nm_pasien'=>$this->input->post('nm_pasien'),
				'jk'=>$this->input->post('jk'),
				'usia'=>$this->input->post('usia'),
				'alamat'=>$this->input->post('alamat')
            );
            $this->m_pasien->update($id_pasien,$info);
			$data['message']="<div class='alert alert-success'>Data Berhasil diupdate</div>";
            $data['tb_jkn']=$this->m_pasien->cek($id)->row_array();
            $this->load->view('pgw_1/pasien_jkn/edit_pasien',$data);
        }else{
            $data['tb_jkn']=$this->m_pasien->cek($id)->row_array();
			$data['message']="";
            $this->load->view('pgw_1/pasien_jkn/edit_pasien',$data);
        }
    }
 public function hapus_pasien($id_pasien){   
  $this->m_pasien->hapus_pasien($id_pasien);
  redirect('pgw_1/pasien');
 }
 
   function cari(){
        $cari=$this->input->post('cari');
        $cek=$this->m_pasien->cari($cari);
        if($cek->num_rows()>0){
            $data['message']="";
            $data['tb_jkn']=$cek->result();
			 $data['count'] = $this->m_pasien->getAllPasien_count(); 
            $this->load->view('pgw_1/pasien_jkn/cari_pasien',$data);
        }else{
            $data['message']="<div class='alert alert-danger'>Data tidak ditemukan</div>";
            $data['tb_jkn']=$cek->result();
			 $data['count'] = $this->m_pasien->getAllPasien_count(); 
            $this->load->view('pgw_1/pasien_jkn/cari_pasien',$data);
        }
    }
 
 public function _set_rules(){
	 $this->form_validation->set_rules('no_kartu','No Kartu', 'required|numeric|max_length[13]');
 $this->form_validation->set_rules('nm_pasien','Nama Pasien', 'required|alpha');
  $this->form_validation->set_rules('jk','Jenis Kelamin', 'required');
  $this->form_validation->set_rules('usia','Usia', 'required|numeric|max_length[3]');
  $this->form_validation->set_rules('alamat','Alamat', 'required');
   $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
 }
}