<?php
class mtarian extends CI_Model{

	function get_tari(){
		$hsl=$this->db->query("SELECT * FROM tari");
		return $hsl->result();
	}

	function get_paket_tari(){
		$hsl=$this->db->query("SELECT * FROM paket_tari");
		return $hsl->result();
	}
	
}