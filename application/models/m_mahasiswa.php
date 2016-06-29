<?php

class M_mahasiswa extends CI_Model{
	
	function cekuser($table,$where,$data){
		//return $this->db->where('username', $nama);
			$this->db->where($where); // update data status di table t_listuser pake $data
			$this->db->update($table,$data); // ini juga sama
		return $this->db->get_where($table, $where); // ini return num_rows select nama sama password 
	}

	function statuser($table,$data,$where){
			$this->db->where($where); // update data status di table t_listuser pake $data
			$this->db->update($table,$data); // ini juga sama
	}
}