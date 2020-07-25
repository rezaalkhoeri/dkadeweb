<!-- Footer -->
<div id="footer">
                    <div class="container section end">
                        <div id="footer-about" class="one-fourth column">
                            <p><img src="<?php echo base_url().'theme/images/footer-logo.png'?>" alt="" />
                            </p>
                            <p>
								<br><a href="#">Alamat Kantor:</a></br>
                                <span>Jl. Merdeka IX No. 4, Tanjung Bungkak, Sumerta Kelod, </span>
                                <span> Denpasar, Bali.</span>
                                <span>Telp: 0812-3600-583</span>
                                <span>Email: dkadeproduction@gmail.com</span>
                                <span>Website: www.dkadeproduction.co.id</span>
                            </p>
                            <p>
                                
                            </p>
                        </div>
                        
                        <div id="footer-offers" class="one-fourth column">
                            <h4><span class="footer left">Paket Tour</span></h4>
                            <ul>
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
                        <div id="footer-gallery" class="one-fourth column last">
                            <h4><span class="footer left">Photo Gallery</span></h4>
                            <ul>
                                <?php
                                    foreach ($photo->result_array() as $p):
                                    $jdl_galeri=$p['jdl_galeri'];
                                    $gbr_galeri=$p['gbr_galeri'];
                                ?>
                                <li>
                                    <a href="<?php echo base_url().'assets/gambars/'.$gbr_galeri;?>" class="image-box" rel="beach"><img src="<?php echo base_url().'assets/gambars/'.$gbr_galeri;?>"  alt="" /></a>
                                </li>
                                <?php endforeach ?>
                            </ul>
                            <p>
                                <a href="<?php echo base_url().'detail_photo/galeri';?>">Lihat Semua</a>
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Copyright and Social Icons -->
                <div id="copyright">
                    <div class="container section end">
                        <ul id="social">
                            <li>
                                <a href="#"><img src="<?php echo base_url().'theme/images/social/facebook.png'?>" alt="" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="<?php echo base_url().'theme/images/social/instagram.png'?>" alt="" /></a>
                            </li>
                            <li>
                                <a href="https://api.whatsapp.com/send?phone=081338049392&text=Hai%20Admin"><img src="<?php echo base_url().'theme/images/social/whatsapp.png'?>" alt="" /></a>
                            </li>
                        </ul>
                        <span id="text">Copyright &copy; <?php echo date('Y');?> | <a href="<?php  echo base_url().''?>">D'Kade Production</a>.</span>
                    </div>
                </div>
                
            </div>
        </div>