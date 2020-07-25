<html lang="id">
    <!--<![endif]-->
    <head>
        <title>Form Pemesanan</title>

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
                <?php 
                    $b=$pkt->row_array();
                ?>
                <!-- Content -->
                <div id="content" class="reservation">
                    <div class="container section">
                        <div class="one-third column">
                            <h3 class="nobg">Informasi Tata cara pemesanan</h3>
                            <p>1. Isi Data-data Di Form pemesanan Dengan Lengkap dan Benar</p>
							<p>2. Jika anda memimliki Permintaan Khusus, masukan di Form bagian *Permintaan Khusus.</p>
							<p>3. Jika anda ingin melakukan pembayar DP Pemesanan ketik( Down payment ) di From bagian *Permintaan Khusus.</p>
							<p>4. Jika anda ingin membayaran penuh Pemesanan ketik(Full payment) di Form bagian *Permintaan khusus.</p>
							<p>5. Setelah semua data-data di form pemesanan tersisi dengan lengkap maka akan keluar Invoice anda</p>
							<p>6. Setelah itu silahkan Lakukan pembayaran tangihan anda sesuai dengan Invoice</p>
							<p>7. Setelah melakukan pembayaran maka anda diwajibkan Mengkonfirmasi kami melalui Menu Konfirmasi</p>
							<p>8. Setelah itu kami akan menvalidasi bukti Pemesanan Anda<p>
                            <div class="info box">
                                Jika anda mengisi form pemsesanan ini, anda telah menyatakan sepakat dnegan syarat dan ketentuan kami.
                            </div>
                        </div>
                        <div class="two-third column last">
                            <form style="margin-left:120px;" action="<?php echo base_url().'paket_tour/order'?>" method="post">
                                <h3><span class="left">Formulir Pemesanan</span></h3>
                                <p>
                                    <label for="firstname" class="required label">Nama Lengkap:</label>
                                    <input id="firstname" type="text" name="nama" style="width:300px;" required/>
                                </p>
                                <p>
                                    <label for="payment" class="required label">Jenis Kelamin:</label>
                                    <select id="payment" class="" name="jenkel" style="width:300px;" required>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </p>
                                <p>
                                    <label id="address-label" for="address" class="required label">Alamat:</label>
                                    <textarea id="address" class="" name="alamat" cols="28" rows="5" style="width:300px;" required></textarea>
                                </p>
                                <p>
                                    <label for="phone" class="required label">No Telp/HP:</label>
                                    <input id="phone" class="" type="text" name="notelp" style="width:300px;" required/>
                                </p>
                                <p>
                                    <label for="email" class="required label">Email:</label>
                                    <input id="email" class="" placeholder="codetravel@gmail.com" type="text" name="email" style="width:300px;" required/>
                                </p>
                                <h3 class="extra-margin top"><span class="left">Wisata Info</span></h3>
                                <p>
                                    <label for="room-type" class="required label">Paket Pulau:</label>
                                    <input type="hidden" name="paket" class="" value="<?php echo $b['idpaket']?>" style="width:360px;"/>
                                    <input type="text" name="nama_paket" class="" value="<?php echo $b['nama_paket']?>" style="width:400px;" readonly="readonly" required/>
                                    
                                </p>
                                <p>
                                    <label for="checkin" class="required label">Keberangkatan:</label>
                                    <input type="text" readonly="readonly" id="checkin" class="datepicker" name="berangkat" style="width:300px;" required/>
                                
                                </p>
                                <p>
                                    <label for="checkout" class="required label">Kepulangan:</label>
                                    <input type="text" readonly="readonly" id="checkout" class="datepicker" name="kembali" style="width:300px;" required/>
                                </p>
                                <p>
                                    <label for="adultamt" class="required label">Dewasa:</label>
                                    <input type="text" id="adultamt" name="adultamt" value="1" class="spinner" />
                                </p>
                                <p>
                                    <label for="childrenamt" class="required label">Anak-Anak:</label>
                                    <input type="text" id="childrenamt" name="childrenamt" value="0" class="spinner-min0" />
                                </p>
                                
                                <p>
                                    <label id="note" for="notebox" class="label">Permintaan Khusus:</label>
                                    <textarea id="notebox" name="notebox" cols="28" rows="5" style="width:300px;"></textarea>
                                </p>

                                <p>
                                    <input type="hidden" id="status_bayar" name="status_bayar" value="BELUM LUNAS"/>
                                </p>
                                
                                <p>
                                    <label></label>
                                    <button type="submit" class="medium blue button">Lanjutkan</button>
                                </p>
                            </form>
                            
                        </div>
                    </div>
                </div>
                
                
                <!-- Footer -->
                <?php 
                    $this->load->view('front/v_footer')
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
