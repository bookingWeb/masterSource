<?php if ($site_form=="list") { ?>

            <div class="row wrapper border-bottom white-bg page-heading">

                <div class="col-lg-10">

                    <h2>Data Supplier Persediaan</h2>

                    <ol class="breadcrumb">

                        <li><a href="index.html">Setting</a></li>

                        <li class="active"><strong>Supplier Persediaan</strong></li>

                    </ol>

                </div>

                <div class="col-lg-2">



                </div>

            </div>

			

            <div class="wrapper wrapper-content animated fadeInRight">

                <div class="row">

                    <div class="col-lg-12">

                        <div class="ibox float-e-margins">

                            <div class="ibox-title"><h5>Data Supplier Persediaan</h5></div>

                            <div class="ibox-content">

                                <div class="row">

                                    <div class="col-sm-2 m-b-xs">

                                        <a href="<?php echo site_url("persediaan/supplier/tambah"); ?>" class="btn btn-sm btn-primary"> Tambah Supplier</a> 

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

                                            <th>Telp </th>

                                            <th>Email </th>

                                            <th>Alamat </th>

                                            <th>Keterangan </th>

                                            <th>Aksi </th>

                                        </tr>

                                        </thead>

                                        <tbody>

<?php

	if (sizeof($data_supplier)>0) {

		for ($i=0;$i<sizeof($data_supplier);$i++) {

			$id = $data_supplier[$i]["id"];

			$nama = $data_supplier[$i]["nama"];

			$telepon = $data_supplier[$i]["telepon"];

			$email = $data_supplier[$i]["email"];

			$alamat = $data_supplier[$i]["alamat"];

			$keterangan = $data_supplier[$i]["keterangan"];

			

			echo "<tr><td>".($i+1)."</td><td>".$nama."</td><td>".$telepon."</td><td>".$email."</td><td>".$alamat."</td><td>".$keterangan."</td><td>";

			echo "<div class=\"btn-group\"><button data-toggle=\"dropdown\" class=\"btn btn-primary btn-xs dropdown-toggle\">Action <span class=\"caret\"></span></button><ul class=\"dropdown-menu\"><li><a href=\"".site_url("persediaan/supplier/ubah/".$id)."\">Ubah</a></li><li><a href=\"".site_url("persediaan/supplier/hapus/".$id)."\">Hapus</a></li></ul></div>";

			echo "</td></tr>";			

		}

	} else {

		echo "<tr><td colspan=7>Belum ada data supplier persediaan</td></tr>";

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

if ($aksi=="tambah") { $xaksi = "Tambah Supplier Persediaan"; }

if ($aksi=="ubah") { $xaksi = "Ubah Supplier Persediaan"; }

if ($aksi=="hapus") { $xaksi = "Hapus Supplier Persediaan"; }



$nama = ""; $email = ""; $telepon = ""; $alamat = ""; $keterangan = "";

if (sizeof($data_supplier)>0) {

	$nama = $data_supplier[0]["nama"];

	$email = $data_supplier[0]["email"];

	$telepon = $data_supplier[0]["telepon"];

	$alamat = $data_supplier[0]["alamat"];

	$keterangan = $data_supplier[0]["keterangan"];

}

?>



            <div class="row wrapper border-bottom white-bg page-heading">

                <div class="col-lg-10">

                    <h2><?php echo $xaksi; ?></h2>

                    <ol class="breadcrumb">

                        <li><a href="#">Persediaan</a></li>

                        <li><a href="#">Supplier </a></li>

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

						<form method="post" action="<?php echo site_url("persediaan/supplier/".$aksi."/".$supid); ?>" class="form-horizontal">

                        <div class="form-group">

							<label class="col-sm-2 control-label">Nama</label>

                            <div class="col-sm-10"><input type="text" name="nama" class="form-control" placeholder="Nama Supplier" value="<?php echo $nama; ?>" <?php if ($aksi == "hapus") { echo "disabled"; } ?>></div>

                        </div>

                        <div class="form-group"> 

							<label class="col-sm-2 control-label">Telepon</label>

                            <div class="col-sm-10"><input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $telepon; ?>" <?php if ($aksi == "hapus") { echo "disabled"; } ?>></div>

                        </div>

                        <div class="form-group">

							<label class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10"><input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $email; ?>" <?php if ($aksi == "hapus") { echo "disabled"; } ?>></div>

                        </div>

                         <div class="form-group">

							<label class="col-sm-2 control-label">Alamat</label>

                            <div class="col-sm-10"><input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $alamat; ?>" <?php if ($aksi == "hapus") { echo "disabled"; } ?>></div>

                        </div>

                         <div class="form-group">

							<label class="col-sm-2 control-label">Keterangan</label>

                            <div class="col-sm-10"><input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="<?php echo $keterangan; ?>" <?php if ($aksi == "hapus") { echo "disabled"; } ?>></div>

                        </div>

                        <div class="form-group">

                            <div class="col-sm-4 col-sm-offset-2">

                                <a href="<?php echo site_url("persediaan/supplier/") ?>" class="btn btn-white">Cancel</a>

                                <button name="tombol" class="btn btn-primary" value="simpan" type="submit"><?php if ($aksi == "hapus") { echo "Delete"; } else { echo "Save"; } ?></button> 

                            </div>

                        </div>						

						</form>

						</div>

					</div>

				</div>

            </div>        			

<?php } ?>			