<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>D'Kade Production | Sign in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.ico'?>">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/iCheck/square/blue.css'?>">

  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div>
   <p><?php echo $this->session->flashdata('msg');?></p>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"> <img src="<?php echo base_url().'assets/images/logo-login.png'?>"></p><hr/>

    <form action="<?php echo base_url().'administrator/auth'?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              Belum punya akun? <a data-toggle="modal" data-target="#exampleModal"> Daftar disini. </a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    
    <!-- /.social-auth-links -->
    <hr/>
    <p><center> <a href="<?php  echo base_url().''?>"> Back to home </a> </center></p>
    <p><center>Copyright <?php echo date('Y');?> by D'Kade Production <br/> All Right Reserved</center></p>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Register Account</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label class="control-label col-xs-3" >Nama</label>
            <input name="nama" class="form-control" id="nama" type="text" placeholder="Nama" required>
        </div>    
        <div class="form-group">
            <label class="control-label col-xs-3" >Username</label>
            <input name="user" class="form-control" id="username" type="text" placeholder="Username" required>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3" >Password</label>
            <input name="pass" class="form-control" id="password" type="password" placeholder="Password" required>
        </div>
        <div class="form-group" id="ulangPassword">
            <label class="control-label col-xs-3" >Ulangi Password</label>
            <input name="pass2" class="form-control" id="repeat_password" type="password" placeholder="Ulangi Password" required>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="sign-up">Sign Up</button>
      </div>
    </div>
  </div>
</div>

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url().'assets/plugins/iCheck/icheck.min.js'?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });

    function hasNull(target) {
        for (var member in target) {
            if (target[member] == '')
                return true;
        }
        return false;
    }

    $('#sign-up').on('click', function() {
      data = {}
      data.nama = $('#nama').val()
      data.username = $('#username').val()
      data.password = $('#password').val()
      data.rPassword = $('#repeat_password').val()

      if (hasNull(data) == false) {
          if (data.password == data.rPassword) {
            $.ajax({
              type: "POST",
              url: '<?php echo site_url('welcome/register') ?>',
              data: "data=" + JSON.stringify(data),
              dataType: "json",
              success: function(data){
                if (data.response == 'TRUE') {
                  if (data.page == 'konfirmasi') {
                    $('#exampleModal').modal('hide')
                    window.location.replace("<?php echo base_url().'konfirmasi'?>");
                  } else if (data.page == 'order') {
                    $('#exampleModal').modal('hide')
                    window.location.replace("<?php echo base_url().'paket_tour/pesan_paket/'?>"+data.idTari);
                  }
                } else {
                  $('#exampleModal').modal('hide')
                  alert("Register gagal");
                }
              },
              error: function(data) {
                  $('#exampleModal').modal('hide')
                  alert("Register gagal");
              }
            })          
        } else {
            $('#repeat_password').css({"border":"1px solid red"});
            var html = "<span style='color:red' id='pwdAlert'> * Password does'nt match! </span>";
            $('#ulangPassword').append(html);
         }
      } else {
          if (data.nama == "") {
            $('#nama').css({"border":"1px solid red"});
            $('#nama').attr('placeholder', '* Required');
          }
          if (data.username == "") {
            $('#username').css({"border":"1px solid red"});       
            $('#username').attr('placeholder', '* Required');
          }
          if (data.password == "") {
            $('#password').css({"border":"1px solid red"});       
            $('#password').attr('placeholder', '* Required');
          }
          if (data.rPassword == "") {
            $('#repeat_password').css({"border":"1px solid red"});       
            $('#repeat_password').attr('placeholder', '* Required');
          }
      }
    })

  });
</script>
</body>
</html>
