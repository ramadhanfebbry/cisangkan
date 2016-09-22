<?php
class Dokter extends CI_Controller{
    function __construct(){
        parent::__construct(); 
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->model('m_dokter');
		  
    }
    
     function index($offset=0,$order_column='id_dokter',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_dokter';
        if(empty($order_type)) $order_type='asc';
        
        //load data
        $data['tb_dokter']=$this->m_dokter->semua($this->limit,$offset,$order_column,$order_type)->result();
        $config['base_url']=site_url('dokter/index/');
        $config['total_rows']=$this->m_dokter->jumlah();
        $config['per_page']=$this->limit;
        $config['uri_segment']=3;
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();
				 if($this->uri->segment(3)=="delete_success")
					$data['message']="<div class='alert alert-success'>Data berhasil dihapus</div>";
				else if($this->uri->segment(3)=="add_success")
					$data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
				else
					$data['message']='';
				$this->load->view('pgw_1/tampil_dokter',$data);
     }
	
	function tambahDokter()
	{
        $this->_set_rules();  
		 if($this->form_validation->run()==true){
            $id_dokter=$this->input->post('id_dokter');
            $cek=$this->m_dokter->cek($id_dokter);
            if($cek->num_rows()>0){
                $data['message']="<div class='alert alert-warning'>ID Dokter sudah digunakan</div>";
                $this->load->view('pgw_1/tambah_dokter',$data);
            }else{
                $info=array(
				'id_dokter'=>$this->input->post('id_dokter'),
				'nm_dokter'=>$this->input->post('nm_dokter'),
				'poli'=>$this->input->post('poli'),
				'jadwal'=>$this->input->post('jadwal'));
                $this->m_dokter->simpan($info);
				$data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
                $this->load->view('pgw_1/tambah_dokter',$data);}
	}else{
            $data['message']="";
            $this->load->view('pgw_1/tambah_dokter',$data);
        }
	}
	
	function edit($id){
       
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $id_dokter=$this->input->post('id_dokter');
            
            $info=array(
              'id_dokter'=>$this->input->post('id_dokter'),
				'nm_dokter'=>$this->input->post('nm_dokter'),
				'poli'=>$this->input->post('poli'),
				'jadwal'=>$this->input->post('jadwal')
            );
            $this->m_dokter->update($id_dokter,$info);
			$data['message']="<div class='alert alert-success'>Data Berhasil diupdate</div>";
            $data['tb_dokter']=$this->m_dokter->cek($id)->row_array();
            $this->load->view('pgw_1/edit_dokter',$data);
        }else{
            $data['tb_dokter']=$this->m_dokter->cek($id)->row_array();
			$data['message']="";
            $this->load->view('pgw_1/edit_dokter',$data);
        }
    }
	
	function tampil (){
		 $data['tb_dokter']=$this->m_dokter->semua($this->limit,$offset,$order_column,$order_type)->result();
		$data['message']="<div class='alert alert-success'>Data Berhasil dihapus</div>";
		$this->load->view('pgw_1/tampil_dokter',$data);
	}
	 function hapus($id_dokter){
		$this->load->model('m_dokter');
		$this->m_dokter->hapus($id_dokter);
		
		redirect('pgw_1/dokter/tampil');
		
		}
	function _set_rules(){
        $this->form_validation->set_rules('id_dokter','ID Dokter','required|numeric|max_length[18]');
		$this->form_validation->set_rules('nm_dokter','Nama Dokter','required');
        $this->form_validation->set_rules('poli','Poli','required');
        $this->form_validation->set_rules('jadwal','Jadwal','required');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }
  }
    
 