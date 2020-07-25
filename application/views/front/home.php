<!DOCTYPE html>
<html lang="id">
    
    <head>
        <title>D'Kade Production</title>

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
        <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/logo-dkade.ico'?>">
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
                <div id="banner">
                    <div id="logo">
                    </div>
                    <div id="banner-slider" class="flexslider">
                        <ul class="slides">
                            <li>
                                <img src="<?php echo base_url().'theme/images/placeholders/940x4500.png'?>" alt="" />
                            </li>
                            <li>
                                <img src="<?php echo base_url().'theme/images/placeholders/slide22.png'?>" alt="" />
                            </li>
                            <li>
                                <img src="<?php echo base_url().'theme/images/placeholders/slide33.png'?>" alt="" />
                            </li>
                        </ul>
                    </div>

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
                <div id="content">
                    <div id="intro">
                        <h1><span>Welcome to D'kade Production</span></h1>
                        <p style="text-align: left;">
                            D'kade Production merupakan usaha yang bergerak dalam jasa pertunjukan tari yang berlokasi di Pulau Bali dan berpengalaman dalam bidang kami, ini bisa menjadi reference /pilihan terbaik bagi anda yang ingin mencari pertunjukan tari untuk event/ acara anda. Tarian yang kami tawarkan berbagai macam dari tradisional ataupun modern. Anda dapat memilih tarian yang sesuai dengan tema acara anda dan berdiskusi bersama kami, seperti Pembukaan Seminar, Birthday Party, Dinner, Wedding.
                        <br >
                        <br>
                            Tarian yang kami tawarkan merupakan tarian pilihan & terkenal seperti : Balinese, Modern, Kontemporer, Fire , Bely , Chacha, dan masih banyak lagi dengan penari yang perbengalaman di bidangnya.
                        <p>
                            <a href="<?php echo base_url().'paket_tour'?>" class="large blue button">Booking Now</a>
                        </p>
                    </div>

                    <div id="feature" class="container section">
                        <?php
                            foreach ($wisata->result_array() as $i) {
                                $idwisata=$i['idwisata'];
                                $nama_wisata=$i['nama_wisata'];
                                $deskripsi=limit_words($i['deskripsi'],15);
                                $gambar=$i['gambar'];

                            ?>
                        <div class="one-third column">
                            <div class="one-third hover">
                                <a href="<?php echo base_url().'wisata_post/detail_wisata/'.$idwisata;?>">
                                <div class="readmore">
                                    <span class="text"><span class="anchor"></span></span>
                                </div>
                                <p>
                                    <img height="120" src="<?php echo base_url().'assets/gambars/'.$gambar;?>" alt="" />
                                </p></a>
                            </div>
                            <h3><span><?php echo $nama_wisata;?></span></h3>
                            <p>
                                
                            </p>
                        </div>
                        <?php
                            }
                        ?>
                        
                    </div>

                    <div id="sub" class="container section">
                        <div class="one-fourth column last" style="margin-left:2px;padding-right:10px;">    
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial -->
                <div class="container section">
                    <div id="home-testimonial" class="full-width column">
                        <?php foreach($test->result_array() as $j):
                            $name=$j['nama'];
                            $tgl_post=$j['tgl_post'];
                            $pesan=$j['pesan'];
                        ?>
                        <blockquote class="full-width">
                            <p>
                                <?php echo $pesan;?>
                            </p>
                            <cite><?php echo $name;?></cite>
                        </blockquote>
                        <?php  endforeach ?>                                                
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
