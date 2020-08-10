<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>D'Kade Production | <?php echo $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.ico'?>">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.css'?>">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datepicker/datepicker3.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php 
    $this->load->view('backend/v_header');
  ?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<?php 
  $this->load->view('backend/v_sidebar');
?>

<!-- /.sidebar -->
</aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Konfirmasi Pembayaran
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Konfirmasi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:12px;">
                <thead>
                <tr>
					          <th style="text-align:center;width: 120px;vertical-align:middle;">No Invoice</th>
					          <th style="text-align:center;width: 120px;vertical-align:middle;">Nominal</th>
                    <th style="text-align:center;width: 140px;vertical-align:middle;">Tanggal Transfer</th>
                    <th style="text-align:center;width: 140px;vertical-align:middle;">Tanggal Konfrmasi</th>
                    <th style="text-align:center;width: 160px;vertical-align:middle;">Bukti Transfer</th>
                    <th style="text-align:center;width:100px;">Action</th>
                </tr>
                </thead>
                <tbody>
            <?php
              $no=0;
              foreach ($data as $a) {
            ?>
              <tr>
                  <td style="text-align: center;vertical-align:middle;"><?php echo $a->invoice; ?></td>
                  <td style="text-align: right;vertical-align:middle;"><b><?php echo 'Rp. '.number_format($a->harga); ?></b></td>
                  <td style="text-align: center;vertical-align:middle;"><?php echo $a->tanggalTransfer; ?></td>
                  <td style="text-align: center;vertical-align:middle;"><?php echo $a->createdDate; ?></td>
                  <td style="text-align: center;vertical-align:middle;"> <img width="150" src="<?php echo base_url()."/assets/bukti_transfer/".$a->bukti_transfer; ?>"></td>
                  <td style="text-align: center;vertical-align: middle;">
                      <a class="btn" href="#ModalDetail<?php echo $a->id_bayar?>" data-toggle="modal" title="Lihat Bukti Transfer"><span class="fa fa-eye"></span> </a>
                  </td>
              </tr>
            <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- footer -->
  <?php
    $this->load->view('backend/v_footer');
  ?>

  
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
    <?php foreach ($data as $a) { ?>
      <!-- ============ MODAL DETAIL TARIAN =============== -->    
      <div class="modal fade" id="ModalDetail<?php echo $a->id_bayar?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                  <h3 class="modal-title" id="myModalLabel">Detail Konfirmasi Pembayaran </h3>
              </div>
              <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-xs-3"> Nama Tari </label>
                        <div class="col-xs-8">
                            <input name="namaTari" value="<?php echo $a->nama_tari;?>" class="form-control" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3"> Tanggal Tampil </label>
                        <div class="col-xs-8">
                            <input name="tanggalTampil" value="<?php echo $a->tanggalTampil;?>" class="form-control" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3"> Metode Bayar </label>
                        <div class="col-xs-8">
                            <input name="metode" value="<?php echo $a->metode;?>" class="form-control" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3"> Bank </label>
                        <div class="col-xs-8">
                            <input name="bank" value="<?php echo $a->bank;?>" class="form-control" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3"> Nomor Rekening </label>
                        <div class="col-xs-8">
                            <input name="norek" value="<?php echo $a->norek;?>" class="form-control" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3"> Keterangan </label>
                        <div class="col-xs-8">
                              <textarea name="keterangan" class="form-control" cols="30" rows="3"><?php echo $a->keterangan;?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3"> Keterangan </label>
                        <div class="col-xs-8">
                            <img src="<?php echo base_url()."/assets/bukti_transfer/".$a->bukti_transfer; ?>" alt="" width="370px" srcset="">
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-flat" data-dismiss="modal" aria-hidden="true">Close</button>
                  </div>
              </form>
            </div>
          </div>
      </div>

    <?php } ?>

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datepicker/bootstrap-datepicker.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });

    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('.datepicker3').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('.datepicker4').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $(".timepicker").timepicker({
      showInputs: true
    });

  });
</script>
    
  
    <?php if($this->session->flashdata('msg')=='success-hapus'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Konfirmasi Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>
</body>
</html>