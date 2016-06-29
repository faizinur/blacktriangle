<?php

class Admin extends CI_controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_admin');

		$this->load->helper('url');
	}

	function index(){
		$this->load->view('admins/v_admin');
	}

	function dologin(){//link buat ke home admin
		$this->load->view('admins/v_a_home');
	}

	function verifikasi(){//link ke halaman verifikasi
		$data['pendaftar'] = $this->m_admin->tampil_list()->result();
		$this->load->view('admins/v_admin_ver',$data);
	}

	function acc_data($id){//kasih passwod sama username
		$data['id_pmb'] = $this->m_admin->get_pmb()->result();	//get id + username pembimbing
		$data['id_m'] = $id;
		$this->load->view('admins/v_admin_accept', $data);
	}

	function penerimaan(){//link ke halaman penerimaan + load data
		//$this->load->view('v_listp',$data);	//poho deui ieu naon?
		$id_pmb = $this->input->post('id_pmb');
		$id_baru = $this->input->post('id_baru');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

/*		echo $id_pmb."  >>ID pmb <br/>";
		echo $id_baru." >>ID baru <br/>";
		echo $username." >>usename <br/>";
		echo $password." >>password <br/>";*/

		//insert ke t_listuser

		$dataI = array( // data buat update status di tabel t_listuser
			'id_pbm' => $id_pmb,
			'id_baru' => $id_baru,
			'username' => $username,
			'password' => $password,
			'status' => 'off'
			);
		$cek = $this->m_admin->add_acc('t_listuser',$dataI);

			if($cek == "true"){

				//update t_daftar
				$whereU = array( //data where id
					'id' => $id_baru
					);

				$dataU = array( // data buat update status di tabel t_daftar
					'status' => 'Y'
					);
				$this->m_admin->update_acc('t_daftar',$whereU,$dataU);
				//redirect 
				redirect('admin/verifikasi');
			}	
	}


//function login logout
	function cek(){
		$nama = $this->input->post('nama');
		$pass = $this->input->post('pass');
	$where = array( //data buat cek nama sama pass
		'username' => $nama,
		'password' => $pass 
		);
	//$cek = $this->m_admin->cekuser('t_admin',$where)->num_rows();
	$cek = $this->m_admin->adminLog('t_admin',$where)->num_rows();
			if($cek > 0){
					$sess_data['nama'] = $nama;
					$sess_data['level'] = 'admin';
					$this->session->set_userdata($sess_data);
					
					redirect('admin/dologin');
					echo "redirect ke halaman chat";			
			}else{
				//echo "gak ada data ->". $cek;
				redirect('admin/');

			} 
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('admin/');
	}
}
