<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class order extends CI_Controller {
	function __construct(){
        parent::__construct();
		$this->load->model('morders');
		$this->load->model('mevent');
		$this->load->model('mtarian');
		$this->load->model('mtarian');
        $this->load->model('mpaket');
        $this->load->model('mberita');

		if($this->session->userdata('masuk') !== TRUE){
			$this->session->set_userdata('page', 'order');
			redirect('welcome/loginUser');
        };
    }
	public function index()
	{
        $x['tari']=$this->mtarian->getTariFooter();
        $x['berita']=$this->mberita->berita_footer();
        $x['photo']=$this->mberita->get_photo();
		$jum=$this->mpaket->tampil_paket();
        $page=$this->uri->segment(3);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit=4;
        $config['base_url'] = base_url() . 'paket_tour/index/';
            $config['total_rows'] = $jum->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 3;
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
            $config['next_link'] = 'Selanjutnya';
            $config['prev_link'] = 'Sebelumnya';
            $this->pagination->initialize($config);
            $x['page'] =$this->pagination->create_links();
		$x['news']=$this->mpaket->get_paket($offset,$limit);
        $x['brt']=$this->mpaket->tampil_paket();
		$this->load->view('front/v_paket',$x);
	}
	function detail_paket(){
        $x['paket']=$this->mberita->paket_footer();
        $x['berita']=$this->mberita->berita_footer();
        $x['photo']=$this->mberita->get_photo();
		$kode=$this->uri->segment(3);
		$x['brt']=$this->mpaket->tampil_paket();
		$x['news']=$this->mpaket->getpaket($kode);
		$this->load->view('front/v_detail_paket',$x);
	}
    function pesan_tarian(){
        if($this->session->userdata('akses')=='3'){
            $x['tari']=$this->mtarian->getTariFooter();
            $x['tarianList']=$this->mtarian->get_tari();
            $x['event']=$this->mevent->tampil_event();
            $x['berita']=$this->mberita->berita_footer();
            $x['photo']=$this->mberita->get_photo();
            $kode=$this->uri->segment(3);
            $x['pkt']=$this->mpaket->getpaket($kode);
            $x['byr']=$this->mpaket->get_metode_pembayaran();
            $this->load->view('front/v_order',$x);
        }else{
            $kode=$this->uri->segment(3);
			$this->session->set_userdata('idTari', $kode);            
            redirect('welcome/loginUser');
        }
    }
    function submitOrder(){
        $namaLengkap = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $noTelp = $this->input->post('notelp');
        $email = $this->input->post('email');
        $tari = $this->input->post('tari');
        $tglTampil = $this->input->post('tglTampil');
        $metodeBayar = $this->input->post('metodeBayar');
        $keterangan = $this->input->post('keterangan');

        $invoiceNumber;
        $cek = $this->morders->createInvoice();
        if ($cek !== null) {
            $max = $cek[0]->INVOICE;
            $code = substr($max, 0, 3);
            $number = substr($max, 3, 8);            
            $increment = str_pad($number + 1, 6, 0, STR_PAD_LEFT);
            $invoiceNumber = $code.$increment;
        } else {
            $invoiceNumber = 'INV000001';
        }

        $dateNow = date("Y-m-d");
        $batas = date('Y-m-d', strtotime($dateNow. ' + 3 days'));

        $data = [
            'invoice' => $invoiceNumber,
            'batasBayar' => $batas,
            'namaPemesan' => $namaLengkap,
            'alamat' => $alamat,
            'notelp' => $noTelp,
            'email' => $email,
            'idTari' => $tari,
            'tanggalTampil' => $tglTampil,
            'metode_id' => $metodeBayar,
            'keterangan' => $keterangan,
            'status_bayar' => 'B'
        ];

        $this->morders->orderTari('pesanan',$data);
        $returnData['getData'] = $this->morders->getOrderTariByInvoice($invoiceNumber);
        $mesg = $this->load->view('backend/email_order',$returnData,true);

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
        $this->email->to($email); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        // Subject email
        $this->email->subject('DKADE Dance - Lembar Pemesanan');

        // Isi email
        $this->email->message($mesg);

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            $this->session->set_flashdata("notif","Email berhasil terkirim. Silahkan cek kotak masuk email anda.");
            return redirect('welcome');
        } else {
            $this->morders->deleteOrderByID($invoiceNumber);
            $this->session->set_flashdata("notif","Email gagal dikirim."); 
            return redirect('welcome');
        }
    }
    function set_pembayaran(){
        $x['paket']=$this->mberita->paket_footer();
        $x['berita']=$this->mberita->berita_footer();
        $x['photo']=$this->mberita->get_photo();
        $id=$this->uri->segment(3);
        $no_invoice=$this->session->userdata('invoices');
        $this->mpaket->set_bayar($no_invoice,$id);
        if($id=='1'){
            $x['data']=$this->mpaket->faktur();
            $x['judul']="Invoice";
            $this->load->view('front/v_invoices',$x);
        }else{
            $x['data']=$this->mpaket->faktur();
            $x['judul']="Invoice";
            $this->load->view('front/v_invoices_bank',$x);
        }
    }
}