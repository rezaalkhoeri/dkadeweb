<?php
class Mlogin extends CI_Model{
    function cekadmin($u,$p){
        $hasil=$this->db->query("select * from admin where username='$u'and password=md5('$p')");
        return $hasil;
    }
    
    public function getDashboard()
    {
        $sql = "SELECT status_bayar, COUNT(*) AS Jumlah FROM pesanan GROUP BY status_bayar";
        $query = $this->db->query($sql);
        return $query->result();
    }
}
