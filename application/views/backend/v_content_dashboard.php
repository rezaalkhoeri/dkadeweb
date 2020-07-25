<?php 
    error_reporting(0);
    $query=$this->db->query("SELECT * FROM tbl_inbox WHERE inbox_status='1'");
    $query2=$this->db->query("SELECT * FROM orders WHERE status_bayar <> 'LUNAS'");
    $query3=$this->db->query("SELECT * FROM testimoni WHERE status ='0'");
    $query4=$this->db->query("SELECT * FROM orders INNER JOIN pembayaran ON pembayaran.order_id = orders.id_order WHERE orders.status_bayar = 'BELUM LUNAS'");
    $query5=$this->db->query("SELECT * FROM event");
    $jum_pesan=$query->num_rows();
    $jum_order=$query2->num_rows();
    $jum_testimoni=$query3->num_rows();
    $jum_konfirmasi=$query4->num_rows();
    $jum_wisata=$query5->num_rows();
?>

<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
        <div class="inner">
            <h3><?php echo $jum_wisata;?></h3>

            <p>Event</p>
        </div>
        <div class="icon">
            <i class="fa fa-map"></i>
        </div>
        <a href="<?php echo base_url().'backend/event'?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
        <div class="inner">
            <h3><?php echo $jum_konfirmasi;?></h3>
            <p>Konfirmasi</p>
        </div>
        <div class="icon">
            <i class="fa fa-credit-card"></i>
        </div>
        <a href="<?php echo base_url().'backend/konfirmasi'?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
        <div class="inner">
            <h3><?php echo $jum_pesan;?></h3>
            <p>Inbox</p>
        </div>
        <div class="icon">
            <i class="fa fa-envelope"></i>
        </div>
        <a href="<?php echo base_url().'backend/inbox'?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
        <div class="inner">
            <h3><?php echo $jum_order;?></h3>
            <p>Orders</p>
        </div>
        <div class="icon">
            <i class="fa fa-bell"></i>
        </div>
        <a href="<?php echo base_url().'backend/orders'?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <!-- /.row (main row) -->

</section>