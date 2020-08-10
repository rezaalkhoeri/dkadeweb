<?php
class Pesanan extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
        $this->load->model('morders');
        $this->load->model('mpesanan');
    }

    function index(){
        $x['title'] = 'Pesanan';
        $x['data']=$this->mpesanan->get_data();
        $this->load->view('backend/v_orders',$x);
    }

    public function cancel()
    {
        $id = $this->input->post('idPesanan');
        $where = [
            'id_pesanan' => $id
        ];

        $data = [
            'status_bayar' => 'C'
        ];

        $this->mpesanan->update_data($where,$data,'pesanan');
        return redirect(base_url().'backend/pesanan');
    }

    public function hapus()
    {
        $id = $this->input->post('idPesanan');
        $where = [
            'id_pesanan' => $id
        ];
        $this->morders->deleteOrderByID($where);
        return redirect(base_url().'backend/pesanan');
    }

    public function reportFilter()
    {
        
        $dariTanggal =$this->input->post('dariTanggal');
        $sampaiTanggal =$this->input->post('sampaiTanggal');
        $status =$this->input->post('status');

        $data['getFilter'] = [
            'dari' => $dariTanggal,
            'sampai' => $sampaiTanggal,
            'status' => $status
        ];
        $data['getReport'] = $this->mpesanan->reportFilter($dariTanggal, $sampaiTanggal, $status);
        
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "dkade-report.pdf";
        $this->pdf->load_view('backend/pdf_report', $data);
    }    
}
