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
                        <center><h3><span>About</span></h3></center>
                        <div class="container section" style="margin-bottom: 400px;">
                        D'kade Production merupakan usaha yang bergerak dalam jasa pertunjukan tari yang berlokasi di Pulau Bali dan berpengalaman dalam bidang kami, ini bisa menjadi reference /pilihan terbaik bagi anda yang ingin mencari pertunjukan tari untuk event/ acara anda. Tarian yang kami tawarkan berbagai macam dari tradisional ataupun modern. Anda dapat memilih tarian yang sesuai dengan tema acara anda dan berdiskusi bersama kami, seperti Pembukaan Seminar, Birthday Party, Dinner, Wedding.
                        <br >
                        <br>
                            Tarian yang kami tawarkan merupakan tarian pilihan & terkenal seperti : Balinese, Modern, Kontemporer, Fire , Bely , Chacha, dan masih banyak lagi dengan penari yang perbengalaman di bidangnya.
                        <br>
                        <br>
                        Best Regard,s
                        <br>
                        Dkade Team
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
