<?php

class M_listuser extends CI_Model{
	
	function tampil_list(){
		return $this->db->get('t_daftar');
	}

	function tambah_data($data,$table){
		$this->db->insert($table, $data);
	}
}