 <?php
class Pembimbing extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_pembimbing');
		$this->load->helper('url'); //helper url
	}

	function index(){ // load halaman 
		$this->load->view('v_login');
	}

	function mhsbim(){
		$id_pem = $this->session->userdata('id_pem');
		$where = "t_pembimbing.id = $id_pem";
		$data['list_user'] = $this->m_pembimbing->list_user($where)->result();

		$this->load->view('v_chat_list', $data);
	}

	function cek(){
		$nama = $this->input->post('nama');
		$pass = $this->input->post('pass');
		
		$where = array( //data buat cek nama sama pass
			'username' => $nama,
			'password' => $pass 
			);

		$data = array( // data buat update status di tabel t_listuser
			'status' => 'on'
			);

	$cek = $this->m_pembimbing->cekuser('t_pembimbing',$where,$data)->result();

		if($cek == 0){

			//echo "gak ada data ->". $cek;
			redirect('pembimbing/');

		}else{

			//echo "ada". $cek;

				foreach ($cek as $c) {	
					# code...
					$sess_data['id_pem'] = $c->id;


					$sess_data['nama_pem'] = $nama;
					$sess_data['level'] = 'pembimbing';


					$this->session->set_userdata($sess_data);

					redirect('chat/chatp');
				}

				
				//echo "redirect ke halaman chat";
		}
	}

	function logout(){
		$where = array( //data buat cek nama sama pass
			'id' => $this->session->userdata("id_user"),
			);

		$data = array( // data buat update status di tabel t_listuser
			'status' => 'off'
			);

		$this->m_pembimbing->cekuser('t_pembimbing',$where,$data);
		
		$this->session->sess_destroy();
		redirect('pembimbing/');
	}
}