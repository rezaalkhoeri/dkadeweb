<!DOCTYPE html>
<html lang="id">
    <head>
        <title>Paket Tour</title>

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
        <link rel="stylesheet" href="<?php echo base_url().'theme/css/lamoon.css'?>" />
        <link href='http://fonts.googleapis.com/css?family=Lato|Lato:300|Vollkorn:400italic' rel='stylesheet' type='text/css'>
        
        <!-- Favicons -->
        <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.ico'?>">
    </head>
        <?php 
            function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }
                
        ?>
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
                                $idberita=$b['idpaket'];
                                $judul=$b['nama_paket'];
                                $isi=limit_words($b['deskripsi'],20);
                                $tglpost=$b['hrg_dewasa'];
                                $gbr=$b['gambar'];
                                $user=$b['hrg_anak'];
                        ?>
                            <div class="blog-item">
                                <div class="hover">
                                    <a href="<?php echo base_url().'paket_tour/detail_paket/'.$idberita;?>">
                                    <div class="readmore">
                                        <span class="text"><span class="anchor"></span></span>
                                    </div> <img width="560" height="120" src="<?php echo base_url().'assets/gambars/'.$gbr;?>" alt="" /> </a>
                                </div>
                                <h2 class="blog"><a href="<?php echo base_url().'paket_tour/detail_paket/'.$idberita;?>"><?php echo $judul;?></a></h2>
                                <p class="blog-item-meta">
                                    
                                </p>
                                <p>
                                    <?php echo $isi;?> ...
                                </p>
                                <p>
                                    <a href="<?php echo base_url().'paket_tour/detail_paket/'.$idberita;?>" class="small blue button">Read more ...</a>
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
                                <h3 class="nobg">Paket Tour</h3>
                                <ul id="latest-events" class="square">
                                    <?php
                                    foreach ($brt->result_array() as $b) {
                                        $idpaket=$b['idpaket'];
                                        $nmpaket=$b['nama_paket'];
                                        $hrgdewasa=$b['hrg_dewasa'];
                                        $hrganak=$b['hrg_anak'];
                                        $gbr=$b['gambar'];
                                        $des=$b['deskripsi'];
                                ?>
                                    <li>
                                        <a href="<?php echo base_url().'paket_tour/detail_paket/'.$idpaket;?>"><img width="50" height="50" src="<?php echo base_url().'assets/gambars/'.$gbr;?>" alt="" /><span><?php echo $nmpaket;?></span></a>
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
