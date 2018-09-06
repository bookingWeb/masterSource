    <nav class="navbar-default navbar-static-side" role="navigation">

        <div class="sidebar-collapse">

            <ul class="nav metismenu" id="side-menu">

                <li class="nav-header">

                    <div class="dropdown profile-element"> 

						<span><img alt="image" src="<?php echo $themes_url . "img/" . $user_logo; ?>" width="100"/></span>

                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <span class="clear"><span class="block m-t-xs"><strong class="font-bold"><?php echo $user_nama; ?></strong></span> 

							<span class="text-muted text-xs block">Director <b class="caret"></b></span> </span> 

						</a>

                        <ul class="dropdown-menu animated fadeInRight m-t-xs">

                            <li><a href="<?php echo site_url("ucore/profile"); ?>">Profile</a></li>

                            <li class="divider"></li>

                            <li><a href="<?php echo site_url("ucore/logout"); ?>">Logout</a></li>

                        </ul>

                    </div>

                    <div class="logo-element">UCore</div>

                </li>

                <li <?php if($menu == "home"){ echo "class='active'"; } ?> >

                    <a href="<?php echo site_url("home"); ?>"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Dashboard</span></a>

                </li>

                <li <?php if (substr($submenu,0,3) == "jmh"){ echo "class='active'"; } ?> >

                    <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Jamaah</span><span class="fa arrow"></span></a>

                    <ul class="nav nav-second-level collapse">

                        <!--<li <?php if($submenu == "jmh_prospek"){ echo "class='active'"; } ?>><a href="<?php echo site_url("jamaah/prospek"); ?>">Prospek</a></li>

                        <li <?php if($submenu == "jmh_daftar"){ echo "class='active'"; } ?>><a href="<?php echo site_url("jamaah/daftar"); ?>">Registrasi Jamaah</a></li>-->

                        <li <?php if($submenu == "jmh_booking"){ echo "class='active'"; } ?>><a href="<?php echo site_url("jamaah/booking"); ?>">Booking</a></li>

                        <li <?php if($submenu == "jmh_data"){ echo "class='active'"; } ?>><a href="<?php echo site_url("jamaah/data"); ?>">Data Jamaah</a></li>

                    </ul>

                </li>

                <li <?php if($menu == "paket"){ echo "class='active'"; } ?>>

                    <a href="#"><i class="fa fa-paper-plane-o"></i> <span class="nav-label">Paket Perjalanan</span><span class="fa arrow"></span></a>

                    <ul class="nav nav-second-level collapse">

                        <li <?php if($submenu == "haji"){ echo "class='active'"; } ?>><a href="<?php echo site_url("paket/haji"); ?>">Haji</a></li>

                        <li <?php if($submenu == "umroh"){ echo "class='active'"; } ?>><a href="<?php echo site_url("paket/umroh"); ?>">Umroh</a></li>

                        <li <?php if($submenu == "wisata"){ echo "class='active'"; } ?>><a href="<?php echo site_url("paket/wisata"); ?>">Wisata</a></li>

                        <li <?php if($submenu == "jadwal"){ echo "class='active'"; } ?>><a href="<?php echo site_url("paket/jadwal"); ?>">Jadwal</a></li>

                    </ul>

                </li>

                <li <?php if($menu == "produk"){ echo "class='active'"; } ?>>

                    <a href="#"><i class="fa fa-taxi"></i> <span class="nav-label">Produk</span><span class="fa arrow"></span></a>

                    <ul class="nav nav-second-level collapse">

                        <li <?php if($submenu == "pesawat"){ echo "class='active'"; } ?>><a href="<?php echo site_url("produk/pesawat"); ?>">Pesawat</a></li>

                        <li <?php if($submenu == "hotel"){ echo "class='active'"; } ?>><a href="<?php echo site_url("produk/hotel"); ?>">Hotel</a></li>

                        <li <?php if($submenu == "visa"){ echo "class='active'"; } ?>><a href="<?php echo site_url("produk/visa"); ?>">Visa</a></li>

                    </ul>

                </li>

                <li <?php if($menu == "keuangan"){ echo "class='active'"; } ?>>

                    <a href="#"><i class="fa fa-money"></i> <span class="nav-label">Keuangan</span><span class="fa arrow"></span></a>

                    <ul class="nav nav-second-level collapse">

                        <li <?php if($submenu == "bayar"){ echo "class='active'"; } ?>><a href="<?php echo site_url("keuangan/bayar"); ?>">Pembayaran</a></li>

                        <li <?php if($submenu == "uangkeluar"){ echo "class='active'"; } ?>><a href="<?php echo site_url("keuangan/uangkeluar"); ?>">Uang Keluar</a></li>

                        <li <?php if($submenu == "refund"){ echo "class='active'"; } ?>><a href="<?php echo site_url("keuangan/refund"); ?>">Refund</a></li>

                        <li <?php if($submenu == "rekening"){ echo "class='active'"; } ?>><a href="<?php echo site_url("keuangan/rekening"); ?>">Rekening Bank</a></li>

                    </ul>

                </li>

                <li <?php if($menu == "persediaan"){ echo "class='active'"; } ?>>

                    <a href="#"><i class="fa fa-credit-card"></i> <span class="nav-label">Persediaan</span><span class="fa arrow"></span></a>

                    <ul class="nav nav-second-level collapse">

                        <li <?php if($submenu == "data"){ echo "class='active'"; } ?> ><a href="<?php echo site_url("persediaan/data"); ?>">Persediaan</a></li>

                        <li <?php if($submenu == "barangmasuk"){ echo "class='active'"; } ?> ><a href="<?php echo site_url("persediaan/barangmasuk"); ?>">Barang Masuk</a></li>

                        <li <?php if($submenu == "barangkeluar"){ echo "class='active'"; } ?> ><a href="<?php echo site_url("persediaan/barangkeluar"); ?>">Barang Keluar</a></li>

                        <li <?php if($submenu == "item"){ echo "class='active'"; } ?> ><a href="<?php echo site_url("persediaan/item"); ?>">Item Persediaan</a></li>

                        <li <?php if($submenu == "supplier"){ echo "class='active'"; } ?> ><a href="<?php echo site_url("persediaan/supplier"); ?>">Supplier</a></li>

                    </ul>

                </li>				

                <li <?php if($menu == "setting"){ echo "class='active'"; } ?>>

                    <a href="#"><i class="fa fa-cog"></i> <span class="nav-label">Setting</span><span class="fa arrow"></span></a>

                    <ul class="nav nav-second-level collapse">

                        <li <?php if($submenu == "travel"){ echo "class='active'"; } ?>><a href="<?php echo site_url("setting/travel"); ?>">Data Travel</a></li>

                        <li <?php if($submenu == "user"){ echo "class='active'"; } ?>><a href="<?php echo site_url("setting/user"); ?>">Data Pengguna</a></li>

                        <li <?php if($submenu == "rekening"){ echo "class='active'"; } ?>><a href="<?php echo site_url("setting/rekening"); ?>">Data Rekening Bank</a></li>

                        <li <?php if($submenu == "tourleader"){ echo "class='active'"; } ?>><a href="<?php echo site_url("setting/tourleader"); ?>">Data Tour Leader</a></li>

                        <li <?php if($submenu == "userteam"){ echo "class='active'"; } ?>><a href="<?php echo site_url("setting/userteam"); ?>">Data Team User</a></li>

                    </ul>

                </li>

                <li <?php if($menu == "report"){ echo "class='active'"; } ?> >

                    <a href="#"><i class="fa fa-file-o"></i> <span class="nav-label">Report</span><span class="fa arrow"></span></a>

                    <ul class="nav nav-second-level collapse">

                        <li <?php if($submenu == "pembayaran"){ echo "class='active'"; } ?>><a href="<?php echo site_url("report/pembayaran"); ?>">Laporan Rekap Pembayaran</a></li>

                    </ul>

                </li>		

                <li>

                    <a href="<?php echo site_url("ucore/logout"); ?>"><i class="fa fa-sign-out"></i> <span class="nav-label">Logout</span></a>

                </li>				



            </ul>



        </div>

    </nav>

