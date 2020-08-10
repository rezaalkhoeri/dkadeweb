<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>D'Kade Production | <?php echo $title; ?> </title>
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
        Data Order
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Order</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
          <div class="box">
            <div class="box-header">
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ModalReport">
                  <span class="fa fa-file">
                    Report
                  </span> 
                </button>
            </div>
            <hr>
            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:12px;">
                <thead>
                <tr>
					          <th style="text-align:center;width: 50px;">No</th>
					          <th style="text-align:center;width: 130px;">No Invoice</th>
                    <th style="text-align:center;">Batas Bayar</th>
                    <th style="text-align:center;">Atas Nama</th>
                    <th style="text-align:center;">Alamat</th>
                    <th style="text-align:center;">Nomor Telepon</th>
                    <th style="text-align:center;">Email</th>
                    <th style="text-align:center;">Status</th>
                    <th style="text-align:center;width:130px;">Action</th>
                </tr>
                </thead>
                <tbody>
  				<?php
	  				$no=1;
  					foreach ($data as $a) :
          ?>
            <tr>
                <td style="vertical-align: middle;"><?php echo $no++; ?></td>
                <td style="vertical-align: middle;"><?php echo $a->invoice; ?></td>
                <td style="vertical-align: middle;"><?php echo date_format(date_create($a->batasBayar),"d-m-Y"); ?></td>
                <td style="vertical-align: middle;"><?php echo $a->namaPemesan; ?></td>
                <td style="vertical-align: middle;"><?php echo $a->alamat; ?></td>
                <td style="vertical-align: middle;"><?php echo $a->notelp; ?></td>
                <td style="vertical-align: middle;"><?php echo $a->email; ?></td>
                <td style="text-align: center;vertical-align: middle;">
                  <?php 
                      $dateNow = date_create(date("Y-m-d"));
                      $batasBayar = date_create($a->batasBayar);
                      $diff = date_diff($dateNow,$batasBayar);
                  ?>

                    <?php if($a->status_bayar =='L') { ?>
                        <label class="label label-success">LUNAS</label>
                    <?php } else if($a->status_bayar =='S') { ?>
                        <label class="label label-warning">SELESAI</label>
                    <?php } else { ?>
                        <?php if($diff->invert == 0){ ?>
                          <?php if($a->status_bayar =='B') { ?>
                                <label class="label label-warning">BELUM LUNAS</label>
                          <?php } else { ?>
                                <label class="label label-danger">CANCEL</label>
                          <?php } ?>
                        <?php } else {?>
                          <label class="label label-default">KADALUARSA</label>
                        <?php } ?>
                    <?php } ?>
                </td>
                <td> 
                    <?php if($a->status_bayar =='L') { ?>
                        <a class="btn btn-xs btn-info" data-toggle="modal" data-target="#ModalDetail<?php echo $a->id_pesanan ?>"><span class="fa fa-eye"></span></a>
                        <a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#ModalChange<?php echo $a->id_pesanan ?>"><span class="fa fa-times"></span></a>
                    <?php } else if($a->status_bayar =='S') { ?>
                        <a class="btn btn-xs btn-info" data-toggle="modal" data-target="#ModalDetail<?php echo $a->id_pesanan ?>"><span class="fa fa-eye"></span></a>
                    <?php } else { ?>
                        <?php if($diff->invert == 0){ ?>
                          <?php if($a->status_bayar =='B') { ?>
                              <a class="btn btn-xs btn-info" data-toggle="modal" data-target="#ModalDetail<?php echo $a->id_pesanan ?>"><span class="fa fa-eye"></span></a>
                              <a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#ModalChange<?php echo $a->id_pesanan ?>"><span class="fa fa-times"></span></a>
                          <?php } else { ?>
                              <a class="btn btn-xs btn-info" data-toggle="modal" data-target="#ModalDetail<?php echo $a->id_pesanan ?>"><span class="fa fa-eye"></span></a>
                              <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#ModalHapus<?php echo $a->id_pesanan ?>"><span class="fa fa-trash"></span></a>
                          <?php } ?>
                        <?php } else {?>
                          <a class="btn btn-xs btn-info" data-toggle="modal" data-target="#ModalDetail<?php echo $a->id_pesanan ?>"><span class="fa fa-eye"></span></a>
                          <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#ModalHapus<?php echo $a->id_pesanan ?>"><span class="fa fa-trash"></span></a>
                        <?php } ?>
                    <?php } ?>        
                </td>
            </tr>
				<?php endforeach;?>
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

  <?php foreach ($data as $a) : ?>
      <!-- ============ MODAL EDIT ORDER =============== -->
      <div id="ModalEdit<?php echo $a->id_pesanan?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                  <h3 class="modal-title" id="myModalLabel">Edit Order</h3>
              </div>
              <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/orders/edit_orders'?>">
                  <div class="modal-body">
                      <input name="kode" type="hidden" value="<?php echo $a->id_pesanan;?>">
                      <div class="form-group">
                          <label class="control-label col-xs-3" >Invoice</label>
                          <div class="col-xs-9">
                              <input name="dewasa" class="form-control" min="1" type="number" value="<?php echo $a->invoice;?>" style="width:280px;" required>
                          </div>
                      </div>                    
                      <div class="form-group">
                          <label class="control-label col-xs-3" >Batas Bayar</label>
                          <div class="col-xs-9">
                              <input name="anaks" class="form-control" min="0" type="number" value="<?php echo $a->batasBayar;?>" style="width:280px;" required>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                      <button type="submit" class="btn btn-primary">Update</button>
                  </div>
              </form>
            </div>
          </div>
      </div>	
      
      <!-- ============ MODAL DETAIL TARIAN =============== -->    
      <div class="modal fade" id="ModalDetail<?php echo $a->id_pesanan?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                  <h3 class="modal-title" id="myModalLabel">Detail Pesanan </h3>
              </div>
              <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-xs-3"> Nama Tari </label>
                        <div class="col-xs-8">
                            <input name="namaTari" value="<?php echo $a->nama_tari;?>" class="form-control" type="text" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3"> Tanggal Tampil </label>
                        <div class="col-xs-8">
                            <input name="tanggalTampil" value="<?php echo $a->tanggalTampil;?>" class="form-control" type="text" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3"> Metode Bayar </label>
                        <div class="col-xs-8">
                            <input name="metode" value="<?php echo $a->metode;?>" class="form-control" type="text" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3"> Bank </label>
                        <div class="col-xs-8">
                            <input name="bank" value="<?php echo $a->bank;?>" class="form-control" type="text" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3"> Nomor Rekening </label>
                        <div class="col-xs-8">
                            <input name="norek" value="<?php echo $a->norek;?>" class="form-control" type="text" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3"> Keterangan </label>
                        <div class="col-xs-8">
                              <textarea name="keterangan" class="form-control" cols="30" rows="3" disabled><?php echo $a->keterangan;?></textarea>
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

      <!-- ============ MODAL APPROVE TARIAN =============== -->    
      <div class="modal fade" id="ModalApprove<?php echo $a->id_pesanan?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                  <h3 class="modal-title" id="myModalLabel"> Approve Pesanan </h3>
              </div>
              <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/tarian/update_tari'?>" enctype="multipart/form-data">
                  <div class="modal-body">
                      Approve Pesanan <strong> <?php echo $a->invoice?> </strong> ?
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-flat" data-dismiss="modal" aria-hidden="true">Close</button>
                      <button class="btn btn-primary btn-flat">Approve</button>
                  </div>
              </form>
            </div>
          </div>
      </div>

      <!-- ============ MODAL Cancel TARIAN =============== -->    
      <div class="modal fade" id="ModalChange<?php echo $a->id_pesanan?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                  <h3 class="modal-title" id="myModalLabel"> Reject Pesanan </h3>
              </div>
              <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/pesanan/cancel'?>" enctype="multipart/form-data">
                  <input type="hidden" name="idPesanan" value="<?php echo $a->id_pesanan?>">
                  <div class="modal-body">
                      Reject Pesanan <strong> <?php echo $a->invoice?> </strong> ?
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-flat" data-dismiss="modal" aria-hidden="true">Cancel</button>
                      <button class="btn btn-primary btn-flat" type="submit">OK</button>
                  </div>
              </form>
            </div>
          </div>
      </div>

      <!-- ============ MODAL hapus TARIAN =============== -->    
      <div class="modal fade" id="ModalHapus<?php echo $a->id_pesanan?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                  <h3 class="modal-title" id="myModalLabel"> Hapus Pesanan </h3>
              </div>
              <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/pesanan/hapus'?>" enctype="multipart/form-data">
                  <input type="hidden" name="idPesanan" value="<?php echo $a->id_pesanan?>">
                  <div class="modal-body">
                      Hapus Pesanan <strong> <?php echo $a->invoice?> </strong> ?
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-flat" data-dismiss="modal" aria-hidden="true">Cancel</button>
                      <button class="btn btn-primary btn-flat" type="submit">OK</button>
                  </div>
              </form>
            </div>
          </div>
      </div>

  <?php endforeach;?>


      <!-- ============ MODAL DETAIL TARIAN =============== -->    
      <div class="modal fade" id="ModalReport" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                  <h3 class="modal-title" id="myModalLabel">Filter Report </h3>
              </div>
              <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/pesanan/reportFilter'?>" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-xs-3"> Dari Tanggal </label>
                        <div class="col-xs-8">
                          <input class="form-control" type="date" name="dariTanggal">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3"> Sampai Tanggal </label>
                        <div class="col-xs-8">
                          <input class="form-control" type="date" name="sampaiTanggal">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3"> Status </label>
                        <div class="col-xs-8">
                          <select name="status" class="form-control" id="">
                            <option value="L"> LUNAS </option>
                            <option value="B"> BELUM LUNAS </option>
                            <option value="C"> CANCEL </option>
                          </select>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-primary" type="submit">Filter</button>
                      <button class="btn btn-flat" data-dismiss="modal" aria-hidden="true">Close</button>
                  </div>
              </form>
            </div>
          </div>
      </div>
	


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
    
    <?php if($this->session->flashdata('msg')=='info'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "Order berhasil di update",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#00C9E6'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Pembayaran Selesai",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Order Berhasil dihapus.",
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