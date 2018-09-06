            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Prospek Jamaah</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Jamaah</a></li>
                        <li class="active"><strong>Prospek</strong></li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
			
<?php if ($site_form=="list") { ?>
			
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title"><h5>Daftar Prospek Jamaah</h5></div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-3 m-b-xs">
								<a href="<?php echo site_url("jamaah/prospek/new"); ?>" class="btn btn-sm btn-primary"> Tambah Prospek</a> 
                                </div>
								<div class="col-sm-6"></div>
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
                                        <th>Cabang / PIM</th>
                                        <th>Nama </th>
                                        <th>Email </th>
                                        <th>Handphone </th>
                                        <th>Jml Jamaah</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Bandung</td>
                                        <td>Ferro Merdeka</td>
                                        <td>ferro@gmail.com</td>
                                        <td>081122334455</td>
										<td>5</td>
										<td>Initial Contact</td>
                                        <td>xx</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Bandung</td>
                                        <td>Ferro Merdeka</td>
                                        <td>ferro@gmail.com</td>
                                        <td>081122334455</td>
										<td>5</td>
										<td>Initial Contact</td>
                                        <td>xx</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Bandung</td>
                                        <td>Ferro Merdeka</td>
                                        <td>ferro@gmail.com</td>
                                        <td>081122334455</td>
										<td>5</td>
										<td>Initial Contact</td>
                                        <td>xx</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Bandung</td>
                                        <td>Ferro Merdeka</td>
                                        <td>ferro@gmail.com</td>
                                        <td>081122334455</td>
										<td>5</td>
										<td>Initial Contact</td>
                                        <td>xx</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>	
		
<?php } else { ?>

       <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
form				
                </div>
            </div>
        </div>	
		
<?php } ?>		