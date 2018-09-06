<?php if ($site_form=="list_agent") { ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Data Pengguna</h2>
                    <ol class="breadcrumb">
                        <li><a href="#">Setting</a></li>
                        <li class="active"><strong>Pengguna</strong></li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title"><h5>Data Pengguna</h5></div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-sm-2 m-b-xs">
                                        <a href="<?php echo site_url("setting/user/tambah"); ?>" class="btn btn-sm btn-primary"> Tambah Pengguna</a> 
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
                                            <th>Jenis</th>
                                            <th>Nama</th>
                                            <th>Cabang </th>
                                            <th>Alamat</th>
                                            <th>Kota</th>
                                            <th>Telp </th>
                                            <th>Email </th>
                                            <th>Aksi </th>
                                        </tr>
                                        </thead>
                                        <tbody>
<?php
	if (sizeof($data_user)>0) {
		for ($i=0;$i<sizeof($data_user);$i++) {
			$id = $data_user[$i]["id"];
			$nama_lengkap = $data_user[$i]["nama_lengkap"];
			$username = $data_user[$i]["username"];
			$email = $data_user[$i]["email"];
			$telepon = $data_user[$i]["telepon"];
			$alamat = $data_user[$i]["alamat"];
			$kota = $data_user[$i]["kota"];
			$agent_level = $data_user[$i]["agent_level"];
			$cabang_id = $data_user[$i]["cabang_id"];
			$nama_cabang = $data_user[$i]["nama_cabang"];
			
			$xagentlevel = "";
			if ($agent_level=="1") { $xagenlevel = "Admin Travel"; }
			if ($agent_level=="2") { $xagenlevel = "Manajemen"; }
			if ($agent_level=="3") { $xagenlevel = "Finance"; }
			if ($agent_level=="4") { $xagenlevel = "Customer Service"; }
			if ($agent_level=="5") { $xagenlevel = "Logistik"; }
			if ($agent_level=="6") { $xagenlevel = "Sales"; }
			if ($agent_level=="7") { $xagenlevel = "DSP : Marketing Mgr"; }
			if ($agent_level=="8") { $xagenlevel = "DSP : Presenter"; }
			if ($agent_level=="9") { $xagenlevel = "DSP : Introducer"; }
			
			echo "<tr><td>".($i+1)."</td><td>".$xagenlevel."</td><td>".$nama_lengkap."</td><td>".$nama_cabang."</td><td>".$alamat."</td><td>".$kota."</td><td>".$telepon."</td><td>".$email."</td><td>";
			echo "<div class=\"btn-group\"><button data-toggle=\"dropdown\" class=\"btn btn-primary btn-xs dropdown-toggle\">Action <span class=\"caret\"></span></button><ul class=\"dropdown-menu\"><li><a href=\"".site_url("setting/user/ubah/".$id)."\">Ubah</a></li><li><a href=\"".site_url("setting/user/hapus/".$id)."\">Hapus</a></li></ul></div>";
			echo "</td></tr>";
			
		}
	} else {
		echo "<tr><td colspan=\"9\">Belum ada data user</td></tr>";
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
			
<?php } else if ($site_form=="form_user") { 

$xaksi = "";
if ($aksi=="tambah") { $xaksi = "Tambah Pengguna"; }
if ($aksi=="ubah") { $xaksi = "Ubah Pengguna"; }
if ($aksi=="hapus") { $xaksi = "Hapus Pengguna"; }

$nama = ""; $username = ""; $email = ""; $telepon = ""; $alamat = ""; $kota = ""; $level = ""; $cabang = ""; 
if (sizeof($data_user)>0) {
	$nama = $data_user[0]["nama_lengkap"];
	$username = $data_user[0]["username"];
	$email = $data_user[0]["email"];
	$telepon = $data_user[0]["telepon"];
	$alamat = $data_user[0]["alamat"];
	$kota = $data_user[0]["kota"];
	$level = $data_user[0]["agent_level"];
	$cabang = $data_user[0]["cabang_id"];
}
?>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?php echo $xaksi; ?></h2>
                    <ol class="breadcrumb">
                        <li><a href="#">Setting</a></li>
                        <li><a href="#">User</a></li>
                        <li class="active"><strong><?php echo $xaksi; ?></strong></li>
                    </ol>
                </div>
                <div class="col-lg-2"></div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><?php echo $xaksi; ?></h5>
                        </div>
                        <div class="ibox-content">
						<form method="post" action="<?php echo site_url("setting/user/".$aksi."/".$userid); ?>" class="form-horizontal">
                        <div class="form-group">
							<label class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10"><input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $username; ?>"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Jenis Pengguna</label>
                            <div class="col-sm-10">
								<select name="jenis" class="form-control">
									<option value="1"<?php if ($level=="1") { echo " selected"; } ?>>Admin Travel</option>
									<option value="2"<?php if ($level=="2") { echo " selected"; } ?>>Manajemen</option>
									<option value="3"<?php if ($level=="3") { echo " selected"; } ?>>Finance</option>
									<option value="4"<?php if ($level=="4") { echo " selected"; } ?>>Customer Service</option>
									<option value="5"<?php if ($level=="5") { echo " selected"; } ?>>Logistik</option>
									<option value="6"<?php if ($level=="6") { echo " selected"; } ?>>Sales</option>
									<option value="7"<?php if ($level=="7") { echo " selected"; } ?>>DSP : Marketing Mgr</option>
									<option value="8"<?php if ($level=="8") { echo " selected"; } ?>>DSP : Presenter</option>
									<option value="9"<?php if ($level=="9") { echo " selected"; } ?>>DSP : Introducer</option>
								</select>	
							</div>
                        </div>						
                        <div class="form-group">
							<label class="col-sm-2 control-label">Nama Lengkap</label>
                            <div class="col-sm-10"><input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo $nama; ?>"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Cabang</label>
                            <div class="col-sm-10">
								<select name="cabang" class="form-control">
<?php 
	if (sizeof($data_cabang)>0) {
		for ($i=0;$i<sizeof($data_cabang);$i++) {
			$c_id = $data_cabang[$i]["id"];
			$c_nama = $data_cabang[$i]["nama_cabang"];
			
			echo "<option value=\"".$c_id."\"";
			if ($c_id==$cabang) { echo " selected"; }
			echo ">".$c_nama."</option>";
		}
	}
?>								
								</select>
							</div>
                        </div>
                         <div class="form-group">
							<label class="col-sm-2 control-label">Telepon</label>
                            <div class="col-sm-10"><input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $telepon; ?>"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10"><input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $email; ?>"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-10"><input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $alamat; ?>"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Kota</label>
                            <div class="col-sm-10"><input type="text" name="kota" class="form-control" placeholder="Kota" value="<?php echo $kota; ?>"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a href="<?php echo site_url("setting/travel") ?>" class="btn btn-white">Cancel</a>
                                <button name="tombol" class="btn btn-primary" value="simpan" type="submit">Save</button> 
                            </div>
                        </div>
						</form>
						</div>
					</div>
				</div>
            </div>
        			
<?php } ?>			