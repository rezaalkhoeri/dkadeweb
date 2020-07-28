<?php
class Tarian extends CI_Controller{
	function __construct(){
        parent::__construct();
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
        $this->load->model('mtarian');
        $this->load->library('upload');
    }

	function index(){
		$x['title'] = 'List Tari';
	    if($this->session->userdata('akses')=='1'){
			$x['data'] = $this->mtarian->get_tari();
	        $this->load->view('backend/v_tarian',$x);
	    }else{
	        echo "Halaman tidak ditemukan";
	    }
    }

    function simpan_tari(){
    	$config['upload_path'] = './assets/gambars/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	    $this->upload->initialize($config);
	    if(!empty($_FILES['filefoto']['name'])){
            if ($this->upload->do_upload('filefoto')){
	        	$gbr = $this->upload->data();
	            //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='./assets/gambars/'.$gbr['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= FALSE;
	            $config['quality']= '60%';
	            $config['width']= 756;
	            $config['height']= 434;
	            $config['new_image']= './assets/gambars/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

				$nama_tari=$this->input->post('nama_tari');
				$harga=$this->input->post('harga');
				$deskripsi=$this->input->post('deskripsi');

				$data = array(
					'nama_tari' => $nama_tari,
					'harga' => $harga,
					'deskripsi' => $deskripsi,
					'gambar' => $gbr['file_name']
				);

                $this->mtarian->insert_data($data,'tari');
				$notif = [
					'alert' => 'success',
					'pesan' => "Berhasil menyimpan"
				];
				echo $this->session->set_flashdata('msg',$notif);
				redirect('backend/tarian');
            } else {
				$notif = [
					'alert' => 'warning',
					'pesan' => $this->upload->display_errors()
				];
				echo $this->session->set_flashdata('msg',$notif);
				redirect('backend/tarian');
			}
		} else{
				$notif = [
					'alert' => 'warning',
					'pesan' => $this->upload->display_errors()
				];
				echo $this->session->set_flashdata('msg',$notif);
				redirect('backend/tarian');
		}

    }

    function update_tari(){
    	$config['upload_path'] = './assets/gambars/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		
	    if(!empty($_FILES['filefoto_update']['name'])){
            if ($this->upload->do_upload('filefoto_update')){
	        	$gbr = $this->upload->data();
	            //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='./assets/gambars/'.$gbr['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= FALSE;
	            $config['quality']= '60%';
	            $config['width']= 756;
	            $config['height']= 434;
	            $config['new_image']= './assets/gambars/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

				$idtari=$this->input->post('idtari');
				$nama_tari=$this->input->post('nama_tari_update');
				$harga=$this->input->post('harga_update');
				$deskripsi=$this->input->post('deskripsi_update');

				$data = array(
					'nama_tari' => $nama_tari,
					'harga' => $harga,
					'deskripsi' => $deskripsi,
					'gambar' => $gbr['file_name']
				);

				$where = [
					'idtari' => $idtari
				];

				$this->mtarian->update_data($where,$data,'tari');
				$notif = [
					'alert' => 'success',
					'pesan' => "Berhasil update"
				];

				echo $this->session->set_flashdata('msg',$notif);
				redirect('backend/tarian');
            } else {
				$notif = [
					'alert' => 'warning',
					'pesan' => $this->upload->display_errors()
				];

				echo $this->session->set_flashdata('msg',$notif);
				redirect('backend/tarian');
			}
		} else{
			$notif = [
				'alert' => 'warning',
				'pesan' => $this->upload->display_errors()
			];

			echo $this->session->set_flashdata('msg',$notif);
			redirect('backend/tarian');
		}
	}

    function hapus_tari(){
	    if($this->session->userdata('akses')=='1'){
			$idtari=$this->input->post('idtari');

			$where = [
				'idtari' => $idtari
			];

			$this->mtarian->hapus_data($where,'tari');
			$notif = [
				'alert' => 'success',
				'pesan' => "Berhasil hapus data"
			];

			echo $this->session->set_flashdata('msg',$notif);
			redirect('backend/tarian');
	    }else{
			$this->mtarian->hapus_data($where,'tari');
			$notif = [
				'alert' => 'warning',
				'pesan' => "Data gagal dihapus"
			];

			echo $this->session->set_flashdata('msg',$notif);
			redirect('backend/tarian');
	    }
    }

}