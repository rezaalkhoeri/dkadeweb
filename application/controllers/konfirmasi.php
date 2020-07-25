<?php
class Konfirmasi extends CI_Controller{
	function __construct(){
		parent::__construct();
		
		$this->load->model('morders');
        $this->load->library('upload');
		$this->load->model('mberita');

		if($this->session->userdata('masuk') !== TRUE){
			redirect('welcome/loginUser');
        };
	}
	function index(){
		if($this->session->userdata('akses')=='3'){
			$x['paket']=$this->mberita->paket_footer();
			$x['berita']=$this->mberita->berita_footer();
			$x['photo']=$this->mberita->get_photo();
			$x['bnk']=$this->morders->get_bank();
			$this->load->view('front/v_konfirmasi',$x);
        }else{
			$this->session->set_userdata('page', 'konfirmasi');
			redirect('welcome/loginUser');
        }
	}
	
	function upload_bukti(){
		$kode=$this->input->post('invoice');
		$data=$this->morders->cek_invoice($kode);
		$q=$data->num_rows();
		if($q>0){
			$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
			$config['upload_path'] = './assets/bukti_transfer/'; //path folder
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '15048'; 
			$config['max_width']  = '9588'; 
			$config['max_height']  = '7000'; 
			$config['file_name'] = $nmfile; 

			$this->upload->initialize($config);
			// echo $_FILES['filefoto']['name'];
			// echo $this->input->post('filefoto');
			if(!empty($_FILES['filefoto']['name']))
			{
				// echo $this->upload->do_upload('filefoto');
				if ( $this->upload->do_upload('filefoto'))
				{
					echo $_FILES['filefoto']['name'];
						$gbr = $this->upload->data();
						$gambar=$gbr['file_name'];
						$noinvoice=strip_tags(str_replace("'", "",$this->input->post('invoice')));
						$nama=strip_tags(str_replace("'", "",$this->input->post('nama')));
                        $bank=$this->input->post('bank');
                        $tgl_bayar=$this->input->post('tgl_bayar');
                        $jumlah=strip_tags(str_replace("'", "",$this->input->post('jumlah')));
						echo $nama;
				if($gambar==true){
					$this->morders->simpan_bukti($noinvoice,$nama,$bank,$tgl_bayar,$jumlah,$gambar);
				}else{
					redirect('konfirmasi');
				}
					echo $this->session->set_flashdata('msg','Terima Kasih Telah Melakukan Konfirmasi Pembayaran!');
				redirect('konfirmasi');
			}  
		} 

		}else{
			echo $this->session->set_flashdata('msg','No Invoice tidak cocok, coba cek lagi!');
			redirect('konfirmasi');
		}
	}
}
