<?php
class Testimoni extends CI_Controller{
    function __construct(){
        parent::__construct();
		$this->load->model('mevent');
		$this->load->model('mtarian');
        $this->load->model('mberita');
        $this->load->model('mtestimoni');
    }
    function index(){
        $x['tari']=$this->mtarian->getTariFooter();
        $x['event']=$this->mevent->tampil_event();
        $x['berita']=$this->mberita->berita_footer();
        $x['photo']=$this->mberita->get_photo();
        $x['test']=$this->mtestimoni->tampil_test();
		$x['brt']=$this->mberita->tampil_berita();
		$this->load->view('front/v_testimoni',$x);
    }
    function simpan(){
        $nama   = str_replace("'", "",$this->input->post('nama'));
        $email  = str_replace("'", "",$this->input->post('email'));
        $msg    = str_replace("'", "",$this->input->post('message'));

        $this->mtestimoni->simpan_testimoni($nama,$email,$msg);
        redirect('testimoni');
    }
}
