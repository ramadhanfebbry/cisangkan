<?php
class M_user extends CI_Model{
    private $table="tb_user";
	   private $primary="username";
      
    function semua($limit=10,$offset=0,$order_column='',$order_type='asc'){
        if(empty($order_column) || empty($order_type))
            $this->db->order_by($this->primary,'asc');
        else
            $this->db->order_by($order_column,$order_type);
        return $this->db->get($this->table,$limit,$offset);
    }
	
	function cek($username){
        $this->db->where($this->primary,$username);
        $query=$this->db->get($this->table);
        
        return $query;
	}
	   function simpan($jenis){
        $this->db->insert($this->table,$jenis);
        return $this->db->insert_id();
    }
	    function jumlah(){
        return $this->db->count_all($this->table);
    }
	function update($username,$jenis){
        $this->db->where($this->primary,$username);
        $this->db->update($this->table,$jenis);
    }
	  function hapus($username){
			$this->db->where('username', $username);
			$this->db->delete('tb_user');
		}
	}