<!DOCTYPE html>
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
                <div id="menu" class="page">
                    <ul id="root-menu" class="sf-menu">
                        <?php
                        $this->load->view('front/menu');
                        ?>
                    </ul>
                </div>
                
                <!-- Content -->
                <div id="content">
                    <div id="intro">
                        <h1><span>Album Photo</span></h1>
                    </div>
                    <div class="container section">
                        <div id="gallery" class="three-columns">
                                <?php
                                    foreach ($alm->result_array() as $b) {
                                        $idalbum=$b['idalbum'];
                                        $judul=$b['jdl_album'];
                                        $cover=$b['cover'];
                                        $jumlah=$b['jml'];
                                ?>
                            <div class="beach photo-item hover">
                                <a href="<?php echo base_url().'detail_photo/index/'.$idalbum;?>">

                                <div class="photo">
                                    <span class="text"><span class=""></span><p><?php echo $judul;?> (<?php echo $jumlah;?>)</p></span>
                                </div> <img src="<?php echo base_url().'assets/gambars/'.$cover;?>" alt="" /> 
                                </a>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                
                <!-- Footer -->
                <?php
                  $this->load->view('front/v_footer');
                ?>


        <!-- JavaScript Files -->
        <script type="text/javascript" src="<?php echo base_url().'theme/scripts/jquery-1.7.2.min.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'theme/scripts/jquery.easing.1.3.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'theme/scripts/jquery.flexslider-min.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'theme/scripts/jquery.hoverIntent.minified.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'theme/scripts/superfish.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'theme/scripts/jquery.cycle.lite.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'theme/scripts/jquery.nailthumb.1.1.min.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'theme/scripts/jquery.isotope.min.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'theme/scripts/jquery.fancybox-1.3.4.pack.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'theme/scripts/lamoon.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'theme/scripts/lamoon-gallery.js'?>"></script>
    </body>
</html>
