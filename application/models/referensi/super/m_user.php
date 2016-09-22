<?php
class M_user extends CI_Model{
    private $table="tb_user";
        
    function semua(){
        return $this->db->get("tb_user");
    }
}