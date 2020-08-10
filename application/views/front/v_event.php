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
                            foreach ($news->result_array() as $b) {
                                $idberita=$b['idevent'];
                                $judul=$b['nama_event'];
                                $isi=limit_words($b['deskripsi'],25);
                                $gbr=$b['gambar'];
                        ?>
                            <div class="blog-item">
                                <div class="hover">
                                    <a href="<?php echo base_url().'event_post/detail_event/'.$idberita;?>">
                                    <div class="readmore">
                                        <span class="text"><span class="anchor"></span></span>
                                    </div> <img width="560" height="150" src="<?php echo base_url().'assets/gambars/'.$gbr;?>" alt="" /> </a>
                                </div>
                                <h2 class="blog"><a href="<?php echo base_url().'event_post/detail_event/'.$idberita;?>"><?php echo $judul;?></a></h2>
                                <p class="blog-item-meta">
                                    
                                </p>
                                <p>
                                    <?php echo $isi;?> ...
                                </p>
                                <p>
                                    <a href="<?php echo base_url().'event_post/detail_event/'.$idberita;?>" class="small blue button">Read more ...</a>
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
                                        <input id="searchbox" type="text" placeholder="cari..." />
                                    </span>
                                    <input id="search-button" class="medium blue button" type="submit" value="Go" />
                                </form>
                            </div>

                            <div class="sidebar-item">
                                <h3 class="nobg">Objek event Lainnya</h3>
                                <ul id="latest-events" class="square">
                                    <?php
                                    foreach ($brt->result_array() as $b) {
                                        $idberita=$b['idevent'];
                                        $judul=$b['nama_event'];
                                        $isi=$b['deskripsi'];
                                        $gbr=$b['gambar'];
                                ?>
                                    <li>
                                        <a href="<?php echo base_url().'event_post/detail_event/'.$idberita;?>"><img width="50" height="50" src="<?php echo base_url().'assets/gambars/'.$gbr;?>" alt="" /><?php echo $judul;?></a>
                                        <span></span>
                                    </li>
                                <?php
                                    }
                                ?>
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
