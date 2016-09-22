<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');
class User extends CI_Controller{
    function __construct(){
        parent::__construct(); 
	if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata ('notif','Login gagal username dan passowrd tidak sesuai !');
			redirect(base_url());
        };
		
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->model('m_user');
		  
    }
    
     function index($offset=0,$order_column='username',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='username';
        if(empty($order_type)) $order_type='asc';
        
        //load data
        $data['tb_user']=$this->m_user->semua($this->limit,$offset,$order_column,$order_type)->result();
        $config['base_url']=site_url('user/index/');
        $config['total_rows']=$this->m_user->jumlah();
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
				$this->load->view('super/user',$data);
     }
	
	function tambahUser()
	{ 
        $this->_set_rules();  
		 if($this->form_validation->run()==true){
            $username=$this->input->post('username');
            $cek=$this->m_user->cek($username);
            if($cek->num_rows()>0){
                $data['message']="<div class='alert alert-warning'>Username sudah digunakan</div>";
                $this->load->view('super/tambah_user',$data);
            }else{
                $info=array(
				'username'=>$this->input->post('username'),
				'password'=>md5($this->input->post('password')),
				'nama_awal'=>$this->input->post('nama_awal'),
				'nama_akhir'=>$this->input->post('nama_akhir'),
				'level'=>$this->input->post('level'),
                );
                $this->m_user->simpan($info);
				$data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
                $this->load->view('super/tambah_user',$data);}
	}else{
            $data['message']="";
            $this->load->view('super/tambah_user',$data);
        }
	}
	
	function edit($id){
       
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $username=$this->input->post('username');
            
            $info=array(
              'username'=>$this->input->post('username'),
				'password'=>$this->input->post('password'),
				'nama_awal'=>$this->input->post('nama_awal'),
				'nama_akhir'=>$this->input->post('nama_akhir'),
				'level'=>$this->input->post('level'),
            );
            $this->m_user->update($username,$info);
			$data['message']="<div class='alert alert-success'>Data Berhasil diupdate</div>";
            $data['tb_user']=$this->m_user->cek($id)->row_array();
            $this->load->view('super/edit',$data);
        }else{
            $data['tb_user']=$this->m_user->cek($id)->row_array();
			$data['message']="";
            $this->load->view('super/edit',$data);
        }
    }
	
	function tampil (){
		$data['tb_user']=$this->m_user->semua($this->limit,$offset,$order_column,$order_type)->result();
		$data['message']="<div class='alert alert-success'>Data Berhasil dihapus</div>";
		$this->load->view('super/user',$data);
	}
	 function hapus($username){
		$this->load->model('m_user');
		$this->m_user->hapus($username);
		
		redirect('super/user/tampil');
		
		}
		
		
	function _set_rules(){
        $this->form_validation->set_rules('nama_awal','Nama Awal','required|alpha');
		$this->form_validation->set_rules('nama_akhir','Nama Akhir','required|alpha');
        $this->form_validation->set_rules('username','Username','required|min_length[3]');
        $this->form_validation->set_rules('password','Password','required|min_length[5]');
        $this->form_validation->set_rules('level','Level','required');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }
  }
    
 