<?php
class mpesanan extends CI_Model{

	function get_data(){
		$hsl=$this->db->query("SELECT * FROM pesanan
                                JOIN tari ON pesanan.idTari = tari.idtari
								JOIN metode_bayar ON pesanan.metode_id = metode_bayar.id_metode
								GROUP BY pesanan.createdDate DESC");
		return $hsl->result();
	}

	function insert_data($data, $table){
		$this->db->insert($table,$data);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	

	function hapus_data($datae,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function reportFilter($dari, $sampai, $status)
	{
		$sql = "SELECT * FROM pesanan
				LEFT JOIN tari ON pesanan.idTari = tari.idtari
				LEFT JOIN metode_bayar ON pesanan.metode_id = metode_bayar.id_metode
				LEFT JOIN pembayaran ON pesanan.invoice = pembayaran.invoice
				WHERE pesanan.createdDate BETWEEN '$dari' AND '$sampai'
				AND pesanan.status_bayar = '$status'
				GROUP BY pesanan.createdDate DESC";
		$query = $this->db->query($sql);
		return $query->result();
	}
}