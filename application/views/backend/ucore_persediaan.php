

        <?php if ($site_form=="list_persediaan") { ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Persediaan Barang</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Persediaan</a></li>
                        <li class="active"><strong>Barang</strong></li>
                    </ol>
                </div>
                <div class="col-lg-2">
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title"><h5>List Persediaan Barang</h5></div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-sm-2 m-b-xs">
                                        <a href="<?php echo site_url("persediaan/data/new"); ?>" class="btn btn-sm btn-primary"> Tambah Barang</a> 
                                    </div>

                                    <div class="col-sm-2 m-b-xs">
                                        <a href="<?php echo site_url("persediaan/data/import"); ?>" class="btn btn-sm btn-primary"> Import CSV</a>  
                                    </div>

                                    <div class="col-sm-5"></div>

                                    <div class="col-sm-3">
                                        <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                            <button type="button" class="btn btn-sm btn-primary"> Cari</button> </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Harga Jual</th>
                                            <th>Harga Perolehan </th>
                                            <th>Product Type </th>
                                            <th>Quantity On Hand </th>
                                            <th>Aksi </th>
                                        </tr>

                                        </thead>

                                        <tbody>
                                        <?php if (isset($data_persediaan)) {
                                                for ($i=0;$i<sizeof($data_persediaan);$i++) {
                                                    $id             = $data_persediaan[$i]["id_persediaan"];
                                                    $jumlah         = $data_persediaan[$i]["jumlah"];
                                                    $hpp            = $data_persediaan[$i]["hpp"];
                                                    $harga_jual     = $data_persediaan[$i]["harga_jual"];
                                                    $kode           = $data_persediaan[$i]["kode"];
                                                    $nama           = $data_persediaan[$i]["nama"];
                                                    $product_type   = $data_persediaan[$i]["product_type"];                                         
                                            ?>
                                        <tr>
                                            <td><?php echo ($i+1); ?></td>
                                            <td><?php echo $nama; ?></td>
                                            <td><?php echo "Rp. ".number_format($harga_jual); ?></td>
                                            <td><?php echo "Rp. ".number_format($hpp); ?></td>
                                            <td><?php if($product_type == 1){ echo "Perlengkapan Haji"; } ?></td>
                                            <td><?php echo $jumlah; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="">Detail Barang</a></li>
                                                        <li><a href="<?php echo site_url("persediaan/data/edit/".$id) ?>">Ubah Barang</a></li>
                                                        <li><a href="<?php echo site_url("persediaan/data/delete/".$id) ?>">Hapus</a></li>
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



        <?php } if ($site_form=="form_barang") { ?>

            <?php

            $xaksi = "";
            if ($aksi=="new") { $xaksi = "Tambah Persediaan Barang"; }
            if ($aksi=="edit") { $xaksi = "Ubah Persediaan Barang"; }
            if ($aksi=="delete") { $xaksi = "Hapus Persediaan Barang"; }

            $id = "";       $cabang_id = "";    $item_id = "";
            $jumlah = "";   $hpp = "";          $harga_jual = "";

            if (!empty($data_persediaan)) {

                $id_barang          = $data_persediaan[0]["id"];
                $cabang_id          = $data_persediaan[0]["cabang_id"];
                $item_id            = $data_persediaan[0]["item_id"];
                $jumlah             = $data_persediaan[0]["jumlah"];
                $hpp                = $data_persediaan[0]["hpp"];
                $harga_jual         = $data_persediaan[0]["harga_jual"];
                $product_type       = $data_persediaan[0]["product_type"];

            }
            ?>

            <div class="row wrapper border-bottom white-bg page-heading">

                <div class="col-lg-10">

                    <h2><?php echo $xaksi; ?></h2>

                    <ol class="breadcrumb">

                        <li><a href="index.html">Persediaan</a></li>

                        <li><a href="index.html">Barang</a></li>

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

                            <h5>Form <?php echo $xaksi; ?></h5>

                        </div>

                        <div class="ibox-content">

                            <div class="row">

                                <form method="post" action="<?php echo site_url("persediaan/data/".$aksi."/".$idbarang); ?>" class="form-horizontal">

                                <div class="form-group">

                                    <label class="col-sm-2 control-label">Nama Barang </label>

                                    <div class="col-sm-5">
                                        <select class="form-control m-b" name="idbarang" <?php if ($aksi == "delete") { echo "disabled"; } ?>>
                                            <option>Pilih Barang</option>

                                            <?php

                                                if ($data_item > 0) {
                                                for ($i=0;$i<sizeof($data_item);$i++) {
                                                    $id    = $data_item[$i]['id'];
                                                    $kode  = $data_item[$i]['kode'];
                                                    $nama  = $data_item[$i]['nama'];
                                            ?>

                                            <option value="<?php echo $id; ?>" <?php if ($item_id == $id) { echo "selected"; } ?> ><?php echo "(".$kode.") ".$nama; ?></option>

                                            <?php }} ?>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">

                                    <label class="col-sm-2 control-label">Harga Barang</label>

                                    <div class="col-sm-5"><input type="text" name="harga_barang" class="form-control" placeholder="Harga Barang" value="<?php echo $harga_jual; ?>" <?php if ($aksi == "delete") { echo "disabled"; } ?>></div>

                                </div>

                                <div class="form-group">

                                    <label class="col-sm-2 control-label">Harga Perolehan</label>

                                    <div class="col-sm-5"><input type="text" name="hpp" class="form-control" placeholder="Harga Perolehan" value="<?php echo $hpp; ?>" <?php if ($aksi == "delete") { echo "disabled"; } ?>></div>

                                </div>

                                <div class="form-group">

                                    <label class="col-sm-2 control-label">Tipe Barang</label>

                                    <div class="col-sm-5">
                                        <select class="form-control m-b" name="tipebarang" <?php if ($aksi == "delete") { echo "disabled"; } ?>>
                                                <option>Pilih Tipe Barang</option>
                                                <option value="1" <?php if ($product_type == 1) { echo "selected"; } ?> >Perlengkapan Haji</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">

                                    <label class="col-sm-2 control-label">Quantity On Hand</label>

                                    <div class="col-sm-5"><input type="text" name="qty" class="form-control" placeholder="Quantity On Hand" value="<?php echo $jumlah; ?>" <?php if ($aksi == "delete") { echo "disabled"; } ?>></div>

                                </div>

                                <div class="form-group">

                                <label class="col-sm-2 control-label">Cabang </label>

                                <div class="col-sm-5">
                                    <select class="form-control m-b" name="idcabang" <?php if ($aksi == "delete") { echo "disabled"; } ?>>
                                        <option>Pilih Cabang</option>

                                        <?php

                                            if ($data_cabang > 0) {
                                            for ($i=0;$i<sizeof($data_cabang);$i++) {
                                                $id             = $data_cabang[$i]['id'];
                                                $kode_cabang    = $data_cabang[$i]['kode_cabang'];
                                                $nama_cabang    = $data_cabang[$i]['nama_cabang'];
                                        ?>

                                        <option value="<?php echo $id; ?>" <?php if ($cabang_id == $id) { echo "selected"; } ?>><?php echo "(".$kode_cabang.") ".$nama_cabang; ?></option>

                                        <?php }} ?>
                                    </select>
                                </div>

                                </div>

                                <div class="form-group">

                                    <div class="col-sm-4 col-sm-offset-2">

                                        <a href="<?php echo site_url("persediaan/data/") ?>" class="btn btn-white">Cancel</a>

                                        <button name="tombol" class="btn btn-primary" value="simpan" type="submit"><?php if ($aksi == "delete") { echo "Delete"; } else { echo "Save"; } ?></button> 

                                    </div>

                                </div>						

                                </form>

                            </div>

						</div>

					</div>

				</div>

            </div>

        <?php } if ($site_form=="form_importcsv") { ?>

            <div class="row wrapper border-bottom white-bg page-heading">

                <div class="col-lg-10">

                    <h2>Import Data Barang </h2>

                    <ol class="breadcrumb">

                        <li><a href="index.html">Persediaan</a></li>

                        <li><a href="index.html">Barang</a></li>

                        <li class="active"><strong>Import CSV</strong></li>

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

                            <h5>Import CSV</h5>

                        </div>

                        <div class="ibox-content">

                            <div class="row">

                                <form method="post" action="#" class="form-horizontal">

                                <div class="form-group">

                                    <label class="col-sm-2 control-label">Import CSV </label>

                                    <div class="col-sm-5"><input type="file" name="telepon" class="form-control" placeholder="Nominal Bayar"></div>

                                </div>

                                <div class="form-group">

                                    <div class="col-sm-4 col-sm-offset-2">

                                        <a href="<?php echo site_url("persediaan/data/") ?>" class="btn btn-white">Cancel</a>

                                        <button name="tombol" class="btn btn-primary" value="simpan" type="submit">Import</button> 

                                    </div>

                                </div>						

                                </form>

                            </div>

						</div>

					</div>

				</div>

            </div>

        <?php } if ($site_form=="detail_barang") { ?>

        

            <div class="row wrapper border-bottom white-bg page-heading">

                <div class="col-lg-10">

                    <h2>Detail Barang</h2>

                    <ol class="breadcrumb">

                        <li><a href="index.html">Persediaan</a></li>

                        <li><a href="index.html">Barang</a></li>

                        <li class="active"><strong>Detail</strong></li>

                    </ol>

                </div>

                <div class="col-lg-2">



                </div>

            </div>

            <div class="wrapper wrapper-content animated fadeInRight">

                <div class="row">

                <div class="col-lg-12">

                    <div class="ibox float-e-margins">

                        <div class="ibox-title"><h5>Detail Barang</h5></div>

                        <div class="ibox-content">

                            <div class="row">

                                <div class="col-lg-3">

                                    <h3>Nama Barang</h3>

                                    <p>Kain Ihrom</p>

                                </div>	

                                <div class="col-lg-2">

                                    <h3>Harga Jual</h3>

                                    <p>Rp. 50.000,-</a></p>

                                </div>

                                <div class="col-lg-2">

                                    <h3>Harga Perolehan</h3>

                                    <p>Rp. 0,-</a></p>

                                </div>

                                <div class="col-lg-2">

                                    <h3>Tipe Barang</h3>

                                    <p>Perlengkapan Haji</a></p>

                                </div>

                                <div class="col-lg-2">

                                    <h3>Quantity On Hand</h3>

                                    <p>150</p>

                                </div>	

                            </div>

                            <div class="row">

                                <div class="col-lg-12"><p>&nbsp;</p></div>

                            </div>	



                        </div>

                    </div>

                </div>

                </div>

            </div>
        

        <?php } if ($site_form=="list_barang_masuk") { ?>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Daftar Barang Masuk</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Persediaan</a></li>
                        <li class="active"><strong>Barang Masuk</strong></li>
                    </ol>
                </div>

                <div class="col-lg-2">
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title"><h5>Daftar Barang Masuk</h5></div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-sm-2 m-b-xs">
                                        <a href="<?php echo site_url("persediaan/barangmasuk/new"); ?>" class="btn btn-sm btn-primary"> Tambah Barang Masuk</a> 
                                    </div>

                                    <div class="col-sm-7"></div>

                                    <div class="col-sm-3">
                                        <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                            <button type="button" class="btn btn-sm btn-primary"> Cari</button> </span>
                                        </div>
                                    </div>

                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode </th>
                                            <th>Partner</th>
                                            <th>Tanggal</th>
                                            <th>Nama Barang </th>
                                            <th>Quantity </th>
                                            <th>Status </th>
                                            <th>Keterangan </th>
                                            <th>Aksi </th>
                                        </tr>

                                        </thead>

                                        <tbody>

                                        <?php if (isset($data_persediaan_mutasi)) {
                                                for ($i=0;$i<sizeof($data_persediaan_mutasi);$i++) {
                                                    $id_mutasi      = $data_persediaan_mutasi[$i]["id_mutasi"];
                                                    $no_mutasi      = $data_persediaan_mutasi[$i]["no_mutasi"];
                                                    $nama_suplier   = $data_persediaan_mutasi[$i]["nama_suplier"];
                                                    $tanggal        = $data_persediaan_mutasi[$i]["tanggal"];
                                                    $nama_barang    = $data_persediaan_mutasi[$i]["nama_barang"];
                                                    $jumlah         = $data_persediaan_mutasi[$i]["jumlah"];
                                                    $jenis          = $data_persediaan_mutasi[$i]["jenis"];
                                                    $cabang_id      = $data_persediaan_mutasi[$i]["cabang_id"];
                                                    $supplier_id    = $data_persediaan_mutasi[$i]["supplier_id"];
                                                    $keterangan     = $data_persediaan_mutasi[$i]["keterangan"];
                                            ?>

                                        <tr>
                                            <td><?php echo ($i+1); ?></td>
                                            <td><?php echo $no_mutasi; ?></td>
                                            <td><?php echo $nama_suplier; ?></td>
                                            <td><?php echo $tanggal; ?></td>
                                            <td><?php echo $nama_barang; ?></td>
                                            <td><?php echo $jumlah; ?></td>
                                            <td><?php echo $jenis; ?></td>
                                            <td><?php echo $keterangan; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="<?php echo site_url("persediaan/barangmasuk/edit/".$id_mutasi); ?>">Ubah Barang Masuk</a></li>
                                                        <li><a href="<?php echo site_url("persediaan/barangmasuk/delete/".$id_mutasi); ?>">Hapus</a></li>
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

        <?php } if ($site_form=="form_barangmasuk") { ?>
            
            <?php
                $xaksi = "";
                if ($aksi=="new") { $xaksi = "Tambah Barang Masuk"; }
                if ($aksi=="edit") { $xaksi = "Ubah Barang Masuk"; }
                if ($aksi=="delete") { $xaksi = "Hapus Barang Masuk"; }

                $id_mutasi = ""; $no_mutasi = ""; $nama_suplier = ""; $tanggal = ""; $nama_barang = ""; 
                $jumlah = ""; $jenis = ""; $cabang_id = ""; $supplier_id = ""; $keterangan = ""; $item_id = "";
                
                if (!empty($data_persediaan)) {

                    $id_mutasi          = $data_persediaan[0]["id_mutasi"];
                    $item_id            = $data_persediaan[0]["item_id"];
                    $no_mutasi          = $data_persediaan[0]["no_mutasi"];
                    $nama_suplier       = $data_persediaan[0]["nama_suplier"];
                    $tanggal            = $data_persediaan[0]["tanggal"];
                    $nama_barang        = $data_persediaan[0]["nama_barang"];
                    $jumlah             = $data_persediaan[0]["jumlah"];
                    $jenis              = $data_persediaan[0]["jenis"];
                    $cabang_id          = $data_persediaan[0]["cabang_id"];
                    $supplier_id        = $data_persediaan[0]["supplier_id"];
                    $keterangan         = $data_persediaan[0]["keterangan"];

                }
            ?>

            <div class="row wrapper border-bottom white-bg page-heading">

                <div class="col-lg-10">

                    <h2><?php echo $xaksi; ?></h2>

                    <ol class="breadcrumb">

                        <li><a href="index.html">Persediaan</a></li>

                        <li><a href="index.html">Barang</a></li>

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

                            <h5>Form <?php echo $xaksi; ?></h5>

                        </div>

                        <div class="ibox-content">

                            <div class="row">

                                <form method="post" action="<?php echo site_url("persediaan/barangmasuk/".$aksi."/".$idmutasi); ?>" class="form-horizontal">

                                <div class="form-group">

                                    <label class="col-sm-2 control-label">Nomor Mutasi</label>

                                    <div class="col-sm-5"><input type="text" name="no_mutasi" class="form-control" placeholder="Nomor Mutasi" value="<?php echo $no_mutasi; ?>" <?php if ($aksi == "delete") { echo "disabled"; } ?>></div>

                                </div>

                                <div class="form-group">

                                    <label class="col-sm-2 control-label">Nama Barang</label>

                                    <div class="col-sm-5">
                                        <select class="form-control m-b" name="idbarang" <?php if ($aksi == "delete") { echo "disabled"; } ?>>
                                            <option>Pilih Barang</option>

                                            <?php

                                                if ($data_item > 0) {
                                                for ($i=0;$i<sizeof($data_item);$i++) {
                                                    $id    = $data_item[$i]['id'];
                                                    $kode  = $data_item[$i]['kode'];
                                                    $nama  = $data_item[$i]['nama'];
                                            ?>

                                            <option value="<?php echo $id; ?>" <?php if ($item_id == $id) { echo "selected"; } ?>><?php echo "(".$kode.") ".$nama; ?></option>

                                            <?php }} ?>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">

                                    <label class="col-sm-2 control-label">Suplier</label>

                                    <div class="col-sm-5">
                                        <select class="form-control m-b" name="idsuplier" <?php if ($aksi == "delete") { echo "disabled"; } ?>>
                                            <option>Pilih Suplier</option>

                                            <?php

                                                if ($data_supplier > 0) {
                                                for ($i=0;$i<sizeof($data_supplier);$i++) {
                                                    $id    = $data_supplier[$i]['id'];
                                                    $nama  = $data_supplier[$i]['nama'];
                                            ?>

                                            <option value="<?php echo $id; ?>" <?php if ($supplier_id == $id) { echo "selected"; } ?>><?php echo $nama; ?></option>

                                            <?php }} ?>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">

                                    <label class="col-sm-2 control-label">Tanggal Masuk Barang</label>

                                    <div class="col-sm-5"><input type="datetime-local" name="tanggal" class="form-control" placeholder="Tanggal Masuk Barang" value="<?php echo $tanggal; ?>" <?php if ($aksi == "delete") { echo "disabled"; } ?>></div>

                                </div>

                                <div class="form-group">

                                    <label class="col-sm-2 control-label">Quantity</label>

                                    <div class="col-sm-5"><input type="text" name="qty" class="form-control" placeholder="Quantity" value="<?php echo $jumlah; ?>" <?php if ($aksi == "delete") { echo "disabled"; } ?>></div>

                                </div>

                                <div class="form-group">

                                    <label class="col-sm-2 control-label">Jenis</label>

                                    <div class="col-sm-5">
                                        <select class="form-control m-b" name="jenis" <?php if ($aksi == "delete") { echo "disabled"; } ?>>
                                            <option>Pilih Jenis</option>
                                            <option value="1" <?php if ($jenis == 1) { echo "selected"; }?>>Pengadaan Barang</option>
                                            <option value="2" <?php if ($jenis == 2) { echo "selected"; }?>>Mutasi Barang</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">

                                    <label class="col-sm-2 control-label">Cabang </label>

                                    <div class="col-sm-5">
                                        <select class="form-control m-b" name="idcabang" <?php if ($aksi == "delete") { echo "disabled"; } ?>>
                                            <option>Pilih Cabang</option>

                                            <?php

                                                if ($data_cabang > 0) {
                                                for ($i=0;$i<sizeof($data_cabang);$i++) {
                                                    $id             = $data_cabang[$i]['id'];
                                                    $kode_cabang    = $data_cabang[$i]['kode_cabang'];
                                                    $nama_cabang    = $data_cabang[$i]['nama_cabang'];
                                            ?>

                                            <option value="<?php echo $id; ?>" <?php if ($cabang_id == $id) { echo "selected"; } ?>><?php echo "(".$kode_cabang.") ".$nama_cabang; ?></option>

                                            <?php }} ?>
                                        </select>
                                    </div>

                                    </div>

                                <div class="form-group">

                                    <label class="col-sm-2 control-label">Keterangan</label>

                                    <div class="col-sm-5"><input type="text" name="keterangan" class="form-control" placeholder="Tipe Pengiriman" value="<?php echo $keterangan; ?>" <?php if ($aksi == "delete") { echo "disabled"; } ?>></div>

                                </div>

                                <div class="form-group">

                                    <div class="col-sm-4 col-sm-offset-2">

                                        <a href="<?php echo site_url("persediaan/barangmasuk/") ?>" class="btn btn-white">Cancel</a>

                                        <button name="tombol" class="btn btn-primary" value="simpan" type="submit"><?php if ($aksi == "delete") { echo "Delete"; } else { echo "Save"; } ?></button> 

                                    </div>

                                </div>						

                                </form>

                            </div>

						</div>

					</div>

				</div>

            </div>

        <?php } if ($site_form=="list_barang_keluar") {?>

            

            <div class="row wrapper border-bottom white-bg page-heading">

                <div class="col-lg-10">

                    <h2>Daftar Barang Keluar</h2>

                    <ol class="breadcrumb">

                        <li><a href="index.html">Persediaan</a></li>

                        <li class="active"><strong>Barang Keluar</strong></li>

                    </ol>

                </div>

                <div class="col-lg-2">



                </div>

            </div>

            <div class="wrapper wrapper-content animated fadeInRight">

                <div class="row">

                    <div class="col-lg-12">

                        <div class="ibox float-e-margins">

                            <div class="ibox-title"><h5>Daftar Barang Keluar</h5></div>

                            <div class="ibox-content">

                                <div class="row">

                                    <div class="col-sm-2 m-b-xs">

                                        <a href="<?php echo site_url("persediaan/barangkeluar/new"); ?>" class="btn btn-sm btn-primary"> Tambah Barang Keluar</a> 

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
                                            <th>Nama Barang </th>
                                            <th>Quantity </th>
                                            <th>Tanggal</th>
                                            <th>Status </th>
                                            <th>Keterangan </th>
                                            <th>Aksi </th>

                                        </tr>

                                        </thead>

                                        <tbody>
                                            <?php 
                                                if (isset($data_persediaan_keluar)) {
                                                    for ($i=0;$i<sizeof($data_persediaan_keluar);$i++) {
                                                        $id_mutasi      = $data_persediaan_keluar[$i]["id_mutasi"];
                                                        $no_mutasi      = $data_persediaan_keluar[$i]["no_mutasi"];
                                                        $nama_suplier   = $data_persediaan_keluar[$i]["nama_suplier"];
                                                        $tanggal        = $data_persediaan_keluar[$i]["tanggal"];
                                                        $nama_barang    = $data_persediaan_keluar[$i]["nama_barang"];
                                                        $jumlah         = $data_persediaan_keluar[$i]["jumlah"];
                                                        $jenis          = $data_persediaan_keluar[$i]["jenis"];
                                                        $cabang_id      = $data_persediaan_keluar[$i]["cabang_id"];
                                                        $supplier_id    = $data_persediaan_keluar[$i]["supplier_id"];
                                                        $keterangan     = $data_persediaan_keluar[$i]["keterangan"];
                                            ?>

                                        <tr>

                                            <td><?php echo ($i+1); ?></td>
                                            <td><?php echo $nama_barang; ?></td>
                                            <td><?php echo $jumlah; ?></td>
                                            <td><?php echo $tanggal; ?></td>
                                            <td><?php echo $jenis; ?></td>
                                            <td><?php echo $keterangan; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <!-- <li><a href="<?php echo site_url("persediaan/barangkeluar/detail/") ?>">Detail Barang Keluar</a></li> -->
                                                        <li><a href="<?php echo site_url("persediaan/barangkeluar/edit/".$id_mutasi); ?>">Ubah Barang Keluar</a></li>
                                                        <li><a href="<?php echo site_url("persediaan/barangkeluar/delete/".$id_mutasi); ?>">Hapus</a></li>
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

        <?php } if ($site_form=="form_barangkeluar") { ?>
            
            <?php
                $xaksi = "";
                if ($aksi=="new") { $xaksi = "Tambah Barang Keluar"; }
                if ($aksi=="edit") { $xaksi = "Ubah Barang Keluar"; }
                if ($aksi=="delete") { $xaksi = "Hapus Barang Keluar"; }

                $id_mutasi = ""; $no_mutasi = ""; $nama_suplier = ""; $tanggal = ""; $nama_barang = ""; 
                $jumlah = ""; $jenis = ""; $cabang_id = ""; $supplier_id = ""; $keterangan = ""; $item_id = "";
                
                if (!empty($data_persediaan)) {

                    $id_mutasi          = $data_persediaan[0]["id_mutasi"];
                    $item_id            = $data_persediaan[0]["item_id"];
                    $no_mutasi          = $data_persediaan[0]["no_mutasi"];
                    $nama_suplier       = $data_persediaan[0]["nama_suplier"];
                    $tanggal            = $data_persediaan[0]["tanggal"];
                    $nama_barang        = $data_persediaan[0]["nama_barang"];
                    $jumlah             = $data_persediaan[0]["jumlah"];
                    $jenis              = $data_persediaan[0]["jenis"];
                    $cabang_id          = $data_persediaan[0]["cabang_id"];
                    $supplier_id        = $data_persediaan[0]["supplier_id"];
                    $keterangan         = $data_persediaan[0]["keterangan"];

                }
            ?>

            <div class="row wrapper border-bottom white-bg page-heading">

                <div class="col-lg-10">

                    <h2><?php echo $xaksi; ?></h2>

                    <ol class="breadcrumb">

                        <li><a href="index.html">Persediaan</a></li>

                        <li><a href="index.html">Barang</a></li>

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

                            <h5>Form <?php echo $xaksi; ?></h5>

                        </div>

                        <div class="ibox-content">

                            <div class="row">

                                <form method="post" action="<?php echo site_url("persediaan/barangkeluar/".$aksi."/".$idmutasi); ?>" class="form-horizontal">

                                <div class="form-group">

                                    <label class="col-sm-2 control-label">Nomor Mutasi</label>

                                    <div class="col-sm-5"><input type="text" name="no_mutasi" class="form-control" placeholder="Nomor Mutasi" value="<?php echo $no_mutasi; ?>" <?php if ($aksi == "delete") { echo "disabled"; } ?>></div>

                                </div>

                                <div class="form-group">

                                    <label class="col-sm-2 control-label">Nama Barang</label>

                                    <div class="col-sm-5">
                                        <select class="form-control m-b" name="idbarang" <?php if ($aksi == "delete") { echo "disabled"; } ?>>
                                            <option>Pilih Barang</option>

                                            <?php

                                                if ($data_item > 0) {
                                                for ($i=0;$i<sizeof($data_item);$i++) {
                                                    $id    = $data_item[$i]['id'];
                                                    $kode  = $data_item[$i]['kode'];
                                                    $nama  = $data_item[$i]['nama'];
                                            ?>

                                            <option value="<?php echo $id; ?>" <?php if ($item_id == $id) { echo "selected"; } ?>><?php echo "(".$kode.") ".$nama; ?></option>

                                            <?php }} ?>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">

                                    <label class="col-sm-2 control-label">Tanggal Keluar Barang</label>

                                    <div class="col-sm-5"><input type="datetime-local" name="tanggal" class="form-control" placeholder="Tanggal Keluar Barang" value="<?php echo $tanggal; ?>" <?php if ($aksi == "delete") { echo "disabled"; } ?>></div>

                                </div>

                                <div class="form-group">

                                    <label class="col-sm-2 control-label">Quantity</label>

                                    <div class="col-sm-5"><input type="text" name="qty" class="form-control" placeholder="Quantity" value="<?php echo $jumlah; ?>" <?php if ($aksi == "delete") { echo "disabled"; } ?>></div>

                                </div>

                                <div class="form-group">

                                    <label class="col-sm-2 control-label">Kategori Barang Keluar</label>

                                    <div class="col-sm-5">
                                        <select class="form-control m-b" name="jenis" <?php if ($aksi == "delete") { echo "disabled"; } ?>>
                                            <option>Pilih Jenis</option>
                                            <option value="3" <?php if ($jenis == 3) { echo "selected"; }?>>Untuk Perlengkapan Haji</option>
                                            <option value="4" <?php if ($jenis == 4) { echo "selected"; }?>>Untuk Perlengkapan Umroh</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">

                                    <label class="col-sm-2 control-label">Keterangan</label>

                                    <div class="col-sm-5"><input type="text" name="keterangan" class="form-control" placeholder="Tipe Pengiriman" value="<?php echo $keterangan; ?>" <?php if ($aksi == "delete") { echo "disabled"; } ?>></div>

                                </div>

                                <div class="form-group">

                                    <div class="col-sm-4 col-sm-offset-2">

                                        <a href="<?php echo site_url("persediaan/barangmasuk/") ?>" class="btn btn-white">Cancel</a>

                                        <button name="tombol" class="btn btn-primary" value="simpan" type="submit"><?php if ($aksi == "delete") { echo "Delete"; } else { echo "Save"; } ?></button> 

                                    </div>

                                </div>						

                                </form>

                            </div>

						</div>

					</div>

				</div>

            </div>

        <?php } ?>