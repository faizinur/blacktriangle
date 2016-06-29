<?php
class Chat extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_chat');
		$this->load->model('m_pembimbing');
		$this->load->helper('url'); //helper url
	}

	function index(){
		$this->load->view('v_chat');
	}

	function chatp(){		
		$this->load->view('v_chat_p');
	}

/*	function returen(){//fungi coba coba tapi gagal antepkeun
		$returen = $ths->input->post("returen");
	return "abcde";
	}*/

	function kirimPesan(){
		$sender = $this->session->userdata("id_user");
		$receiver = $this->session->userdata("id_pbm");
		$pesan = $this->input->post("pesan");
		$file = '';//$this->input->post();

		if(!$file){
			$file="filenya belom ada";
		}

		$data = array(
			'id_sndr' => $sender,
			'file' => $file,
			'id_rcv'=> $receiver,
			'pesan' => $pesan,
			'status' => 'u'
		 );

		$this->m_chat->tambah_data($data,'t_chat');
		$this->load->view("v_chat_konten",$data);//di load sama fungtion result dari v_chat ajax
	}

	function loadpesan(){
		$sender = $this->session->userdata("id_user");
		$receiver = $this->session->userdata("id_pbm");

		$where = "(id_sndr ='$sender' and id_rcv='$receiver') or (id_sndr ='$receiver' and id_rcv='$sender')";
		$data['d_chat'] = $this->m_chat->loadsemua($where)->result();

		$this->load->view('v_chat_konten', $data);
	}

	function pesanbaru(){
		$sender = $this->session->userdata("id_user");
		$receiver = $this->session->userdata("id_pbm");

		$where = "(id_sndr ='$sender' and id_rcv='$receiver') or (id_sndr ='$receiver' and id_rcv='$sender')";
		$data['d_chat'] = $this->m_chat->loadpesan($where)->result();

		$this->load->view('v_chat_konten', $data);
	}

}