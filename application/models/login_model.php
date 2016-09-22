<?php
class Login_model extends CI_Model
{
    public function cek_user($username,$dekrip_pass)
    {
        $this->db->where('username',$username);
        $this->db->where('password',$dekrip_pass);
        $query = $this->db->get('tb_user');
        return $query;     
    }
}