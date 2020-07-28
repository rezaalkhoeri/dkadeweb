<?php
class mpesanan extends CI_Model{

	function get_data(){
		$hsl=$this->db->query("SELECT * FROM pesanan");
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
}