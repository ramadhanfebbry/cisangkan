<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Database_library {

	private $table_name;

		

	function pake_table($table)

	{			

			$CI=& get_instance();

			

			$CI->table_name=$table;

			return true;

		

	}

	

	function tambah_data($data)

	{

		$CI=& get_instance();

		

		if($this->pake_table($CI->table_name)==true)

		{

			$CI->db->insert($CI->table_name, $data);

			if($CI->db->affected_rows() > 0){

				return true;

			} else{

				return false;

			}

		}

	}

	

	function ubah_data_where($field,$kode,$data) 

	{

		$CI=& get_instance();

		

		if($this->pake_table($CI->table_name)==true)

		{

			$CI->db->where($field, $kode);

			$CI->db->update($CI->table_name, $data);

			if($CI->db->affected_rows() > 0){

				return true;

			}

			else{

				return false;

			}

		}

	}

	

	function ubah_data($arraysearch,$data) 

	{

		$CI=& get_instance();

		

		if($this->pake_table($CI->table_name)==true)

		{

			$CI->db->where($arraysearch);			

			$CI->db->update($CI->table_name, $data);

			if($CI->db->affected_rows() > 0){

				return true;

			}

			else{

				return false;

			}

		}

	}
	
	
		

	function hapus_data($arraysearch) 

	{

		$CI=& get_instance();

		

		if($this->pake_table($CI->table_name)==true)

		{

			$CI->db->where($arraysearch);

			$CI->db->delete($CI->table_name);

			if($CI->db->affected_rows() > 0){

				return true;

			}

			else{

				return false;

			}	  

		}

	}

	

	function ambil_data()

	{

		$CI=& get_instance();

		

		if($this->pake_table($CI->table_name)==true)

		{

			$sql = $CI->db->get($CI->table_name);

			if($sql->num_rows() > 0){			

				foreach($sql->result() as $row){

					$data[] = $row;

				}			

				return $data;

			} else {

				return null;

			}

		}

	}

	

	function ambil_data_array($arraysearch)

	{

		$CI=& get_instance();

		$CI->db->where($arraysearch);

		if($this->pake_table($CI->table_name)==true)

		{

			$sql = $CI->db->get($CI->table_name);

			if($sql->num_rows() > 0){			

				foreach($sql->result() as $row){

					$data[] = $row;

				}			

				return $data;

			} else {

				return null;

			}

		}

	}

	

	function jika_ada($arraysearch)

	{

		$CI=& get_instance();

		$CI->db->where($arraysearch);

		if($this->pake_table($CI->table_name)==true)

		{

			$sql = $CI->db->get($CI->table_name);

			if($sql->num_rows() > 0){			

				return true;

			} else {

				return false;

			}

		}

	}

	

	function ambil_data_array_custom($arraysearch,$fieldorder,$ordervalue,$limit,$start)

	{

		$CI=& get_instance();

		$CI->db->where($arraysearch);

		$CI->db->order_by($fieldorder, $ordervalue); 

		$CI->db->limit($limit,$start);

		if($this->pake_table($CI->table_name)==true)

		{

			$sql = $CI->db->get($CI->table_name);

			if($sql->num_rows() > 0){			

				foreach($sql->result() as $row){

					$data[] = $row;

				}			

				return $data;

			} else {

				return null;

			}

		}

	}
	
	function ambil_data_where_paging($selectQuery,$fromQuery,$arraywhere,$fieldorder,$ordervalue,$limit,$start)

	{

		$CI=& get_instance();

		

		$CI->db->select($selectQuery);

		$CI->db->from($fromQuery);

		$CI->db->where($arraywhere);
		$CI->db->order_by($fieldorder, $ordervalue); 

		$CI->db->limit($limit,$start);

		

			$sql = $CI->db->get();

			if($sql->num_rows() > 0){			

				foreach($sql->result() as $row){

					$data[] = $row;

				}

				

				return $data;

			}else{

				return null;

			}

		

	}

	

	function ambil_data_where($field,$Kode,$f2='',$k2='')

	{

		$CI=& get_instance();

		$CI->db->where($field,$Kode);

		if(!empty($f2) && !empty($k2))

		{

			$CI->db->where($f2,$k2);

		}

		if($this->pake_table($CI->table_name)==true)

		{

			$sql = $CI->db->get($CI->table_name);

			if($sql->num_rows() > 0){			

				foreach($sql->result() as $row){

					$data[] = $row;

				}			

				return $data;

			} else {

				return null;

			}

		}

	}

	

	

	

	function ambil_data_where_custom($selectQuery,$fromQuery,$arraywhere)

	{

		$CI=& get_instance();

		

		$CI->db->select($selectQuery);

		$CI->db->from($fromQuery);

		$CI->db->where($arraywhere);

		

			$sql = $CI->db->get();

			if($sql->num_rows() > 0){			

				foreach($sql->result() as $row){

					$data[] = $row;

				}

				

				return $data;

			}else{

				return null;

			}

		

	}

	

	function ambil_satu_data($field,$kode,$output)

	{

		$CI=& get_instance();

		

		$CI->db->where($field, $kode);



		if($this->pake_table($CI->table_name)==true)

		{	

			$sql = $CI->db->get($CI->table_name);

			if($sql->num_rows() > 0){							

				return $sql->row()->$output;

			} else {

				return null;

			}

		}

	}

	

	function ambil_satu_custom($arraysearch,$output)

	{

		$CI=& get_instance();

		

		$CI->db->where($arraysearch);



		if($this->pake_table($CI->table_name)==true)

		{	

			$sql = $CI->db->get($CI->table_name);

			if($sql->num_rows() > 0){							

				return $sql->row()->$output;

			} else {

				return null;

			}

		}

	}

	

	function ambil_satu_data_array($arraysearch)

	{

		$CI=& get_instance();

		

		$CI->db->where($arraysearch);



		if($this->pake_table($CI->table_name)==true)

		{	

			$sql = $CI->db->get($CI->table_name);

			if($sql->num_rows() > 0){							

				foreach($sql->result() as $row){

					$data[] = $row;

				}

				

				return $data;

				

			} else {

				return null;

			}

		}

	}

	

	function ambil_satu_data_custom($table,$field,$kode,$output)

	{

		$CI=& get_instance();

		$CI->load->library('database');

		$CI->db->where($field, $kode);

			

			$sql = $CI->db->get($table);

			if($sql->num_rows() > 0){							

				return $sql->row()->$output;

			} else {

				return null;

			}



	}

	

	function jumlah_data()

	{

		$CI=& get_instance();

		

		if($this->pake_table($CI->table_name)==true)

		{

			return $CI->db->count_all($CI->table_name);

		}

	}

	

	function jumlah_data_where($arraysearch)

	{

		$CI=& get_instance();

		

		if($this->pake_table($CI->table_name)==true)

		{

			$CI->db->where($arraysearch);

					

			$sql = $CI->db->get($CI->table_name);

			return $sql->num_rows();

		}

	}

	

	function jumlah_data_where_custom($selectQuery,$fromQuery,$arraySearc)

	{



		$CI=& get_instance();

		

		$CI->db->select($selectQuery);

		$CI->db->from($fromQuery);

		$CI->db->where($arraySearc);

		

			$sql = $CI->db->get();

			if($sql->num_rows() > 0){							

				return $sql->num_rows();

			}else{

				return null;

			}

		

	}

	

	function buat_paging($url,$totalrow,$perpage,$segment_output,$data_pag)

	{

		$CI=& get_instance();

		

		$CI->load->library('pagination');

		$config = array();

        $config["base_url"] = $url;

        $config["total_rows"] = $totalrow;

        $config["per_page"] = $perpage;

        $config["uri_segment"] = $segment_output;

		$config['full_tag_open'] = '<ul class="pagination">';

$config['full_tag_close'] = '</ul><!--pagination-->';

 

$config['first_link'] = '&laquo; First';

$config['first_tag_open'] = '<li class="prev page">';

$config['first_tag_close'] = '</li>';

 

$config['last_link'] = 'Last &raquo;';

$config['last_tag_open'] = '<li class="next page">';

$config['last_tag_close'] = '</li>';

 

$config['next_link'] = 'Next &rarr;';

$config['next_tag_open'] = '<li class="next page">';

$config['next_tag_close'] = '</li>';

 

$config['prev_link'] = '&larr; Previous';

$config['prev_tag_open'] = '<li class="prev page">';

$config['prev_tag_close'] = '</li>';

 

$config['cur_tag_open'] = '<li class="active"><a href="">';

$config['cur_tag_close'] = '</a></li>';

 

$config['num_tag_open'] = '<li class="page">';

$config['num_tag_close'] = '</li>';

 

// $config['display_pages'] = FALSE;

//

		$CI->pagination->initialize($config);

		$data["results"] =$data_pag;

		$data["links"] = $CI->pagination->create_links();

		return $data;

	}

	

}