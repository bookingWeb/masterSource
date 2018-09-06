<?php 
$total_jamaah = 0;
$total_bayar = 0;
$total_belumbayar = 0;
if (sizeof($data_jamaah)>0) {
	for ($i=0;$i<sizeof($data_jamaah);$i++) {
		$status = $data_jamaah[$i]["payment_status"];
		$jumlah = $data_jamaah[$i]["jumlah"];
		
		if ($status==0) { $total_belumbayar = $jumlah; }
		if ($status==1) { $total_bayar = $jumlah; }
	}
}
$total_jamaah = $total_bayar + $total_belumbayar;
?>
        <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Jumlah Jamaah</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo $total_jamaah; ?></h1>
                        <small>Total Tahun <?php echo $tahun; ?></small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Status Pembayaran</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo $total_bayar; ?></h1> 
                        <small>New orders</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Info Kurs</h5>
                    </div>
                    <div class="ibox-content">
<?php
	$xkurs_usdidr = "0";
	if ($kurs_usdidr!="") {
		$jkurs_usdidr = json_decode($kurs_usdidr);
		$xkurs_usdidr = $jkurs_usdidr->USD_IDR->val;
	}
	$xkurs_saridr = "0";
	if ($kurs_saridr!="") {
		$jkurs_saridr = json_decode($kurs_saridr);
		$xkurs_saridr = $jkurs_saridr->SAR_IDR->val;
	}	
?>					
                        <h2 class="no-margins">USD IDR : <?php echo number_format($xkurs_usdidr);?></h2>
                        <h2 class="no-margins">SAR IDR : <?php echo number_format($xkurs_saridr);?></h2>
						<small><?php echo date("d M Y H:i:s"); ?></small> 
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

        <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Informasi Keberangkatan </h5>
        </div>
        <div class="ibox-content">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Paket </th>
                        <th>Tgl Berangkat</th>
                        <th>No Flight</th>
                        <th>Quota </th>
                        <th>Sisa Quota</th>
                        <th>Harga</th>
                    </tr>
                    </thead>
                    <tbody>
<?php 
	if (sizeof($data_jadwal)>0) {
		for ($i=0;$i<sizeof($data_jadwal);$i++) {
			$id = $data_jadwal[$i]["id"];
			$nama = $data_jadwal[$i]["name_product"];
			$tanggal = $data_jadwal[$i]["start_date"];
			$noflight = $data_jadwal[$i]["no_flight"];
			$quota = $data_jadwal[$i]["quota"];
			$booked = $data_jadwal[$i]["booked"];
			$matauang = $data_jadwal[$i]["mata_uang"];
			$harga = $data_jadwal[$i]["price4"]; 
			
			echo "<tr><td>".($i+1)."</td><td>".$nama."</td><td>".$tanggal."</td><td>".$noflight."</td><td>".$quota."</td><td>".$booked."</td><td>".$matauang." ".number_format($harga)."</td></tr>";
		}
	} else {
		echo "<tr><td colspan=7>Belum ada jadwal</tr>";
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


