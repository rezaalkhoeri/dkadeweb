<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('mpesanan');
		$this->load->model('mlogin');
	}

	function index(){
		$x['title'] = 'Dashboard';
		if($this->session->userdata('akses')=='1'){
			$pesanan = $this->mpesanan->get_data();
			$getData = $this->mlogin->getDashboard();
			$x['belum'] = $getData[0]->Jumlah;
			$x['cancel'] = $getData[1]->Jumlah;
			$x['lunas'] = $getData[2]->Jumlah;
			$x['totalOrder'] = count($pesanan);
			$this->load->view('backend/v_dashboard', $x);
		}else{
			redirect('administrator');
		}
	
	}
	
}