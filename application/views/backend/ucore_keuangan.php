<?php if ($site_form=="list_pembayaran") { ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Daftar Pembayaran</h2>
                    <ol class="breadcrumb">
                        <li><a href="#">Keuangan</a></li>
                        <li class="active"><strong>Pembayaran Jamaah</strong></li>
                    </ol>
                </div>
                <div class="col-lg-2">
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title"><h5>Daftar Pembayaran Paket Perjalanan Jamaah</h5></div>
                            <div class="ibox-content">
                                <div class="row">
                                     <div class="col-sm-2 m-b-xs">
                                        <a href="<?php echo site_url("keuangan/bayar/tambah"); ?>" class="btn btn-sm btn-primary"> Tambah Pembayaran</a> 
                                    </div>
                                    <div class="col-sm-5"></div>
                                    <div class="col-sm-3"></div> 
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Kode Booking</th>
                                            <th>Kontak Person</th>
                                            <th>Paket Perjalanan</th>
                                            <th>Nominal</th>
                                            <th>Status</th>
                                            <th>Aksi </th>
                                        </tr>
                                        </thead>
                                        <tbody>
<?php 
	if (sizeof($data_payment)>0) {
		for ($i=0;$i<sizeof($data_payment);$i++) {
			$id = $data_payment[$i]["id"];
			$tanggal = $data_payment[$i]["payment_date"];
			$amount = $data_payment[$i]["amount"];
			$payment_status = $data_payment[$i]["payment_status"];
			$rekening_id = $data_payment[$i]["rekening_id"];
			$keterangan = $data_payment[$i]["keterangan"];
			$kode_booking = $data_payment[$i]["kode_booking"];
			$name_product = $data_payment[$i]["name_product"];
			$tglmulai = $data_payment[$i]["start_date"];
			$tglselesai = $data_payment[$i]["end_date"];
			$nama = $data_payment[$i]["nama_kontak"];
			$email = $data_payment[$i]["email"];
			$telepon = $data_payment[$i]["telepon"];

			if ($payment_status == 0) {
				$status = "Belum Bayar";
			} else if ($payment_status == 1) {
				$status = "Lunas";
			} else if ($payment_status == 2) {
                $status = "Belum Lunas";
            } else if ($payment_status == 3) {
                $status = "Refund";
            }
			
			echo "<tr><td>" . ($i+1) . "</td>"; 
			echo "<td>$tanggal</td>";
			echo "<td>$kode_booking</td>";
			echo "<td>$nama<br>$email<br>$telepon</td>";
			echo "<td>$name_product $tglmulai $tglselesai</td>";
			echo "<td>Rp. ".number_format($amount)."</td>";
			echo "<td>$status</td>";
			echo "<td><div class=\"btn-group\"><button data-toggle=\"dropdown\" class=\"btn btn-primary btn-xs dropdown-toggle\">Action ";
			echo "<span class=\"caret\"></span></button><ul class=\"dropdown-menu\">";
			echo "<li><a href=\"".site_url("keuangan/bayar/".$id)."\">Detail</a></li>";
			echo "</ul></div></td>";
			echo "</tr>";
		}
	}
?>	
                                        </tbody>
                                    </table>
                                </div>
                                <?php
                               /* $jmldata = 0;
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
                                } */
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>	
		
<?php } else if ($site_form=="detail_pembayaran") { ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Detail Pembayaran</h2>
                    <ol class="breadcrumb">
                        <li><a href="#">Keuangan</a></li>
                        <li class="active"><strong>Detail Pembayaran</strong></li>
                    </ol>
                </div>
                <div class="col-lg-2">
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title"><h5>Detail Pembayaran</h5></div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h3>Nama Paket</h3>
                                    <p><?php echo $paket_booking["name_product"]; ?></p>
                                </div>	
                                <div class="col-lg-2">
                                    <h3>Kode Booking</h3>
                                    <h1><?php echo $paket_booking["kode_booking"]; ?></h1>
                                </div>	
                            </div>
                            <div class="row">
                                <div class="col-lg-12"><p>&nbsp;</p></div>
                            </div>	
                            <div class="row">
                            
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-sm-6"><h3>History Pembayaran</h3></div>
                                        <div class="col-sm-6 text-right">
                                        <a href="<?php echo site_url("keuangan/bayar/setor/".$bookingid); ?>" class="btn btn-sm btn-primary"> Bayar </a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Waktu Transfer</th>
                                                <th>No Transaksi </th>
                                                <th>Nominal Bayar</th>
                                                <th>Tipe Pembayaran</th>
                                                <th>Bank</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Aksi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                    <?php if ($history_payment > 0) {
                                        $amount = "";
                                        $bukti_bayar = "";
                                        $payment_date = "";
                                        $payment_status = "";
                                        $payment_date = "";
                                        $chanel_bayar = "";
                                        $prod_order_id = "";
                                        $rekening_id = "";
                                        $keterangan = "";
                                        $total = 0;
                                        for ($i=0;$i<sizeof($history_payment);$i++) {
                                            $id             = $history_payment[$i]["id_payment"];
                                            $amount			= $history_payment[$i]["amount"];
                                            $bukti_bayar    = $history_payment[$i]["bukti_bayar"];
                                            $payment_status = $history_payment[$i]["payment_status"];
                                            $payment_date 	= $history_payment[$i]["payment_date"];
                                            $chanel_bayar   = $history_payment[$i]["chanel_bayar"];
                                            $prod_order_id  = $history_payment[$i]["prod_order_id"];
                                            $rekening_id    = $history_payment[$i]["rekening_id"];
                                            $keterangan     = $history_payment[$i]["keterangan"];
                                            $total          += $amount;
                                    ?>
                                    
                    
                                    <tr>
                                        <td><?php echo ($i+1); ?></td>
                                        <td><?php echo $payment_date; ?></td>
                                        <td>TRF123331</td>
                                        <td>Rp. <?php echo number_format($amount); ?></td>
                                        <td><?php if ($chanel_bayar == 1) {
                                                echo "Cash";
                                            } 
                                            if ($chanel_bayar == 2) {
                                                echo "Transfer";
                                            } ?>
                                        </td>
                                        <td></td>
                                        <td><?php if ($payment_status == 0){
                                                echo "Belum Bayar";
                                            } if ($payment_status == 1) {
                                                echo "Sudah Bayar";
                                            } ?></td>
                                        <td>Rp. <?php echo number_format($total); ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?php echo site_url("keuangan/bayar/confirm/".$id); ?>">Konfirmasi Pembayaran</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    </tr>
                                    <?php } } ?>
                                            </tbody>
                                        </table>
                                    <div class="col-lg-8">
                                    </div>
                                    <div class="col-lg-2">
                                        <h3>Total Bayar</h3>
                                        <p>Rp. <?php echo number_format($paket_booking["total_bayar"]); ?></a></p>
                                        </div>
                                        <div class="col-lg-2">
                                        <h3>Sisa Pembayaran</h3>
                                        <p>Rp. <?php echo number_format($paket_booking["total_bayar"] - $total); ?></a></p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
<?php } else if ($site_form=="form_setor") { ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Setoran Pembayaran</h2>
                    <ol class="breadcrumb">
                        <li><a href="#">Keuangan</a></li>
                        <li class="active"><strong>Setoran Pembayaran</strong></li>
                    </ol>
                </div>
                <div class="col-lg-2">
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
<?php if ($kodebooking=="") { ?>
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Setoran Pembayaran Paket Perjalanan Jamaah</h5>
                        </div>
                        <div class="ibox-content">
<?php if ($pesan!="") { echo "<div class=\"alert alert-danger\">$pesan</div>"; } ?>						
						<form method="post" action="<?php echo site_url("keuangan/bayar/tambah/"); ?>" class="form-horizontal">
                        <div class="form-group">
							<label class="col-sm-2 control-label">Kode Booking</label>
                            <div class="col-sm-4"><input type="text" name="kode" class="form-control" placeholder="Kode Booking" value="<?php echo $kode; ?>"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a href="<?php echo site_url("keuangan/bayar/") ?>" class="btn btn-white">Cancel</a>
                                <button name="tombol" class="btn btn-primary" value="cari" type="submit">Cari</button> 
                            </div>
                        </div>						
						</form>
						</div>
					</div>
				</div>				
<?php } else { 

$nama_paket = ""; $tgl_berangkat = ""; $tgl_pulang = ""; $nama_kontak = ""; $telp_kontak = ""; $email_kontak = ""; $payment_status = 0;
// $nilai = 100;
if (sizeof($data_booking)>0) {
	$nama_paket = $data_booking[0]["name_product"];
	$tgl_berangkat = $data_booking[0]["start_date"];
	$nama_kontak = $data_booking[0]["nama_kontak"];
	$telp_kontak = $data_booking[0]["telepon"];
	$email_kontak = $data_booking[0]["email"];
    $payment_status = $data_booking[0]["payment_status"];
    $nilai = $data_booking[0]["total_bayar"];
}

?>

		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title"><h5>Informasi Booking Paket Perjalanan Jamaah</h5></div>
				<div class="ibox-content">
					<div class="row">
						<div class="col-lg-3">
							<h3>Nama Paket</h3>
							<p><?php echo $nama_paket . "<br>Berangkat : " . $tgl_berangkat; ?></p>
						</div>	
						<div class="col-lg-3">
							<h3>Kontak Person</h3>
							<p><?php echo $nama_kontak . "<br>" . $telp_kontak . "<br>" . $email_kontak; ?></p>
						</div>
						<div class="col-lg-3">
							<h3>Kode Booking</h3>
							<h1><?php echo $kodebooking; ?></h1>
						</div>	
						<div class="col-lg-3">
							<h3>Total Tagihan</h3>
							<h1>Rp. <?php echo number_format($nilai); ?></h1>
							<p>Status : <?php if ($payment_status==1) {echo "Lunas";} else {echo "Belum Lunas";} ?> </p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-lg-12">
			<div class="row">
			<div class="col-lg-6">
			<div class="ibox float-e-margins">
				<div class="ibox-title"><h5>Form Pembayaran</h5></div>
				<div class="ibox-content">
					<form method="post" class="form-horizontal" action="<?php echo site_url("keuangan/bayar/tambah/".$kodebooking); ?>">
					<div class="form-group">
						<label class="col-sm-2 control-label">Metode Pembayaran</label>
						<div class="col-sm-10">
							<select class="form-control m-b" name="metode">
								<option>Pilih Metode Pembayaran</option>
								<option value="1">Cash</option>
								<option value="2">Transfer</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Rekening Bank</label>
						<div class="col-sm-10">
							<select class="form-control m-b" name="rekening">
<?php 
	if (sizeof($data_rekening)>0) {
		for ($i=0;$i<sizeof($data_rekening);$i++) {
			$id = $data_rekening[$i]["id"];
			$bank = $data_rekening[$i]["nama_bank"];
			$norek = $data_rekening[$i]["no_rekening"];
			$namarek = $data_rekening[$i]["pemilik_rekening"];
			
			echo "<option value=".$id.">".$bank." - ".$norek." an : ".$namarek."</option>";
		}
	}
?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Nominal Pembayaran</label>
						<div class="col-sm-10"><input type="text" class="form-control" name="nominal"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Keterangan</label>
						<div class="col-sm-10"><input type="text" class="form-control" name="keterangan"></div>
					</div>
					<div class="hr-line-dashed"></div>
					<div class="form-group">
						<div class="col-sm-4 col-sm-offset-2">
							<a href="<?php echo site_url("keuangan/bayar/") ?>" class="btn btn-white">Cancel</a>
							<button class="btn btn-primary" type="submit" name="tombol" value="bayar">Bayar</button>
						</div>
					</div>
					</form>
				</div>
			</div>
			</div>
			<div class="col-lg-6">
			<div class="ibox float-e-margins">
				<div class="ibox-title"><h5>Rincian Pembayaran</h5></div>
				<div class="ibox-content">
                    <div class="table-responsive">
                    <table class="table table-striped">
                    <thead>
                    	<tr>
							<th>Tanggal</th>
							<th>Keterangan</th>
							<th>Nilai</th>
						</tr>
                    </thead>
					<tbody>
<?php 

$total = 0; $total2 = $nilai;
if (sizeof($data_payment)>0) {
	for ($i=0;$i<sizeof($data_payment);$i++) {
		$tanggal 	= $data_payment[$i]["payment_date"];
		$keterangan = $data_payment[$i]["keterangan"];
		$amount		= $data_payment[$i]["amount"];
		$total		+= $amount;
		
		echo "<tr><td>" . $tanggal . "</td><td>".$keterangan."</td><td class=\"text-right\">Rp. ".number_format($amount)."</td></tr>";
	}
}
 ?>
						<tr><td colspan=2 class="text-right"><b>Total Bayar</b></td><td class="text-right">Rp. <?php echo number_format($total_bayar['total_bayar']); ?> </td></tr>
                        <tr><td colspan=2 class="text-right"><b>Total Refund</b></td><td class="text-right">Rp. <?php echo number_format($total_refund['total_refund']); ?> </td></tr>
                        <tr><td colspan=2 class="text-right"><b>Total Saldo</b></td><td class="text-right">Rp. <?php echo number_format($total_saldo); ?> </td></tr>
						<tr><td colspan=2 class="text-right"><b>Kurang Bayar</b></td><td class="text-right">Rp. <?php echo number_format($nilai - $total_saldo); ?></td></tr>	
					</tbody>
					</table>
					</div>
				</div>
			</div>
			</div>
			
			</div>
		</div>		
       
<?php } ?>				
            </div>

<?php } if ($site_form == "confirm_payment") { ?>
            <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-12">
                <h2>Upload bukti pembayaran</h2>
                <ol class="breadcrumb">
                    <li><a href="index.html">Keuangan</a></li>
                    <li><a href="#">Bayar</a></li>
                    <li class="active"><strong>Upload</strong></li>
                </ol>
            </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Form Setor</h5>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-lg-10">
                    <h3>Upload Bukti Pembayaran</h3>
                    <p><?php echo $paket_booking["name_product"]; ?></p>
                </div>	
                <div class="col-lg-2">
                    <h3>Kode Booking</h3>
                    <h1><?php echo $paket_booking["kode_booking"]; ?></h1>
                </div>	
            </div>
        </div>
            <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <form action="#" class="dropzone" id="dropzoneForm">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>
                                </form>
                            </div>
                                <div class="col-sm-4">
                                    <a href="http://erp.umrohnesia.id/produk/pesawat/" class="btn btn-white">Cancel</a>
                                    <button name="tombol" class="btn btn-primary" value="simpan" type="submit">Save</button> 
                                </div>
                            
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
</div>
        <?php } ?>