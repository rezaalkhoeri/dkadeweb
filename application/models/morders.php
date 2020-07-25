<?php
class Morders extends CI_Model{

    function cek_invoice($kode){
        $hasil=$this->db->query("SELECT * FROM orders WHERE id_order='$kode'");
        return $hasil;
    }
    function simpan_testimoni($nama,$email,$msg){
        $hasil=$this->db->query("INSERT INTO testimoni(nama,email,pesan,status,tgl_post) VALUES ('$nama','$email','$msg','0',curdate())");
        return $hasil;
    }
    function get_pembayaran(){
        $hasil=$this->db->query("SELECT id_bayar,tgl_bayar,metode,bank,order_id,SUM((hrg_dewasa*adult)+(hrg_anak*kids))AS total,jumlah,status_bayar,bukti_transfer,pengirim FROM pembayaran JOIN orders ON order_id=id_order JOIN metode_bayar ON metode_id_bayar=id_metode JOIN paket ON idpaket=paket_id_order WHERE tanggal GROUP BY order_id");
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

    function bayar_selesai($id){
        $hasil=$this->db->query("UPDATE orders SET status_bayar='LUNAS' WHERE id_order='$id'");
        return $hasil;
    }
    function edit_orders($kode,$dewasa,$anaks){
        $hasil=$this->db->query("UPDATE orders SET adult='$dewasa',kids='$anaks' WHERE id_order='$kode'");
        return $hasil;
    }
    function hapus_orders($kode){
        $hasil=$this->db->query("delete from orders WHERE id_order='$kode'");
        return $hasil;
    }
    function get_bank(){
        $hasil=$this->db->query("SELECT * FROM metode_bayar WHERE bank<>''");
        return $hasil;
    }
    function simpan_bukti($noinvoice,$nama,$bank,$tgl_bayar,$jumlah,$gambar){
        $hasil=$this->db->query("INSERT INTO pembayaran(tgl_bayar,metode_id_bayar,order_id,jumlah,pengirim,bukti_transfer)VALUES('$tgl_bayar','$bank','$noinvoice','$jumlah','$nama','$gambar')");
        return $hasil;
    }
    function hapus_bayar($kode){
        $hasil=$this->db->query("delete from pembayaran WHERE id_bayar='$kode'");
        return $hasil;
    }
}
