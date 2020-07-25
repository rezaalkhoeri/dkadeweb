<?php
class Mevent extends CI_Model{

	function count_event(){
		$hasil=$this->db->query("select * from event");
		return $hasil;
	}

	function get_event($offset,$limit){
		$hasil=$this->db->query("select * from event order by idevent DESC limit $offset,$limit");
		return $hasil;
	}
	function Simpanevent($nama_event,$deskripsi,$gambar){
		$hasil=$this->db->query("INSERT INTO event(nama_event,deskripsi,gambar) VALUES ('$nama_event','$deskripsi','$gambar')");
		return $hasil;
	}
	function tampil_event(){
		$hasil=$this->db->query("select * from event order by idevent DESC");
		return $hasil;
	}
	function getevent($kode){
		$hasil=$this->db->query("select * from event where idevent='$kode'");
		return $hasil;
	}
	function update_event_with_img($kode,$nama_event,$deskripsi,$gambar){
		$hasil=$this->db->query("UPDATE event SET nama_event='$nama_event',deskripsi='$deskripsi',gambar='$gambar' WHERE idevent='$kode'");
		return $hasil;
	}
	function update_event_no_img($kode,$nama_event,$deskripsi){
		$hasil=$this->db->query("UPDATE event SET nama_event='$nama_event',deskripsi='$deskripsi' WHERE idevent='$kode'");
		return $hasil;
	}
	function hapus_event($id){
		$hasil=$this->db->query("delete from event where idevent='$id'");
		return $hasil;
	}
	
}