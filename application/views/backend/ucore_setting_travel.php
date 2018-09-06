<?php if ($site_form=="form_travel") { ?>
<?php 
	$nama_travel = ""; $nama_perusahaan = ""; $city = ""; $alamat = ""; $telepon = ""; $fax = ""; $callcenter = ""; $web = ""; $email = ""; $ijin_haji = ""; $ijin_umroh = "";
	if (sizeof($data_travel)>0) {
		$nama_travel = $data_travel[0]["nama_agent"];
		$nama_perusahaan = $data_travel[0]["nama_perusahaan"];
		$city = $data_travel[0]["city"];
		$alamat = $data_travel[0]["alamat"];
		$telepon = $data_travel[0]["phone"];
		$fax = $data_travel[0]["fax"];
		$callcenter = $data_travel[0]["callcenter"];
		$web = $data_travel[0]["web"];
		$email = $data_travel[0]["email"];
		$ijin_haji = $data_travel[0]["no_ijin_haji"];
		$ijin_umroh = $data_travel[0]["no_ijin_umroh"];
	}

?>
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Ubah Data Travel</h2>
		<ol class="breadcrumb">
			<li><a href="#">Setting</a></li>
			<li><a href="#">Travel</a></li>
			<li class="active"><strong>Update</strong></li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Ubah Data Travel</h5>
				</div>
				<div class="ibox-content">
				<form method="post" action="<?php echo site_url("setting/travel/update"); ?>" class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label">Nama Travel</label>
						<div class="col-sm-10"><input type="text" name="nama" class="form-control" placeholder="Nama Travel" value="<?php echo $nama_travel; ?>"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Nama Perusahaan</label>
						<div class="col-sm-10"><input type="text" name="perusahaan" class="form-control" placeholder="Nama Perusahaan" value="<?php echo $nama_perusahaan; ?>"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Alamat</label>
						<div class="col-sm-10"><input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $alamat; ?>"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Kota</label>
						<div class="col-sm-10"><input type="text" name="kota" class="form-control" placeholder="Kota" value="<?php echo $city; ?>"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Phone</label>
						<div class="col-sm-10"><input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $telepon; ?>"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Fax</label>
						<div class="col-sm-10"><input type="text" name="fax" class="form-control" placeholder="Fax" value="<?php echo $fax; ?>"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Call Center</label>
						<div class="col-sm-10"><input type="text" name="callcenter" class="form-control" placeholder="Call Center" value="<?php echo $callcenter; ?>"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10"><input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $email; ?>"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Web</label>
						<div class="col-sm-10"><input type="text" name="web" class="form-control" placeholder="Web" value="<?php echo $web; ?>"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">No Ijin Haji</label>
						<div class="col-sm-10"><input type="text" name="ijinhaji" class="form-control" placeholder="No Ijin Haji" value="<?php echo $ijin_haji; ?>"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">No Ijin Umroh</label>
						<div class="col-sm-10"><input type="text" name="ijinumroh" class="form-control" placeholder="No Ijin Umroh" value="<?php echo $ijin_umroh; ?>"></div>
					</div>
					<div class="form-group">
						<div class="col-sm-4 col-sm-offset-2">
							<a href="<?php echo site_url("setting/travel") ?>" class="btn btn-white">Batal</a>
							<button name="tombol" class="btn btn-primary" value="simpan" type="submit">Simpan</button> 
						</div>
					</div>						
				</form>
				</div>
			</div>
		</div>
	</div>	
</div>
<?php } else if ($site_form=="detail_travel") { ?> 
<?php 
	$nama_travel = ""; $nama_perusahaan = ""; $ijin_haji = ""; $ijin_umroh = "";
	if (sizeof($data_travel)>0) {
		$nama_travel = $data_travel[0]["nama_agent"];
		$nama_perusahaan = $data_travel[0]["nama_perusahaan"];
		$ijin_haji = $data_travel[0]["no_ijin_haji"];
		$ijin_umroh = $data_travel[0]["no_ijin_umroh"];
	}
?>
<div class="col-lg-12">
	<div class="ibox float-e-margins">
		<div class="ibox-title"><h5>Detail Travel</h5></div>
		<div class="ibox-content">
			<div class="row">
				<div class="col-lg-3">
					<h3>Nama Travel</h3>
					<p><?php echo $nama_travel; ?><br><a href="<?php echo site_url("setting/travel/update"); ?>">&gt; Ubah Data Travel</a></p>
				</div>	
				<div class="col-lg-3">
					<h3>Nama Perusahaan</h3>
					<p><?php echo $nama_perusahaan; ?></p>
				</div>
				<div class="col-lg-3">
					<h3>No Ijin Haji</h3>
					<p><?php echo $ijin_haji; ?></p>
				</div>
				<div class="col-lg-3">
					<h3>No Ijin Umroh</h3>
					<p><?php echo $ijin_umroh; ?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12"><p>&nbsp;</p></div>
			</div>	
			<div class="row">
                       
				<div class="col-lg-12">
					<div class="row">
						<div class="col-sm-6"><h3>Daftar Cabang</h3></div>
						<div class="col-sm-6 text-right">
							<a href="<?php echo site_url("setting/travel/cabang"); ?>" class="btn btn-sm btn-primary"> Tambah Cabang </a>
						</div>
					</div>
					<div class="table-responsive">
						<table class="table table-striped">
						<thead>
						<tr>
							<th>No</th>
							<th>Tipe Cabang</th>
							<th>Nama Cabang</th>
							<th>Alamat</th>
							<th>Kota</th>
							<th>Phone</th>
							<th>Fax</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>
<?php 
	if (sizeof($data_cabang)>0) {
		for ($i=0;$i<sizeof($data_cabang);$i++) {
			$id = $data_cabang[$i]["id"];
			$kode = $data_cabang[$i]["kode_cabang"];
			$nama = $data_cabang[$i]["nama_cabang"];
			$level = $data_cabang[$i]["cabang_level"];
			$alamat = $data_cabang[$i]["alamat"];
			$kota_id = $data_cabang[$i]["kota_id"];
			$kota = $data_cabang[$i]["nama_kota"];
			$propinsi = $data_cabang[$i]["propinsi"];
			$phone = $data_cabang[$i]["phone"];
			$fax = $data_cabang[$i]["fax"];
			
			$xlevel = "";
			if ($level=="1") { $xlevel = "Kantor Pusat"; }
			else if ($level=="2") { $xlevel = "Cabang"; }
			else if ($level=="3") { $xlevel = "Pusat Informasi"; }
			
			echo "<tr><td>".($i+1)."</td><td>".$xlevel."</td><td>".$nama."</td><td>".$alamat."</td><td>".$kota." ".$propinsi."</td><td>".$phone."</td><td>".$fax."</td><td>";
			echo "<div class=\"btn-group\"><button data-toggle=\"dropdown\" class=\"btn btn-primary btn-xs dropdown-toggle\">Action <span class=\"caret\"></span></button><ul class=\"dropdown-menu\"><li><a href=\"".site_url("setting/travel/cabang/ubah/".$id)."\">Ubah</a></li><li><a href=\"".site_url("setting/travel/cabang/hapus/".$id)."\">Hapus</a></li></ul></div>";
			echo "</td></tr>";
		}
	} else {
		echo "<tr><td colspan=\"8\">Belum ada data cabang</td></tr>";
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
<?php } else if ($site_form=="form_cabang") { ?> 
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Data Cabang</h2>
		<ol class="breadcrumb">
			<li><a href="#">Setting</a></li>
			<li><a href="#">Travel</a></li>
			<li class="active"><strong>Cabang</strong></li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>

<?php 

$xaksi = "";
if ($aksi=="tambah") { $xaksi = "Tambah Cabang"; }
if ($aksi=="ubah") { $xaksi = "Ubah Cabang"; }
if ($aksi=="hapus") { $xaksi = "Hapus Cabang"; }

$jenis = ""; $kode = ""; $nama = ""; $alamat = ""; $kota = ""; $phone = ""; $fax = "";
if (sizeof($data_cabang)>0) {
	$jenis = $data_cabang[0]["cabang_level"];
	$kode = $data_cabang[0]["kode_cabang"];
	$nama = $data_cabang[0]["nama_cabang"];
	$alamat = $data_cabang[0]["alamat"];
	$kota = $data_cabang[0]["kota_id"];
	$phone = $data_cabang[0]["phone"];
	$fax = $data_cabang[0]["fax"];
}

?>

<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5><?php echo $xaksi; ?></h5>
				</div>
				<div class="ibox-content">
				<form method="post" action="<?php echo site_url("setting/travel/cabang/".$aksi."/".$cabangid); ?>" class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label">Jenis Cabang</label>
						<div class="col-sm-10">
							<select name="jenis" class="form-control">
								<option value="1"<?php if ($jenis=="1") { echo " selected"; } ?>>Kantor Pusat</option>
								<option value="2"<?php if ($jenis=="2") { echo " selected"; } ?>>Cabang</option>
								<option value="3"<?php if ($jenis=="3") { echo " selected"; } ?>>Pusat Informasi</option>
							</select>
						</div>
					</div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Kode</label>
                            <div class="col-sm-10"><input type="text" name="kode" class="form-control" placeholder="Kode Cabang" value="<?php echo $kode; ?>"></div>
                        </div>						
                        <div class="form-group">
							<label class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-10"><input type="text" name="nama" class="form-control" placeholder="Nama Cabang" value="<?php echo $nama; ?>"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-10"><input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $alamat; ?>"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Kota</label>
                            <div class="col-sm-10">
								<select name="kota" class="form-control">
<?php 
	if (sizeof($data_kota)>0) {
		for ($i=0;$i<sizeof($data_kota);$i++) {
			$kota_id = $data_kota[$i]["id"];
			$kota_nama = $data_kota[$i]["nama_kota"];
			$kota_prop = $data_kota[$i]["propinsi"];
			
			echo "<option value=\"".$kota_id."\"";
			if ($kota_id==$kota) { echo " selected"; }
			echo ">".$kota_nama.", ".$kota_prop."</option>";
		}
	}
?>									
								</select>
							</div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-10"><input type="text" name="phone" class="form-control" placeholder="Phone" value="<?php echo $phone; ?>"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Fax</label>
                            <div class="col-sm-10"><input type="text" name="fax" class="form-control" placeholder="Fax" value="<?php echo $fax; ?>"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a href="<?php echo site_url("setting/travel/") ?>" class="btn btn-white">Batal</a>
                                <button name="ctombol" class="btn btn-primary" value="simpan" type="submit">Simpan</button> 
                            </div>
                        </div>					
						</form>
						</div>
					</div>
				</div>
            </div>
<?php } ?>