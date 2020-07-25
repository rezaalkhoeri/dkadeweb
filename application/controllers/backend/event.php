<?php
class Event extends CI_Controller{
	function __construct(){
        parent::__construct();
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        }; 
        $this->load->model('mevent');
        $this->load->library('upload');
    }
    function index(){
		$x['title'] = 'List event';
	    if($this->session->userdata('akses')=='1'){
	    	$x['data']=$this->mevent->tampil_event();
	        $this->load->view('backend/v_event',$x);
	    }else{
	        echo "Halaman tidak ditemukan";
	    }
    }

    function simpan_event(){
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

	            $gambar=$gbr['file_name'];
                $nama_event=$this->input->post('nama_event');
                $deskripsi=$this->input->post('deskripsi');

				$this->mevent->Simpanevent($nama_event,$deskripsi,$gambar);
				echo $this->session->set_flashdata('msg','success');
				redirect('backend/event');
		}else{
	        echo $this->session->set_flashdata('msg','warning');
	        redirect('backend/event');
	    }
	                 
	    }else{
			redirect('backend/event');
		}
    }

    function update_event(){
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

	            $gambar=$gbr['file_name'];
	            $kode=$this->input->post('kode');
                $nama_event=$this->input->post('nama_event');
                $deskripsi=$this->input->post('deskripsi');

				$this->mevent->update_event_with_img($kode,$nama_event,$deskripsi,$gambar);
				echo $this->session->set_flashdata('msg','info');
				redirect('backend/event');
	                    
	    	}else{
	        	echo $this->session->set_flashdata('msg','warning');
	        	redirect('backend/event'); 
	        }       
	    }else{
			$kode=$this->input->post('kode');
            $nama_event=$this->input->post('nama_event');
            $deskripsi=$this->input->post('deskripsi');
			$this->mevent->update_event_no_img($kode,$nama_event,$deskripsi);
			echo $this->session->set_flashdata('msg','info');
			redirect('backend/event');
	    } 

	}

    function hapus_event(){
	    if($this->session->userdata('akses')=='1'){
	        $id=$this->input->post('kode');
	        $this->mevent->hapus_event($id);
	        echo $this->session->set_flashdata('msg','success-hapus');
	        redirect('backend/event');
	    }else{
	        echo "Halaman tidak ditemukan";
	    }
    }

}