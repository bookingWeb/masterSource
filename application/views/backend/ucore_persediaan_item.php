<?php if ($site_form=="list") { ?>

            <div class="row wrapper border-bottom white-bg page-heading">

                <div class="col-lg-10">

                    <h2>Data Item Persediaan</h2>

                    <ol class="breadcrumb">

                        <li><a href="index.html">Setting</a></li>

                        <li class="active"><strong>Item Persediaan</strong></li>

                    </ol>

                </div>

                <div class="col-lg-2">



                </div>

            </div>

			

            <div class="wrapper wrapper-content animated fadeInRight">

                <div class="row">

                    <div class="col-lg-12">

                        <div class="ibox float-e-margins">

                            <div class="ibox-title"><h5>Data Item Persediaan</h5></div>

                            <div class="ibox-content">

                                <div class="row">

                                    <div class="col-sm-2 m-b-xs">

                                        <a href="<?php echo site_url("persediaan/item/tambah"); ?>" class="btn btn-sm btn-primary"> Tambah Item</a> 

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

                                            <th>Kode </th>

                                            <th>Nama</th>

                                            <th>Aksi </th>

                                        </tr>

                                        </thead>

                                        <tbody>

<?php

	if (sizeof($data_item)>0) {

		for ($i=0;$i<sizeof($data_item);$i++) {

			$id = $data_item[$i]["id"];

			$kode = $data_item[$i]["kode"];

			$nama = $data_item[$i]["nama"];

			

			echo "<tr><td>".($i+1)."</td><td>".$kode."</td><td>".$nama."</td><td>";

			echo "<div class=\"btn-group\"><button data-toggle=\"dropdown\" class=\"btn btn-primary btn-xs dropdown-toggle\">Action <span class=\"caret\"></span></button><ul class=\"dropdown-menu\"><li><a href=\"".site_url("persediaan/item/ubah/".$id)."\">Ubah</a></li><li><a href=\"".site_url("persediaan/item/hapus/".$id)."\">Hapus</a></li></ul></div>";

			echo "</td></tr>";			

		}

	} else {

		echo "<tr><td colspan=4>Belum ada data item persediaan</td></tr>";

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

if ($aksi=="tambah") { $xaksi = "Tambah Item Persediaan"; }

if ($aksi=="ubah") { $xaksi = "Ubah Item Persediaan"; }

if ($aksi=="hapus") { $xaksi = "Hapus Item Persediaan"; }



$kode = ""; $nama = "";

if (sizeof($data_item)>0) {

	$kode = $data_item[0]["kode"];

	$nama = $data_item[0]["nama"];

}

?>



            <div class="row wrapper border-bottom white-bg page-heading">

                <div class="col-lg-10">

                    <h2><?php echo $xaksi; ?></h2>

                    <ol class="breadcrumb">

                        <li><a href="#">Persediaan</a></li>

                        <li><a href="#">Item </a></li>

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

						<form method="post" action="<?php echo site_url("persediaan/item/".$aksi."/".$itemid); ?>" class="form-horizontal">

                        <div class="form-group"> 

							<label class="col-sm-2 control-label">Kode</label>

                            <div class="col-sm-10"><input type="text" name="kode" class="form-control" placeholder="Kode" value="<?php echo $kode; ?>" <?php if ($aksi == "hapus") { echo "disabled"; } ?>></div>

                        </div>

                        <div class="form-group">

							<label class="col-sm-2 control-label">Nama</label>

                            <div class="col-sm-10"><input type="text" name="nama" class="form-control" placeholder="Nama Item Persediaan" value="<?php echo $nama; ?>" <?php if ($aksi == "hapus") { echo "disabled"; } ?>></div>

                        </div>

                        <div class="form-group">

                            <div class="col-sm-4 col-sm-offset-2">

                                <a href="<?php echo site_url("persediaan/item/") ?>" class="btn btn-white">Cancel</a>

                                <button name="tombol" class="btn btn-primary" value="simpan" type="submit"><?php if ($aksi == "hapus") { echo "Delete"; } else { echo "Save"; } ?></button> 

                            </div>

                        </div>						

						</form>

						</div>

					</div>

				</div>

            </div>        			

<?php } ?>			