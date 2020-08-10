<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-primary">
            <div class="inner">
                <h3> <?php echo $totalOrder; ?> </h3>
                <p> Total Order </p>
            </div>
            <div class="icon">
                <i class="fa fa-map"></i>
            </div>
            <a href="<?php echo base_url().'backend/pesanan'?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>        
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-orange">
            <div class="inner">
                <h3> <?php echo $belum; ?> </h3>
                <p> Belum Lunas </p>
            </div>
            <div class="icon">
                <i class="fa fa-map"></i>
            </div>
            <a href="<?php echo base_url().'backend/pesanan'?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
            <div class="inner">
                <h3> <?php echo $lunas; ?> </h3>
                <p> Sudah Lunas </p>
            </div>
            <div class="icon">
                <i class="fa fa-map"></i>
            </div>
            <a href="<?php echo base_url().'backend/pesanan'?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
            <div class="inner">
                <h3> <?php echo $cancel; ?> </h3>
                <p> Cancel </p>
            </div>
            <div class="icon">
                <i class="fa fa-map"></i>
            </div>
            <a href="<?php echo base_url().'backend/pesanan'?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
   </div>
</section>