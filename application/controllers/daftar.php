<?php 

class Daftar extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_listuser');

		$this->load->helper('url'); //helper url
	}

	function index(){ // load halaman 
		$this->load->view('v_utama');
	}


	function penerimaan(){//link ke halaman penerimaan + load data
		$data['pendaftar'] = $this->m_listuser->tampil_list()->result();
		$data['tes'] = 'String biasa';
		$this->load->view('v_listp',$data);	
	}

	function daftarpkl(){ //load halaman daftar pkl datanya ditangani pake function daftarmhs()
		$this->load->view('v_daftarpkl');
	}


	function daftarmhs(){ //input data
		//ambil data post dari view v_daftarpkl
		$nrp = $this->input->post('nrp');
		$nama = $this->input->post('nama');
		$pt = $this->input->post('pt');
		$jurusan = $this->input->post('jurusan');
		$bidang = $this->input->post('bidang');
		$lamakp = $this->input->post('lamakp');
		$tgl_msk = $this->input->post('tgl_msk');

		$data = array( //masukkkin ke array
			'nrp' => $nrp,
			'nama' => $nama,
			'pt' => $pt,
			'jurusan' => $jurusan,
			'bidang' => $bidang,
			'tgl_msk' => $tgl_msk,
			'lamakp' => $lamakp,
			'status' => 'T'
			);
		$this->m_listuser->tambah_data($data,'t_daftar');
		$berita = 'aaaaa';
		redirect('',$berita);
	}
}