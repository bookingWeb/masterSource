<?php if ($site_form =="form") { ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Refund Pembayaran</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Keuangan</a></li>
                        <li class="active"><strong>Refund Pembayaran</strong></li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
			
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title"><h5>Refund Booking Pembayaran Paket Perjalanan Jamaah</h5></div>
                        <div class="ibox-content">
                            <?php if ($pesan!="") { echo "<div class=\"alert alert-danger\">$pesan</div>"; } ?>						
                            <form method="post" action="<?php echo site_url("keuangan/refund/"); ?>" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kode Booking</label>
                                <div class="col-sm-4"><input type="text" name="kode" class="form-control" placeholder="Kode Booking"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <a href="<?php echo site_url("keuangan/refund/") ?>" class="btn btn-white">Cancel</a>
                                    <button name="tombol" class="btn btn-primary" value="cari" type="submit">Cari</button> 
                                </div>
                            </div>						
                            </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
			
<?php } if ($site_form == "list_history_payment") { ?>
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
                                <div class="col-lg-4">
                                    <h3>Nama Paket</h3>
                                    <p><?php echo $history_payment[0]["name_product"]; ?></p>
                                </div>
                                <div class="col-lg-2">
                                    <h3>Total Bayar</h3>
                                    <p>Rp. <?php echo number_format($total_bayar['total_bayar']); ?> </a></p>
                                </div>
                                <div class="col-lg-2">
                                    <h3>Total Refund</h3>
                                    <p>Rp. <?php echo number_format($total_refund['total_refund']); ?> </a></p>
                                </div>
                                <div class="col-lg-2">
                                    <h3>Total Saldo</h3>
                                    <p>Rp. <?php echo number_format($total_saldo); ?> </a></p>
                                </div>
                                <div class="col-lg-2">
                                    <h3>Kode Booking</h3>
                                    <h1><?php echo $history_payment[0]["kode_booking"]; ?></h1>
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
                                        <a href="<?php echo site_url("keuangan/refund/tambah/".$prod_order_id."/"); ?>" class="btn btn-sm btn-primary"> Refund </a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Waktu Bayar</th>
                                                <th>Tipe Pembayaran</th>
                                                <th>Bank</th>
                                                <th>Bayar</th>
                                                <th>Refund</th>

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
                                            $id             = $history_payment[$i]["id"];
                                            $amount			= $history_payment[$i]["amount"];
                                            $payment_status = $history_payment[$i]["payment_status"];
                                            $payment_date 	= $history_payment[$i]["payment_date"];
                                            $chanel_bayar   = $history_payment[$i]["chanel_bayar"];
                                            $prod_order_id  = $history_payment[$i]["prod_order_id"];
                                            $rekening_id    = $history_payment[$i]["rekening_id"];
                                            $keterangan     = $history_payment[$i]["keterangan"];
                                            $kode_bank      = $history_payment[$i]["kode"];
                                            $nama_bank      = $history_payment[$i]["nama_bank"];
                                            $no_rekening        = $history_payment[$i]["no_rekening"];
                                            $pemilik_rekening   = $history_payment[$i]["pemilik_rekening"];
                                            $trans_type     = $history_payment[$i]["trans_type"];
                                            $total          += $amount;
                                    ?>
                                    
                    
                                    <tr>
                                        <td><?php echo ($i+1); ?></td>
                                        <td><?php echo $payment_date; ?></td>
                                        <td><?php if ($chanel_bayar == 1) {
                                                echo "Cash";
                                            } 
                                            elseif ($chanel_bayar == 2) {
                                                echo "Transfer";
                                            } else { echo "Refund"; }?>
                                        </td>
                                        <?php if ($chanel_bayar == 2 ) { ?>
                                            <td><?php echo "(".$kode_bank.") ".$nama_bank." - ".$no_rekening." ".$pemilik_rekening; ?></td>
                                        <?php } elseif($chanel_bayar == 1) { ?>
                                            <td>Pembayaran Cash</td>
                                        <?php } else { ?>
                                            <td>Refund</td>
                                        <?php } ?>
                                        <?php if ($trans_type == 1){ ?>
                                            <td>Rp. <?php echo number_format($amount); ?></td>
                                        <?php } elseif ($trans_type == 2) { ?>
                                            <td>Refund</td>
                                        <?php } else { ?>
                                            <td></td>
                                        <?php } ?>
                                        <?php if ($trans_type == 2){ ?>
                                            <td>Rp. <?php echo number_format($amount); ?></td>
                                        <?php } elseif ($trans_type == 1 || $trans_type == "" || $trans_type == NULL) { ?>
                                            <td></td>
                                        <?php } ?>
                                    </tr>
                                    <?php } } ?>
                                            </tbody>
                                        </table>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
<?php } if ($site_form == "form_refund") { ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Refund Pembayaran</h2>
                    <ol class="breadcrumb">
                        <li><a href="#">Keuangan</a></li>
                        <li class="active"><strong>Refund Pembayaran</strong></li>
                    </ol>
                </div>
                <div class="col-lg-2">
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title"><h5>Form Refund</h5></div>
                            <div class="ibox-content">
                                <form method="post" class="form-horizontal" action="<?php echo site_url("keuangan/refund/tambah/") ?>">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nominal Refund</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="nominal"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Keterangan</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" name="keterangan"></div>
                                </div>
                                <input type="hidden" class="form-control" name="prod_order_id" value="<?php echo $prod_order_id; ?>">

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <a href="<?php echo site_url("keuangan/refund") ?>" class="btn btn-white">Cancel</a>
                                        <button class="btn btn-primary" type="submit" name="tombol" value="bayar">Refund</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
<? } ?>	