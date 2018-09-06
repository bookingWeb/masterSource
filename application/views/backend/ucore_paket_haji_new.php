            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Paket Perjalanan <?php echo $tipe_paket; ?></h2>
                    <ol class="breadcrumb">
                        <li><a href="">Paket</a></li>
                        <li><?php echo $tipe_paket; ?></li>
                        <li class="active"><strong>Tambah</strong></li>
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
                            <h5>Tambah Paket <?php echo $tipe_paket; ?></h5>
                        </div>
                        <div class="ibox-content">
						<form method="post" action="<?php echo site_url()."paket/haji/"; ?>" class="form-horizontal"> 
                        <div class="form-group">
							<label class="col-sm-2 control-label">Nama Paket Haji</label>
                            <div class="col-sm-10"><input type="text" name="telepon" class="form-control" placeholder="Nama Paket Haji"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Deskripsi</label>
                            <div class="col-sm-10"><input type="text" name="telepon" class="form-control" placeholder="Deskripsi"></div>
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
	