<!--Counter Inbox-->
<?php 
    $query=$this->db->query("SELECT * FROM tbl_inbox WHERE inbox_status='1'");
    $query2=$this->db->query("SELECT * FROM orders WHERE status_bayar <> 'LUNAS'");
    $query3=$this->db->query("SELECT * FROM testimoni WHERE status ='0'");
    $query4=$this->db->query("SELECT * FROM orders INNER JOIN pembayaran ON pembayaran.order_id = orders.id_order WHERE orders.status_bayar = 'BELUM LUNAS'");
    $jum_pesan=$query->num_rows();
    $jum_order=$query2->num_rows();
    $jum_testimoni=$query3->num_rows();
    $jum_konfirmasi=$query4->num_rows();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>D'Kade Production  | <?php echo $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.ico'?>">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>
  
  <?php 
            function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }
                
    ?>
  
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
          Data Tari
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Tarian</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
          <div class="box">
            <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#addModal"><span class="fa fa-plus"></span> Add New</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                <tr>
                    <th width="50px">No</th>
                    <th>Gambar</th>
                    <th>Nama Tari</th>
                    <th>Harga / Perform</th>
                    <th>Deskripsi</th>
                    <th width="100px">Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no=1;
                    foreach($data as $a):
                  ?>
                <tr>
                  <td> <?php echo $no++;?> </td>
                  <td>
                    <?php if ($a->gambar == "") { ?>  
                        No Pict
                    <?php } else { ?>
                        <img src="<?php echo base_url().'assets/gambars/'.$a->gambar;?>"style="width:100px;">
                    <?php } ?> 
                  </td>
                  <td><?php echo $a->nama_tari;?></td>
                  <td><?php echo $a->harga;?></td>
                  <td><?php echo $a->deskripsi;?></td>
                  <td>
                        <a class="btn" data-toggle="modal" data-target="#ModalUpdate<?php echo $a->idtari;?>"><span class="fa fa-pencil"></span></a>
                        <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $a->idtari;?>"><span class="fa fa-trash"></span></a>
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

  <!-- ============ MODAL ADD TARIAN =============== -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
              <h3 class="modal-title" id="myModalLabel">Tambah Tarian</h3>
          </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/tarian/simpan_tari'?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-xs-2" >Tarian</label>
                        <div class="col-xs-8">
                            <input name="nama_tari" class="form-control" type="text" placeholder="Nama Tari" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-2" >Harga / Perform</label>
                        <div class="col-xs-8">
                            <input class="form-control" type="number" name="harga" required></input>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-2" >Deskripsi</label>
                        <div class="col-xs-8">
                            <textarea class="ckeditor" name="deskripsi" rows="10" cols="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-2" >Gambar</label>
                        <div class="col-xs-8">
                            <input type="file" name="filefoto" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-flat" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-primary btn-flat" type="submit">Simpan</button>
                </div>
            </form>
        </div>
      </div>
  </div>
    
  <?php
      foreach($data as $a):
  ?>
  <!-- ============ MODAL EDIT TARIAN =============== -->
  <div class="modal fade" id="ModalUpdate<?php echo $a->idtari;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
              <h3 class="modal-title" id="myModalLabel">Tambah Tarian </h3>
          </div>
          <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/tarian/update_tari'?>" enctype="multipart/form-data">
              <div class="modal-body">
                    <input name="idtari" class="form-control" value="<?php echo $a->idtari;?>" type="hidden" placeholder="Nama Tari" required>
                    <div class="form-group">
                        <label class="control-label col-xs-2" >Tarian</label>
                        <div class="col-xs-8">
                            <input name="nama_tari_update" class="form-control" value="<?php echo $a->nama_tari;?>" type="text" placeholder="Nama Tari" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-2" >Harga / Perform</label>
                        <div class="col-xs-8">
                            <input class="form-control" type="number" value="<?php echo $a->harga;?>" name="harga_update" required></input>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-2" >Deskripsi</label>
                        <div class="col-xs-8">
                            <textarea class="ckeditor" name="deskripsi_update" rows="10" cols="10"><?php echo $a->deskripsi;?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-2" >Gambar</label>
                        <div class="col-xs-8">
                            <input type="file" name="filefoto_update" value="<?php echo $a->gambar;?>" required>
                        </div>
                    </div>                
              </div>
              <div class="modal-footer">
                  <button class="btn btn-flat" data-dismiss="modal" aria-hidden="true">Tutup</button>
                  <button class="btn btn-primary btn-flat">Update</button>
              </div>
          </form>
        </div>
      </div>
  </div>

  <!--Modal Hapus Post-->
  <div class="modal fade" id="ModalHapus<?php echo $a->idtari;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                  <h4 class="modal-title" id="myModalLabel">Hapus Tari</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url().'backend/tarian/hapus_tari'?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">       
                      <input type="hidden" name="idtari" value="<?php echo $a->idtari;?>"/> 
              <p>Apakah Anda yakin mau menghapus tari <b><?php echo $a->nama_tari;?></b> ?</p>
                          
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
              </div>
              </form>
          </div>
      </div>
  </div>

  <?php endforeach;?>

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
<script src="<?php echo base_url().'assets/ckeditor/ckeditor.js'?>"></script>
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
    CKEDITOR.replace('ckeditor');
  });
</script>
    
    <?php if($this->session->flashdata('msg')['alert']=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: <?php echo json_encode($this->session->flashdata('msg')['pesan']) ?>,
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='info'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "Tarian berhasil di update",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#00C9E6'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Tarian Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')['alert'] =='warning'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Warning',
                    text: <?php echo json_encode($this->session->flashdata('msg')['pesan']) ?>,
                    showHideTransition: 'slide',
                    icon: 'warning',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: 'orange'
                });
        </script>
    <?php else:?>

    <?php endif;?>
</body>
</html>
