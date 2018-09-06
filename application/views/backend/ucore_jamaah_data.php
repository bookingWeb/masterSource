            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Data Jamaah</h2>
                    <ol class="breadcrumb">
                        <li><a href="">Jamaah</a></li>
                        <li class="active"><strong>Data</strong></li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <!-- List Data Jamaah -->
        <?php if ($site_form=="list") { ?>
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title"><h5>Daftar Jamaah</h5></div>
                        <div class="ibox-content">
                            <div class="row">
								<div class="col-sm-7">
								<a href="<?php echo site_url("jamaah/data/new"); ?>" class="btn btn-sm btn-primary"> Tambah Jamaah</a>
								</div>
                                <div class="col-sm-5">
                                    <form method="post" action="<?php echo site_url("jamaah/data/filter"); ?>">
                                    <div class="input-group"><input type="text" name="search" placeholder="Cari No KTP/Nama/No Telp" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary"> Cari</button> </span></div>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No KTP</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis Kelamin  </th>
                                        <th>Tempat Tanggal Lahir</th>
                                        <th>Alamat </th>
                                        <th>Paspor</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                <?php 
                    if (sizeof($data_jamaah)>0) {
                        for ($i=0;$i<sizeof($data_jamaah);$i++) {
                            $id = $data_jamaah[$i]["id"];
                            $no_ktp = $data_jamaah[$i]["no_ktp"];
                            $nama_ayah = $data_jamaah[$i]["nama_ayah"];
                            $nama_lengkap = $data_jamaah[$i]["nama_lengkap"];
                            $jenis_kelamin = $data_jamaah[$i]["jenis_kelamin"];
                            $alamat = $data_jamaah[$i]['alamat'];

                            if ($jenis_kelamin == 1)
                            {
                                $jk = "Laki-laki";
                            } else { $jk = "Perempuan"; }

                            $tempat_lahir = $data_jamaah[$i]["tempat_lahir"];
                            $tanggal_lahir = $data_jamaah[$i]["tanggal_lahir"];
                            $email = $data_jamaah[$i]["email"];
                            $handphone = $data_jamaah[$i]["handphone"];
                            $paspor_id = $data_jamaah[$i]["paspor_id"];

                            if ($paspor_id != "" || $paspor_id != NULL)
                            {
                                $paspor = "Sudah Punya";
                            } else { $paspor = "Belum Punya"; }
                            
                            echo "<tr><td>" . ($i+1) . "</td>"; 
                            echo "<td>$no_ktp</td>";
                            echo "<td>$nama_lengkap</td>";
                            echo "<td>$jk</td>";
                            echo "<td>$tempat_lahir".", $tanggal_lahir"."</td>";
                            echo "<td>$alamat</td>";
                            echo "<td>$paspor</td>";
                            echo "<td><div class=\"btn-group\"><button data-toggle=\"dropdown\" class=\"btn btn-primary btn-xs dropdown-toggle\">Action ";
                                                echo "<span class=\"caret\"></span></button><ul class=\"dropdown-menu\">";
                                                echo "<li><a href=\"".site_url("jamaah/data/edit/".$id)."\">Ubah Jamaah</a></li>";
                                                echo "<li><a href=\"".site_url("jamaah/data/rem/".$id)."\">Hapus Jamaah</a></li>";
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
                                
                                if (sizeof($data_jml_jamaah)>0)
                                { 
                                    $jmldata = $data_jml_jamaah[0]['jumlah'];
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
											<li class="paginate_button previous" aria-controls="datatable" tabindex="0" id="datatable_previous"><a href="<?php echo site_url("jamaah/data/1/"); ?>">First</a></li>
											<?php
												for ($i=$page1;$i<$page2+1;$i++) {
													echo "<li class=\"paginate_button";
													if ($i==$page) { echo " active"; }
													echo "\" aria-controls=\"datatable\" tabindex=\"0\"><a href=\"".site_url("jamaah/data/".$i)."\">$i</a></li>";
												}
											?>
											<li class="paginate_button next" aria-controls="datatable" tabindex="0" id="datatable_next"><a href="<?php echo site_url("jamaah/data/".$jmlpage); ?>">Last</a></li>
										</ul>
									</div>
								<?php } ?>                 		
								</div>
							</div>
                        </div>
                    </div>
                </div>

        <?php } if ($site_form=="form") { ?>
            <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Form Tambah Jamaah</h5>
                        </div>
                        <div class="ibox-content">
                        <?php 
                            $id = "";
                            $no_ktp = "";
                            $nama_ayah = "";
                            $nama_lengkap = "";
                            $tempat_lahir = "";
                            $tanggal_lahir = "";
                            $jenis_kelamin = "";
                            $alamat = "";
                            $alamat_surat_menyurat = "";
                            $provinsi = "";
                            $kota_kab = "";
                            $kecamatan = "";
                            $kel_desa = "";
                            $kodepos = "";
                            $pendidikan = "";
                            $pekerjaan = "";
                            $status_perkawinan = "";
                            $pergi_haji = "";
                            $golongan_darah = "";
                            $ukuran_pakaian = "";
                            $type_perokok = "";
                            $nama_mahram = "";
                            $hub_mahram = "";
                            $status_bph = "";
                            $rambut = "";
                            $alis = "";
                            $hidung = "";
                            $tinggi = "";
                            $berat = "";
                            $muka = "";

                            if (!empty($get_jamaah_by_id)) {
                                    $id = $get_jamaah_by_id["id"];
                                    $no_ktp = $get_jamaah_by_id["no_ktp"];
                                    $nama_ayah = $get_jamaah_by_id["nama_ayah"];
                                    $nama_lengkap = $get_jamaah_by_id["nama_lengkap"];
                                    $tempat_lahir = $get_jamaah_by_id['tempat_lahir'];
                                    $tanggal_lahir = $get_jamaah_by_id['tanggal_lahir'];
                                    $jenis_kelamin = $get_jamaah_by_id["jenis_kelamin"];
                                    $alamat = $get_jamaah_by_id['alamat'];
                                    $alamat_surat_menyurat = $get_jamaah_by_id['alamat_surat_menyurat'];
                                    $provinsi = $get_jamaah_by_id['provinsi'];
                                    $kota_kab = $get_jamaah_by_id['kota_kab'];
                                    $kecamatan = $get_jamaah_by_id['kecamatan'];
                                    $kel_desa = $get_jamaah_by_id['kel_desa'];
                                    $kodepos = $get_jamaah_by_id['kodepos'];
                                    $pendidikan = $get_jamaah_by_id['pendidikan'];
                                    $pekerjaan = $get_jamaah_by_id['pekerjaan'];
                                    $status_perkawinan = $get_jamaah_by_id['status_perkawinan'];
                                    $pergi_haji = $get_jamaah_by_id['pergi_haji'];
                                    $golongan_darah = $get_jamaah_by_id['golongan_darah'];
                                    $ukuran_pakaian = $get_jamaah_by_id['ukuran_pakaian'];
                                    $type_perokok = $get_jamaah_by_id['type_perokok'];
                                    $nama_mahram = $get_jamaah_by_id['nama_mahram'];
                                    $hub_mahram = $get_jamaah_by_id['hub_mahram'];
                                    $status_bph = $get_jamaah_by_id['status_bph'];
                                    $rambut = $get_jamaah_by_id['ciri_rambut'];
                                    $alis = $get_jamaah_by_id['ciri_alis'];
                                    $hidung = $get_jamaah_by_id['ciri_hidung'];
                                    $tinggi = $get_jamaah_by_id['tinggi'];
                                    $berat = $get_jamaah_by_id['berat'];
                                    $muka = $get_jamaah_by_id['muka'];

                            }
                                    
                        ?>
                            <form method="post" action="<?php echo site_url("jamaah/data/".$page."/".$id)?>" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Nama Lengkap</label>
                                    <div class="col-sm-10"><input type="text" name="namalengkap" class="form-control" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nomor KTP</label>
                                    <div class="col-sm-10"><input type="number" name="noktp" class="form-control" placeholder="No KTP" value="<?php echo $no_ktp; ?>"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nama Ayah Kandung</label>
                                    <div class="col-sm-10"><input type="text" name="ayah" class="form-control" placeholder="Nama Ayah Kandung" value="<?php echo $nama_lengkap; ?>"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tempat Lahir</label>
                                        <div class="col-sm-4"><input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>"></div>
                                
                                    <label class="col-sm-2 control-label">Tanggal Lahir</label>
                                        <div class="col-sm-4"><input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Jenis Kelamin</label>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="1" name="jns_kelamin"> <i></i> Laki Laki </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="2" name="jns_kelamin"> <i></i> Perempuan </label></div>
                                </div>								
                                <div class="form-group"><label class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-10"><input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $alamat ?>">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Alamat Surat-Menyurat</label>
                                    <div class="col-sm-10"><input type="text" name="alamat_surat" class="form-control" placeholder="Alamat Surat-Menyurat" value="<?php echo $alamat_surat_menyurat; ?>">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Desa / Kelurahan</label>
                                    <div class="col-sm-10"><input type="text" name="kelurahan" class="form-control" placeholder="Desa / Kelurahan" value="<?php echo $kel_desa; ?>">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Kecamatan</label>
                                    <div class="col-sm-10"><input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" value="<?php echo $kecamatan; ?>">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Kabupaten/Kodya</label>
                                    <div class="col-sm-10"><input type="text" name="kabupaten" class="form-control" placeholder="Kabupaten/Kodya" value="<?php echo $kota_kab; ?>">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Propinsi</label>
                                    <div class="col-sm-10"><input type="text" name="propinsi" class="form-control" placeholder="Propinsi" value="<?php echo $provinsi; ?>">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Kode POS</label>
                                    <div class="col-sm-10"><input type="number" name="kodepos" class="form-control" placeholder="Kode POS" value="<?php echo $kodepos; ?>">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Pendidikan</label>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="SD" name="pendidikan"> <i></i> SD </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="SMP" name="pendidikan"> <i></i> SMP </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="SLTA" name="pendidikan"> <i></i> SLTA </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="SM/D1/D2/D3" name="pendidikan"> <i></i> SM/D1/D2/D3 </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="S1" name="pendidikan"> <i></i> S1 </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="S2" name="pendidikan"> <i></i> S2 </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="S3" name="pendidikan"> <i></i> S3 </label></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Pekerjaan</label>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="PNS" name="pekerjaan"> <i></i> Pegawai Negeri Sipil </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="TNI" name="pekerjaan"> <i></i> TNI </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="Dagang" name="pekerjaan"> <i></i> Dagang </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="Tani" name="pekerjaan"> <i></i> Tani </label></div>
                                    <div class="col-sm-3 i-checks"><label> <input type="radio" checked="" value="Swasta" name="pekerjaan"> <i></i> Pegawai Swasta </label></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="IRT" name="pekerjaan"> <i></i> Ibu Rumah Tangga </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="Pelajar/Mahasiswa" name="pekerjaan"> <i></i> Pelajar/Mahasiswa </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="BUMN" name="pekerjaan"> <i></i> Pegawai BUMN </label></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Status Perkawinan</label>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="1" name="statuskawin"> <i></i> Menikah </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="2" name="statuskawin"> <i></i> Belum Menikah </label></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Pergi Haji</label>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="1" name="pernah_haji"> <i></i> Sudah </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="2" name="pernah_haji"> <i></i> Belum </label></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nama Mahram</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Nama Mahram" name="mahram" value="<?php echo $nama_mahram; ?>"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Hubungan Mahram</label>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="Orang Tua" name="hub_mahram"> <i></i> Orang Tua </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="Anak" name="hub_mahram"> <i></i> Anak </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="Suami/Istri" name="hub_mahram"> <i></i> Suami/Istri </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="Mertua" name="hub_mahram"> <i></i> Mertua </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="Saudara" name="hub_mahram"> <i></i> Saudara </label></div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Golongan Darah</label>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="A" name="golongandarah"> <i></i> A </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="B" name="golongandarah"> <i></i> B </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="AB" name="golongandarah"> <i></i> AB </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="O" name="golongandarah"> <i></i> O </label></div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Status BPH</label>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="BPH BIASA" name="bph"> <i></i> BPH Biasa </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="BPH PLUS" name="bph"> <i></i> BPH Plus </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="PETUGAS" name="bph"> <i></i> Petugas </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="LAIN-LAIN" name="bph"> <i></i> Lain-lain </label></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Ciri-ciri</label>
                                    <div class="col-sm-3"><input type="text" class="form-control" placeholder="Rambut" name="rambut" value="<?php echo $rambut; ?>"></div>
                                    <div class="col-sm-3"><input type="text" class="form-control" placeholder="Alis" name="alis" value="<?php echo $alis; ?>"></div>
                                    <div class="col-sm-4"><input type="text" class="form-control" placeholder="Hidung" name="hidung" value="<?php echo $hidung; ?>"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-3"><input type="text" class="form-control" placeholder="Tinggi" name="tinggi" value="<?php echo $tinggi; ?>"></div>
                                    <div class="col-sm-3"><input type="text" class="form-control" placeholder="Berat" name="berat" value="<?php echo $berat; ?>"></div>
                                    <div class="col-sm-4"><input type="text" class="form-control" placeholder="Muka" name="muka" value="<?php echo $muka; ?>"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Ukuran Baju</label>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="M" name="ukuran_pakaian"> <i></i> M </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="L" name="ukuran_pakaian"> <i></i> L </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="XL" name="ukuran_pakaian"> <i></i> XL </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="XXL" name="ukuran_pakaian"> <i></i> XXL </label></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <input type="hidden" value="<?php echo $id; ?>" name="id">

                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                    <a href="<?php echo site_url("jamaah/data/"); ?>" class="btn btn-white">Cancel</a>
                                        <button class="btn btn-primary" type="submit" value="simpan" name="tombol2">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        <?php } else if ($site_form=="formbooking") { ?> 

                                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Form Pendaftaran <small>Jamaah Umroh atau Haji</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="get" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-3 control-label"></label>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option2" name="paket"> <i></i> Umroh </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option2" name="paket"> <i></i> Haji </label></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Program yang dipilih</label>
                                    <div class="col-sm-10"><select class="form-control m-b" name="paket">
                                        <option>Paket Haji 1</option>
                                        <option>Paket Haji 2</option>
                                        <option>Paket Haji 3</option>
                                        <option>Paket Haji 4</option>
                                        <option>Paket Haji 5</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Tanggal Keberangkatan</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Tanggal Keberangkatan"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nomor KTP</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Nama"></div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Nama Lengkap</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Nama Lengkap"></div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Nama Ayah Kandung</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Nama Ayah Kandung"></div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tempat Lahir</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" placeholder="Tempat Lahir"></div>
                                
                                    <label class="col-sm-2 control-label">Tanggal Lahir</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" placeholder="Tanggal Lahir"></div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Jenis Kelamin</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Jenis Kelamin">
                                    <!-- <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                    </div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Alamat">
                                    <!-- <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                    </div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Alamat Surat-Menyurat</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Alamat Surat-Menyurat">
                                    <!-- <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                    </div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Desa / Kelurahan</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Desa / Kelurahan">
                                    <!-- <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                    </div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Kecamatan</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Kecamatan">
                                    <!-- <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                    </div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Kabupaten/Kodya</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Kabupaten/Kodya">
                                    <!-- <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                    </div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Propinsi</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Propinsi">
                                    <!-- <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                    </div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Kode POS</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Kode POS">
                                    <!-- <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                    </div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Pendidikan</label>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="option1" name="pendidikan"> <i></i> SD </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="option1" name="pendidikan"> <i></i> SMP </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="option1" name="pendidikan"> <i></i> SLTA </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option1" name="pendidikan"> <i></i> SM/D1/D2/D3 </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="option1" name="pendidikan"> <i></i> S1 </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="option1" name="pendidikan"> <i></i> S2 </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="option1" name="pendidikan"> <i></i> S3 </label></div>
                                    <!-- <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Pekerjaan</label>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option2" name="pekerjaan"> <i></i> Pegawai Negeri Sipil </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="option2" name="pekerjaan"> <i></i> TNI </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="option2" name="pekerjaan"> <i></i> Dagang </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="option2" name="pekerjaan"> <i></i> Tani </label></div>
                                    <div class="col-sm-3 i-checks"><label> <input type="radio" checked="" value="option2" name="pekerjaan"> <i></i> Pegawai Negeri Swasta </label></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option2" name="pekerjaan"> <i></i> Ibu Rumah Tangga </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option2" name="pekerjaan"> <i></i> Pelajar/Mahasiswa </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option2" name="pekerjaan"> <i></i> Pegawai BUMN </label></div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Status Perkawinan</label>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option2" name="kawin"> <i></i> Menikah </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option2" name="kawin"> <i></i> Belum Menikah </label></div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Pergi Haji</label>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option2" name="pernah_haji"> <i></i> Sudah </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option2" name="pernah_haji"> <i></i> Belum </label></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nama Mahram</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Nama Mahram" name="mahram"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Hubungan Mahram</label>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option3" name="hub_mahram"> <i></i> Orang Tua </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option3" name="hub_mahram"> <i></i> Anak </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option3" name="hub_mahram"> <i></i> Suami/Istri </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option3" name="hub_mahram"> <i></i> Mertua </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option3" name="hub_mahram"> <i></i> Saudara </label></div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Golongan Darah</label>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option4" name="golongandarah"> <i></i> A </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option4" name="golongandarah"> <i></i> B </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option4" name="golongandarah"> <i></i> AB </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option4" name="golongandarah"> <i></i> O </label></div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Status BPH</label>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option5" name="bph"> <i></i> BPH Biasa </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option5" name="bph"> <i></i> BPH Plus </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option5" name="bph"> <i></i> Petugas </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option5" name="bph"> <i></i> Lain-lain </label></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Ciri-ciri</label>
                                    <div class="col-sm-3"><input type="text" class="form-control" placeholder="Rambut" name="rambut"></div>
                                    <div class="col-sm-3"><input type="text" class="form-control" placeholder="Alis" name="alis"></div>
                                    <div class="col-sm-4"><input type="text" class="form-control" placeholder="Hidung" name="hidung"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-3"><input type="text" class="form-control" placeholder="Tinggi" name="tinggi"></div>
                                    <div class="col-sm-3"><input type="text" class="form-control" placeholder="Berat" name="berat"></div>
                                    <div class="col-sm-4"><input type="text" class="form-control" placeholder="Muka" name="muka"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Ukuran Baju Koko</label>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="option6" name="koko"> <i></i> M </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="option6" name="koko"> <i></i> L </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="option6" name="koko"> <i></i> XL </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="option6" name="koko"> <i></i> XXL </label></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="submit">Cancel</button>
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>	
						
            <?php } else if ($site_form=="form2") { ?> 

                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Form Pendaftaran <small>Jamaah Umroh atau Haji</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="get" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-3 control-label"></label>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option2" name="paket"> <i></i> Umroh </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option2" name="paket"> <i></i> Haji </label></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Program yang dipilih</label>
                                    <div class="col-sm-10"><select class="form-control m-b" name="paket">
                                        <option>Paket Haji 1</option>
                                        <option>Paket Haji 2</option>
                                        <option>Paket Haji 3</option>
                                        <option>Paket Haji 4</option>
                                        <option>Paket Haji 5</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Tanggal Keberangkatan</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Tanggal Keberangkatan"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nomor KTP</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Nama"></div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Nama Lengkap</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Nama Lengkap"></div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Nama Ayah Kandung</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Nama Ayah Kandung"></div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tempat Lahir</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" placeholder="Tempat Lahir"></div>
                                
                                    <label class="col-sm-2 control-label">Tanggal Lahir</label>
                                        <div class="col-sm-4"><input type="text" class="form-control" placeholder="Tanggal Lahir"></div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Jenis Kelamin</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Jenis Kelamin">
                                    <!-- <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                    </div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Alamat">
                                    <!-- <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                    </div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Alamat Surat-Menyurat</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Alamat Surat-Menyurat">
                                    <!-- <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                    </div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Desa / Kelurahan</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Desa / Kelurahan">
                                    <!-- <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                    </div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Kecamatan</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Kecamatan">
                                    <!-- <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                    </div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Kabupaten/Kodya</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Kabupaten/Kodya">
                                    <!-- <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                    </div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Propinsi</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Propinsi">
                                    <!-- <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                    </div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Kode POS</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Kode POS">
                                    <!-- <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                    </div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Pendidikan</label>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="option1" name="pendidikan"> <i></i> SD </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="option1" name="pendidikan"> <i></i> SMP </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="option1" name="pendidikan"> <i></i> SLTA </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option1" name="pendidikan"> <i></i> SM/D1/D2/D3 </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="option1" name="pendidikan"> <i></i> S1 </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="option1" name="pendidikan"> <i></i> S2 </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="option1" name="pendidikan"> <i></i> S3 </label></div>
                                    <!-- <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Pekerjaan</label>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option2" name="pekerjaan"> <i></i> Pegawai Negeri Sipil </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="option2" name="pekerjaan"> <i></i> TNI </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="option2" name="pekerjaan"> <i></i> Dagang </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="option2" name="pekerjaan"> <i></i> Tani </label></div>
                                    <div class="col-sm-3 i-checks"><label> <input type="radio" checked="" value="option2" name="pekerjaan"> <i></i> Pegawai Negeri Swasta </label></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option2" name="pekerjaan"> <i></i> Ibu Rumah Tangga </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option2" name="pekerjaan"> <i></i> Pelajar/Mahasiswa </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option2" name="pekerjaan"> <i></i> Pegawai BUMN </label></div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Status Perkawinan</label>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option2" name="kawin"> <i></i> Menikah </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option2" name="kawin"> <i></i> Belum Menikah </label></div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Pergi Haji</label>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option2" name="pernah_haji"> <i></i> Sudah </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option2" name="pernah_haji"> <i></i> Belum </label></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nama Mahram</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Nama Mahram" name="mahram"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Hubungan Mahram</label>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option3" name="hub_mahram"> <i></i> Orang Tua </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option3" name="hub_mahram"> <i></i> Anak </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option3" name="hub_mahram"> <i></i> Suami/Istri </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option3" name="hub_mahram"> <i></i> Mertua </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option3" name="hub_mahram"> <i></i> Saudara </label></div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Golongan Darah</label>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option4" name="golongandarah"> <i></i> A </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option4" name="golongandarah"> <i></i> B </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option4" name="golongandarah"> <i></i> AB </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option4" name="golongandarah"> <i></i> O </label></div>
                                </div>
                                <!-- <div class="hr-line-dashed"></div> -->
                                <div class="form-group"><label class="col-sm-2 control-label">Status BPH</label>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option5" name="bph"> <i></i> BPH Biasa </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option5" name="bph"> <i></i> BPH Plus </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option5" name="bph"> <i></i> Petugas </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="option5" name="bph"> <i></i> Lain-lain </label></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Ciri-ciri</label>
                                    <div class="col-sm-3"><input type="text" class="form-control" placeholder="Rambut" name="rambut"></div>
                                    <div class="col-sm-3"><input type="text" class="form-control" placeholder="Alis" name="alis"></div>
                                    <div class="col-sm-4"><input type="text" class="form-control" placeholder="Hidung" name="hidung"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-3"><input type="text" class="form-control" placeholder="Tinggi" name="tinggi"></div>
                                    <div class="col-sm-3"><input type="text" class="form-control" placeholder="Berat" name="berat"></div>
                                    <div class="col-sm-4"><input type="text" class="form-control" placeholder="Muka" name="muka"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Ukuran Baju Koko</label>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="option6" name="koko"> <i></i> M </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="option6" name="koko"> <i></i> L </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="option6" name="koko"> <i></i> XL </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="option6" name="koko"> <i></i> XXL </label></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="submit">Cancel</button>
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
				
                <?php } ?>
                
                <!-- Detail Tambahan Jamaah -->
                <?php if ($site_form=="tambahjamaah") { ?>
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Booking Tambahan <small>Jamaah Paket Umroh</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="get" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Nama Paket</label>
                                    <div class="col-lg-2"><p class="form-control-static">Umroh Plus Turki 12 Hari</p></div>
                                    <label class="col-lg-2 control-label">Keberangkatan</label>
                                    <div class="col-lg-2"><p class="form-control-static">01-Maret-2018</p></div>
                                    <label class="col-lg-2 control-label">Kepulangan</label>
                                    <div class="col-lg-2"><p class="form-control-static">30-Maret-2018</p></div>
                                    <label class="col-lg-2 control-label">Hotel Mekkah</label>
                                    <div class="col-lg-2"><p class="form-control-static">Anjum</p></div>
                                    <label class="col-lg-2 control-label">Hotel Madinah</label>
                                    <div class="col-lg-2"><p class="form-control-static">Araq Aqiq</p></div>
                                    <label class="col-lg-2 control-label">Hotel Jeddah</label>
                                    <div class="col-lg-2"><p class="form-control-static"></p></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="ibox-title">
                                    <h5>
                                        Kontak Booking
                                    </h5>
                                </div>
                                <div class="ibox-content">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Kode Booking</th>
                                            <th>Tanggal Booking</th>
                                            <th>Kontak Booking</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Nama Cabang</th>
                                            <th>Nama Mitra / Sal</th>
                                            <th>Total Kursi Sebelumnya</th>
                                            <th>Kursi Tambahan</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>UMROH12BBXH1</td>
                                            <td>01-Maret-2018</td>
                                            <td>Otto</td>
                                            <td>08776483976</td>
                                            <td>otoo@gmail.com</td>
                                            <td>Swamedia</td>
                                            <td>@mdo</td>
                                            <td>1</td>
                                            <td><input type="text" class="form-control"></td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="ibox-title">
                                    <h5>
                                        Biaya Booking Tambahan
                                    </h5>
                                </div>
                                <div class="ibox-content">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Biaya Booking Per Orang</th>
                                            <th>Total Kursi Tambahan</th>
                                            <th>Total</th>
                                            <th>Tanggal Bayar</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>USD 200</td>
                                            <td>1</td>
                                            <td>200</td>
                                            <td>28-Agustus-2017</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <div class="form-group">
                                    <div class="col-sm-6 col-sm-offset-2">
                                        <div class="col-sm-6 m-b-xs">
                                            <a href="<?php echo site_url(); ?>/jamaah/booking/tambahjamaah/revisi" class="btn btn-primary btn-sm">Submit</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php } ?>

                <!-- Detail Revisi Paket -->
                <?php if ($site_form=="revisi") { ?>
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Revisi <small>Paket Umroh</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="get" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Nama Paket</label>
                                    <div class="col-lg-2"><p class="form-control-static">Umroh Plus Turki 12 Hari</p></div>
                                    <label class="col-lg-2 control-label">Keberangkatan</label>
                                    <div class="col-lg-2"><p class="form-control-static">01-Maret-2018</p></div>
                                    <label class="col-lg-2 control-label">Kepulangan</label>
                                    <div class="col-lg-2"><p class="form-control-static">30-Maret-2018</p></div>
                                    <label class="col-lg-2 control-label">Hotel Mekkah</label>
                                    <div class="col-lg-2"><p class="form-control-static">Anjum</p></div>
                                    <label class="col-lg-2 control-label">Hotel Madinah</label>
                                    <div class="col-lg-2"><p class="form-control-static">Araq Aqiq</p></div>
                                    <label class="col-lg-2 control-label">Hotel Jeddah</label>
                                    <div class="col-lg-2"><p class="form-control-static"></p></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="ibox-title">
                                    <h5>
                                        Kontak Booking
                                    </h5>
                                </div>
                                <div class="ibox-content">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Kode Booking</th>
                                            <th>Tanggal Booking</th>
                                            <th>Kontak Booking</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Nama Cabang</th>
                                            <th>Nama Mitra / Sal</th>
                                            <th>Total Kursi</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>UMROH12BBXH1</td>
                                            <td>01-Maret-2018</td>
                                            <td>Otto</td>
                                            <td>08776483976</td>
                                            <td>otoo@gmail.com</td>
                                            <td>Swamedia</td>
                                            <td>@mdo</td>
                                            <td>2</td>
                                            <td>Booked</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="ibox-title">
                                    <h5>
                                        Detail Jamaah
                                    </h5>
                                </div>
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            Jamaah no 1
                                        </div>
                                        <div class="panel-body">
                                            <div class="ibox-content">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Nama Jamaah</th>
                                            <th>Usia</th>
                                            <th>Nama Ayah</th>
                                            <th>Phone</th>
                                            <th>Suami Istri</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Tempat Lahir</th>
                                            <th colspan="2">Nama Ibu</th>
                                            <th>Email</th>
                                            <th>Jenis Kelamin</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Ruli Sebastian</td>
                                            <td>26</td>
                                            <td>Ridwan Kamil</td>
                                            <td>09238480372</td>
                                            <td>Ya</td>
                                            <td>21-Juni-1991</td>
                                            <td>Bandung</td>
                                            <td colspan="2">Atika Sari</td>
                                            <td>ruli.sebas@gmail.com</td>
                                            <td>Laki-laki</td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                        <thead>
                                        <tr>
                                            <th colspan="5">Alamat</th>
                                            <th>Kode Pos</th>
                                            <th colspan="3">Kode Family / Group</th>
                                            <th colspan="4">Catatan</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td colspan="5">Jl Raya Lembang no 61 Kecamatan Lembang Bandung Barat</td>
                                            <td>40391</td>
                                            <td>1</td>
                                            <td colspan="5"></td>
                                        </tr>
                                        </tbody>
                                        <thead>
                                        <tr>
                                            <th colspan="12">Dokumen Keberangkatan</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td colspan="4">
                                                <div class="i-checks"><label> <input type="radio" value="option1" name="a"> <i></i> Passport Ada </label></div>
                                            </td>
                                            <td colspan="2">
                                                <input type="text" placeholder="Nomor Passport" class="form-control input-sm">
                                            </td>
                                            <td colspan="2">
                                                <input type="text" placeholder="Tanggal Issued" class="form-control input-sm">
                                            </td>
                                            <td colspan="2">
                                                <input type="text" placeholder="Tanggal Expired" class="form-control input-sm">
                                            </td>
                                            <td colspan="2">
                                                <input type="text" placeholder="Kota Issued" class="form-control input-sm">
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <div class="i-checks"><label> <input type="radio" checked="" value="option2" name="a"> <i></i> Passport Belum Ada </label></div>
                                            </td>
                                            <td colspan="2">
                                                <div class="i-checks"><label> <input type="checkbox" checked="" value="option2" name="h"> <i></i> Meningitis </label></div>
                                            </td>
                                            <td>
                                                <div class="i-checks"><label> <input type="checkbox" checked="" value="option2" name="b"> <i></i> Photo </label></div>
                                            </td>
                                            <td colspan="2">
                                                <div class="i-checks"><label> <input type="checkbox" checked="" value="option2" name="c"> <i></i> Kartu Keluarga </label></div>
                                            </td>
                                            <td colspan="2">
                                                <div class="i-checks"><label> <input type="checkbox" checked="" value="option2" name="d"> <i></i> Mahram </label></div>
                                            </td>
                                            <td>
                                                <div class="i-checks"><label> <input type="checkbox" checked="" value="option2" name="e"> <i></i> Akte Lahir </label></div>
                                            </td>
                                            <td colspan="2">
                                                <div class="i-checks"><label> <input type="checkbox" checked="" value="option2" name="f"> <i></i> Surat Nikah </label></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <thead>
                                        <tr>
                                            <th colspan="5">Tipe Kamar</th>
                                            <th colspan="2">Kelas Pesawat</th>
                                            <th colspan="4">Guide</th>
                                            <th colspan="2">Lainnya</th>
                                        </tr>
                                        </thead>
                                        </tbody>
                                         <tr>
                                            <td>
                                                <div class="i-checks"><label> <input type="radio" checked="" value="ber2" name="g"> <i></i> Ber 2 </label></div>
                                            </td>
                                            <td colspan="2">
                                                <div class="i-checks"><label> <input type="radio" checked="" value="ber3" name="g"> <i></i> Ber 3 </label></div>
                                            </td>
                                            <td>
                                                <div class="i-checks"><label> <input type="radio" checked="" value="ber4" name="g"> <i></i> Ber 4 </label></div>
                                            </td>
                                            <td>
                                                <div class="i-checks"><label> <input type="radio" checked="" value="bayi" name="g"> <i></i> Bayi </label></div>
                                            </td>
                                            <td colspan="2">
                                                <div class="i-checks"><label> <input type="radio" checked="" value="ekonomi" name="i"> <i></i> Ekonomi </label></div>
                                            </td>
                                            <td colspan="2">
                                                <div class="i-checks"><label> <input type="radio" checked="" value="ekonomi" name="j"> <i></i> Guide Dorong </label></div>
                                            </td>
                                            <td colspan="2">
                                                <div class="i-checks"><label> <input type="radio" checked="" value="ekonomi" name="j"> <i></i> Guide Khusus </label></div>
                                            </td>
                                            <td colspan="2">
                                                <div class="i-checks"><label> <input type="radio" checked="" value="ekonomi" name="k"> <i></i> Single Suplement </label></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                                                                <thead>
                                        <tr>
                                            <th colspan="5">Pengurusan Passport</th>
                                            <th colspan="2">Discount</th>
                                            <th colspan="4">Biaya Tambahan</th>
                                            <th colspan="2">Biaya Mahram</th>
                                        </tr>
                                        </thead>
                                        </tbody>
                                         <tr>
                                            <td colspan="2">
                                                <div class="i-checks"><label> <input type="radio" checked="" value="ber2" name="g"> <i></i> Passport </label></div>
                                            </td>
                                            <td colspan="3">
                                                <input type="text" placeholder="Biaya Passport" class="form-control input-sm">
                                            </td>    
                                            <td>
                                                <div class="i-checks"><label> <input type="checkbox" checked="" value="ekonomi" name="j"> <i></i> No Bed </label></div>
                                            </td>
                                            <td>
                                                <div class="i-checks"><label> <input type="checkbox" checked="" value="ekonomi" name="j"> <i></i> Anak-anak </label></div>
                                            </td>
                                            <td colspan="2">
                                                <div class="i-checks"><label> <input type="checkbox" checked="" value="ekonomi" name="l"> <i></i> Airport Handling </label></div>
                                            </td>
                                            <td colspan="2">
                                                <div class="i-checks"><label> <input type="checkbox" checked="" value="ekonomi" name="l"> <i></i> Perlengkapan </label></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <div class="col-sm-6 col-sm-offset-2">
                                        <div class="col-sm-6 m-b-xs">
                                            <a href="<?php echo site_url(); ?>/jamaah/booking/tambahjamaah/revisi" class="btn btn-primary btn-sm">Submit</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>			