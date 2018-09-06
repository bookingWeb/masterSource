<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Kamar</h2>
		<ol class="breadcrumb">
			<li><a href="">Home</a></li>
			<li class="active"><strong>Master</strong></li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
<?php if ($site_form=="list") { ?>
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title"><h5>Kamar</h5></div>
                        <div class="ibox-content">
                            <div class="row">
								<div class="col-sm-7">
								<a href="<?php echo site_url("master/kamar/new"); ?>" class="btn btn-sm btn-primary"> Tambah </a>
								</div>
                                <div class="col-sm-5">
                                    <form method="post" action="<?php echo site_url("master/kamar/filter"); ?>">
                                    <div class="input-group"><input type="text" name="search" placeholder="Cari Jenis Kamar/Harga/Fasilitas" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary"> Cari</button> </span></div>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Kamar </th>
                                        <th>Jaminan Kenyamanan </th>
                                        <th>Fasilitas </th>
                                        <th>Jumlah Kamar</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        if (sizeof($data_kamar)>0) {
                                            for ($i=0;$i<sizeof($data_kamar);$i++) {
                                                $id = $data_kamar[$i]["id"];
                                                $jenis_kamar = $data_kamar[$i]["jenis_kamar"];
                                                $jaminan_kenyamanan = $data_kamar[$i]["jaminan_kenyamanan"];
                                                $fasilitas = $data_kamar[$i]["fasilitas"];
                                                $jumlah = $data_kamar[$i]["jumlah"];
                                                $harga = $data_kamar[$i]["harga"];
                                                // $jumlah = $data_kamar[$i]["jml"];
                                                // $kode = $data_kamar[$i]["kode_booking"];
                                                // $namapaket = $data_kamar[$i]["name_product"];
                                                // $tgl_berangkat = $data_kamar[$i]["start_date"];
                                                // $status = $data_kamar[$i]["payment_status"];
                                                // if ($status == 0)
                                                // {
                                                //     $status = "Booking";
                                                // } else if ($status == 1)
                                                // {
                                                //     $status = "Booked";
                                                // }
                                                echo "<tr><td>" . ((($page-1)*$limit)+$i+1) . "</td>"; 
                                                echo "<td>$jenis_kamar</td>"; 
                                                echo "<td>$jaminan_kenyamanan</td>";
                                                echo "<td>$fasilitas</td>"; 
                                                echo "<td>".$jumlah."</td>";
                                                echo "<td>".number_format($harga)."</td>";
                                                // echo "<td>$status</td>";
                                                echo "<td><div class=\"btn-group\"><button data-toggle=\"dropdown\" class=\"btn btn-primary btn-xs dropdown-toggle\">Action ";
                                                echo "<span class=\"caret\"></span></button><ul class=\"dropdown-menu\">";
                                                // echo "<li><a href=\"".site_url("master/kamar/detail/".$id)."\">Detail</a></li>";
                                                echo "<li><a href=\"".site_url("master/kamar/ubah/".$id)."\">Ubah Data</a></li>";
                                                echo "<li><a href=\"".site_url("master/kamar/hapus/".$id)."\">Hapus Data</a></li>";
                                                echo "</ul></div></td>";
                                                echo "</tr>";
                                            }
                                        }
                                    ?>									
                                    </tbody>
                                </table>
                            </div>
                            <?php
                                $jmldata = 0;
                                
                                if (sizeof($data_jml_booking)>0)
                                { 
                                    $jmldata = $data_jml_booking[0]['jumlah'];
                                }
								$jmlpage = ceil($jmldata/$limit);
								$data1 = (($page-1)*$limit)+1;
								$data2 = $page*$limit; if ($data2>$jmldata) { $data2 = $jmldata; }
                                if ($jmlpage<7) 
                                {
									$page1 = 1; $page2 = $jmlpage;
                                } 
                                else 
                                {
									if ($page<4) { $page1 = 1; $page2 = 6; }
									else if ($page>$jmlpage-3) { $page1 = $jmlpage - 5; $page2 = $jmlpage; }
									else { $page1 = $page - 3; $page2 = $page + 2; }
								} 
							?>
                            <div class="row">
								<div class="col-sm-6">
									<div class="dataTables_info" id="datatable_info" role="status" aria-live="polite"><?php echo "Showing $data1 to $data2 of ".number_format($jmldata)." entries"; ?></div>
								</div>
								<div class="col-sm-6">
								<?php if ($jmlpage>1) { ?>  	
									<div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
										<ul class="pagination">
											<li class="paginate_button previous" aria-controls="datatable" tabindex="0" id="datatable_previous"><a href="<?php echo site_url("master/kamar/1/"); ?>">First</a></li>
											<?php
												for ($i=$page1;$i<$page2+1;$i++) {
													echo "<li class=\"paginate_button";
													if ($i==$page) { echo " active"; }
													echo "\" aria-controls=\"datatable\" tabindex=\"0\"><a href=\"".site_url("master/kamar/".$i)."\">$i</a></li>";
												}
											?>
											<li class="paginate_button next" aria-controls="datatable" tabindex="0" id="datatable_next"><a href="<?php echo site_url("master/kamar/".$jmlpage); ?>">Last</a></li>
										</ul>
									</div>
								<?php } ?>                 		
								</div>
							</div>
                        </div>
                    </div>
                </div>
<?php } elseif($site_form=="formkamar") { ?>
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Input Kamar</h5>
                        </div>
                        <div class="ibox-content">
						<form method="post" action="<?php echo site_url("master/kamar/".$page); ?>" class="form-horizontal"> 
                        <div class="form-group">
							<label class="col-sm-2 control-label">Jenis Kamar</label>
                            <div class="col-sm-10"><input type="text" name="jenis" class="form-control" placeholder="Jenis Kamar"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Jaminan Kenyamanan</label>
                            <div class="col-sm-10"><textarea type="text" name="jaminan" class="form-control" placeholder="Jaminan Kenyamanan"></textarea></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Fasilitas</label>
                            <div class="col-sm-10"><textarea type="text" name="fasilitas" class="form-control" placeholder="Fasilitas"></textarea></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jumlah</label>
                            <!-- <div class="col-sm-10" id="combo_paket"> -->
                            <div class="col-sm-10"><input type="number" name="jumlah" class="form-control" placeholder="Jumlah"></div>
                            <!-- <select class="form-control m-b" name="paket" id="listpaket">
                                <option value="">Pilih Paket</option>
                                <?php if (sizeof($list_paket)>0) {
                                    for ($i=0;$i<sizeof($list_paket);$i++) {
                                    $id         = $list_paket[$i]["id"]; 
                                    $nama_paket = $list_paket[$i]["name_product"]; 
                                ?>
                                <option value="<?php echo $id; ?>"><?php echo $nama_paket; ?></option>
                            <?php }} ?>
                            </select> 
                            </div>-->
                        </div>
                        <div class="form-group" id="combo_tanggal">
                            <label class="col-sm-2 control-label">Harga</label>
                            <div class="col-sm-10"><input type="number" name="harga" class="form-control" placeholder="Harga"></div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="col-sm-2 control-label">Jumlah Jamaah</label>
                            <div class="col-sm-10"><input type="number" name="jumlah" class="form-control" placeholder="Jumlah Jamaah"></div>
                        </div> -->
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a href="<?php echo site_url("master/kamar"); ?>" class="btn btn-white">Cancel</a>
                                <button name="tombol" class="btn btn-primary" value="simpan" type="submit">Simpan</button> 
                            </div>
                        </div>						
						</form>
						</div>
					</div>
				</div>	
<?php } elseif($site_form=="ubahbooking") { ?>
                <?php 
                    if(sizeof($booking_byid)>0){
                        for ($i=0;$i<sizeof($booking_byid);$i++) {
                            $nama_kontak    = $booking_byid[$i]["nama_kontak"];
                            $telepon        = $booking_byid[$i]["telepon"];
                            $email          = $booking_byid[$i]["email"];
                            $start_date     = $booking_byid[$i]["start_date"];
                            $jml            = $booking_byid[$i]["jml"];
                            $id_paket       = $booking_byid[$i]["id_paket"];
                            $id_schedule    = $booking_byid[$i]["id_schedule"];
                            $kode_booking   = $booking_byid[$i]["kode_booking"];
                    }  
                ?>
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Ubah Booking Paket</h5>
                        </div>
                        <div class="ibox-content">
						<form method="post" action="<?php echo site_url("jamaah/booking/".$page); ?>" class="form-horizontal">
                        <input type="hidden" name="kode_booking" class="form-control" value="<?php echo $kode_booking?>">
                        <div class="form-group">
							<label class="col-sm-2 control-label">Nama Kontak</label>
                            <div class="col-sm-10"><input type="text" name="nama" value="<?php echo $nama_kontak; ?>" class="form-control" placeholder="<?php echo $nama_kontak; ?>"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">No Telepon</label>
                            <div class="col-sm-10"><input type="text" name="telepon" value="<?php echo $telepon; ?>" class="form-control" placeholder="<?php echo $telepon; ?>"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10"><input type="email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="<?php echo $email; ?>"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Paket</label>
                            <div class="col-sm-10" id="combo_paket">
                            <select class="form-control m-b" name="paket" id="listpaket">
                                <option value="">Pilih Paket</option>
                                <?php if (sizeof($list_paket)>0) {
                                    for ($i=0;$i<sizeof($list_paket);$i++) {
                                    $id         = $list_paket[$i]["id"]; 
                                    $nama_paket = $list_paket[$i]["name_product"]; 
                                ?>
                                <option value="<?php echo $id; ?>" <?php if($id==$id_paket){ echo "selected"; } ?>><?php echo $nama_paket; ?></option>
                            <?php }} ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group" id="combo_tanggal">
                            <label class="col-sm-2 control-label">Tanggal Keberangkatan</label>
                            <div class="col-sm-10">
                            <select class="form-control m-b" name="tglberangkat" id="tglberangkat">
                                <option value='<?php echo $id_paket ?>'><?php echo $start_date; ?></option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jumlah Jamaah</label>
                            <div class="col-sm-10"><input type="number" name="jumlah" value="<?php echo $jml; ?>" class="form-control" placeholder="<?php echo $jml; ?>"></div>
                        </div>
                    <?php } ?>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a href="<?php echo site_url("jamaah/booking/"); ?>" class="btn btn-white">Cancel</a>
                                <button name="tombol_ubahbooking" class="btn btn-primary" value="simpan" type="submit">Booking</button> 
                            </div>
                        </div>						
						</form>
						</div>
					</div>
				</div>
<?php } elseif($site_form=="ubahpaket") { ?>
                <?php
                if (sizeof($booking_byid) > 0) {
                    for ($i = 0; $i < sizeof($booking_byid); $i++) {
                        $nama_kontak = $booking_byid[$i]["nama_kontak"];
                        $telepon = $booking_byid[$i]["telepon"];
                        $email = $booking_byid[$i]["email"];
                        $start_date = $booking_byid[$i]["start_date"];
                        $jml = $booking_byid[$i]["jml"];
                        $id_paket = $booking_byid[$i]["id_paket"];
                        $id_schedule = $booking_byid[$i]["id_schedule"];
                        $kode_booking = $booking_byid[$i]["kode_booking"];
                    }
                ?>
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Ubah Paket</h5>
                        </div>
                        <div class="ibox-content">
						<form method="post" action="<?php echo site_url("jamaah/booking/".$page); ?>" class="form-horizontal">
                        <input type="hidden" name="kode_booking" class="form-control" value="<?php echo $kode_booking ?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Paket</label>
                            <div class="col-sm-10" id="combo_paket">
                            <select class="form-control m-b" name="paket" id="listpaket">
                                <option value="">Pilih Paket</option>
                                <?php if (sizeof($list_paket) > 0) {
                                for ($i = 0; $i < sizeof($list_paket); $i++) {
                                    $id = $list_paket[$i]["id"];
                                    $nama_paket = $list_paket[$i]["name_product"];
                                ?>
                                <option value="<?php echo $id; ?>" <?php if ($id == $id_paket) {echo "selected";}?>><?php echo $nama_paket; ?></option>
                            <?php }}?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group" id="combo_tanggal">
                            <label class="col-sm-2 control-label">Tanggal Keberangkatan</label>
                            <div class="col-sm-10">
                            <select class="form-control m-b" name="tglberangkat" id="tglberangkat">
                                <option value='<?php echo $id_paket ?>'><?php echo $start_date; ?></option>
                            </select>
                            </div>
                        </div>
                    <?php } ?>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a href="<?php echo site_url("jamaah/booking/"); ?>" class="btn btn-white">Cancel</a>
                                <button name="tombol_ubahpaket" class="btn btn-primary" value="simpan" type="submit">Save</button>
                            </div>
                        </div>
						</form>
						</div>
					</div>
				</div>
<?php } elseif($site_form=="ubahkontak") { ?>
                <?php
                if (sizeof($booking_byid) > 0) {
                    for ($i = 0; $i < sizeof($booking_byid); $i++) {
                        $nama_kontak = $booking_byid[$i]["nama_kontak"];
                        $telepon = $booking_byid[$i]["telepon"];
                        $email = $booking_byid[$i]["email"];
                        $start_date = $booking_byid[$i]["start_date"];
                        $jml = $booking_byid[$i]["jml"];
                        $id_paket = $booking_byid[$i]["id_paket"];
                        $id_schedule = $booking_byid[$i]["id_schedule"];
                        $kode_booking = $booking_byid[$i]["kode_booking"];
                    }
                ?>
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Ubah Kontak Person </h5>
                        </div>
                        <div class="ibox-content">
						<form method="post" action="<?php echo site_url("jamaah/booking/" . $page); ?>" class="form-horizontal">
                        <input type="hidden" name="kode_booking" class="form-control" value="<?php echo $kode_booking ?>">
                        <div class="form-group">
							<label class="col-sm-2 control-label">Nama Kontak</label>
                            <div class="col-sm-10"><input type="text" name="nama" value="<?php echo $nama_kontak; ?>" class="form-control" placeholder="<?php echo $nama_kontak; ?>"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">No Telepon</label>
                            <div class="col-sm-10"><input type="text" name="telepon" value="<?php echo $telepon; ?>" class="form-control" placeholder="<?php echo $telepon; ?>"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10"><input type="email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="<?php echo $email; ?>"></div>
                        </div>
                    <?php }?>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a href="<?php echo site_url("jamaah/booking/"); ?>" class="btn btn-white">Cancel</a>
                                <button name="tombol_ubahkontak" class="btn btn-primary" value="simpan" type="submit">Save</button>
                            </div>
                        </div>
						</form>
						</div>
					</div>
				</div>
<?php } elseif($site_form=="inputvisa") { ?>
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Input Data Pasport</h5>
                        </div>
                        <div class="ibox-content">
						<form method="post" action="<?php echo site_url("jamaah/booking/".$page); ?>" class="form-horizontal">
                        <input type="hidden" name="cust_id" class="form-control" value="<?php echo $cust_id; ?>">
                        <div class="form-group">
							<label class="col-sm-2 control-label">Jenis</label>
                            <div class="col-sm-5"><input type="text" name="jenis" class="form-control" placeholder="Jenis / Type"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Kode Negara</label>
                            <div class="col-sm-10"><input type="text" name="kode_negara" class="form-control" placeholder="Kode Negara / Country Code"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">No Paspor</label>
                            <div class="col-sm-10"><input type="text" name="no_paspor" class="form-control" placeholder="No Paspor / Passport No"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Lengkap</label>
                            <div class="col-sm-10"><input type="text" name="nama" class="form-control" placeholder="Nama Lengkap / Full Name"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jenis Kelamin</label>
                            <div class="col-sm-10"><input type="text" name="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin / Sex"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kewarganegaraan</label>
                            <div class="col-sm-10"><input type="text" name="kewarganegaraan" class="form-control" placeholder="Kewarganegaraan / Nationality"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tanggal Lahir</label>
                            <div class="col-sm-5"><input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir / Date of Birth"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tempat Lahir</label>
                            <div class="col-sm-10"><input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir / Place of Birth"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tanggal Pengeluaran</label>
                            <div class="col-sm-5"><input type="date" name="tgl_pengeluaran" class="form-control" placeholder="Tanggal Pengeluaran / Date of Issue"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tanggal Habis Berlaku</label>
                            <div class="col-sm-5"><input type="date" name="tgl_expire" class="form-control" placeholder="Tanggal Habis Berlaku / Date of Expiry"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Reg. No</label>
                            <div class="col-sm-10"><input type="text" name="reg_no" class="form-control" placeholder="Reg. No"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kantor Yang Mengeluarkan</label>
                            <div class="col-sm-10"><input type="text" name="kantor" class="form-control" placeholder="Kantor Yang Mengeluarkan / Issuing Office"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a href="<?php echo site_url("jamaah/booking/"); ?>" class="btn btn-white">Cancel</a>
                                <button name="tombol_inputvisa" class="btn btn-primary" value="simpan" type="submit">Save</button> 
                            </div>
                        </div>						
						</form>
						</div>
					</div>
				</div>
<?php } elseif($site_form=="inputkamar") { ?>
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Input Data Kamar</h5>
                        </div>
                        <div class="ibox-content">
						<form method="post" action="<?php echo site_url("jamaah/booking/".$page); ?>" class="form-horizontal">
                        <input type="hidden" name="kode_booking" class="form-control" value="<?php echo $kode_booking; ?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jenis Kamar</label>
                            <div class="col-sm-10">
                            <select class="form-control m-b" name="room">
                                <option value="">Pilih Kamar</option>
                                <!-- <option value="<?php echo $id; ?>"><?php echo $room_type." - ".$jenis_kasur; ?></option> -->
                                <option value="2">Ber 2</option>
                                <option value="3">Ber 3</option>
                                <option value="4">Ber 4</option>
                                <option value="5">Bayi</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a href="<?php echo site_url("jamaah/booking/"); ?>" class="btn btn-white">Cancel</a>
                                <button name="tombol_inputkamar" class="btn btn-primary" value="simpan" type="submit">Save</button> 
                            </div>
                        </div>						
						</form>
						</div>
					</div>
				</div>
<?php } elseif($site_form=="cekdok") { ?>
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                         <?php
                            $nama = ""; $paspor_id = ""; $foto = "";
                            if (sizeof($status_dokumen)>0) {
                                $nama      = $status_dokumen[0]["nama_lengkap"];
                                $nik       = $status_dokumen[0]["no_ktp"];
                                $tempat_lahir   = $status_dokumen[0]["tempat_lahir"];
                                $tanggal_lahir  = $status_dokumen[0]["tanggal_lahir"];
                                $paspor_id = $status_dokumen[0]["paspor_id"];
                                $foto      = $status_dokumen[0]["foto"];
                                if ($paspor_id == "" && $paspor_id == NULL){
                                    $status_passport = "Belum Lengkap";
                                } else {
                                    $status_passport = "Sudah Lengkap";
                                }
                                if ($foto == "" && $foto == NULL){
                                    $status_foto = "Belum Lengkap";
                                } else {
                                    $status_foto = "Sudah Lengkap";
                                }
                            }
                        ?> 
                                <div class="col-lg-12">
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-title"><h5>Detail Status Dokumen</h5></div>
                                        <div class="ibox-content">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <h3>Nama</h3>
                                                    <p><?php echo $nama ?></p>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h3>No Kartu Tanda Penduduk</h3>
                                                    <p><?php echo $nik ?></p>
                                                </div>	
                                                <div class="col-lg-4">
                                                    <h3>Tempat Tanggal Lahir</h3>
                                                    <p><?php echo $tempat_lahir.", ".$tanggal_lahir; ?></p>
                                                </div>
                                            </div>
 
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Dokumen</th>
                                                        <th>Lengkap  </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php 
                                                        // if (sizeof($data_booking)>0) {
                                                        //     for ($i=0;$i<sizeof($data_booking);$i++) {
                                                        //         $id = $data_booking[$i]["id"];
                                                        //         $cabang = $data_booking[$i]["nama_cabang"];
                                                        //         $nama = $data_booking[$i]["nama_kontak"];
                                                        //         $email = $data_booking[$i]["email"];
                                                        //         $telepon = $data_booking[$i]["telepon"];
                                                        //         $jumlah = $data_booking[$i]["jml"];
                                                        //         $kode = $data_booking[$i]["kode_booking"];
                                                        //         $namapaket = $data_booking[$i]["name_product"];
                                                        //         $tgl_berangkat = $data_booking[$i]["start_date"];
                                                        //         $status = $data_booking[$i]["payment_status"];
                                                        //         if ($status == 0)
                                                        //         {
                                                        //             $status = "Booking";
                                                        //         } else if ($status == 1)
                                                        //         {
                                                        //             $status = "Booked";
                                                        //         }
                                                        //         echo "<tr><td>" . ((($page-1)*$limit)+$i+1) . "</td>"; 
                                                        //         echo "<td>$cabang</td>";
                                                        //         echo "<td>$nama</td>";
                                                        //         echo "<td>$telepon</td>";
                                                        //         echo "<td>$email</td>";
                                                        //         echo "<td>$kode</td>";
                                                        //         echo "<td>$namapaket</td>";
                                                        //         echo "<td>$tgl_berangkat</td>";
                                                        //         echo "<td>$jumlah</td>";
                                                        //         echo "<td>$status</td>";
                                                        //         echo "<td><div class=\"btn-group\"><button data-toggle=\"dropdown\" class=\"btn btn-primary btn-xs dropdown-toggle\">Action ";
                                                        //         echo "<span class=\"caret\"></span></button><ul class=\"dropdown-menu\">";
                                                        //         echo "<li><a href=\"".site_url("jamaah/booking/detail/".$id)."\">Detail</a></li>";
                                                        //         echo "<li><a href=\"".site_url("jamaah/booking/ubah/".$id)."\">Ubah Booking</a></li>";
                                                        //         echo "<li><a href=\"".site_url("jamaah/booking/hapus/".$id)."\">Batal Booking</a></li>";
                                                        //         echo "</ul></div></td>";
                                                        //         echo "</tr>";
                                                        //     }
                                                        // }
                                                    ?>									
                                                        
                                                        <tr>
                                                            <td>1</td> 
                                                            <td><b>Pas Foto Berwarna, Latar Belakang Putih, Fokus Muka 80%</b></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td> 
                                                            <td>Ukuran : 2 x 3 sebanyak 10 lembar </td>
                                                            <td><input type="checkbox" name="" value=""> Ya</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td> 
                                                            <td>Ukuran : 3 x 4 sebanyak 20 lembar </td>
                                                            <td><input type="checkbox" name="" value=""> Ya</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td> 
                                                            <td>Ukuran : 4 x 6 sebanyak 10 lembar </td>
                                                            <td><input type="checkbox" name="" value=""> Ya</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td> 
                                                            <td><b>Foto Copy KTP sebanyak 5 Lembar</b></td>
                                                            <td><input type="checkbox" name="" value=""> Ya</td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td> 
                                                            <td><b>Foto Copy KK sebanyak 5 Lembar</b></td>
                                                            <td><input type="checkbox" name="" value=""> Ya</td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td> 
                                                            <td><b>Foto Copy Surat Nikah sebanyak 5 Lembar</b></td>
                                                            <td><input type="checkbox" name="" value=""> Ya</td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td> 
                                                            <td><b>Foto Copy Paspor sebanyak 5 Lembar</b></td>
                                                            <td><input type="checkbox" name="" value=""> Ya</td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td> 
                                                            <td><b>Mengisi Formulir Pendaftaran</b></td>
                                                            <td><input type="checkbox" name="" value=""> Ya</td>
                                                        </tr>
                                                        <tr>
                                                            <td>7</td> 
                                                            <td><b>Pembayaran Uang Muka (Booking Price) </b></td>
                                                            <td><input type="checkbox" name="" value=""> Ya</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td> 
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                    <div class="form-group">
                                                        <div class="col-sm-12 col-lg-offset-left">
                                                            <a href="<?php echo site_url("jamaah/booking/"); ?>" class="btn btn-white">Cancel</a>
                                                            <button name="tombol_inputkamar" class="btn btn-primary" value="simpan" type="submit">Save</button> 
                                                        </div>
                                                    </div>
                                                </div>
                                                    </div>
                                                </div>                                            
                                            </div>
                                        </div>
                            </div>	
                    </div>
                </div>
<?php } elseif($site_form=="inputfoto") { ?>
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Input Foto Jamaah</h5>
                    </div>
                    <div class="ibox-content">
                    <form method="post" action="<?php echo site_url("jamaah/booking/".$page); ?>" class="form-horizontal">
                    <input type="hidden" name="kode_booking" class="form-control" value="<?php echo $kode_booking; ?>">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Foto Jamaah</label>
                        <div class="col-sm-10">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <span class="btn btn-default btn-file"><span class="fileinput-new">Select file</span>
                            <span class="fileinput-exists">Change</span><input type="file" name="..."/></span>
                            <span class="fileinput-filename"></span>
                            <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">×</a>
                        </div> 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <a href="<?php echo site_url("jamaah/booking/"); ?>" class="btn btn-white">Cancel</a>
                            <button name="tombol_inputkamar" class="btn btn-primary" value="simpan" type="submit">Save</button> 
                        </div>
                    </div>						
                    </form>
                    </div>
                </div>
                </div>
<?php } elseif($site_form=="detailjamaah") {?>
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <?php
                        $nama = ""; $paspor_id = ""; $foto = "";
                        if (sizeof($status_dokumen)>0) {
                            $nama      = $status_dokumen[0]["nama_lengkap"];
                            $paspor_id = $status_dokumen[0]["paspor_id"];
                            $foto      = $status_dokumen[0]["foto"];
                            if ($paspor_id == "" && $paspor_id == NULL){
                                $status_passport = "Belum Lengkap";
                            } else {
                                $status_passport = "Sudah Lengkap";
                            }
                            if ($foto == "" && $foto == NULL){
                                $status_foto = "Belum Lengkap";
                            } else {
                                $status_foto = "Sudah Lengkap";
                            }
                        }
                    ?>
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <div class="ibox-title"><h5>Detail Status Dokumen</h5></div>
                                    <div class="ibox-content">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <h3>Nama</h3>
                                                <p><?php echo $nama ?></p>
                                            </div>
                                            <div class="col-lg-4">
                                                <h3>Paspor</h3>
                                                <p><?php echo $status_passport ?><br><?php if ($paspor_id == "" && $paspor_id == NULL){ echo '<a href="'.site_url("/jamaah/booking/inputvisa/".$cust_id).'">&gt; Tambah Dokumen</a>';}?> </p>
                                            </div>	
                                            <div class="col-lg-4">
                                                <h3>File Foto</h3>
                                                <p><?php echo $status_foto ?><br><?php if ($foto == "" && $foto == NULL){ echo '<a href="'.site_url("/jamaah/booking/inputfoto/".$cust_id).'">&gt; Tambah Dokumen</a>';}?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12"><p>&nbsp;</p></div>
                                        </div>	
                                        <div class="row">
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>                                            
                        </div>
                        </div>	
                </div>
                </div>
<?php } ?>
            </div>
        </div>			