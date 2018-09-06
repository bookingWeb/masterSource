<?php if ($site_form=="list_teamuser") { ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Data Team User</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Setting</a></li>
                        <li class="active"><strong>Team User</strong></li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
			
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title"><h5>Data Team User</h5></div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-sm-2 m-b-xs">
                                        <a href="<?php echo site_url("setting/userteam/tambah"); ?>" class="btn btn-sm btn-primary"> Tambah Team User</a> 
                                    </div>
                                    <div class="col-sm-7"></div>
                                    <div class="col-sm-3">
                                            <form method="post" action="<?php echo site_url("setting/userteam/filter"); ?>">
                                            <div class="input-group"><input type="text" name="search" placeholder="Kode/Nama/Keterangan" class="input-sm form-control"> <span class="input-group-btn">
                                                <button type="submit" class="btn btn-sm btn-primary"> Cari</button> </span></div>
                                            </form>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Chanel Type </th>
                                            <th>Keterangan </th>
                                            <th>Aksi </th>
                                        </tr>
                                        </thead>
                                        <tbody>
<?php
	if (sizeof($data_userteam)>0) {
		for ($i=0;$i<sizeof($data_userteam);$i++) {
			$id                 = $data_userteam[$i]["id_userteam"];
			$agent_id           = $data_userteam[$i]["agent_id"];
			$kode               = $data_userteam[$i]["kode"];
            $nama_userteam      = $data_userteam[$i]["nama_userteam"];
            $channel_type       = $data_userteam[$i]["channel_type"];
            $nama_channel       = $data_userteam[$i]["nama_channel"];
            $keterangan         = $data_userteam[$i]["keterangan"];
			
			echo "<tr><td>".($i+1)."</td><td>".$kode."</td><td>".$nama_userteam."</td><td>".$nama_channel."</td><td>".$keterangan."</td><td>";
			echo "<div class=\"btn-group\"><button data-toggle=\"dropdown\" class=\"btn btn-primary btn-xs dropdown-toggle\">Action <span class=\"caret\"></span></button><ul class=\"dropdown-menu\"><li><a href=\"".site_url("setting/userteam/ubah/".$id)."\">Ubah</a></li><li><a href=\"".site_url("setting/userteam/hapus/".$id)."\">Hapus</a></li></ul></div>";
			echo "</td></tr>";			
		}
	} else {
		echo "<tr><td colspan=6>Belum ada data user team</td></tr>";
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
			
<?php } else { 

$xaksi = "";
if ($aksi=="tambah") { $xaksi = "Tambah User Team"; }
if ($aksi=="ubah") { $xaksi = "Ubah User Team"; }
if ($aksi=="hapus") { $xaksi = "Hapus User Team"; }

$kode = ""; $nama_userteam = ""; $keterangan = ""; $nama_channel = ""; $channel_type = "";
if (sizeof($data_teamuser)>0) {
	$id_userteam            = $data_teamuser[0]["id_userteam"];
	$agent_id               = $data_teamuser[0]["agent_id"];
    $kode                   = $data_teamuser[0]["kode"];
    $nama_userteam          = $data_teamuser[0]["nama_userteam"];
    $channel_type           = $data_teamuser[0]["channel_type"];
    $keterangan             = $data_teamuser[0]["keterangan"];
    $nama_channel           = $data_teamuser[0]["nama_channel"];
}
?>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?php echo $xaksi; ?></h2>
                    <ol class="breadcrumb">
                        <li><a href="#">Setting</a></li>
                        <li><a href="#">Rekening Bank</a></li>
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
						<form method="post" action="<?php echo site_url("setting/userteam/".$aksi."/".$userid); ?>" class="form-horizontal">
                        <div class="form-group"> 
							<label class="col-sm-2 control-label">Kode</label>
                            <div class="col-sm-10"><input type="text" <?php if ($aksi == "hapus") { echo "disabled"; } ?> name="kode" class="form-control" placeholder="Kode" value="<?php echo $kode; ?>"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-10"><input type="text" <?php if ($aksi == "hapus") { echo "disabled"; } ?> name="nama" class="form-control" placeholder="Nama" value="<?php echo $nama_userteam; ?>"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Channel Type</label>
                            <div class="col-sm-10">
								<select name="channelid" <?php if ($aksi == "hapus") { echo "disabled"; } ?> class="form-control">
                                <?php 

                                    if (sizeof($data_channel_type)>0) {
                                        for ($i=0;$i<sizeof($data_channel_type);$i++) {
                                            $id         = $data_channel_type[$i]["id"];
                                            $kode       = $data_channel_type[$i]["kode"];
                                            $nama       = $data_channel_type[$i]["nama"];

                                            echo "<option value=\"".$id."\"";
                                            if ($id==$channel_type) { echo " selected"; }
                                            echo ">".$kode." - ".$nama."</option>";
                                        }
                                    }

                                ?>								
								</select>	
							</div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Keterangan</label>
                            <div class="col-sm-10"><input type="text" <?php if ($aksi == "hapus") { echo "disabled"; } ?> name="keterangan" class="form-control" placeholder="Keterangan" value="<?php echo $keterangan; ?>"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a href="<?php echo site_url("setting/userteam/") ?>" class="btn btn-white">Cancel</a>
                                <button name="tombol" class="btn btn-primary" value="simpan" type="submit"><?php if ($aksi == "hapus") { echo "Delete"; } else { echo "Save"; } ?></button> 
                            </div>
                        </div>						
						</form>
						</div>
					</div>
				</div>
            </div>        			
<?php } ?>			