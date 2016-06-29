<?php

class M_admin extends CI_Model{
	function adminLog($table,$where){
		return $this->db->get_where($table, $where); // ini return num_rows select nama sama password 
	}

	function fetchadmin($table,$where){
		return $this->db->get_where($table,$where);
	}

	function tampil_list(){
		return $this->db->get('t_daftar');
	}
	
	function get_pmb(){
		$this->db->select('id, username');
		$query = $this->db->get('t_pembimbing');
		return $query;
	}

	function add_acc($table,$data){
		$this->db->insert($table, $data);
	return "true";
	}

	function update_acc($table,$where,$data){
		$this->db->where($where); // update data status di table t_daftar pake $data
		$this->db->update($table,$data); // ini juga sama

	}
}