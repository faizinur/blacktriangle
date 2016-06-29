 <?php
class Mahasiswa extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_mahasiswa');
		$this->load->helper('url'); //helper url
	}

	function index(){ // load halaman 
		$this->load->view('v_login');
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

	$cek = $this->m_mahasiswa->cekuser('t_listuser',$where,$data)->result();

		if($cek == 0){
			//echo "gak ada data ->". $cek;
			redirect('mahasiswa/index');
		}else{

			//echo "ada". $cek;

				foreach ($cek as $c) {	
					# code...
					$sess_data['id_user'] = $c->id;
					$sess_data['id_pbm'] = $c->id_pbm;
					//echo "id user :".$c->id;

					$sess_data['nama'] = $nama;
					$sess_data['level'] = 'mahasiswa';

					$this->session->set_userdata($sess_data);
					
				}

				redirect('chat/');
				echo "redirect ke halaman chat";
		}
	}

	function logout(){
		$where = array( //data buat cek nama sama pass
			'id' => $this->session->userdata("id_user"),
			);

		$data = array( // data buat update status di tabel t_listuser
			'status' => 'off'
			);

		$this->m_mahasiswa->cekuser('t_listuser',$where,$data);
		
		$this->session->sess_destroy();
		redirect('mahasiswa/');
	}
}