<?php
class Morders extends CI_Model{

    function orderTari($table,$data){
 		$this->db->insert($table,$data);
    }
    function createInvoice()
    {
        $hasil=$this->db->query("SELECT MAX(invoice) AS INVOICE FROM pesanan");
        return $hasil->result();
    }
    function getOrderTariByInvoice($kode){
        $hasil=$this->db->query("SELECT * FROM pesanan
                                JOIN tari ON pesanan.idTari = tari.idtari
                                JOIN metode_bayar ON pesanan.metode_id = metode_bayar.id_metode
                                WHERE pesanan.invoice = '$kode'");
        return $hasil->result();
    }
    function deleteOrderByID($where){
		$this->db->where($where);
		$this->db->delete('pesanan');
    }
	function konfirmasiBayar($data, $table){
		$this->db->insert($table,$data);
	}
    function getBayarByInvoice($invoice){
        $hasil=$this->db->query("SELECT * FROM pembayaran WHERE invoice = '$invoice'");
        return $hasil->result();
    }
    function deleteKonfirByID($where){
		$this->db->where($where);
		$this->db->delete('pembayaran');
    }
    function simpan_testimoni($nama,$email,$msg){
        $hasil=$this->db->query("INSERT INTO testimoni(nama,email,pesan,status,tgl_post) VALUES ('$nama','$email','$msg','0',curdate())");
        return $hasil;
    }
    function get_orders(){
        $sql = "SELECT * FROM pesanan
                LEFT JOIN paket_tari ON paket_tari.idpaket = pesanan.idPaket
                LEFT JOIN metode_bayar ON metode_bayar.id_metode = pesanan.metode_id
                GROUP BY pesanan.createdDate DESC";
        $hasil = $this->db->query($sql)->result();
        return $hasil;
    }

    public function get_pembayaran()
    {
        $sql = "SELECT * FROM pembayaran
                JOIN pesanan ON pembayaran.invoice = pesanan.invoice
                JOIN tari ON pesanan.idTari = tari.idtari
                JOIN metode_bayar ON pesanan.metode_id = metode_bayar.id_metode";
        $hasil = $this->db->query($sql)->result();
        return $hasil;        
    }
    public function updateStatus($where)
    {
        $hasil=$this->db->query("UPDATE pesanan SET status_bayar = 'L' WHERE invoice='$where'");
        return $hasil;
    }

    // 
    function bayar_selesai($id){
        $hasil=$this->db->query("UPDATE orders SET status_bayar='LUNAS' WHERE id_order='$id'");
        return $hasil;
    }
    function edit_orders($kode,$dewasa,$anaks){
        $hasil=$this->db->query("UPDATE orders SET adult='$dewasa',kids='$anaks' WHERE id_order='$kode'");
        return $hasil;
    }
    function get_bank(){
        $hasil=$this->db->query("SELECT * FROM metode_bayar WHERE bank<>''");
        return $hasil;
    }
    function hapus_bayar($kode){
        $hasil=$this->db->query("delete from pembayaran WHERE id_bayar='$kode'");
        return $hasil;
    }
}
