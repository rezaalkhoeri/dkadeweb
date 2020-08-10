<?php
class Konfirmasi extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('mtarian');		
		$this->load->model('morders');
        $this->load->library('upload');
		$this->load->model('mberita');

		if($this->session->userdata('masuk') !== TRUE){
			$this->session->set_userdata('page','konfirmasi');
			redirect('welcome/loginUser');
        };
	}
	function index(){
		if($this->session->userdata('akses')=='3'){
			$x['tari']=$this->mtarian->getTariFooter();
			$x['berita']=$this->mberita->berita_footer();
			$x['photo']=$this->mberita->get_photo();
			$x['bnk']=$this->morders->get_bank();
			$this->load->view('front/v_konfirmasi',$x);
        }else{
			redirect('welcome/loginUser');
        }
	}
	
	function pembayaran(){
		$invoiceNumber	=	$this->input->post('invoice');
		$cekData	=	$this->morders->getOrderTariByInvoice($invoiceNumber);
		if(count($cekData) > 0){
			$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
			$config['upload_path'] = './assets/bukti_transfer/'; //path folder
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '15048'; 
			$config['max_width']  = '9588'; 
			$config['max_height']  = '7000'; 
			$config['file_name'] = $nmfile; 

			$this->upload->initialize($config);
			if(!empty($_FILES['filefoto']['name'])){
				$this->upload->do_upload('filefoto');
				if ( $this->upload->do_upload('filefoto')){
					$_FILES['filefoto']['name'];
					$gbr		=	$this->upload->data();
					$gambar		=	$gbr['file_name'];
					$noinvoice	=	strip_tags(str_replace("'", "",$this->input->post('invoice')));
					$tgl_bayar	=	$this->input->post('tglTransfer');

					$data = [
						'invoice' => $noinvoice,
						'bukti_transfer' => $gambar,
						'tanggalTransfer' => $tgl_bayar
					];

					if( $gambar !== ""){
						$this->morders->konfirmasiBayar($data,'pembayaran');
						$this->morders->updateStatus($noinvoice);
						$returnData['getData'] = $this->morders->getOrderTariByInvoice($invoiceNumber);
						$returnData['getKonfirmasi'] = $this->morders->getBayarByInvoice($invoiceNumber);
						$mesg = $this->load->view('backend/email_konfirmasi',$returnData,true);

						// Konfigurasi email
						$config = [
							'mailtype'  => 'html',
							'charset'   => 'utf-8',
							'protocol'  => 'smtp',
							'smtp_host' => 'smtp.gmail.com',
							'smtp_user' => 'dkadeproduction@gmail.com',  // Email gmail
							'smtp_pass'   => 'dkadepro6',  // Password gmail
							'smtp_crypto' => 'ssl',
							'smtp_port'   => 465,
							'crlf'    => "\r\n",
							'newline' => "\r\n"
						];

						// Load library email dan konfigurasinya
						$this->load->library('email', $config);

						// Email dan nama pengirim
						$this->email->from('dkadeproduction@gmail.com', 'dkade-production.com');

						// Email penerima
						$this->email->to($returnData['getData'][0]->email); // Ganti dengan email tujuan

						// Lampiran email, isi dengan url/path file
						// $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

						// Subject email
						$this->email->subject('DKADE Dance - Lembar Pemesanan');

						// Isi email
						$this->email->message($mesg);

						// Tampilkan pesan sukses atau error
						if ($this->email->send()) {
							echo $this->session->set_flashdata('msg','Terima Kasih Telah Melakukan Konfirmasi Pembayaran!');
							redirect('konfirmasi');
						} else {
							$this->morders->deleteKonfirByID($invoiceNumber);
							$this->session->set_flashdata("notif","Email gagal dikirim."); 
							redirect('konfirmasi');
						}
					}else{
						echo $this->session->set_flashdata('msg','Konfirmasi pembayaran gagal!');
						redirect('konfirmasi');
					}
				} else {
					echo $this->session->set_flashdata('msg','Upload Bbukti transfer gagal!');
					redirect('konfirmasi');
				}
			} else {
				echo $this->session->set_flashdata('msg','Harap upload file bukti transfer!');
				redirect('konfirmasi');
			}
		} else {
			echo $this->session->set_flashdata('msg','Nomor Invoice tidak cocok, coba cek lagi!');
			redirect('konfirmasi');		
		}
	}
}
