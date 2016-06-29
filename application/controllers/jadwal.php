<?php

class jadwal extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_jadwal');

		$this->load->helper('url');
	}

	function index(){
		echo "selamat datang di halaman Jadwal";
	}

	function edit_jadwal(){
		echo "edit jadwal";	
	}
}