        <?php if ($site_form=="list_stock_penerbangan") { ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Produk Pesawat</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Produk</a></li>
                        <li class="active"><strong>Pesawat</strong></li>
                    </ol>
                </div>
                <div class="col-lg-2">
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title"><h5>Daftar Jadwal Penerbangan</h5></div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-sm-2 m-b-xs">
                                        <a href="<?php echo site_url("produk/pesawat/schedule"); ?>" class="btn btn-sm btn-primary"> Tambah Stok Penerbangan</a>
                                    </div>
                                    <div class="col-sm-7"></div>
                                    <div class="col-sm-3">
                                        <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                            <button type="button" class="btn btn-sm btn-primary"> Cari</button> </span></div>
                                        </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Penerbangan</th>
                                                <th>Nama Airlines</th>
                                                <th>Seat Class</th>
                                                <th>Jadwal </th>
                                                <th>Rute Penerbangan </th>
                                                <th>Jumlah Kursi </th>
                                                <th>Booked </th>
                                                <th>Kategori Jual</th>
                                                <th>Aksi </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php

                                        if ($data_penerbangan > 0) {
                                        for ($i=0;$i<sizeof($data_penerbangan);$i++) {
                                            $id_schedule        = $data_penerbangan[$i]["id_schedule"];
                                            $date_arrival       = $data_penerbangan[$i]["date_arrival"];
                                            $date_depart        = $data_penerbangan[$i]["date_depart"];
                                            $duration           = $data_penerbangan[$i]["duration"];
                                            $city_arrival 	    = $data_penerbangan[$i]["city_arrival"];
                                            $city_depart        = $data_penerbangan[$i]["city_depart"];
                                            $quota              = $data_penerbangan[$i]["quota"];
                                            $booked             = $data_penerbangan[$i]["booked"];
                                            $price              = $data_penerbangan[$i]["price"];
                                            $margin             = $data_penerbangan[$i]["margin"];
                                            $is_active          = $data_penerbangan[$i]["is_active"];
                                            $type_pesawat       = $data_penerbangan[$i]["type_pesawat"];
                                            $kode_penerbangan   = $data_penerbangan[$i]["kode_penerbangan"];
                                            $kode_maskapai      = $data_penerbangan[$i]["kode_maskapai"];
                                            $nama_maskapai      = $data_penerbangan[$i]["nama_maskapai"];
                                            $nama_kelas         = $data_penerbangan[$i]["nama_kelas"];
                                            $kategori_jual      = $data_penerbangan[$i]["kategori_jual"];
                                            $nama_kelas         = $data_penerbangan[$i]["nama_kelas"];

                                            for ($j=0;$j<sizeof($data_city);$j++){
                                                $id_city    = $data_city[$j]["id"];
                                                $kode       = $data_city[$j]["kode"];
                                                $kota       = $data_city[$j]["kota"];
                                                $bandara    = $data_city[$j]["bandara"];
                                            

                                            if ($city_arrival == $id_city){
                                                $cityarrival = "(".$kode.") ".$kota." - ".$bandara; 
                                            }

                                            if ($city_depart == $id_city){
                                                $citydepart = "(".$kode.") ".$kota." - ".$bandara;
                                            }

                                        }


                                    ?>
                                        <tr>                                            
                                            <td><?php echo ($i+1); ?></td>
                                            <td><?php echo $kode_penerbangan; ?></td>
                                            <td><?php echo "(".$kode_maskapai.") ".$nama_maskapai; ?></td>
                                            <td><?php echo $nama_kelas; ?></td>
                                            <td><?php echo $date_arrival." - ".$date_depart; ?></td>
                                            <td><?php echo $cityarrival." to ".$citydepart; ?>
                                            </td>
                                            <td><?php echo $quota; ?></td>
                                            <td><?php echo $booked; ?></td>
                                            <td><?php if ($kategori_jual == "1") { echo "Internal"; } elseif ($kategori_jual == "2") { echo "Marketplace"; } ?></td>
                                            <td>

                                                <div class="btn-group">

                                                    <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>

                                                    <ul class="dropdown-menu">

                                                        <li><a href="<?php echo site_url("produk/pesawat/schedule/ubah/".$id_schedule) ?>">Ubah Penerbangan</a></li>

                                                        <li><a href="<?php echo site_url("produk/pesawat/schedule/hapus/".$id_schedule) ?>">Hapus</a></li>

                                                    </ul>

                                                </div>    

                                            </td>

                                        </tr>
                                        <?php } } ?>

                                        </tbody>

                                    </table>

                                </div>



                            </div>

                        </div>

                    </div>



                </div>

            </div>	

		

        <?php } if ($site_form=="list_hotel") { ?>



            <div class="row wrapper border-bottom white-bg page-heading">

                <div class="col-lg-10">

                    <h2>Produk Hotel</h2>

                    <ol class="breadcrumb">

                        <li><a href="index.html">Produk</a></li>

                        <li class="active"><strong>Hotel</strong></li>

                    </ol>

                </div>

                <div class="col-lg-2">



                </div>

            </div>

        

            <div class="wrapper wrapper-content animated fadeInRight">

                <div class="row">

                    <div class="col-lg-12">

                        <div class="ibox float-e-margins">

                            <div class="ibox-title"><h5>Stock Room Hotel</h5></div>

                            <div class="ibox-content">

                                <div class="row">

                                    <div class="col-sm-3 m-b-xs">

                                    <a href="<?php echo site_url("produk/hotel/new"); ?>" class="btn btn-sm btn-primary"> Tambah Stock Room Hotel</a> 

                                    </div>

                                    <div class="col-sm-6"></div>

                                    <div class="col-sm-3">

                                        <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">

                                            <button type="button" class="btn btn-sm btn-primary"> Cari</button> </span></div>

                                    </div>

                                </div>

                                <div class="table-responsive">

                                    <table class="table table-striped">

                                        <thead>

                                        <tr>

                                            <th>No</th>
                                            <th>Nama Hotel</th>
                                            <th>Nama Room</th>
                                            <th>Alamat</th>
                                            <th>Tanggal Check In</th>
                                            <th>Tanggal Check Out</th>
                                            <th>Durasi</th>
                                            <th>Jumlah Stok</th>
                                            <th>Harga</th>
                                            <th>Margin</th>
                                            <th>Aksi</th>

                                        </tr>

                                        </thead>

                                        <tbody>
                                            <?php  
                                            if ($data_hotel > 0) {
                                                for ($i=0;$i<sizeof($data_hotel);$i++) {
                                                    $id             = $data_hotel[$i]["id"];
                                                    $nama_hotel     = $data_hotel[$i]["name"];
                                                    $room_type      = $data_hotel[$i]["room_type"];
                                                    $address        = $data_hotel[$i]["address"];
                                                    $start_date     = $data_hotel[$i]["start_date"];
                                                    $end_date       = $data_hotel[$i]["end_date"];
                                                    $durasi     = $data_hotel[$i]["durasi"];
                                                    $stock      = $data_hotel[$i]["stock"];
                                                    $price      = $data_hotel[$i]["price"];
                                                    $margin     = $data_hotel[$i]["margin"];
                                            ?>
                                            <tr>
                                                <td><?php echo ($i+1); ?></td>
                                                <td><?php echo $nama_hotel; ?></td>
                                                <td><?php echo $room_type; ?></td>
                                                <td><?php echo $address; ?></td>
                                                <td><?php echo $start_date; ?></td>
                                                <td><?php echo $end_date; ?></td>
                                                <td><?php echo $durasi; ?> Hari</td>
                                                <td><?php echo $stock; ?></td>
                                                <td><?php echo "Rp.".number_format($price); ?></td>
                                                <td><?php echo "Rp.".number_format($margin); ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="<?php echo site_url("produk/hotel/edit/".$id); ?>">Ubah Hotel</a></li>
                                                            <li><a href="<?php echo site_url("produk/hotel/delete/".$id); ?>">Hapus</a></li>
                                                        </ul>
                                                    </div>    
                                                </td>
                                            </tr>
                                            <?php }} ?>
                                        </tbody>

                                    </table>

                                </div>



                            </div>

                        </div>

                    </div>



                </div>

            </div>	



        <?php } if ($site_form=="list_visa") { ?>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Provider Visa</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Produk</a></li>
                        <li class="active"><strong>Visa</strong></li>
                    </ol>
                </div>

                <div class="col-lg-2">
                </div>

            </div>



            <div class="wrapper wrapper-content animated fadeInRight">

                <div class="row">

                    <div class="col-lg-12">

                        <div class="ibox float-e-margins">

                            <div class="ibox-title"><h5>Daftar Provider Visa</h5></div>

                            <div class="ibox-content">

                                <div class="row">

                                    <div class="col-sm-3 m-b-xs">

                                    <a href="<?php echo site_url("produk/visa/new/"); ?>" class="btn btn-sm btn-primary"> Tambah Provider Visa</a> 

                                    </div>

                                    <div class="col-sm-6"></div>

                                    <div class="col-sm-3">

                                        <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">

                                            <button type="button" class="btn btn-sm btn-primary"> Cari</button> </span></div>

                                    </div>

                                </div>

                                <div class="table-responsive">

                                    <table class="table table-striped">

                                        <thead>

                                        <tr>

                                            <th>No</th>
                                            <th>Nama Provider</th>
                                            <th>No Telepon</th>
                                            <th>Alamat </th>
                                            <th>Harga </th>
                                            <th>Aksi </th>

                                        </tr>

                                        </thead>

                                        <tbody>

                                            <?php if (isset($data_provider_visa)) {
                                                for ($i=0;$i<sizeof($data_provider_visa);$i++) {
                                                    $id             = $data_provider_visa[$i]["id"];
                                                    $nama_provider  = $data_provider_visa[$i]["nama_provider"];
                                                    $no_telp        = $data_provider_visa[$i]["no_telp"];
                                                    $alamat         = $data_provider_visa[$i]["alamat"];
                                                    $price          = $data_provider_visa[$i]["price"];                                            
                                            ?>

                                        <tr>
                                            <td><?php echo ($i+1);?></td>
                                            <td><?php echo $nama_provider; ?></td>
                                            <td><?php echo $no_telp; ?></td>
                                            <td><?php echo $alamat; ?></td>
                                            <td><?php echo "Rp. ".number_format($price); ?></td>
                                                
                                            <td>
                                                <div class="btn-group">
                                                    <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <!-- <li><a href="<?php echo site_url("produk/visa/paket/"); ?>">Paket Perjalanan</a></li> -->
                                                        <li><a href="<?php echo site_url("produk/visa/edit/".$id); ?>">Ubah Provider</a></li>
                                                        <li><a href="<?php echo site_url("produk/visa/delete/".$id); ?>">Hapus</a></li>
                                                    </ul>
                                                </div>    
                                            </td>
                                        </tr>
                                        <?php }} ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>

                    </div>



                </div>

            </div>

        

        <?php } if ($site_form=="form_maskapai") { ?> 

            <div class="row wrapper border-bottom white-bg page-heading">

                <div class="col-lg-10">

                    <h2>Tambah Maskapai</h2>

                    <ol class="breadcrumb">

                        <li><a href="index.html">Produk</a></li>

                        <li><a href="index.html">Pesawat</a></li>

                        <li class="active"><strong>Maskapai</strong></li>

                    </ol>

                </div>

                <div class="col-lg-2">



                </div>

            </div>



            <div class="wrapper wrapper-content animated fadeInRight">

                <div class="row">

                <div class="col-lg-12">

                    <div class="ibox float-e-margins">

                        <div class="ibox-title">

                            <h5>Tambah Maskapai</h5>

                        </div>

                        <div class="ibox-content">

						<form method="post" action="#" class="form-horizontal">

                        <div class="form-group">

							<label class="col-sm-2 control-label">Kode Maskapai</label>

                            <div class="col-sm-5"><input type="text" name="telepon" class="form-control" placeholder="Kode Maskapai"></div>

                        </div>

                        <div class="form-group">

							<label class="col-sm-2 control-label">Nama Maskapai</label>

                            <div class="col-sm-10"><input type="text" name="telepon" class="form-control" placeholder="Nama Maskapai"></div>

                        </div>

                        <div class="form-group">

							<label class="col-sm-2 control-label">Deskripsi</label>

                            <div class="col-sm-10"><input type="text" name="telepon" class="form-control" placeholder="Deskripsi"></div>

                        </div>

                        <div class="form-group">

                            <div class="col-sm-4 col-sm-offset-2">

                                <a href="http://erp.umrohnesia.id/produk/pesawat/" class="btn btn-white">Cancel</a>

                                <button name="tombol" class="btn btn-primary" value="simpan" type="submit">Save</button> 

                            </div>

                        </div>						

						</form>

						</div>

					</div>

				</div>

            </div>



        <?php } if ($site_form=="form_schedule") { ?>

            <?php

            $xaksi = "";
            if ($aksi=="") { $xaksi = "Tambah Schedule Penerbangan"; }
            if ($aksi=="ubah") { $xaksi = "Ubah Schedule Penerbangan"; }
            if ($aksi=="hapus") { $xaksi = "Hapus Schedule Penerbangan"; }

            $id_schedule = ""; $idmaskapai = ""; $idclass = ""; $date_arrival = ""; $date_depart = "";
            $duration = ""; $city_arrival = ""; $city_depart = ""; $quota = ""; $price = "";
            $margin = ""; $is_active = ""; $kategori_jual = ""; $kode_penerbangan = ""; $timezone_depart = "";
            $timezone_arrival = ""; $kelas_id=""; 

            if (!empty($data_penerbangan_byid)) {
                $id_schedule            = $data_penerbangan_byid[0]["id_schedule"];
                $idmaskapai            = $data_penerbangan_byid[0]["id_maskapai"];
                $idclass               = $data_penerbangan_byid[0]["id_class"];
                $date_arrival           = $data_penerbangan_byid[0]["date_arrival"];
                $date_depart            = $data_penerbangan_byid[0]["date_depart"];
                $duration               = $data_penerbangan_byid[0]["duration"];
                $city_arrival           = $data_penerbangan_byid[0]["city_arrival"];
                $city_depart            = $data_penerbangan_byid[0]["city_depart"];
                $quota                  = $data_penerbangan_byid[0]["quota"];
                $price                  = $data_penerbangan_byid[0]["price"];
                $margin                 = $data_penerbangan_byid[0]["margin"];
                $is_active              = $data_penerbangan_byid[0]["is_active"];
                $kategori_jual          = $data_penerbangan_byid[0]["kategori_jual"];
                $kode_penerbangan       = $data_penerbangan_byid[0]["kode_penerbangan"];
                $timezone_depart        = $data_penerbangan_byid[0]["timezone_depart"];
                $timezone_arrival       = $data_penerbangan_byid[0]["timezone_arrival"];
                $kelas_id               = $data_penerbangan_byid[0]["kelas_id"];
            }
            ?>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?php echo $xaksi; ?></h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Produk</a></li>
                        <li><a href="index.html">Pesawat</a></li>
                        <li class="active"><strong>Maskapai</strong></li>
                    </ol>
                </div>

                <div class="col-lg-2">

                </div>
            </div>



            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><?php echo $xaksi; ?></h5>
                        </div>
                        <div class="ibox-content">
						<form method="post" action="<?php echo site_url("produk/pesawat/schedule/".$aksi."/".$idschedule); ?>" class="form-horizontal">

                        <div class="form-group">
							<label class="col-sm-2 control-label">Maskapai</label>
                            <div class="col-sm-4">
                                <select class="form-control m-b" name="maskapai" <?php if ($aksi == "hapus") { echo "disabled"; } ?>>
                                    <option>Pilih Maskapai</option>

                                    <?php

                                        if ($data_maskapai > 0) {
                                        for ($i=0;$i<sizeof($data_maskapai);$i++) {
                                            $id_maskapai    = $data_maskapai[$i]['id'];
                                            $kode_maskapai  = $data_maskapai[$i]['kode_maskapai'];
                                            $nama_maskapai  = $data_maskapai[$i]['nama_maskapai'];
                                    ?>

                                    <option value="<?php echo $id_maskapai; ?>" <?php if($idmaskapai == $id_maskapai) { echo "selected"; } ?>><?php echo "(".$kode_maskapai.") ".$nama_maskapai; ?></option>

                                    <?php }} ?>
                                </select>

                            </div>

                            <label class="col-sm-2 control-label">Kode Penerbangan</label>

                            <div class="col-sm-4"><input type="text" name="kode_penerbangan" class="form-control" placeholder="Kode Penerbangan" value="<?php echo $kode_penerbangan ?>" <?php if ($aksi == "hapus") { echo "disabled"; } ?>></div>

                        </div>

                        <div class="form-group">

							<label class="col-sm-2 control-label">Date Arrival</label>

                            <div class="col-sm-4"><input type="datetime-local" name="date_arrival" class="form-control" placeholder="Date Arrival" value="<?php echo $date_arrival; ?>" <?php if ($aksi == "hapus") { echo "disabled"; } ?>></div>

                            <label class="col-sm-2 control-label">Date Depart</label>

                            <div class="col-sm-4"><input type="datetime-local" name="date_depart" class="form-control" placeholder="Date Depart" value="<?php echo $date_depart; ?>" <?php if ($aksi == "hapus") { echo "disabled"; } ?>></div>

                        </div>

                        <div class="form-group">

							<label class="col-sm-2 control-label">Time Zone Arrival</label>

                            <div class="col-sm-4"><input type="text" name="time_arrival" class="form-control" placeholder="Time Zone Arrival" value="<?php echo $timezone_depart; ?>" <?php if ($aksi == "hapus") { echo "disabled"; } ?>></div>

                            <label class="col-sm-2 control-label">Time Zone Depart</label>

                            <div class="col-sm-4"><input type="text" name="time_depart" class="form-control" placeholder="Time Zone Depart" value="<?php echo $timezone_arrival; ?>" <?php if ($aksi == "hapus") { echo "disabled"; } ?>></div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-2 control-label">City Arrival</label>

                            <div class="col-sm-4">
                                <select class="form-control m-b" name="city_arival" <?php if ($aksi == "hapus") { echo "disabled"; } ?>>

                                    <option value ="0">Pilih Kota</option>

                                    <?php

                                        if ($data_city > 0) {
                                        for ($i=0;$i<sizeof($data_city);$i++) {
                                            $id_city    = $data_city[$i]['id'];
                                            $kode       = $data_city[$i]['kode'];
                                            $kota       = $data_city[$i]['kota'];
                                            $bandara    = $data_city[$i]['bandara'];
                                    ?>

                                    <option value="<?php echo $id_city; ?>" <?php if($city_arrival == $id_city){ echo "selected"; }?>><?php echo "(".$kode.") ".$kota." - ".$bandara; ?></option>

                                    <?php }} ?>
                                </select>
                            </div>

                            <label class="col-sm-2 control-label">City Depart</label>

                            <div class="col-sm-4">
                                <select class="form-control m-b" name="city_depart" <?php if ($aksi == "hapus") { echo "disabled"; } ?>>

                                    <option value ="0">Pilih Kota</option>

                                    <?php

                                        if ($data_city > 0) {
                                        for ($i=0;$i<sizeof($data_city);$i++) {
                                            $id_city    = $data_city[$i]['id'];
                                            $kode       = $data_city[$i]['kode'];
                                            $kota       = $data_city[$i]['kota'];
                                            $bandara    = $data_city[$i]['bandara'];
                                    ?>

                                    <option value="<?php echo $id_city; ?>" <?php if($city_depart == $id_city){ echo "selected"; }?>><?php echo "(".$kode.") ".$kota." - ".$bandara; ?></option>

                                    <?php }} ?>
                                </select>
                            </div>

                        </div>

                        <div class="form-group">

							<label class="col-sm-2 control-label">Duration</label>

                            <div class="col-sm-4"><input type="text" name="duration" class="form-control" placeholder="Duration" value="<?php echo $duration; ?>" <?php if ($aksi == "hapus") { echo "disabled"; } ?>></div>

							<label class="col-sm-2 control-label">Quota</label>

                            <div class="col-sm-4"><input type="text" name="quota" class="form-control" placeholder="Quota" value="<?php echo $quota; ?>" <?php if ($aksi == "hapus") { echo "disabled"; } ?>></div>

                        </div>

                        <div class="form-group">

							<label class="col-sm-2 control-label">Price</label>

                            <div class="col-sm-4"><input type="text" name="price" class="form-control" placeholder="Price" value="<?php echo $price; ?>" <?php if ($aksi == "hapus") { echo "disabled"; } ?>></div>

							<label class="col-sm-2 control-label">Margin</label>

                            <div class="col-sm-4"><input type="text" name="margin" class="form-control" placeholder="Margin" value="<?php echo $margin; ?>" <?php if ($aksi == "hapus") { echo "disabled"; } ?>></div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-2 control-label">Seat Class</label>

                            <div class="col-sm-4">
                                <select class="form-control m-b" name="seat_class" <?php if ($aksi == "hapus") { echo "disabled"; } ?>>

                                    <option>Pilih Seat Class</option>

                                    <?php

                                        if ($data_seat_class > 0) {
                                        for ($i=0;$i<sizeof($data_seat_class);$i++) {
                                            $id_seat    = $data_seat_class[$i]['id'];
                                            $nama_kelas = $data_seat_class[$i]['nama_kelas'];
                                    ?>

                                    <option value="<?php echo $id_seat; ?>" <?php if($kelas_id == $id_seat) { echo "selected"; }?>><?php echo $nama_kelas; ?></option>

                                    <?php }} ?>
                                </select>
                            </div>

                            <label class="col-sm-2 control-label">Kategori Jual</label>

                            <div class="col-sm-4">
                                <select class="form-control m-b" name="kategori_jual" <?php if ($aksi == "hapus") { echo "disabled"; } ?>>

                                    <option>Pilih Kategori Jual</option>

                                    <option value="1" <?php if ($idclass == "1") { echo "selected"; } ?>>Internal</option>
                                    <option value="2" <?php if ($idclass == "2") { echo "selected"; } ?>>Marketplace</option>

                                </select>
                            </div>

                            </div>

                        <div class="form-group">

							<label class="col-sm-2 control-label">Is Active</label>

                            <div class="col-sm-1"><input type="checkbox" name="is_active" class="form-control" <?php if ($aksi == "hapus") { echo "disabled"; } ?>></div>

                        </div>

                        <div class="form-group">

                            <div class="col-sm-4 col-sm-offset-2">

                                <a href="<?php echo site_url('produk/pesawat/'); ?>" class="btn btn-white">Cancel</a>

                                <button name="tombol" class="btn btn-primary" value="tombol" type="submit"><?php if ($aksi == "hapus") { echo "Delete"; } else { echo "Save"; } ?></button> 

                            </div>

                        </div>						

						</form>

						</div>

					</div>

				</div>

            </div>

        <?php } if ($site_form=="detail_penerbangan") { ?>

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title"><h5>Detail Booking Paket</h5></div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-5">
                                <h3>Nama Maskapai</h3>
                                <p>(GRD) Garuda Indonesia<br><a href="">&gt; Ganti Paket</a></p>
                            </div>	
                            <div class="col-lg-5">
                                <h3>Rute Penerbangan</h3>
                                <p>(JED) Jeddah - (CGK) Jakarta<br><a href="">&gt; Ganti Kontak</a></p>
                            </div>	

                            <div class="col-lg-2">
                                <h3>ID Penerbangan</h3>
                                <h1>IX2738DD</h1>
                            </div>	

                        </div>

                        <div class="row">
                            <div class="col-lg-12"><p>&nbsp;</p></div>
                        </div>	

                        <div class="row">

                        

                            <div class="col-lg-12">

                                <div class="row">

                                    <div class="col-sm-6"><h3>Daftar Penumpang</h3></div>

                                    <div class="col-sm-6 text-right">

                                    <a href="<?php echo site_url("jamaah/booking/jamaah/new/"); ?>" class="btn btn-sm btn-primary"> Tambah Penumpang </a>

                                    </div>

                                </div>

                                <div class="table-responsive">

                                    <table class="table table-striped">

                                        <thead>

                                        <tr>

                                            <th>No</th>

                                            <th>Nama </th>

                                            <th>No Telepon</th>

                                            <th>Email</th>

                                            <th>Jenis Kelamin</th>

                                            <th>Aksi</th>

                                        </tr>

                                        </thead>

                                        <tbody>

                                

                

                                <tr><td>1</td>

                                <td>Budi Nasrul</td>

                                <td>022743622</td>

                                <td>acep@ymail.com</td>

                                <td>Laki-laki</td>

                                <td>

                                    <div class="btn-group">

                                        <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>

                                        <ul class="dropdown-menu">

                                            <!-- <li><a href="#">Detail Penumpang</a></li> -->

                                            <li><a href="#">Ubah Penumpang</a></li>

                                            <li><a href="#">Hapus</a></li>

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

        <?php } if ($site_form=="form_hotel") { ?> 
        
            <?php
            $xaksi = "";
            if ($aksi=="new") { $xaksi = "Tambah Stock Room Hotel"; }
            if ($aksi=="edit") { $xaksi = "Ubah Stock Room Hotel"; }
            if ($aksi=="delete") { $xaksi = "Hapus Stock Room Hotel"; }

            $id = ""; $hotel_id = ""; $room_id = ""; $start_date = ""; $end_date = ""; $durasi = "";
            $stock = ""; $price = ""; $margin = "";

                
            if (!empty($data_hotelid)) {
                $id         = $data_hotelid[0]["id"];
                $hotel_id   = $data_hotelid[0]["hotel_id"];
                $room_id    = $data_hotelid[0]["room_id"];
                $start_date = $data_hotelid[0]["start_date"];
                $end_date   = $data_hotelid[0]["end_date"];
                $durasi     = $data_hotelid[0]["durasi"];
                $stock      = $data_hotelid[0]["stock"];
                $price      = $data_hotelid[0]["price"];
                $margin     = $data_hotelid[0]["margin"];
            }
            ?>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?php echo $xaksi; ?></h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Daftar</a></li>
                        <li class="active"><strong>Hotel</strong></li>

                    </ol>

                </div>

                <div class="col-lg-2">



                </div>

            </div>



            <div class="wrapper wrapper-content animated fadeInRight">

                <div class="row">

                <div class="col-lg-12">

                    <div class="ibox float-e-margins">

                        <div class="ibox-title">

                            <h5><?php echo $xaksi; ?></h5>

                        </div>

                        <div class="ibox-content">

						<form method="post" action="<?php echo site_url("produk/hotel/".$aksi."/".$idschedule); ?>" class="form-horizontal">

                        <div class="form-group">
							<label class="col-sm-2 control-label">Nama Hotel</label>
                            <div class="col-sm-4">
                                <select class="form-control m-b" name="hotelid" <?php if ($aksi == "delete") { echo "disabled"; } ?>>
                                    <option>Pilih Hotel</option>

                                    <?php
                                        if ($list_hotel > 0) {
                                        for ($i=0;$i<sizeof($list_hotel);$i++) {
                                            $id_hotel    = $list_hotel[$i]['id'];
                                            $nama_hotel  = $list_hotel[$i]['name'];
                                    ?>

                                    <option value="<?php echo $id_hotel; ?>" <?php if ($hotel_id == $id_hotel) { echo "selected"; } ?>><?php echo $nama_hotel; ?></option>

                                    <?php }} ?>
                                </select>

                            </div>

                            <label class="col-sm-2 control-label">Room Type</label>
                            <div class="col-sm-4">
                                <select class="form-control m-b" name="roomid" <?php if ($aksi == "delete") { echo "disabled"; } ?>>
                                    <option>Pilih Room Type</option>

                                    <?php
                                        if ($list_room > 0) {
                                        for ($i=0;$i<sizeof($list_room);$i++) {
                                            $id_room    = $list_room[$i]['id'];
                                            $room_type  = $list_room[$i]['room_type'];
                                    ?>

                                    <option value="<?php echo $id_room; ?>" <?php if ($room_id == $id_room) { echo "selected"; } ?>><?php echo $room_type; ?></option>

                                    <?php }} ?>
                                </select>

                            </div>

                        </div>

                        <div class="form-group">

							<label class="col-sm-2 control-label">Tanggal Check In</label>

                            <div class="col-sm-4">
                                <input type="date" name="checkin" class="form-control" value="<?php echo $start_date; ?>" <?php if ($aksi == "delete") { echo "disabled"; } ?>>
                            </div>

							<label class="col-sm-2 control-label">Tanggal Check Out</label>

                            <div class="col-sm-4">
                                <input type="date" name="checkout" class="form-control" value="<?php echo $end_date; ?>" <?php if ($aksi == "delete") { echo "disabled"; } ?>>
                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-2 control-label">Durasi</label>

                            <div class="col-sm-4">
                                <input type="number" name="durasi" class="form-control" placeholder="Durasi" value="<?php echo $durasi; ?>" <?php if ($aksi == "delete") { echo "disabled"; } ?>>
                            </div>

                            <label class="col-sm-2 control-label">Stock</label>

                            <div class="col-sm-4">
                                <input type="number" name="stock" class="form-control" placeholder="Stock" value="<?php echo $stock; ?>" <?php if ($aksi == "delete") { echo "disabled"; } ?>>
                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-2 control-label">Price</label>

                            <div class="col-sm-4">
                                <input type="text" name="price" class="form-control" placeholder="Price" value="<?php echo $price; ?>" <?php if ($aksi == "delete") { echo "disabled"; } ?>>
                            </div>

                            <label class="col-sm-2 control-label">Margin</label>

                            <div class="col-sm-4">
                                <input type="text" name="margin" class="form-control" placeholder="Margin" value="<?php echo $margin; ?>" <?php if ($aksi == "delete") { echo "disabled"; } ?>>
                            </div>

                        </div>

                        <div class="form-group">

                            <div class="col-sm-4 col-sm-offset-2">

                                <a href="<?php echo site_url("produk/hotel"); ?>" class="btn btn-white">Cancel</a>

                                <button name="tombol" class="btn btn-primary" value="simpan" type="submit"><?php if ($aksi == "delete") { echo "Delete"; } else { echo "Save"; }?></button> 

                            </div>

                        </div>					

						</form>

						</div>

					</div>

				</div>

            </div>

        <?php } if ($site_form=="detail_hotel") { ?> 

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title"><h5>Detail Hotel</h5></div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-5">
                                <h3>Nama Hotel</h3>
                                <p>Makarem Ajyad Makkah Hotel</p>
                            </div>	
                            <div class="col-lg-5">
                                <h3>Kota</h3>
                                <p>Mekah</p>
                            </div>	
                            <div class="col-lg-2">
                                <h3>Rate</h3>
                                <h1>4</h1>
                            </div>	
                        </div>

                        <div class="row">
                            <div class="col-lg-12"><p>&nbsp;</p></div>
                        </div>	

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-sm-6"><h3>Daftar Room</h3></div>
                                    <div class="col-sm-6 text-right">
                                    <a href="<?php echo site_url("produk/hotel/room/"); ?>" class="btn btn-sm btn-primary"> Tambah Room </a>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Room Type </th>
                                            <th>Quota</th>
                                            <th>Deskripsi</th>
                                            <th>Jenis Kasur</th>
                                            <th>Harga per Malam</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                <tr><td>1</td>
                                <td>Kamar Standard Twin</td>
                                <td>2 Orang</td>
                                <td>Dewasa maks: 2, Anak-anak maks: 2 orang (sampai dengan usia 0 tahun)</td>
                                <td>2 single</td>
                                <td>Rp. 400.000,-</td>
                                <td>
                                    <div class="btn-group">
                                        <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Ubah Room</a></li>
                                            <li><a href="#">Hapus</a></li>
                                        </ul>
                                    </div>
                                </td>

                                </tr>
                                <tr><td>2</td>
                                <td>Superior King Suite</td>
                                <td>2 Orang</td>
                                <td>Dewasa maks: 2, Anak-anak maks: 2 orang (sampai dengan usia 0 tahun)</td>
                                <td>2 single</td>
                                <td>Rp. 400.000,-</td>

                                <td>

                                    <div class="btn-group">

                                        <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>

                                        <ul class="dropdown-menu">

                                            <!-- <li><a href="#">Detail Penumpang</a></li> -->

                                            <li><a href="#">Ubah Room</a></li>

                                            <li><a href="#">Hapus</a></li>

                                        </ul>

                                    </div>

                                </td>

                                </tr>

                                <tr><td>3</td>

                                <td>Royal Suite</td>

                                <td>2 Orang</td>

                                <td>Dewasa maks: 2, Anak-anak maks: 2 orang (sampai dengan usia 0 tahun)</td>

                                <td>2 single</td>

                                <td>Rp. 400.000,-</td>

                                <td>

                                    <div class="btn-group">

                                        <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>

                                        <ul class="dropdown-menu">

                                            <!-- <li><a href="#">Detail Penumpang</a></li> -->

                                            <li><a href="#">Ubah Room</a></li>

                                            <li><a href="#">Hapus</a></li>

                                        </ul>

                                    </div>

                                </td>

                                </tr>

                                <tr><td>4</td>

                                <td>Kamar Superior Double</td>

                                <td>2 Orang</td>

                                <td>Dewasa maks: 2, Anak-anak maks: 2 orang (sampai dengan usia 0 tahun)</td>

                                <td>2 single</td>

                                <td>Rp. 400.000,-</td>

                                <td>

                                    <div class="btn-group">

                                        <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>

                                        <ul class="dropdown-menu">

                                            <!-- <li><a href="#">Detail Penumpang</a></li> -->

                                            <li><a href="#">Ubah Room</a></li>

                                            <li><a href="#">Hapus</a></li>

                                        </ul>

                                    </div>

                                </td>

                                </tr>

                                <tr><td>5</td>

                                <td>Kamar Standard Double</td>

                                <td>2 Orang</td>

                                <td>Dewasa maks: 2, Anak-anak maks: 2 orang (sampai dengan usia 0 tahun)</td>

                                <td>1 double besar</td>

                                <td>Rp. 400.000,-</td>

                                <td>

                                    <div class="btn-group">

                                        <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>

                                        <ul class="dropdown-menu">

                                            <!-- <li><a href="#">Detail Penumpang</a></li> -->

                                            <li><a href="#">Ubah Room</a></li>

                                            <li><a href="#">Hapus</a></li>

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

        <?php } if ($site_form=="form_room") { ?> 

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Tambah Room Hotel</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Tambah</a></li>
                        <li class="active"><strong>Room</strong></li>
                    </ol>
                </div>
                <div class="col-lg-2">
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Tambah Room</h5>
                        </div>
                        <div class="ibox-content">
						<form method="post" action="#" class="form-horizontal">
                        <div class="form-group">
							<label class="col-sm-2 control-label">Room Type</label>
                            <div class="col-sm-10"><input type="text" name="nama" class="form-control" placeholder="Room Type"></div>
                        </div>

                        <div class="form-group">
							<label class="col-sm-2 control-label">Quota</label>
                            <div class="col-sm-4"><input type="text" name="telepon" class="form-control" placeholder="Quota"></div>
                        </div>

                        <div class="form-group">
							<label class="col-sm-2 control-label">Deskripsi</label>
                            <div class="col-sm-10"><input type="text" name="duration" class="form-control" placeholder="Deskripsi"></div>
                        </div>

                        <div class="form-group">
							<label class="col-sm-2 control-label">Jenis Kasur</label>
                            <div class="col-sm-4"><input type="text" name="duration" class="form-control" placeholder="Jenis Kasur"></div>

                        </div>

                        <div class="form-group">
							<label class="col-sm-2 control-label">Harga</label>
                            <div class="col-sm-4"><input type="text" name="duration" class="form-control" placeholder="Harga"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a href="http://erp.umrohnesia.id/produk/hotel/" class="btn btn-white">Cancel</a>
                                <button name="tombol" class="btn btn-primary" value="simpan" type="submit">Save</button> 
                            </div>
                        </div>					

						</form>

						</div>

					</div>

				</div>

            </div>

        <?php } if ($site_form=="form_visa") {?>
            
            <?php
            $xaksi = "";
            if ($aksi=="new") { $xaksi = "Tambah Provider Visa"; }
            if ($aksi=="edit") { $xaksi = "Ubah Provider Visa"; }
            if ($aksi=="delete") { $xaksi = "Hapus Provider Visa"; }

            $id = ""; $nama_provider = ""; $no_telp = ""; $alamat = ""; $price = "";

            if (!empty($data_providerid)) {
                $id                 = $data_providerid[0]["id"];
                $nama_provider      = $data_providerid[0]["nama_provider"];
                $no_telp            = $data_providerid[0]["no_telp"];
                $alamat             = $data_providerid[0]["alamat"];
                $price              = $data_providerid[0]["price"];
            }
            ?>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?php echo $xaksi; ?></h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Tambah</a></li>
                        <li class="active"><strong>Provider Visa</strong></li>
                    </ol>
                </div>
                <div class="col-lg-2">
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Tambah Provider Visa</h5>
                        </div>

                        <div class="ibox-content">
						<form method="post" action="<?php echo site_url("produk/visa/".$aksi."/".$id); ?>" class="form-horizontal">
                        <div class="form-group">
							<label class="col-sm-2 control-label">Nama Provider</label>
                            <div class="col-sm-10"><input type="text" name="nama_provider" class="form-control" placeholder="Nama Provider" value="<?php echo $nama_provider; ?>" <?php if ($aksi == "delete") { echo "disabled"; } ?>></div>
                        </div>

                        <div class="form-group">
							<label class="col-sm-2 control-label">No Telepon</label>
                            <div class="col-sm-4"><input type="text" name="telepon" class="form-control" placeholder="No Telepon" value="<?php echo $no_telp; ?>" <?php if ($aksi == "delete") { echo "disabled"; } ?>></div>
                        </div>

                        <div class="form-group">
							<label class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-10"><input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $alamat; ?>" <?php if ($aksi == "delete") { echo "disabled"; } ?>></div>
                        </div>

                        <div class="form-group">
							<label class="col-sm-2 control-label">Harga</label>
                            <div class="col-sm-4"><input type="text" name="harga" class="form-control" placeholder="Harga" value="<?php echo $price; ?>" <?php if ($aksi == "delete") { echo "disabled"; } ?>></div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a href="<?php echo site_url("produk/visa"); ?>" class="btn btn-white">Cancel</a>
                                <button name="tombol" class="btn btn-primary" value="simpan" type="submit"><?php if ($aksi == "delete") { echo "Delete"; } else { echo "Save"; } ?></button>
                            </div>
                        </div>

						</form>

						</div>

					</div>

				</div>

            </div>

        <?php } if ($site_form == "paket_perjalanan") {?>

            <div class="row wrapper border-bottom white-bg page-heading">

                <div class="col-lg-10">

                    <h2>Paket Perjalanan</h2>

                    <ol class="breadcrumb">

                        <li><a href="index.html">Produk</a></li>

                        <li class="active"><strong>Visa</strong></li>

                    </ol>

                </div>

                <div class="col-lg-2">



                </div>

            </div>



            <div class="wrapper wrapper-content animated fadeInRight">

                <div class="row">

                    <div class="col-lg-12">

                        <div class="ibox float-e-margins">

                            <div class="ibox-title"><h5>Pengurusan dan Status Visa</h5></div>

                            <div class="ibox-content">

                                <div class="row">

                                    <!-- <div class="col-sm-3 m-b-xs">

                                    <a href="<?php echo site_url("produk/visa/new/"); ?>" class="btn btn-sm btn-primary"> Tambah Provider Visa</a> 

                                    </div> -->

                                    <div class="col-sm-9"></div>

                                    <div class="col-sm-3">

                                        <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">

                                            <button type="button" class="btn btn-sm btn-primary"> Cari</button> </span></div>

                                    </div>

                                </div>

                                <div class="table-responsive">

                                    <table class="table table-striped">

                                        <thead>

                                        <tr>

                                            <th>No</th>

                                            <th>Nama Paket</th>

                                            <th>Departure</th>

                                            <th>Arrival </th>

                                            <th>Total Seat </th>

                                            <th>Booked </th>

                                            <th>Adult Twin </th>

                                            <th>Child Twin </th>

                                            <th>Child Extra Bed </th>

                                            <th>Child No Bed </th>

                                            <th></th>

                                        </tr>

                                        </thead>

                                        <tbody>

                                        <tr>

                                            <td>1</td>

                                            <td>Umroh Premium - 9 Hari</td>

                                            <td>17-May-2018	</td>

                                            <td>25-May-2018</td>

                                            <td>100</td>

                                            <td>17</td>

                                            <td>USD 1800</td>

                                            <td>USD 1700</td>

                                            <td>USD 1600</td>

                                            <td>USD 500</td>

                                            <td></td>

                                            <td>

                                                <div class="btn-group">

                                                    <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>

                                                    <ul class="dropdown-menu">

                                                        <li><a href="<?php echo site_url("produk/visa/paket/entryvisa"); ?>">Entry Visa</a></li>

                                                    </ul>

                                                </div>    

                                            </td>

                                        </tr>

                                        <tr>

                                            <td>2</td>

                                            <td>Umroh Akhir Ramadhan - 9 Hari</td>

                                            <td>17-May-2018	</td>

                                            <td>25-May-2018</td>

                                            <td>100</td>

                                            <td>17</td>

                                            <td>USD 1800</td>

                                            <td>USD 1700</td>

                                            <td>USD 1600</td>

                                            <td>USD 500</td>

                                            <td></td>

                                            <td>

                                                <div class="btn-group">

                                                    <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>

                                                    <ul class="dropdown-menu">

                                                        <li><a href="<?php echo site_url("produk/visa/paket/entryvisa"); ?>">Entry Visa</a></li>

                                                    </ul>

                                                </div>    

                                            </td>

                                        </tr>

                                        <tr>

                                            <td>3</td>

                                            <td>Umroh Adinda Yes - 12 Hari</td>

                                            <td>17-May-2018	</td>

                                            <td>25-May-2018</td>

                                            <td>100</td>

                                            <td>17</td>

                                            <td>USD 1800</td>

                                            <td>USD 1700</td>

                                            <td>USD 1600</td>

                                            <td>USD 500</td>

                                            <td></td>

                                            <td>

                                                <div class="btn-group">

                                                    <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>

                                                    <ul class="dropdown-menu">

                                                        <li><a href="<?php echo site_url("produk/visa/paket/entryvisa"); ?>">Entry Visa</a></li>

                                                    </ul>

                                                </div>    

                                            </td>

                                        </tr>

                                        <tr>

                                            <td>4</td>

                                            <td>Umroh Awal Ramadhan - 9 Hari</td>

                                            <td>17-May-2018	</td>

                                            <td>25-May-2018</td>

                                            <td>100</td>

                                            <td>17</td>

                                            <td>USD 1800</td>

                                            <td>USD 1700</td>

                                            <td>USD 1600</td>

                                            <td>USD 500</td>

                                            <td></td>

                                            <td>

                                                <div class="btn-group">

                                                    <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>

                                                    <ul class="dropdown-menu">

                                                        <li><a href="<?php echo site_url("produk/visa/paket/entryvisa"); ?>">Entry Visa</a></li>

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

        <?php } if ($site_form == "entry_visa") {?>

            <div class="row wrapper border-bottom white-bg page-heading">

                <div class="col-lg-10">

                    <h2>Entry Visa</h2>

                    <ol class="breadcrumb">

                        <li><a href="index.html">Produk</a></li>

                        <li class="active"><strong>Visa</strong></li>

                    </ol>

                </div>

                <div class="col-lg-2">



                </div>

            </div>



            <div class="wrapper wrapper-content animated fadeInRight">

                <div class="row">

                <div class="col-lg-12">

                    <div class="ibox float-e-margins">

                        <div class="ibox-title">

                            <h5>Entry Visa per Jamaah</h5>

                        </div>

                        <div class="ibox-content">

                            <div class="row">

                                <div class="col-lg-5">

                                    <h3>Nama Paket</h3>

                                    <p>Marhaban Ramadhan 2018 - Ni'mah - 09 Hari (Jakarta)</p>

                                </div>	

                                <div class="col-lg-3">

                                    <h3>Jadwal</h3>

                                    <p>Tanggal Berangkat : 21-06-2018</p>

                                    <p>Tanggal Pulang : 21-06-2018</p>

                                </div>		

                                <div class="col-lg-4">

                                    <h3>Hotel</h3>

                                    <p>Makkah : Hotel Makkah Milenium</p>

                                    <p>Madinah : Red Sea Palace</p>

                                    <p>Jeddah : Pulman Jamzam</p>

                                </div>	

                            </div>

                        <div class="row">

                            <div class="col-lg-12"><p>&nbsp;</p></div>

                        </div>	

                        <div class="row">

            				<div class="col-lg-12">

                            <div class="row">

								<div class="col-sm-6"><h3>Daftar Jamaah</h3></div>

                                <div class="col-sm-6 text-right">

            

                                </div>

                            </div>

                            <div class="table-responsive">

                                <table class="table table-striped">

                                    <thead>

                                    <tr>

                                        <th>No</th>

                                        <th>Nama </th>

                                        <th>NIK</th>

                                        <th>Pasport</th>

                                        <th>Jenis Kelamin</th>

                                        <th>Status Dokumen</th>

                                        <th>Biaya Pasport</th>

                                    </tr>

                                    </thead>

                                    <tbody>

			 

							<tr><td>1</td>

							<td>Gian Gianna</td>

							<td>13726523998161</td>

							<td><a href="<?php echo site_url("produk/visa/paket/entryvisa/idjammah") ?>">Belum di Entry</a></td>

							<td>Laki-Laki</td>

							<td></td>

							<td>Rp. 400.000,-</td>

							</tr>

                            <tr><td>2</td>

							<td>Nanas S</td>

							<td>13786532555181</td>

							<td><a href="<?php echo site_url("produk/visa/paket/entryvisa/idjammah") ?>">Belum di Entry</a></td>

							<td>Laki-Laki</td>

							<td></td>

							<td>Rp. 400.000,-</td>

                            <tr><td colspan=6>&nbsp;</td><td>Rp. 800.000,-</td><td>&nbsp;</td></tr>

							</tr>

						</div>

					</div>

				</div>

            </div>

        <?php } if ($site_form == "form_entryvisa") {?>

            <div class="row wrapper border-bottom white-bg page-heading">

                <div class="col-lg-10">

                    <h2>Tambah Visa per Jamaah</h2>

                    <ol class="breadcrumb">

                        <li><a href="index.html">Produk</a></li>

                        <li class="active"><strong>Visa</strong></li>

                    </ol>

                </div>

                <div class="col-lg-2">



                </div>

            </div>



            <div class="wrapper wrapper-content animated fadeInRight">

                <div class="row">

                <div class="col-lg-12">

                    <div class="ibox float-e-margins">

                        <div class="ibox-title">

                            <h5>Entry Visa - Nama Jamaah: Gian Gianna P P</h5>

                        </div>

                        <div class="ibox-content">

						<form method="post" action="#" class="form-horizontal">

                        <div class="form-group">

							<label class="col-sm-2 control-label">No Visa</label>

                            <div class="col-sm-10"><input type="text" name="nama" class="form-control" placeholder="No Visa"></div>

                        </div>

                        <div class="form-group">

							<label class="col-sm-2 control-label">Tanggal Visa</label>

                            <div class="col-sm-4"><input type="text" name="telepon" class="form-control" placeholder="Tanggal Visa"></div>

                        </div>

                        <div class="form-group">

							<label class="col-sm-2 control-label">No Mofa</label>

                            <div class="col-sm-10"><input type="text" name="duration" class="form-control" placeholder="No Mofa"></div>

                        </div>

                        <div class="form-group">

							<label class="col-sm-2 control-label">Tanggal Mofa</label>

                            <div class="col-sm-4"><input type="text" name="duration" class="form-control" placeholder="Tanggal Mofa"></div>

                        </div>

                        <div class="form-group">

							<label class="col-sm-2 control-label">Masa Berlaku</label>

                            <div class="col-sm-4"><input type="text" name="duration" class="form-control" placeholder="Masa Berlaku"></div>

                        </div>

                        <div class="form-group">

                            <div class="col-sm-4 col-sm-offset-2">

                                <a href="http://erp.umrohnesia.id/produk/visa/" class="btn btn-white">Cancel</a>

                                <button name="tombol" class="btn btn-primary" value="simpan" type="submit">Save</button> 

                            </div>

                        </div>					

						</form>

						</div>

					</div>

				</div>

            </div>



        <?php } ?>