<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');
class Barang extends CI_Controller{
 public function __construct(){
  parent::__construct();
   if($this->session->userdata('login_status') != TRUE ){
        redirect(base_url());
   }
		$this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
		$this->load->library('input');
        $this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('session');
		$this->load->model('m_barang');
}
 
 public function index(){
	redirect('gudang/barang/tampilkan_barang');
  /*if($this->uri->segment(3)==""){
   $offset=0;
  }else{
   $offset=$this->uri->segment(3);
  }
  $limit = 5;*/
  
  /*$total_data = $this->m_barang->getAllbarang_count();
  $config = array();
  $config['base_url'] = base_url().'index.php/gudang/barang';
  $config['per_page'] = $limit;
  $config['total_rows'] = $total_data;
  $this->pagination->initialize($config);
  $this->session->set_userdata('row', $this->uri->segment(3));
  $data['error'] = "";    
  $this->load->model('m_barang');*/
  
 }
 
 public function cari(){

  $this->data['barang'] = $this->m_barang->cari($this->input->get('cari'));
  $this->data['message']="";
  $this->load->view('gudang/barang/tampil_barang', $this->data);
 }

 public function tampilkan_barang(){
	$this->data['barang'] = $this->m_barang->baca_barang();
	$this->load->view('gudang/barang/tampil_barang', $this->data);
 }
 
 public function tambah_barang() {
		$this->_set_rules();
		$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required|xss_clean|callback_combo_check');
        if ($this->form_validation->run() == TRUE)
        {
			//pass validation
            $data = array(
                'id_kategori' => $this->input->post('kategori'),
                'type' => $this->input->post('type'),
				'unit' => $this->input->post('unit'),
				'warna' => $this->input->post('warna'),
				'berat' => $this->input->post('berat'),
				'warehouse' => $this->input->post('warehouse'),
        'id_barang' => $this->m_barang->get_id_barang($this->input->post('kategori'))
            );
			// $data['id_barang'] = $this->m_barang->get_id_barang($data['id_kategori']);
			
            //insert the form data into database
            $this->db->insert('tb_barang', $data); 
		
            //display success message
			 $data['kategori'] = $this->m_barang->get_barang();
			 
			$data['message']="<div class='alert alert-success'>Data berhasil ditambah</div>";
            // $this->load->view('gudang/barang/tambah_barang',$data);
redirect ('gudang/barang/tampilkan_barang');            
        }else
        {    
            //fail validation
			$data['kategori'] = $this->m_barang->get_barang();
			$data['message']="";
            $this->load->view('gudang/barang/tambah_barang',$data);
        }
}

   public function combo_check($str)
    {
		
        if ($str == '-Pilih Kategori barang-')
        { 
			 $this->form_validation->set_message('combo_check', ' %s barang harus diisi.');
            return FALSE;
            
        }
        else
        {
         return TRUE;
		   
        }
	}	
		
	public function edit_barang($id){
    $this->_set_rules();
      if ($this->form_validation->run() == TRUE){
          $id_barang=$this->input->post('id_barang');
          
          $info=array(
            'id_barang'=>$this->input->post('id_barang'),
		  'type'=>$this->input->post('type'),
		  'unit'=>$this->input->post('unit'),
		  'warna'=>$this->input->post('warna'),
		  'berat' => $this->input->post('berat'),
		  'kategori' => $this->input->post('kategori')
          );
          $this->m_barang->update($id_barang,$info);
		$data['kategori'] = $this->m_barang->get_barang();
          $data['tb_barang']=$this->m_barang->cek($id)->row_array();
		$data['message']="<div class='alert alert-success'>Data berhasil diupdate</div>";
          $this->load->view('gudang/barang/edit_barang',$data);
      }else{
		    $data['kategori'] = $this->m_barang->get_barang();
        $data['tb_barang'] = $this->m_barang->cek($id)->row_array();
    		$data['message']="";
        $this->load->view('gudang/barang/edit_barang',$data);
      }
    }
	public function hapus_barang($id_barang){   
		$this->m_barang->hapus_barang($id_barang);
		redirect('gudang/barang');
	}

	public function _set_rules(){
	//$this->form_validation->set_rules('kategori', 'Kategori', 'required');
	$this->form_validation->set_rules('type', 'type', 'required');      
	$this->form_validation->set_rules('unit', 'unit', 'required');
	$this->form_validation->set_rules('warna', 'warna', 'required|alpha');      
	$this->form_validation->set_rules('berat', 'berat', 'required|numberic');
	$this->form_validation->set_rules('warehouse', 'warehouse', 'required');      

	$this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
  }
  public function get_allTypeBarang($id_kategori)
  {
            
    $query = $this->m_barang->get_allTypeBarang($id_kategori);
    $plvs   =  array();
    foreach ($query as $d) {
       array_push($plvs, $d->type);             
    }
    echo json_encode($plvs); 

  }

 }