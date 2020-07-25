<!--Counter Inbox-->
<?php 
    error_reporting(0);
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
	<title>D'Kade Production | <?php echo $title; ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.ico'?>">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
	<!-- Ionicons -->
	<!-- jvectormap -->
	<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css'?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
			folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">
	
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<!--Header-->
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
    Dashboard
    <small></small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<?php
    $this->load->view('backend/v_content_dashboard')
?>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- footer -->
<?php
    $this->load->view('backend/v_footer');
?>


</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url().'assets/plugins/sparkline/jquery.sparkline.min.js'?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'?>"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url().'assets/plugins/chartjs/Chart.min.js'?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url().'assets/dist/js/pages/dashboard2.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>

<script>

            var lineChartData = {
                labels : <?php echo json_encode($bulan);?>,
                datasets : [
                    
                    {
                        fillColor: "rgba(60,141,188,0.9)",
                        strokeColor: "rgba(60,141,188,0.8)",
                        pointColor: "#3b8bba",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(152,235,239,1)",
                        data : <?php echo json_encode($value);?>
                    }

                ]
                
            }

        var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);

        var canvas = new Chart(myLine).Line(lineChartData, {
            scaleShowGridLines : true,
            scaleGridLineColor : "rgba(0,0,0,.005)",
            scaleGridLineWidth : 0,
            scaleShowHorizontalLines: true,
            scaleShowVerticalLines: true,
            bezierCurve : true,
            bezierCurveTension : 0.4,
            pointDot : true,
            pointDotRadius : 4,
            pointDotStrokeWidth : 1,
            pointHitDetectionRadius : 2,
            datasetStroke : true,
            tooltipCornerRadius: 2,
            datasetStrokeWidth : 2,
            datasetFill : true,
            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            responsive: true
        });
        
        </script>
</body>
</html>
