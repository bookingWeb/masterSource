            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Paket Perjalanan <?php echo $tipe_paket; ?></h2>
                    <ol class="breadcrumb">
                        <li><a href="">Paket</a></li>
                        <li><?php echo $tipe_paket; ?></li>
                        <li class="active"><strong>Schedule</strong></li>
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
                            <h5>Tambah Schedule Perjalanan <?php echo $tipe_paket; ?></h5>
                        </div>
                        <div class="ibox-content">
						<form method="post" action="http://erp.umrohnesia.id/jamaah/booking/new" class="form-horizontal"> 
                        <div class="form-group">
							<label class="col-sm-2 control-label">Nama Paket Perjalanan <?php echo $tipe_paket; ?></label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="airlines">
                                    <option>Paket Perjalanan Haji Bronze - 20 Hari</option>
                                    <option>Paket Perjalanan Haji Silver - 20 Hari</option>
                                    <option>Paket Perjalanan Haji Gold - 20 Hari</option>
                                    <option>Paket Perjalanan Haji Reguler</option>
                                    <option>Paket Perjalanan Haji Premium</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
							<label class="col-sm-2 control-label">Jumlah Hari</label>
                            <div class="col-sm-10"><input type="text" name="jumlah" class="form-control" placeholder="Durasi Hari"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Tanggal Berangkat</label>
                            <div class="col-sm-4"><input type="text" name="telepon" class="form-control" placeholder="Tanggal Berangkat"></div>
                            <label class="col-sm-2 control-label">Tanggal Pulang</label>
                            <div class="col-sm-4"><input type="text" name="email" class="form-control" placeholder="Tanggal Pulang"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Air Lines</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="airlines">
                                    <option>Al Anwa Aviation</option>
                                    <option>ASACO</option>
                                    <option>Dallah Avco</option>
                                    <option>Mid East Jet</option>
                                    <option>Nas Air</option>
                                    <option>Saudi Arabian Airlines</option>
                                    <option>SNAS Aviation</option>
                                </select>
                            </div>
                        </div>                        
                        <div class="form-group">
							<label class="col-sm-2 control-label">Hotel di Makkah</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="account">
                                    <option>Firdous Al Umrah Hotel</option>
                                    <option>Al Safwah Towers Hotel – Dar Al Ghufran</option>
                                    <option>Al Thuria Hotel</option>
                                    <option>Arak Ajyad Hotel</option>
                                    <option>Makkah Millennium Hotel</option>
                                    <option>Swissôtel Makkah</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Hotel di Madinah</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="account">
                                    <option>Anwar Al Madinah Mövenpick</option>
                                    <option>Pullman Zamzam Madina</option>
                                    <option>Province Al Sham Hotel</option>
                                    <option>Madinah Hilton Hotel</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Hotel di Jeddah</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="account">
                                    <option>Lafontaine Jeddah Hotel</option>
                                    <option>Jeddah Gulf</option>
                                    <option>Centro Shaheen Jeddah by Rotana</option>
                                    <option>Dyar Residence</option>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Mata Uang</label>
                            <div class="col-sm-4">
                                <select class="form-control m-b" name="account">
                                    <option>USD</option>
                                    <option>IDR</option>
                                </select>
                            </div>
                            <label class="col-sm-2 control-label">Booking Price</label>
                            <div class="col-sm-4"><input type="text" name="jumlah" class="form-control" placeholder="Booking Price"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Single</label>
                            <div class="col-sm-4"><input type="text" name="jumlah" class="form-control" placeholder="Single"></div>
                            <label class="col-sm-2 control-label">Margin Single</label>
                            <div class="col-sm-4"><input type="text" name="jumlah" class="form-control" placeholder="Margin Single"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Double</label>
                            <div class="col-sm-4"><input type="text" name="jumlah" class="form-control" placeholder="Double"></div>
                            <label class="col-sm-2 control-label">Margin Double</label>
                            <div class="col-sm-4"><input type="text" name="jumlah" class="form-control" placeholder="Margin Double"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Triple</label>
                            <div class="col-sm-4"><input type="text" name="jumlah" class="form-control" placeholder="Triple"></div>
                            <label class="col-sm-2 control-label">Margin Triple</label>
                            <div class="col-sm-4"><input type="text" name="jumlah" class="form-control" placeholder="Margin Triple"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Quad</label>
                            <div class="col-sm-4"><input type="text" name="jumlah" class="form-control" placeholder="Quad"></div>
                            <label class="col-sm-2 control-label">Margin Quad</label>
                            <div class="col-sm-4"><input type="text" name="jumlah" class="form-control" placeholder="Margin Quad"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Include Tax</label>
                            <div class="col-sm-10"><input type="text" name="jumlah" class="form-control" placeholder="Include Tax"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a href="http://erp.umrohnesia.id/paket/haji/" class="btn btn-white">Cancel</a>
                                <button name="tombol" class="btn btn-primary" value="simpan" type="submit">Save</button> 
                            </div>
                        </div>						
						</form>
						</div>
					</div>
				</div>
            </div>
        </div>	
	