<?php

class M_chat extends CI_Model{
	
	function tambah_data($data,$table){
		$this->db->set('tg_psn','now()',FALSE); //set field tanggal biar selalu now()
		$this->db->insert($table, $data);
	}	

	function loadpesan($where){//load pake interval atau setip kali klik tombol kirim lihat v_chat function loadpesan
		//return $this->db->where($where)->order_by("id","DESC")->limit(1)->get("t_chat");
		return $this->db->where($where)->order_by("id","DESC")->limit(1)->get("t_chat");
	}

	function loadsemua($where){//load di awal aja
		return $this->db->where($where)->order_by("id","ASC")->get("t_chat");	
	}

}