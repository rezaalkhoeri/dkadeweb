<!DOCTYPE html>
<html lang="id">
    <!--<![endif]-->
    <head>
        <title>Testimonial</title>

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
                        <div id="blog-content" class="two-third column end">
                            <div id="post-content" class="blog-item">
                                
                                
                                <div id="comment-content" class="end">
                                    <h4>Testimoni</h4><hr/>
                                    <?php
                                        foreach ($test->result_array() as $j):
                                        $name=$j['nama'];
                                        $tgl_post=$j['tgl_post'];
                                        $pesan=$j['pesan'];
                                    ?>
                                    <div class="comment-item">
                                        <!--<div class="commenter-photo">
                                            <img src="images/blog/anonymous.jpg" alt="" />
                                        </div>-->
                                        <div class="comment-post">
                                            <p class="comment-item-meta">
                                                <span class="commenter-name"> <?php echo $name;?> </span>
                                                <span class="comment-date"> <?php echo $tgl_post;?> </span>
                                            </p>
                                            <p>
                                                "<?php echo $pesan;?>"
                                            </p>
                                        </div>
                                    </div><hr/>
                                    <?php endforeach ;?>
                                    <div id="comment-form-item">
                                        <h4>Tinggalkan Testimoni</h4>
                                        <p>
                                            Masukkan Nama, Email, dan Testimoni Anda lalu klik tombol Submit.
                                        </p>
                                        <form id="comment-form" class="validate" action="<?php echo base_url().'testimoni/simpan'?>" method="post">
                                            <p>
                                                <label for="name" class="required label">Nama:</label>
                                                <input id="name" class="validate[required]" type="text" name="nama" style="width:300px;" required/>
                                            </p>
                                            <p>
                                                <label for="email" class="required label">Email:</label>
                                                <input id="email" class="validate[required,custom[email]]" placeholder="Contoh: email@gmail.com" type="email" name="email" style="width:300px;" required/>
                                            </p>
                                            
                                            <p>
                                                <label id="comment-label" for="comment" class="required label">Testimoni:</label>
                                                <textarea id="comment" class="validate[required]" name="message" cols="28" rows="5" placeholder="Testimoni" required></textarea>
                                            </p>
                                            <p>
                                                <label></label>
                                                <input class="medium blue    button" id="submit-button" type="submit" name="Submit" value="Submit" />
                                            </p>
                                        </form>
                                    </div>
                                </div>
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
                                foreach ($paket->result_array() as $h) {
                                    $idpaketf=$h['idpaket'];
                                    $namapaketf=$h['nama_paket'];
                                    $gambarf=$h['gambar'];
                                ?>
                                <li>
                                    <a href="<?php echo base_url().'paket_tour/detail_paket/'.$idpaketf;?>"><img width="50" height="50" src="<?php echo base_url().'assets/gambars/'.$gambarf;?>" alt="" /><?php echo $namapaketf;?></a>
                                </li>
                                <?php } ?> 
                                </ul>
                            </div>
                            <div class="sidebar-item">
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
