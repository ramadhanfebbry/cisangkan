<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');
class Login extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->library('input');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('login_model');
    }

    public function index() {
        $this->load->view($this->layout,$this->data);
    }
	
	public function halaman_login(){
		$this->load->view('halaman_login');
	}

    public function proses_login() {
            $username = $this->input->post('username',TRUE);
            $password = $this->input->post('password',TRUE);
            $dekrip_pass = md5($password);
            $hasil = $this->login_model->cek_user($username,$dekrip_pass);
            if ($hasil->num_rows()==1) {
                foreach ($hasil->result() as $data_user){
                        $sess_data['username']=$data_user->username;
						$sess_data['password']=$data_user->password;
                        $sess_data['nama_awal']=$data_user->nama_awal;
                        $sess_data['nama_akhir']=$data_user->nama_akhir;
                        $sess_data['level']=$data_user->level;
						$sess_data['login_status']=TRUE;
                        $this->session->set_userdata($sess_data);
                } 
				if ($this->session->userdata('level')=='super admin') {
                    redirect('super/home');
                } elseif ($this->session->userdata('level')=='bag ppic') {
                    redirect('ppic/home');
                } elseif ($this->session->userdata('level')=='bag distribusi') {
                    redirect('distribusi/home');
				} elseif ($this->session->userdata('level')=='bag gudang') {
                    redirect('gudang/home');
				} elseif ($this->session->userdata('level')=='kabag distribusi') {
                    redirect('kabag/home');
				 }
            } else{
              $this->session->set_flashdata('pesan','<div class="alert alert-danger text-center">Username dan Password tidak sesuai</div>');
			  redirect('login/halaman_login');
            }
    }
    public function error($error = NULL) {
        $data = array(
            'action' => site_url('login/proses_login'),
            'error' => $error
        );
        $this->load->view('halaman_login', $data);
    }

    public function logout()
    {
        // $this->session->unset_userdata('username');
		// $this->session->unset_userdata('password');
        // $this->session->unset_userdata('nama_awal');
        // $this->session->unset_userdata('nama_akhir');
        // $this->session->unset_userdata('level');
		// $this->session->unset_userdata('login_status');
		$this->session->sess_destroy();
        session_destroy();
        redirect(base_url());
    }
}