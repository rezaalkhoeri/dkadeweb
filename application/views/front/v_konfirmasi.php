<html lang="id">
    <!--<![endif]-->
    <head>
        <title>Konfirmasi Pembayaran</title>

        <!-- Meta tags -->
        <meta charset="utf-8">
        <meta name="description" content="Website Travel" />
        <meta name="author" content="Code Travel" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

        <!-- Stylesheets -->
        <link rel="stylesheet" href="<?php echo base_url().'theme/css/base.css'?>" />
        <link rel="stylesheet" href="<?php echo base_url().'theme/css/skeleton.css'?>" />
        <link rel="stylesheet" href="<?php echo base_url().'theme/css/flexslider.css'?>" />
        <link rel="stylesheet" href="<?php echo base_url().'theme/css/jquery.fancybox-1.3.4.css'?>" />
        <link rel="stylesheet" href="<?php echo base_url().'theme/css/validationEngine.jquery.css'?>" />
        <link rel="stylesheet" href="<?php echo base_url().'theme/css/smoothness/jquery-ui-1.8.22.custom.css'?>" />
        <link rel="stylesheet" href="<?php echo base_url().'theme/css/ui.spinner.css'?>" />
        <link rel="stylesheet" href="<?php echo base_url().'theme/css/lamoon.css'?>" />
        <link href='http://fonts.googleapis.com/css?family=Lato|Lato:300|Vollkorn:400italic' rel='stylesheet' type='text/css'>


        <!-- Favicons -->
        <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.ico'?>">
        <?php 
            function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }
                
        ?>
    </head>
    <body>
        
        <!-- Background Image -->
        <img src="<?php echo base_url().'theme/images/bg1.jpg'?>" class="bg" alt="" />
        
        <!-- Root Container -->
        <div id="root-container" class="container">
            <div id="wrapper" class="sixteen columns">
                
                <!-- Banner -->
                <div id="sub-banner">
                    <div id="logo">
                    </div>
                    <img src="<?php echo base_url().'theme/images/placeholders/header-image-static.jpg'?>" alt="" />
                </div>
                
                <!-- Main Menu -->
                <div id="menu" class="home">
                    <ul id="root-menu" class="sf-menu">
                        <?php
                        $this->load->view('front/menu');
                    ?>
                    </ul>
                </div>
                
                <!-- Content -->
                <div id="content" class="reservation">
                    <div class="container section">
                        <div class="one-third column">
                            <h3 class="nobg">Ketentuan dan Kebijakan</h3>
                            <p>1. Setelah melakukan pembayaran anda wajib mengkofirmasi kami melalui from ini.</p>
                            <p>2. Isi Data-Data di form disamping sesuai dengan Bukti transfer anda.</p>
                            <p>3. Isi Data-data di from dengan lengkap</p>
                            <p>4. Kami akan memvalidasi pembayaran anda.</p>
                            <p>5. Jika anda ingin melakukan komplain silahkan datang langsung ke kantor kita atau hubungi kami melalui whatsapp.</p>
                            <div class="info box">
                                Silahkan Konfirmasi Pembayaran Anda Disamping !
                            </div>
                        </div>
                        <div class="two-third column last">
                            <form style="margin-left:120px;" action="<?php echo base_url().'konfirmasi/upload_bukti'?>" method="post" enctype="multipart/form-data">
                                <h3><span class="left">Konfirmasi Pembayaran</span></h3>
                                <?php
                                  error_reporting(0); 
                                  echo $this->session->flashdata('msg');
                                ?>
                                    <p>
                                      <label>No Invoice</label>
                                      <input type="text" name="invoice" placeholder="No Invoice" style="width:300px;" required>
                                    </p>
                                    
                                    <p>
                                      <label>Pengirim</label>
                                      <input type="text" name="nama" placeholder="Nama pengirim" style="width:300px;" required>
                                    </p>
                                    
                                    <p>
                                      <label>Pilih Bank</label>
                                          <select name="bank" style="width:300px;" required>
                                          <?php foreach ($bnk->result_array() as $i) {
                                              $id=$i['id_metode'];
                                              $mtd=$i['bank'];
                                          ?>
                                              <option value="<?php echo $id;?>"><?php echo $mtd;?></option>
                                          <?php }?>
                                          </select>
                                    </p>

                                    <p>
                                      <label>Tanggal Transfer</label>
                                      <input type="text" readonly="readonly" placeholder="Tanggal Transfer" class="datepicker" name="tgl_bayar" style="width:300px;" required/>
                                    </p>

                                    <p>
                                      <label>Jumlah Transfer</label>
                                      <input type="number" name="jumlah" placeholder="Jumlah Transfer" value="" min="0" style="height:30px;width:300px;" required>
                                    </p>

                                    <p>
                                      <label>Bukti Transfer dalam Format : jpg, png, bmp.</label>
                                      <input type="file" name="filefoto" required>
                                    </p>

                                    <p>
                                      <button type="submit" class="medium blue button">Konfirmasi Pembayaran</button>
                                    </p>
                            </form>
                        </div>
                    </div>
                </div>
                
                
                <!-- Footer -->
                <?php 
                    $this->load->view('front/v_footer');
                ?>
        
            <script type="text/javascript" src="<?php echo base_url().'theme/scripts/jquery-1.7.2.min.js'?>"></script>
            <script type="text/javascript" src="<?php echo base_url().'theme/scripts/jquery.easing.1.3.js'?>"></script>
            <script type="text/javascript" src="<?php echo base_url().'theme/scripts/jquery.flexslider-min.js'?>"></script>
            <script type="text/javascript" src="<?php echo base_url().'theme/scripts/jquery.hoverIntent.minified.js'?>"></script>
            <script type="text/javascript" src="<?php echo base_url().'theme/scripts/superfish.js'?>"></script>
            <script type="text/javascript" src="<?php echo base_url().'theme/scripts/jquery.cycle.lite.js'?>"></script>
            <script type="text/javascript" src="<?php echo base_url().'theme/scripts/jquery.fancybox-1.3.4.pack.js'?>"></script>
            <script type="text/javascript" src="<?php echo base_url().'theme/scripts/jquery.validationEngine.js'?>"></script>
            <script type="text/javascript" src="<?php echo base_url().'theme/scripts/jquery.validationEngine-en.js'?>"></script>
            <script type="text/javascript" src="<?php echo base_url().'theme/scripts/jquery-ui-1.8.22.custom.min.js'?>"></script>
            <script type="text/javascript" src="<?php echo base_url().'theme/scripts/ui.spinner.min.js'?>"></script>
            <script type="text/javascript" src="<?php echo base_url().'theme/scripts/lamoon.js'?>"></script>            

    </body>
</html>
