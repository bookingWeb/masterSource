		
        <?php if ($site_form=="list_travel") { ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Data Travel</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Setting</a></li>
                        <li class="active"><strong>Travel</strong></li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
			
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title"><h5>Daftar Travel</h5></div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-sm-2 m-b-xs">
                                        <a href="<?php echo site_url("setting/travel/new"); ?>" class="btn btn-sm btn-primary"> Tambah Travel</a> 
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
                                            <th>Nama Travel</th>
                                            <th>Nama Perusahaan</th>
                                            <th>Telp </th>
                                            <th>Fax </th>
                                            <th>No Ijin Haji </th>
                                            <th>No Ijin Umroh </th>
                                            <th>Aksi </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Raudah Wisata</td>
                                            <td>PT. Raudah Eksati Utama</td>
                                            <td>021-392 4321/4311</td>
                                            <td>021-310 6178</td>
                                            <td>D/519</td>
                                            <td>D/310 TAHUN 2011</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="<?php echo site_url("setting/travel/detail/") ?>">Detail Travel</a></li>
                                                        <li><a href="#">Ubah Travel</a></li>
                                                        <li><a href="#">Hapus</a></li>
                                                    </ul>
                                                </div>    
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Patuna Tour & Travel</td>
                                            <td>PT PATUNA MEKAR JAYA</td>
                                            <td>0217228830</td>
                                            <td>0217255411</td>
                                            <td>D/530</td>
                                            <td>D/340 TAHUN 2013</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="<?php echo site_url("setting/travel/detail/") ?>">Detail Travel</a></li>
                                                        <li><a href="#">Ubah Travel</a></li>
                                                        <li><a href="#">Hapus</a></li>
                                                    </ul>
                                                </div>    
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        
        <?php } if ($site_form=="form_travel") { ?> 
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Tambah Travel</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Setting</a></li>
                        <li><a href="index.html">Travel</a></li>
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
                            <h5>Tambah Travel</h5>
                        </div>
                        <div class="ibox-content">
						<form method="post" action="#" class="form-horizontal">
                        <div class="form-group">
							<label class="col-sm-2 control-label">Nama Agent</label>
                            <div class="col-sm-5"><input type="text" name="telepon" class="form-control" placeholder="Nama Agent"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Nama Perusahaan</label>
                            <div class="col-sm-10"><input type="text" name="telepon" class="form-control" placeholder="Nama Perusahaan"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-10"><input type="text" name="telepon" class="form-control" placeholder="Phone"></div>
                        </div>
                         <div class="form-group">
							<label class="col-sm-2 control-label">Fax</label>
                            <div class="col-sm-10"><input type="text" name="telepon" class="form-control" placeholder="Fax"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Call Center</label>
                            <div class="col-sm-10"><input type="text" name="telepon" class="form-control" placeholder="Call Center"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10"><input type="text" name="telepon" class="form-control" placeholder="Email"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Web</label>
                            <div class="col-sm-10"><input type="text" name="telepon" class="form-control" placeholder="Web"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">No Ijin Haji</label>
                            <div class="col-sm-10"><input type="text" name="telepon" class="form-control" placeholder="No Ijin Haji"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">No Ijin Umroh</label>
                            <div class="col-sm-10"><input type="text" name="telepon" class="form-control" placeholder="No Ijin Umroh"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a href="<?php echo site_url("setting/travel") ?>" class="btn btn-white">Cancel</a>
                                <button name="tombol" class="btn btn-primary" value="simpan" type="submit">Save</button> 
                            </div>
                        </div>						
						</form>
						</div>
					</div>
				</div>
            </div>

        <?php } if ($site_form=="list_agent") { ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Data User/Agent</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Setting</a></li>
                        <li class="active"><strong>User/Agent</strong></li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
			
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title"><h5>Data User/Agent</h5></div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-sm-2 m-b-xs">
                                        <a href="<?php echo site_url("setting/user/new"); ?>" class="btn btn-sm btn-primary"> Tambah User/Agent</a> 
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
                                            <th>Nama User</th>
                                            <th>Nama Travel </th>
                                            <th>Cabang </th>
                                            <th>Telp </th>
                                            <th>Email </th>
                                            <th>Alamat </th>
                                            <th>Aksi </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Ahmad Rozak</td>
                                            <td>Patuna Tour & Travel</td>
                                            <td>Kantor Pusat</td>
                                            <td>021-310 6178</td>
                                            <td>ahmad.rozak@outlook.com</td>
                                            <td>Jl Gatot Subroto no 187 Jakarta Selatan</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="<?php echo site_url("setting/user/detail/") ?>">Detail User</a></li>
                                                        <li><a href="#">Ubah User</a></li>
                                                        <li><a href="#">Hapus</a></li>
                                                    </ul>
                                                </div>    
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Dani Ramdhani</td>
                                            <td>Patuna Tour & Travel</td>
                                            <td>Cabang Bandung</td>
                                            <td>021-310 6178</td>
                                            <td>ahmad.rozak@outlook.com</td>
                                            <td>Jl RE Martadinata no 187 Bandung</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="<?php echo site_url("setting/user/detail/") ?>">Detail User</a></li>
                                                        <li><a href="#">Ubah User</a></li>
                                                        <li><a href="#">Hapus</a></li>
                                                    </ul>
                                                </div>    
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        <?php } if ($site_form=="list_tourleader") { ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Data Tour Leader</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Setting</a></li>
                        <li class="active"><strong>Tour Leader</strong></li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
			
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title"><h5>Data Tour Leader</h5></div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-sm-2 m-b-xs">
                                        <a href="<?php echo site_url("setting/tourleader/new"); ?>" class="btn btn-sm btn-primary"> Tambah Tour Leader</a> 
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
                                            <th>Nama Tour Leader</th>
                                            <th>Telp </th>
                                            <th>Email </th>
                                            <th>Alamat </th>
                                            <th>Aksi </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Ahmad Rozak</td>
                                            <td>021-310 6178</td>
                                            <td>ahmad.rozak@outlook.com</td>
                                            <td>Jl Gatot Subroto no 187 Jakarta Selatan</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="<?php echo site_url("setting/user/detail/") ?>">Detail User</a></li>
                                                        <li><a href="#">Ubah User</a></li>
                                                        <li><a href="#">Hapus</a></li>
                                                    </ul>
                                                </div>    
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Dani Ramdhani</td>
                                            <td>021-310 6178</td>
                                            <td>ahmad.rozak@outlook.com</td>
                                            <td>Jl RE Martadinata no 187 Bandung</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="<?php echo site_url("setting/user/detail/") ?>">Detail User</a></li>
                                                        <li><a href="#">Ubah User</a></li>
                                                        <li><a href="#">Hapus</a></li>
                                                    </ul>
                                                </div>    
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
                
        <?php } if ($site_form=="form_user") { ?>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Tambah User</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Setting</a></li>
                        <li><a href="index.html">User</a></li>
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
                            <h5>Tambah User</h5>
                        </div>
                        <div class="ibox-content">
						<form method="post" action="#" class="form-horizontal">
                        <div class="form-group">
							<label class="col-sm-2 control-label">Nama User</label>
                            <div class="col-sm-5"><input type="text" name="telepon" class="form-control" placeholder="Nama User"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Nama Travel</label>
                            <div class="col-sm-10"><input type="text" name="telepon" class="form-control" placeholder="Nama Travel"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Cabang</label>
                            <div class="col-sm-10"><input type="text" name="telepon" class="form-control" placeholder="Cabang"></div>
                        </div>
                         <div class="form-group">
							<label class="col-sm-2 control-label">Telepon</label>
                            <div class="col-sm-10"><input type="text" name="telepon" class="form-control" placeholder="Telepon"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10"><input type="text" name="telepon" class="form-control" placeholder="Email"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-10"><input type="text" name="telepon" class="form-control" placeholder="Alamat"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a href="<?php echo site_url("setting/travel") ?>" class="btn btn-white">Cancel</a>
                                <button name="tombol" class="btn btn-primary" value="simpan" type="submit">Save</button> 
                            </div>
                        </div>						
						</form>
						</div>
					</div>
				</div>
            </div>
        
        <?php } if ($site_form=="detail_travel") { ?> 
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title"><h5>Detail Travel</h5></div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-3">
                                <h3>Nama Travel</h3>
                                <p>Raudah Wisata<br><a href="">&gt; Ubah Data Travel</a></p>
                            </div>	
                            <div class="col-lg-3">
                                <h3>Nama Perusahaan</h3>
                                <p>PT. Raudah Eksati Utama</p>
                            </div>
                            <div class="col-lg-3">
                                <h3>No Ijin Haji</h3>
                                <p>D/519</p>
                            </div>
                            <div class="col-lg-3">
                                <h3>No Ijin Umroh</h3>
                                <p>D/310 TAHUN 2011</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12"><p>&nbsp;</p></div>
                        </div>	
                        <div class="row">
                        
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-sm-6"><h3>Daftar Cabang</h3></div>
                                    <div class="col-sm-6 text-right">
                                    <a href="<?php echo site_url("setting/travel/tambah_cabang"); ?>" class="btn btn-sm btn-primary"> Tambah Cabang </a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Cabang</th>
                                            <th>Alamat</th>
                                            <th>Kota</th>
                                            <th>Phone</th>
                                            <th>Fax</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                
                
                                <tr><td>1</td>
                                <td>Pusat Informasi</td>
                                <td>Jl. Kyai Caringin No. 5, Cideng - Jakarta Pusat 10150</td>
                                <td>Jakarta</td>
                                <td>021-34834400</td>
                                <td>021-348302129</td>
                                <td>
                                    <div class="btn-group">
                                        <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <!-- <li><a href="#">Detail Penumpang</a></li> -->
                                            <li><a href="#">Ubah Cabang</a></li>
                                            <li><a href="#">Hapus</a></li>
                                        </ul>
                                    </div>
                                </td>
                                </tr>                                                        
                                <tr><td>2</td>
                                <td>Cabang Bandung</td>
                                <td>Jl. RE Martadinata No. 5, Cideng - Bandung</td>
                                <td>Bandung</td>
                                <td>021-34834400</td>
                                <td>021-348302129</td>
                                <td>
                                    <div class="btn-group">
                                        <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">Action <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <!-- <li><a href="#">Detail Penumpang</a></li> -->
                                            <li><a href="#">Ubah Cabang</a></li>
                                            <li><a href="#">Hapus</a></li>
                                        </ul>
                                    </div>
                                </td>
                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php } if ($site_form=="form_cabang") { ?> 
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Tambah Cabang</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Tambah</a></li>
                        <li class="active"><strong>Cabang</strong></li>
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
                            <h5>Tambah Cabang</h5>
                        </div>
                        <div class="ibox-content">
						<form method="post" action="#" class="form-horizontal">
                        <div class="form-group">
							<label class="col-sm-2 control-label">Nama Cabang</label>
                            <div class="col-sm-10"><input type="text" name="nama" class="form-control" placeholder="Nama Cabang"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-4"><input type="text" name="telepon" class="form-control" placeholder="Alamat"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Kota</label>
                            <div class="col-sm-10"><input type="text" name="duration" class="form-control" placeholder="Kota"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-4"><input type="text" name="duration" class="form-control" placeholder="Phone"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Fax</label>
                            <div class="col-sm-4"><input type="text" name="duration" class="form-control" placeholder="Fax"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a href="<?php echo site_url("setting/travel/") ?>" class="btn btn-white">Cancel</a>
                                <button name="tombol" class="btn btn-primary" value="simpan" type="submit">Save</button> 
                            </div>
                        </div>					
						</form>
						</div>
					</div>
				</div>
            </div>
        <?php } if ($site_form=="detail_user") {?>
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title"><h5>Detail User</h5></div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-3">
                                <h3>Nama User</h3>
                                <p>Ahmad Rozak</p>
                            </div>	
                            <div class="col-lg-3">
                                <h3>Nama Travel</h3>
                                <p>Patuna Tour & Travel	</p>
                            </div>
                            <div class="col-lg-3">
                                <h3>Cabang</h3>
                                <p>Pusat Informasi</p>
                            </div>
                            <div class="col-lg-3">
                                <h3>Telepon</h3>
                                <p>021-310 6178</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <h3>Email</h3>
                                <p>ahmad.rozak@outlook.com</p>
                            </div>	
                            <div class="col-lg-6">
                                <h3>Alamat</h3>
                                <p>Jl Gatot Subroto no 187 Jakarta Selatan</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12"><p>&nbsp;</p></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } if ($site_form == "form_tourleader") {?>
                        <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Tambah Tour Leader</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Setting</a></li>
                        <li><a href="index.html">Tour Leader</a></li>
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
                            <h5>Tambah Tour Leader</h5>
                        </div>
                        <div class="ibox-content">
						<form method="post" action="#" class="form-horizontal">
                        <div class="form-group">
							<label class="col-sm-2 control-label">Nama Tour Leader</label>
                            <div class="col-sm-5"><input type="text" name="telepon" class="form-control" placeholder="Nama Tour Leader"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Telepon</label>
                            <div class="col-sm-10"><input type="text" name="telepon" class="form-control" placeholder="Telepon"></div>
                        </div>
                        <div class="form-group">
							<label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10"><input type="text" name="telepon" class="form-control" placeholder="Email"></div>
                        </div>
                         <div class="form-group">
							<label class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-10"><input type="text" name="telepon" class="form-control" placeholder="Alamat"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a href="<?php echo site_url("setting/tourleader/") ?>" class="btn btn-white">Cancel</a>
                                <button name="tombol" class="btn btn-primary" value="simpan" type="submit">Save</button> 
                            </div>
                        </div>						
						</form>
						</div>
					</div>
				</div>
            </div>

        <?php } ?>