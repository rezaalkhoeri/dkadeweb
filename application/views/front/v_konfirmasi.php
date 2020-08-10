<html lang="id">
    <!--<![endif]-->
    <?php 
        $this->load->view('front/head');
    ?>    

    <body>
        
        <!-- Background Image -->
        <img src="<?php echo base_url().'theme/images/bg1.jpg'?>" class="bg" alt="" />
        
        <!-- Root Container -->
        <div id="root-container" class="container">
            <div id="wrapper" class="sixteen columns">
                
                <?php 
                    $this->load->view('front/banner');
                ?>      
                
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
                            <form style="margin-left:120px;" action="<?php echo base_url().'konfirmasi/pembayaran'?>" method="post" enctype="multipart/form-data">
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
                                      <label>Tanggal Transfer</label>
                                      <input type="date" name="tglTransfer" placeholder="Tanggal Transfer" style="width:300px;" required>
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
