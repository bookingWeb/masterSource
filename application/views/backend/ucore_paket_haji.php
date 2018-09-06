            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Paket Perjalanan <?php echo $tipe_paket; ?></h2>
                    <ol class="breadcrumb">
                        <li><a href="">Paket</a></li>
                        <li class="active"><strong><?php echo $tipe_paket; ?></strong></li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title"><h5>Daftar Paket <?php echo $tipe_paket; ?> Berdasarkan Waktu Keberangkatan</h5></div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-2 m-b-xs">
								<a href="<?php echo site_url("paket/haji/new"); ?>" class="btn btn-sm btn-primary"> Tambah Paket</a> 
                                </div>
                                <div class="col-sm-3 m-b-xs">
								<a href="<?php echo site_url("paket/haji/schedule"); ?>" class="btn btn-sm btn-primary"> Tambah Schedule</a> 
                                </div>
								<div class="col-sm-4"></div>
                                <div class="col-sm-3">
                                    <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-primary"> Cari</button> </span></div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>No Flight</th>
                                        <th>Nama Paket</th>
                                        <th>Berangkat </th>
                                        <th>Total Kursi </th>
                                        <th>Sisa Kursi </th>
                                        <th>#Booking </th>
                                        <th>#Booked</th>
                                        <th>Kamar Ber 2</th>
                                        <th>Kamar Ber 3</th>
                                        <th>Kamar Ber 4</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>SV117</td>
                                        <td>Haji Bronze - Saudi Airlines 20 Hari</td>
                                        <td>10-Juni-2018</td>
                                        <td>100</td>
                                        <td>95</td>
										<td>12</td>
										<td>5</td>
                                        <td>USD 2000</td>
                                        <td>USD 2000</td>
                                        <td>USD 2000</td>
                                        <td>
                                            <div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Detail Jamaah</a></li>
                                                    <li><a href="#">Cek Dokumen</a></li>
                                                    <li><a href="#">Manifest</a></li>
                                                    <!-- <li class="divider"></li>
                                                    <li><a href="#">Separated link</a></li> -->
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>SV118</td>
                                        <td>Haji Silver - Saudi Airlines 30 Hari</td>
                                        <td>15-Juni-2018</td>
                                        <td>100</td>
                                        <td>99</td>
										<td>2</td>
										<td>1</td>
                                        <td>USD 2000</td>
                                        <td>USD 2000</td>
                                        <td>USD 2000</td>
                                        <td>
                                            <div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Detail Jamaah</a></li>
                                                    <li><a href="#">Cek Dokumen</a></li>
                                                    <li><a href="#">Manifet</a></li>
                                                    <!-- <li class="divider"></li>
                                                    <li><a href="#">Separated link</a></li> -->
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>SV119</td>
                                        <td>Haji Gold - Emirates 20 Hari</td>
                                        <td>20-Juli-2018</td>
                                        <td>100</td>
                                        <td>100</td>
										<td>0</td>
										<td>0</td>
                                        <td>USD 2000</td>
                                        <td>USD 2000</td>
                                        <td>USD 2000</td>
                                        <td>
                                            <div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Detail Jamaah</a></li>
                                                    <li><a href="#">Cek Dokumen</a></li>
                                                    <li><a href="#">Manifet</a></li>
                                                    <!-- <li class="divider"></li>
                                                    <li><a href="#">Separated link</a></li> -->
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>SV120</td>
                                        <td>Haji Premium - Emirates 30 Hari</td>
                                        <td>9-Agustus-2018</td>
                                        <td>100</td>
                                        <td>93</td>
										<td>10</td>
										<td>7</td>
                                        <td>USD 2000</td>
                                        <td>USD 2000</td>
                                        <td>USD 2000</td>
                                        <td>
                                            <div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Detail Jamaah</a></li>
                                                    <li><a href="#">Cek Dokumen</a></li>
                                                    <li><a href="#">Manifet</a></li>
                                                    <!-- <li class="divider"></li>
                                                    <li><a href="#">Separated link</a></li> -->
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
				