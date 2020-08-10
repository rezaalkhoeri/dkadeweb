<li>
                            <a href="<?php  echo base_url().''?>" class="">Home</a>
                        </li>
                        <li>
                            <a href="#">Profil</a>
                            <ul>
								<li>
                                    <a href="<?php echo base_url().'about';?>"><span>&nbsp;&nbsp;&nbsp;- </span>Tentang Kami</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url().'testimoni';?>"><span>&nbsp;&nbsp;&nbsp;- </span>Testimoni</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url().'lokasi';?>"><span>&nbsp;&nbsp;&nbsp;- </span>Lokasi</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url().'event_post'?>">Event</a>
                        </li>
						<li>
                            <a href="#">Transaksi</a>
                            <ul>
                                <li>
                                    <a href="<?php echo base_url().'tarian'?>">Tarian</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url().'konfirmasi'?>">Konfirmasi Pembayaran</a>
                                </li>
                            </ul>
                        </li>

						<li>
                            <a href="#">Gallery</a>
                            <ul>
                                <li>
                                    <a href="<?php echo base_url().'semua_album';?>"><span>&nbsp;&nbsp;&nbsp;- </span>Album Photo</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url().'detail_photo/galeri';?>"><span>&nbsp;&nbsp;&nbsp;- </span>Gallery Photo</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                        <li>
                            <a href="<?php echo base_url().'kontak'?>">Hubungi Kami</a>
                        </li>
                        <li>
                            <?php if ($this->session->userdata('masuk') == TRUE) { ?>
                                <a href="<?php echo base_url().'welcome/logout'?>">Logout</a>
                            <?php } else { ?>
                                <a href="<?php echo base_url().'welcome/loginUser'?>">Login</a>
                            <?php } ?>
                        </li>
                    </ul>