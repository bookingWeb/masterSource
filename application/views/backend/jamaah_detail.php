<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Info Booking Paket</h2>
		<ol class="breadcrumb">
			<li><a href="">Home</a></li>
			<li class="active"><strong>Jamaah</strong></li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<?php
	$nama_paket = ""; $tgl_berangkat = ""; $kode_booking = "";
	$nama_kontak = ""; $telp_kontak = ""; $email_kontak = "";
	if (sizeof($data_booking)>0) {
		$nama_paket = $data_booking[0]["name_product"];
		$tgl_berangkat = $data_booking[0]["start_date"];
		$jml = $data_booking[0]["jml"];
		$nama_kontak = $data_booking[0]["nama_kontak"];
		$telp_kontak = $data_booking[0]["telepon"];
		$email_kontak = $data_booking[0]["email"];
		$kode_booking = $data_booking[0]["kode_booking"];
	}
?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title"><h5>Detail Booking Paket</h5></div>
				<div class="ibox-content">
					<div class="row">
						<div class="col-lg-5">
							<h3>Nama Paket</h3>
							<p><?php echo $nama_paket . "<br>Berangkat : " . $tgl_berangkat; ?><br><a href="<?php echo site_url("/jamaah/booking/ubahpaket/".$bookingid); ?>">&gt; Ganti Paket</a></p>
						</div>	
						<div class="col-lg-5">
							<h3>Kontak Person</h3>
							<p><?php echo $nama_kontak . "<br>" . $telp_kontak . "/" . $email_kontak; ?><br><a href="<?php echo site_url("/jamaah/booking/ubahkontak/".$bookingid); ?>">&gt; Ganti Kontak</a></p>
						</div>	
						<div class="col-lg-2">
							<h3>Kode Booking</h3>
							<h1><?php echo $kode_booking; ?></h1>
						</div>	
					</div>
					<div class="row">
						<div class="col-lg-12"><p>&nbsp;</p></div>
					</div>	
					<div class="row">
					
						<div class="col-lg-12">
                            <div class="row">
								<div class="col-sm-6"><h3>Daftar Jamaah</h3></div>
                                <div class="col-sm-6 text-right">
								<?php if ($jml_jamaah["jumlah"] < $jml) { ?>
									<a href="<?php echo site_url("jamaah/booking/jamaah/new/".$bookingid); ?>" class="btn btn-sm btn-primary"> Tambah Jamaah </a>
								<?php } ?>
								
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama </th>
                                        <th>NIK</th>
                                        <th>Pasport</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Status Dokumen</th>
                                        <th>Kamar</th>
                                        <th>Biaya</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
							<?php 
								$total = 0;
								$biaya = 0;

							if (sizeof($data_jamaah)>0) {
								
								for ($i=0;$i<sizeof($data_jamaah);$i++) {
									$productorder_id= $data_jamaah[$i]["productorder_id"];
									$id_prod 		= $data_jamaah[$i]["id_prod"];
									$cust_id 		= $data_jamaah[$i]["cust_id"];
									$no_ktp 		= $data_jamaah[$i]["no_ktp"];
									$nama_lengkap 	= $data_jamaah[$i]["nama_lengkap"];
									$jenis_kelamin 	= $data_jamaah[$i]["jenis_kelamin"];
									$status_pasport = $data_jamaah[$i]["paspor_id"];
									$no_pasport 	= $data_jamaah[$i]["no_paspor"];
									$kamar 			= $data_jamaah[$i]["id_room"];
									$room_type 		= $data_jamaah[$i]["room_type"];
									$jenis_kasur 	= $data_jamaah[$i]["jenis_kasur"];
									$status_dok 	= "";
									$biaya 			= $data_jamaah[$i]["biaya_paket"];
									$total += $biaya;
									
									if($jenis_kelamin=="1"){$jenis_kelamin = "Laki-Laki";}
									else{$jenis_kelamin = "Perempuan";}
							 		
							?> 
			 
							<tr><td><?php echo ($i+1); ?></td>
							<td><?php echo $nama_lengkap; ?></td>
							<td><?php echo $no_ktp; ?></td>
							<td><?php if($status_pasport==""){ echo '<a href="'.site_url("jamaah/booking/inputvisa/".$cust_id).'">Pasport Belum Ada </a>'; } else { echo $no_pasport; } ?></td>
							<td><?php echo $jenis_kelamin; ?></td>
							<td><?php if($status_dok==""){ echo '<a href="'.site_url("jamaah/booking/cekdok/".$cust_id).'">Belum Lengkap </a>'; } else { echo "Sudah Lengkap"; } ?></td>
							<td><?php if($kamar==0||$kamar==""){ echo '<a href="'.site_url("jamaah/booking/inputkamar/".$id_prod."/".$kode_booking).'">Kamar belum di pilih </a>'; } else { echo $room_type." - ".$jenis_kasur; } ?></td>
							<td><?php echo "Rp. " . number_format($biaya); ?></td>
							<td>
								<div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
										<li><a href="<?php echo site_url("keuangan/bayar/detail/".$bookingid); ?>">Pembayaran</a></li>
                                        <li><a href="<?php echo site_url("jamaah/booking/jamaah/detail/".$cust_id); ?>">Detail Jamaah</a></li>
                                        <li><a href="<?php echo site_url("jamaah/booking/jamaah/ubah/".$cust_id); ?>">Ubah Data Jamaah</a></li>
                                        <li><a href="<?php echo site_url("jamaah/booking/jamaah/hapus/".$cust_id); ?>">Hapus</a></li>
                                    </ul>
                                </div>
							</td>
							</tr>
													
							<?php } 
							
	echo "<tr><td colspan=7>&nbsp;</td><td>Rp. ".number_format($total)."</td><td>&nbsp;</td></tr>";						
							
							} ?>
                                    </tbody>
                                </table>
                            </div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-lg-12">
			<div class="row">
			<div class="col-lg-6">
			<div class="ibox float-e-margins">
				<div class="ibox-title"><h5>Rincian Paket</h5></div>
				<div class="ibox-content">
                    <div class="table-responsive">
                    <table class="table table-striped">
                    <tbody>
					<tr><td>Pesawat</td><td class="text-right">Garuda</td></tr>	
					<tr><td>Hotel</td><td></td></tr>	
					</tbody>
					</table>
					</div>
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

						$total2 = 0;
						$amount = 0;

							if (sizeof($history_payment)>0) {

								for ($i=0;$i<sizeof($history_payment);$i++) {
									$amount			= $history_payment[$i]["amount"];
									$payment_date 	= $history_payment[$i]["payment_date"];
									$total2			+= $amount;
								?>			
                    
						<tr>
							<td><?php echo $payment_date; ?></td>
							<td></td>
							<td class="text-right">Rp. <?php echo number_format($amount); ?></td>
						</tr>
							<?php }} ?>
						<tr><td colspan=2 class="text-right">Total</td><td class="text-right">Rp. <?php echo number_format($total2); ?> </td></tr>	
						<tr><td colspan=2 class="text-right">Kurang Bayar</td><td class="text-right">Rp. <?php echo number_format($total - $total2); ?></td></tr>	
					</tbody>
					</table>
					</div>
				</div>
			</div>
			</div>
			
			</div>
		</div>		
                	
	</div>
</div>		