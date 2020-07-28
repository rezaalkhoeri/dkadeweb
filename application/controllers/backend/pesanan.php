<?php
class Pesanan extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
        $this->load->model('mpesanan');
    }

    function index(){
        $x['title'] = 'Pesanan';
        $x['data']=$this->mpesanan->get_data();
        $this->load->view('backend/v_orders',$x);
    }

}
