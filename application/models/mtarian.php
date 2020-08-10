<?php
class mtarian extends CI_Model{

	function get_tari(){
		$hsl=$this->db->query("SELECT * FROM tari");
		return $hsl->result();
	}

	public function getTariFooter()
	{
		$hsl=$this->db->query("SELECT * FROM tari order by idtari asc limit 3");
		return $hsl->result();		
	}

	function getTari($kode){
		$hasil=$this->db->query("select * from tari where idtari='$kode'");
		return $hasil;
	}

	function insert_data($data, $table){
		$this->db->insert($table,$data);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}