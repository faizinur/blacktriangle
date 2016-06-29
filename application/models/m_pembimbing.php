<?php

class M_pembimbing extends CI_Model{
	
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

	function list_user($where){
		//inner join table t_listuser jeung t_pembimbing
		$this->db->select('t_pembimbing.id as id_pembimbing ,t_listuser.id as id_user,t_listuser.username');
		$this->db->from('t_pembimbing');
		$this->db->join('t_listuser', 't_pembimbing.id = t_listuser.id_pbm');
		$this->db->where($where);
		$query = $this->db->get();

		return $query;
	}
}