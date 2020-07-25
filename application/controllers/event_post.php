<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_post extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('mevent');
        $this->load->model('mberita');
    }
	public function index()
	{
        $x['paket']=$this->mberita->paket_footer();
        $x['berita']=$this->mberita->berita_footer();
        $x['photo']=$this->mberita->get_photo();
		$jum=$this->mevent->count_event();
        $page=$this->uri->segment(3);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit=4;
        $config['base_url'] = base_url() . 'event_post/index/';
            $config['total_rows'] = $jum->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 3;
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Selanjutnya';
            $config['prev_link'] = 'Sebelumnya';
            $this->pagination->initialize($config);
            $x['page'] =$this->pagination->create_links();
		$x['news']=$this->mevent->get_event($offset,$limit);
        $x['brt']=$this->mevent->tampil_event();
		$this->load->view('front/v_event',$x);
	}
	function detail_event(){
        $x['paket']=$this->mberita->paket_footer();
        $x['berita']=$this->mberita->berita_footer();
        $x['photo']=$this->mberita->get_photo();
		$kode=$this->uri->segment(3);
		$x['brt']=$this->mevent->tampil_event();
		$x['news']=$this->mevent->getevent($kode);
		$this->load->view('front/v_detail_event',$x);
	}
}