<!DOCTYPE html>
<html lang="id">
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
                        <h1><span>Photo Gallery</span></h1>
                    </div>

                    <div class="container section">
                        <div id="gallery" class="four-columns">
                            <?php
                                    foreach ($photo->result_array() as $b) {
                                        $id_galeri=$b['id_galeri'];
                                        $jdl_galeri=$b['jdl_galeri'];
                                        $gbr_galeri=$b['gbr_galeri'];
                                        $albumid=$b['albumid'];
                                ?>
                            <div class="beach photo-item hover">
                                <a href="<?php echo base_url().'assets/gambars/'.$gbr_galeri;?>" class="image-box">
                                <div class="photo">
                                    <span class="text"><span class="anchor"></span></span>
                                </div> <img src="<?php echo base_url().'assets/gambars/'.$gbr_galeri;?>" title="<?php echo $jdl_galeri;?>" /> </a>
                            </div>
                            <?php
                                }
                            ?>

                        </div>
                    </div>
                    <center><?php echo $page;?></center><br/>
                </div>

               
                <!-- Footer -->
                <?php 
                    $this->load->view('front/v_footer')
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
