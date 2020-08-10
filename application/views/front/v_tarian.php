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
                    <div id="blog" class="container section">
                        <div id="blog-content" class="two-third column">
                        <?php
                            foreach ($tari as $b) {
                        ?>
                            <div class="blog-item">
                                <div class="hover">
                                    <a href="<?php echo base_url().'tarian/detail_tari/'.$b->idtari;?>">
                                    <div class="readmore">
                                        <span class="text"><span class="anchor"></span></span>
                                    </div> <img width="560" height="120" src="<?php echo base_url().'assets/gambars/'.$b->gambar;?>" alt="" /> </a>
                                </div>
                                <h2 class="blog"><a href="<?php echo base_url().'tarian/detail_tari/'.$b->idtari;?>"><?php echo $b->nama_tari;?></a></h2>
                                <p class="blog-item-meta">
                                    
                                </p>
                                <p>
                                    <?php echo $b->deskripsi;?> ...
                                </p>
                                <p>
                                    <a href="<?php echo base_url().'tarian/detail_tari/'.$b->idtari;?>" class="small blue button">Read more ...</a>
                                </p>
                            </div>
                            <?php
                            }
                        ?>
                            <div class="blog-paging">
                                  <?php echo $page;?>
                            </div>
                        </div>
                        <div id="sidebar-content" class="one-third column last">
                            <div class="sidebar-item">
                                <h3 class="nobg">Pencarian</h3>
                                <form id="search-form" method="get">
                                    <span>
                                        <input id="searchbox" type="text" placeholder="Type keywords here..." />
                                    </span>
                                    <input id="search-button" class="medium blue button" type="submit" value="Go" />
                                </form>
                            </div>
                            <div class="sidebar-item">
                                <h3 class="nobg">Latest Events</h3>
                                <ul id="latest-events" class="square">
                                <?php
                                foreach ($event->result_array() as $h) {
                                    $idevent    =$h['idevent'];
                                    $nama_event =$h['nama_event'];
                                    $gambar     =$h['gambar'];
                                ?>
                                <li>
                                    <a href="<?php echo base_url().'event_post/detail_event/'.$idevent;?>"><img width="50" height="50" src="<?php echo base_url().'assets/gambars/'.$gambar;?>" alt="" /><?php echo $nama_event;?></a>
                                </li>
                                <?php } ?> 
                                </ul>
                            </div>
                            <div class="sidebar-item">
                            </div>
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
        <script type="text/javascript" src="<?php echo base_url().'theme/scripts/jquery.fancybox-1.3.4.pack.js'?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'theme/scripts/lamoon.js'?>"></script>
    </body>
</html>
