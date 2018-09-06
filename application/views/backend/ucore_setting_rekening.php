<?php if ($site_form=="list_rekening") { ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Data Rekening Bank</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Setting</a></li>
                        <li class="active"><strong>Rekening Bank</strong></li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
			
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title"><h5>Data Rekening Bank</h5></div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-sm-2 m-b-xs">
                                        <a href="<?php echo site_url("setting/rekening/tambah"); ?>" class="btn btn-sm btn-primary"> Tambah Rekening Bank</a> 
                                    </div>
                                    <div class="col-sm-7"></div>
                                    <div class="col-sm-3">
                                            <form method="post" action="<?php echo site_url("setting/rekening/filter"); ?>">
                                            <div class="input-group"><input type="text" name="search" placeholder="No Rekening/Nama Pemilik" class="input-sm form-control"> <span class="input-group-btn">
                                                <button type="submit" class="btn btn-sm btn-primary"> Cari</button> </span></div>
                                            </form>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bank</th>
                                            <th>Mata Uang</th>
                                            <th>No Rekening </th>
                                            <th>Pemilik Rekening </th>
                                            <th>Aksi </th>
                                        </tr>
                                        </thead>
                                        <tbody>
<?php
	if (sizeof($data_rekening)>0) {
		for ($i=0;$i<sizeof($data_rekening);$i++) {
			$id = $data_rekening[$i]["id_rekening"];
			$nama_bank = $data_rekening[$i]["nama_bank"];
			$no_rekening = $data_rekening[$i]["no_rekening"];
            $pemilik_rekening = $data_rekening[$i]["pemilik_rekening"];
            $mata_uang = $data_rekening[$i]["mata_uang"];
			
			echo "<tr><td>".($i+1)."</td><td>".$nama_bank."</td><td>".$mata_uang."</td><td>".$no_rekening."</td><td>".$pemilik_rekening."</td><td>";
			echo "<div class=\"btn-group\"><button data-toggle=\"dropdown\" class=\"btn btn-primary btn-xs dropdown-toggle\">Action <span class=\"caret\"></span></button><ul class=\"dropdown-menu\"><li><a href=\"".site_url("setting/rekening/ubah/".$id)."\">Ubah</a></li><li><a href=\"".site_url("setting/rekening/hapus/".$id)."\">Hapus</a></li></ul></div>";
			echo "</td></tr>";			
		}
	} else {
		echo "<tr><td colspan=6>Belum ada data rekening bank</td></tr>";
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
if ($aksi=="tambah") { $xaksi = "Tambah Rekening Bank"; }
if ($aksi=="ubah") { $xaksi = "Ubah Rekening Bank"; }
if ($aksi=="hapus") { $xaksi = "Hapus Rekening Bank"; }

$bank_id = ""; $no_rekening = ""; $pemilik_rekening = "";
if (sizeof($data_rekening)>0) {
	$bank_id            = $data_rekening[0]["bank_id"];
	$no_rekening        = $data_rekening[0]["no_rekening"];
	$pemilik_rekening   = $data_rekening[0]["pemilik_rekening"];
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
						<form method="post" action="<?php echo site_url("setting/rekening/".$aksi."/".$rekid); ?>" class="form-horizontal">
                        <div class="form-group">
							<label class="col-sm-2 control-label">Bank</label>
                            <div class="col-sm-10">
								<select name="bank_id" <?php if ($aksi == "hapus") { echo "disabled"; } ?> class="form-control">
                                <?php 

                                    if (sizeof($data_bank)>0) {
                                        for ($i=0;$i<sizeof($data_bank);$i++) {
                                            $id         = $data_bank[$i]["id"];
                                            $kode       = $data_bank[$i]["kode"];
                                            $nama_bank  = $data_bank[$i]["nama_bank"];

                                            echo "<option value=\"".$id."\"";
                                            if ($id==$bankid) { echo " selected"; }
                                            echo ">".$kode." - ".$nama_bank."</option>";
                                        }
                                    }

                                ?>								
								</select>	
							</div>
                        </div>
                        <?php $matauang = ""; ?>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Mata Uang</label>
                            <div class="col-sm-10">
								<select name="mata_uang" <?php if ($aksi == "hapus") { echo "disabled"; } ?> class="form-control">
                                    <option value="IDR" <?php if ($matauang == "IDR") { echo "selected"; } ?>>IDR</option>
                                    <option value="USD" <?php if ($matauang == "USD") { echo "selected"; } ?>>USD</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"> 
							<label class="col-sm-2 control-label">No Rekening</label>
                            <div class="col-sm-10"><input type="text" <?php if ($aksi == "hapus") { echo "disabled"; } ?> name="no rekening" class="form-control" placeholder="No Rekening" value="<?php echo $no_rekening; ?>"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Pemilik Rekening</label>
                            <div class="col-sm-10"><input type="text" <?php if ($aksi == "hapus") { echo "disabled"; } ?> name="pemilik_rekening" class="form-control" placeholder="Pemilik Rekening" value="<?php echo $pemilik_rekening; ?>"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a href="<?php echo site_url("setting/rekening/") ?>" class="btn btn-white">Cancel</a>
                                <button name="tombol" class="btn btn-primary" value="simpan" type="submit"><?php if ($aksi == "hapus") { echo "Delete"; } else { echo "Save"; } ?></button> 
                            </div>
                        </div>						
						</form>
						</div>
					</div>
				</div>
            </div>        			
<?php } ?>			