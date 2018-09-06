<?php if ($site_form=="list") { ?>
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
                        <div class="ibox-title"><h5>Daftar Paket <?php echo $tipe_paket; ?></h5></div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-2 m-b-xs">
								<a href="<?php echo site_url("paket/".$slug_paket."/tambah"); ?>" class="btn btn-sm btn-primary"> Tambah Paket</a> 
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
                                        <th>Nama</th>
                                        <th>Durasi</th>
                                        <th>Pembimbing</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
<?php 
	if (sizeof($data_paket)>0) {
		for ($i=0;$i<sizeof($data_paket);$i++) {
			$id = $data_paket[$i]["id"];
			$nama_paket = $data_paket[$i]["name_product"];
			$durasi = $data_paket[$i]["durasi"];
			$pembimbing = $data_paket[$i]["nama"];
			
			echo "<tr><td>".($i+1)."</td><td>".$nama_paket."</td><td>".$durasi." hari</td><td>".$pembimbing."</td><td>";
			echo "<div class=\"btn-group\"><button data-toggle=\"dropdown\" class=\"btn btn-primary btn-xs dropdown-toggle\">Action <span class=\"caret\"></span></button><ul class=\"dropdown-menu\"><li><a href=\"".site_url("paket/".$slug_paket."/".$id)."\">Jadwal Perjalanan</a></li><li><a href=\"".site_url("paket/".$slug_paket."/ubah/".$id)."\">Ubah</a></li><li><a href=\"".site_url("paket/".$slug_paket."/hapus/".$id)."\">Hapus</a></li></ul></div>";
			echo "</td></tr>";
		}
	} else {
		echo "<tr><td colspan=5>Belum ada data paket</td></tr>";
	}
?>									
								
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
				
<?php } else if ($site_form=="form_paket") {

$xaksi = "";
if ($page=="tambah") { $xaksi = "Tambah Paket"; }
if ($page=="ubah") { $xaksi = "Ubah Paket"; }
if ($page=="hapus") { $xaksi = "Hapus Paket"; }

$nama = ""; $deskripsi = ""; $durasi = ""; $pembimbing = "";
if (sizeof($data_paket)>0) {
	$nama = $data_paket[0]["name_product"];	
	$deskripsi = $data_paket[0]["deskripsi"];	
	$durasi = $data_paket[0]["durasi"];	
	$pembimbing = $data_paket[0]["pembimbing_id"];	
}
?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Paket Perjalanan <?php echo $tipe_paket; ?></h2>
                    <ol class="breadcrumb">
                        <li><a href="#">Paket</a></li>
                        <li><?php echo $tipe_paket; ?></li>
                        <li class="active"><strong><?php echo $xaksi; ?></strong></li>
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
                            <h5><?php echo $xaksi . " " . $tipe_paket; ?></h5>
                        </div>
                        <div class="ibox-content">
						<form method="post" action="<?php echo site_url("paket/".$slug_paket."/".$page."/".$aksi); ?>" class="form-horizontal"> 
                        <div class="form-group">
							<label class="col-sm-2 control-label">Nama Paket</label>
                            <div class="col-sm-10"><input type="text" name="nama" class="form-control" placeholder="Nama Paket" value="<?php echo $nama; ?>"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Deskripsi</label>
                            <div class="col-sm-10"><input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" value="<?php echo $deskripsi; ?>"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Durasi</label>
                            <div class="col-sm-4"><input type="text" name="durasi" class="form-control" placeholder="Durasi" value="<?php echo $durasi; ?>"></div>
                            <div class="col-sm-6">Hari</div>
                        </div> 
                        <div class="form-group">
							<label class="col-sm-2 control-label">Pembimbing</label>
                            <div class="col-sm-10">
								<select name="pembimbing" class="form-control">
									<option value="0">Tanpa Pembimbing</option>
<?php 
	if (sizeof($data_pembimbing)>0) {
		for ($i=0;$i<sizeof($data_pembimbing);$i++) {
			$p_id = $data_pembimbing[$i]["id"];
			$p_nama = $data_pembimbing[$i]["nama"];
			
			echo "<option value=\"".$p_id."\"";
			if ($p_id==$pembimbing) { echo " selected"; }
			echo ">".$p_nama."</option>";
		}
	}
?>								
								</select>	
							</div>
                        </div>						
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a href="<?php echo site_url("paket/".$slug_paket."/"); ?>" class="btn btn-white">Cancel</a>
                                <button name="tombol" class="btn btn-primary" value="simpan" type="submit">Save</button> 
                            </div>
                        </div>						
						</form>
						</div>
					</div>
				</div>
            </div>
        </div>	
<?php } else if ($site_form=="detail_paket") { 

$nama = ""; $deskripsi = ""; $durasi = ""; $pembimbing = "";
if (sizeof($data_paket)>0) {
	$nama = $data_paket[0]["name_product"];	
	$deskripsi = $data_paket[0]["deskripsi"];	
	$durasi = $data_paket[0]["durasi"];	
	$pembimbing = $data_paket[0]["nama"];	
}

?>
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
                        <div class="ibox-title"><h5>Daftar Jadwal Perjalanan </h5></div>
                        <div class="ibox-content">
					<div class="row">
						<div class="col-lg-4">
							<h3>Nama Paket</h3>
							<p><?php echo $nama; ?></p>
						</div>	
						<div class="col-lg-4">
							<h3>Durasi</h3>
							<p><?php echo $durasi . " hari"; ?></p>
						</div>	
						<div class="col-lg-4">
							<h3>Pembimbing</h3>
							<p><?php echo $pembimbing; ?></p>
						</div>	
					</div>
					<div class="row">
						<div class="col-lg-12"><p>&nbsp;</p></div>
					</div>							
                            <div class="row">
                                <div class="col-sm-2 m-b-xs">
								<a href="<?php echo site_url("paket/".$slug_paket."/jtambah/".$page); ?>" class="btn btn-sm btn-primary"> Tambah Jadwal</a> 
                                </div>
								<div class="col-sm-10"></div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jadwal</th>
                                        <th>No Flight</th>
                                        <th>Quota</th>
                                        <th>Harga Double</th>
                                        <th>Harga Triple</th>
                                        <th>Harga Quad</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
<?php 
	if (sizeof($data_jadwal)>0) {
		for ($i=0;$i<sizeof($data_jadwal);$i++) {
			$id = $data_jadwal[$i]["id"];
			$status = $data_jadwal[$i]["productschedule_status"];
			$no_flight = $data_jadwal[$i]["no_flight"];
			$quota = $data_jadwal[$i]["quota"];
			$mata_uang = $data_jadwal[$i]["mata_uang"];
			$price2 = $data_jadwal[$i]["price2"];
			$price3 = $data_jadwal[$i]["price3"];
			$price4 = $data_jadwal[$i]["price4"];
			$start_date = $data_jadwal[$i]["start_date"];
			$end_date = $data_jadwal[$i]["end_date"];
			
			$xstatus = "";
			if ($status=="0") { $xstatus = "Draft"; }
			if ($status=="1") { $xstatus = "Publish"; }
			if ($status=="2") { $xstatus = "Unpublish"; }
			if ($status=="3") { $xstatus = "Archived"; }
			
			echo "<tr><td>".($i+1)."</td><td>".$start_date." - ".$end_date."</td><td>".$no_flight."</td><td>".$quota."</td><td>".$mata_uang . " " . number_format($price2)."</td><td>".$mata_uang . " " . number_format($price3)."</td><td>".$mata_uang . " " . number_format($price4)."</td><td>".$xstatus."</td><td>";
			echo "<div class=\"btn-group\"><button data-toggle=\"dropdown\" class=\"btn btn-primary btn-xs dropdown-toggle\">Action <span class=\"caret\"></span></button><ul class=\"dropdown-menu\"><li><a href=\"".site_url("paket/".$slug_paket."/jubah/".$page."/".$id)."\">Ubah</a></li><li><a href=\"".site_url("paket/".$slug_paket."/jhapus/".$page."/".$id)."\">Hapus</a></li></ul></div>";
			echo "</td></tr>";
		}
	} else {
		echo "<tr><td colspan=9>Belum ada data jadwal perjalanan</td></tr>";
	}
?>									
								
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
<?php } else if ($site_form=="form_jadwal") {  

$nama = ""; $deskripsi = ""; $durasi = ""; $pembimbing = "";
if (sizeof($data_paket)>0) {
	$nama = $data_paket[0]["name_product"];	
	$deskripsi = $data_paket[0]["deskripsi"];	
	$durasi = $data_paket[0]["durasi"];	
	$pembimbing = $data_paket[0]["nama"];	
}

?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Jadwal Perjalanan <?php echo $tipe_paket; ?></h2>
                    <ol class="breadcrumb">
                        <li><a href="">Paket</a></li>
                        <li><?php echo $tipe_paket; ?></li>
                        <li class="active"><strong>Jadwal Perjalanan</strong></li>
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
                            <h5>Tambah Jadwal Perjalanan <?php echo $tipe_paket; ?></h5>
                        </div>
                        <div class="ibox-content">
						<form method="post" action="<?php echo site_url("paket/".$slug_paket."/".$page."/".$aksi."/".$itemid); ?>" class="form-horizontal"> 
                        <div class="form-group">
							<label class="col-sm-2 control-label">Nama Paket</label>
                            <div class="col-sm-10"><?php echo $nama; ?></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Deskripsi</label>
                            <div class="col-sm-10"><?php echo $deskripsi; ?></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Durasi Perjalanan</label>
                            <div class="col-sm-10"><?php echo $durasi; ?> hari</div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Pembimbing</label>
                            <div class="col-sm-10"><?php echo $pembimbing; ?> </div>
                        </div>
                        <div class="hr-line-dashed"></div>
						
                        <div class="form-group">
							<label class="col-sm-2 control-label">Tanggal Berangkat</label>
                            <div class="col-sm-4"><input type="text" name="start_date" class="form-control" placeholder="Tanggal Berangkat"></div>
                            <label class="col-sm-2 control-label">Tanggal Pulang</label>
                            <div class="col-sm-4"><input type="text" name="end_date" class="form-control" placeholder="Tanggal Pulang"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Maskapai Penerbangan</label>
                            <div class="col-sm-4">
                                <select class="form-control m-b" name="airlines">
                                    <option>Al Anwa Aviation</option>
                                    <option>ASACO</option>
                                    <option>Dallah Avco</option>
                                    <option>Mid East Jet</option>
                                    <option>Nas Air</option>
                                    <option>Saudi Arabian Airlines</option>
                                    <option>SNAS Aviation</option>
                                </select>
                            </div>
							<label class="col-sm-2 control-label">No Flight</label>
							<div class="col-sm-4"><input type="text" name="no_flight" class="form-control" placeholder="No Flight"></div>
                        </div>                        
                        <div class="form-group">
							<label class="col-sm-2 control-label">Hotel di Makkah</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="account">
                                    <option>Firdous Al Umrah Hotel</option>
                                    <option>Al Safwah Towers Hotel – Dar Al Ghufran</option>
                                    <option>Al Thuria Hotel</option>
                                    <option>Arak Ajyad Hotel</option>
                                    <option>Makkah Millennium Hotel</option>
                                    <option>Swissôtel Makkah</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Hotel di Madinah</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="account">
                                    <option>Anwar Al Madinah Mövenpick</option>
                                    <option>Pullman Zamzam Madina</option>
                                    <option>Province Al Sham Hotel</option>
                                    <option>Madinah Hilton Hotel</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Hotel di Jeddah</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="account">
                                    <option>Lafontaine Jeddah Hotel</option>
                                    <option>Jeddah Gulf</option>
                                    <option>Centro Shaheen Jeddah by Rotana</option>
                                    <option>Dyar Residence</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Mata Uang</label>
                            <div class="col-sm-4">
                                <select class="form-control m-b" name="account">
                                    <option>USD</option>
                                    <option>IDR</option>
                                </select>
                            </div>
                            <label class="col-sm-2 control-label">Booking Price</label>
                            <div class="col-sm-4"><input type="text" name="jumlah" class="form-control" placeholder="Booking Price"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Single</label>
                            <div class="col-sm-4"><input type="text" name="jumlah" class="form-control" placeholder="Single"></div>
                            <label class="col-sm-2 control-label">Margin Single</label>
                            <div class="col-sm-4"><input type="text" name="jumlah" class="form-control" placeholder="Margin Single"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Double</label>
                            <div class="col-sm-4"><input type="text" name="jumlah" class="form-control" placeholder="Double"></div>
                            <label class="col-sm-2 control-label">Margin Double</label>
                            <div class="col-sm-4"><input type="text" name="jumlah" class="form-control" placeholder="Margin Double"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Triple</label>
                            <div class="col-sm-4"><input type="text" name="jumlah" class="form-control" placeholder="Triple"></div>
                            <label class="col-sm-2 control-label">Margin Triple</label>
                            <div class="col-sm-4"><input type="text" name="jumlah" class="form-control" placeholder="Margin Triple"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Quad</label>
                            <div class="col-sm-4"><input type="text" name="jumlah" class="form-control" placeholder="Quad"></div>
                            <label class="col-sm-2 control-label">Margin Quad</label>
                            <div class="col-sm-4"><input type="text" name="jumlah" class="form-control" placeholder="Margin Quad"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Include Tax</label>
                            <div class="col-sm-10"><input type="text" name="jumlah" class="form-control" placeholder="Include Tax"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a href="<?php echo site_url("paket/".$slug_paket."/".$aksi); ?>" class="btn btn-white">Cancel</a>
                                <button name="jtombol" class="btn btn-primary" value="simpan" type="submit">Save</button> 
                            </div>
                        </div>						
						</form>
						</div>
					</div>
				</div>
            </div>
        </div>	
			
<?php } ?>