<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('mlogin');
        $this->load->model('mpengguna');
        $this->load->model('mberita');
		$this->load->model('mtestimoni');
		$this->load->model('m_pengunjung');
	}
	public function index(){
		$user_ip=$_SERVER['REMOTE_ADDR'];
		if ($this->agent->is_browser()){
		    $agent = $this->agent->browser();
		}elseif ($this->agent->is_robot()){
		    $agent = $this->agent->robot(); 
		}elseif ($this->agent->is_mobile()){
		    $agent = $this->agent->mobile();
		}else{
			$agent='Other';
		}
		$cek_ip=$this->m_pengunjung->cek_ip($user_ip);
		$cek=$cek_ip->num_rows();
		if($cek > 0){
			$x['paket']=$this->mberita->paket_footer();
			$x['berita']=$this->mberita->berita_footer();
			$x['photo']=$this->mberita->get_photo();

			$x['test']=$this->mtestimoni->tampil_test();
			$x['wisata']=$this->mberita->get_wisata();
			$x['news']=$this->mberita->berita();
			$this->load->view('front/home',$x);
		}else{
			$this->m_pengunjung->simpan_user_agent($user_ip,$agent);
			$x['paket']=$this->mberita->paket_footer();
			$x['berita']=$this->mberita->berita_footer();
			$x['photo']=$this->mberita->get_photo();

			$x['test']=$this->mtestimoni->tampil_test();
			$x['wisata']=$this->mberita->get_wisata();
			$x['news']=$this->mberita->berita();
			$this->load->view('front/home',$x);
		}
	}

	public function loginUser()
	{
		$this->load->view('front/v_login_user');
	}

	public function logout()
	{
		$this->session->sess_destroy();
	    redirect(base_url());
	}

	public function register()
	{
		$datanya = json_decode($this->input->post('data'));

		$nama = $datanya->nama;
		$username = $datanya->username;
		$password = $datanya->password;
		$level = "3";
		$gambar = "";

		$this->mpengguna->simpan_user($nama,$username,$password,$level,$gambar);
		$cadmin=$this->mlogin->cekadmin($username,$password);
        if($cadmin->num_rows > 0){
			$xcadmin=$cadmin->row_array();
			$this->session->set_userdata('masuk',true);
			$this->session->set_userdata('user',$username);
            $this->session->set_userdata('idUser',$xcadmin['idadmin']);
            $this->session->set_userdata('nama',$xcadmin['nama']);
            $this->session->set_userdata('akses',$xcadmin['level']);

			if($this->session->userdata('page') == 'konfirmasi'){
				$return = [
					'response' => 'TRUE',
					'page' => 'konfirmasi',
					'message' => 'Login Success',
				];
				echo json_encode($return);
			} else {
				$return = [
					'response' => 'TRUE',
					'page' => 'order',
					'idTari' => $this->session->userdata('idTari'),
					'message' => 'Login Success',
				];
				echo json_encode($return);
			}
		} else {
			$return = [
				'response' => 'TRUE',
				'message' => 'Register User Failed',
			];
			echo json_encode($return);
		}
	}
}