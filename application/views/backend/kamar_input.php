    <?php if ($site_form=="tambahjamaah") { ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Master Kamar</h2>
                <ol class="breadcrumb">
                    <li><a href="">Home</a></li>
                    <li class="active"><strong>Master</strong></li>
                </ol>
            </div>
            <div class="col-lg-2"></div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Form Pendaftaran Jamaah</h5>
                        </div>
                        <div class="ibox-content">
                            <form method="post" action="<?php echo site_url("jamaah/booking/new/".$profileid)?>" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Nama Lengkap</label>
                                    <div class="col-sm-10"><input type="text" name="namalengkap" class="form-control" placeholder="Nama Lengkap"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nomor KTP</label>
                                    <div class="col-sm-10"><input type="number" name="noktp" class="form-control" placeholder="No KTP"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nama Ayah Kandung</label>
                                    <div class="col-sm-10"><input type="text" name="ayah" class="form-control" placeholder="Nama Ayah Kandung"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tempat Lahir</label>
                                        <div class="col-sm-4"><input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir"></div>
                                
                                    <label class="col-sm-2 control-label">Tanggal Lahir</label>
                                        <div class="col-sm-4"><input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Jenis Kelamin</label>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="1" name="jns_kelamin"> <i></i> Laki Laki </label></div>
                                    <div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="2" name="jns_kelamin"> <i></i> Perempuan </label></div>
                                </div>								
                                <div class="form-group"><label class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-10"><input type="text" name="alamat" class="form-control" placeholder="Alamat">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Alamat Surat-Menyurat</label>
                                    <div class="col-sm-10"><input type="text" name="alamat_surat" class="form-control" placeholder="Alamat Surat-Menyurat">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Desa / Kelurahan</label>
                                    <div class="col-sm-10"><input type="text" name="kelurahan" class="form-control" placeholder="Desa / Kelurahan">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Kecamatan</label>
                                    <div class="col-sm-10"><input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Kabupaten/Kodya</label>
                                    <div class="col-sm-10"><input type="text" name="kabupaten" class="form-control" placeholder="Kabupaten/Kodya">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Propinsi</label>
                                    <div class="col-sm-10"><input type="text" name="propinsi" class="form-control" placeholder="Propinsi">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Kode POS</label>
                                    <div class="col-sm-10"><input type="number" name="kodepos" class="form-control" placeholder="Kode POS">
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
                                    <div class="col-sm-10"><input type="text" class="form-control" placeholder="Nama Mahram" name="mahram"></div>
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
                                    <div class="col-sm-3"><input type="text" class="form-control" placeholder="Rambut" name="rambut"></div>
                                    <div class="col-sm-3"><input type="text" class="form-control" placeholder="Alis" name="alis"></div>
                                    <div class="col-sm-4"><input type="text" class="form-control" placeholder="Hidung" name="hidung"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-3"><input type="text" class="form-control" placeholder="Tinggi" name="tinggi"></div>
                                    <div class="col-sm-3"><input type="text" class="form-control" placeholder="Berat" name="berat"></div>
                                    <div class="col-sm-4"><input type="text" class="form-control" placeholder="Muka" name="muka"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Ukuran Baju</label>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="M" name="ukuran_pakaian"> <i></i> M </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="L" name="ukuran_pakaian"> <i></i> L </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="XL" name="ukuran_pakaian"> <i></i> XL </label></div>
                                    <div class="col-sm-1 i-checks"><label> <input type="radio" checked="" value="XXL" name="ukuran_pakaian"> <i></i> XXL </label></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                                <input type="hidden" class="form-control" name="profileid" value="<?php echo $profileid; ?>"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="submit">Cancel</button>
                                        <button class="btn btn-primary" type="submit" value="simpan" name="tombol2">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    <?php } if ($site_form=="jamaahdetail") { ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Detail Jamaah</h2>
                <ol class="breadcrumb">
                    <li><a href="">Home</a></li>
                    <li><a href="">Jamaah</a></li>
                    <li class="active"><strong>Detail</strong></li>
                </ol>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <?php
            if (sizeof($detail_jamaah)>0) {
                $id             = $detail_jamaah["id"];
                $no_ktp         = $detail_jamaah["no_ktp"];
                $nama_ayah      = $detail_jamaah["nama_ayah"];
                $nama_lengkap   = $detail_jamaah["nama_lengkap"];
                $jenis_kelamin  = $detail_jamaah["jenis_kelamin"];
                $tempat_lahir   = $detail_jamaah["tempat_lahir"];
                $tanggal_lahir  = $detail_jamaah["tanggal_lahir"];
                $alamat         = $detail_jamaah["alamat"];
                $alamat_surat   = $detail_jamaah["alamat_surat_menyurat"];
                $provinsi       = $detail_jamaah["provinsi"];
                $kota_kab       = $detail_jamaah["kota_kab"];
                $kecamatan      = $detail_jamaah["kecamatan"];
                $kel_desa       = $detail_jamaah["kel_desa"];
                $kodepos        = $detail_jamaah["kodepos"];
            }
        ?>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Detail Jamaah</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form class="form-horizontal">
                                <div class="form-group"><label class="col-lg-4 control-label">Nama Jamaah</label>
                                    <div class="col-lg-8"><span class="help-block m-b-none"><?php echo $nama_lengkap; ?></span>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-4 control-label">No KTP</label>
                                    <div class="col-lg-8"><span class="help-block m-b-none"><?php echo $no_ktp; ?></span></div>
                                </div>
                                <div class="form-group"><label class="col-lg-4 control-label">Nama Ayah</label>
                                    <div class="col-lg-8"><span class="help-block m-b-none"><?php echo $nama_ayah; ?></span>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-4 control-label">Jenis Kelamin</label>
                                    <div class="col-lg-8"><span class="help-block m-b-none"><?php if ($jenis_kelamin == 1) { echo "Laki-laki"; } else { echo "Perempuan"; }; ?></span></div>
                                </div>
                                <div class="form-group"><label class="col-lg-4 control-label">Tempat, Tanggal Lahir</label>
                                    <div class="col-lg-8"><span class="help-block m-b-none"><?php echo $tempat_lahir." - ".$tanggal_lahir; ?></span>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-4 control-label">Alamat</label>
                                    <div class="col-lg-8"><span class="help-block m-b-none"><?php echo $alamat; ?></span>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-4 control-label">Alamat Surat Menyurat</label>
                                    <div class="col-lg-8"><span class="help-block m-b-none"><?php echo $alamat_surat; ?></span>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-4 control-label">Provinsi</label>
                                    <div class="col-lg-8"><span class="help-block m-b-none"><?php echo $provinsi; ?></span>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-4 control-label">Kota Kabupaten</label>
                                    <div class="col-lg-8"><span class="help-block m-b-none"><?php echo $kota_kab; ?></span>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-4 control-label">Kecamatan</label>
                                    <div class="col-lg-8"><span class="help-block m-b-none"><?php echo $kecamatan; ?></span>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-4 control-label">Kelurahan Desa</label>
                                    <div class="col-lg-8"><span class="help-block m-b-none"><?php echo $kel_desa; ?></span>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-4 control-label">Kode Pos</label>
                                    <div class="col-lg-8"><span class="help-block m-b-none"><?php echo $kodepos; ?></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>              
                <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Detail Optional Paket</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <form class="form-horizontal">
                                    <div class="form-group"><label class="col-lg-4 control-label">Jasa Pembuatan Visa</label>
                                        <div class="col-lg-8"><input type="checkbox">
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-4 control-label">Kamar Hotel</label>
                                        <div class="col-lg-8"><input type="checkbox"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                                
                </div>
        </div>
    <?php } if ($site_form=="kamarubah") { ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Ubah Jamaah</h2>
                <ol class="breadcrumb">
                    <li><a href="">Home</a></li>
                    <li><a href="">Jamaah</a></li>
                    <li class="active"><strong>Ubah</strong></li>
                </ol>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <?php
            if (sizeof($detail_jamaah)>0) {
                $id             = $detail_jamaah["id"];
                $no_ktp         = $detail_jamaah["no_ktp"];
                $nama_ayah      = $detail_jamaah["nama_ayah"];
                $nama_lengkap   = $detail_jamaah["nama_lengkap"];
                $jenis_kelamin  = $detail_jamaah["jenis_kelamin"];
                $tempat_lahir   = $detail_jamaah["tempat_lahir"];
                $tanggal_lahir  = $detail_jamaah["tanggal_lahir"];
                $alamat         = $detail_jamaah["alamat"];
                $alamat_surat   = $detail_jamaah["alamat_surat_menyurat"];
                $provinsi       = $detail_jamaah["provinsi"];
                $kota_kab       = $detail_jamaah["kota_kab"];
                $kecamatan      = $detail_jamaah["kecamatan"];
                $kel_desa       = $detail_jamaah["kel_desa"];
                $kodepos        = $detail_jamaah["kodepos"];
            }
        ?>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Detail Jamaah</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form class="form-horizontal">
                                <div class="form-group"><label class="col-lg-4 control-label">Nama Jamaah</label>
                                    <div class="col-lg-8"><input type="text" placeholder="Search for something..." class="form-control" name="top-search" value="<?php echo $nama_lengkap; ?>">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-4 control-label">No KTP</label>
                                    <div class="col-lg-8"><input type="text" placeholder="Search for something..." class="form-control" name="top-search" value="<?php echo $no_ktp; ?>">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-4 control-label">Nama Ayah</label>
                                    <div class="col-lg-8"><input type="text" placeholder="Search for something..." class="form-control" name="top-search" value="<?php echo $nama_ayah; ?>">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-4 control-label">Jenis Kelamin</label>
                                       <div class="col-sm-8">
                                            <select class="form-control m-b" name="account">
                                                <option <?php if ($jenis_kelamin==1) {echo "selected"; } ?>>Laki-laki</option>
                                                <option <?php if ($jenis_kelamin==2) {echo "selected"; } ?>>Perempuan</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group"><label class="col-lg-4 control-label">Tempat, Tanggal Lahir</label>
                                    <div class="col-lg-4"><input type="text" placeholder="Search for something..." class="form-control" name="top-search" value="<?php echo $tempat_lahir; ?>"></div>
                                    <div class="col-lg-4"><input type="text" placeholder="Search for something..." class="form-control" name="top-search" value="<?php echo $tanggal_lahir; ?>"></div>
                                </div>
                                <div class="form-group"><label class="col-lg-4 control-label">Alamat</label>
                                    <div class="col-lg-8"><input type="text" placeholder="Search for something..." class="form-control" name="top-search" value="<?php echo $alamat; ?>">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-4 control-label">Alamat Surat Menyurat</label>
                                    <div class="col-lg-8"><input type="text" placeholder="Search for something..." class="form-control" name="top-search" value="<?php echo $alamat_surat; ?>">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-4 control-label">Provinsi</label>
                                    <div class="col-lg-8"><input type="text" placeholder="Search for something..." class="form-control" name="top-search" value="<?php echo $provinsi; ?>">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-4 control-label">Kota Kabupaten</label>
                                    <div class="col-lg-8"><input type="text" placeholder="Search for something..." class="form-control" name="top-search" value="<?php echo $kota_kab; ?>">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-4 control-label">Kecamatan</label>
                                    <div class="col-lg-8"><input type="text" placeholder="Search for something..." class="form-control" name="top-search" value="<?php echo $kecamatan; ?>">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-4 control-label">Kelurahan Desa</label>
                                    <div class="col-lg-8"><input type="text" placeholder="Search for something..." class="form-control" name="top-search" value="<?php echo $kel_desa; ?>">
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-4 control-label">Kode Pos</label>
                                    <div class="col-lg-8"><input type="text" placeholder="Search for something..." class="form-control" name="top-search" value="<?php echo $kodepos; ?>">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>              
                <div class="col-lg-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Detail Optional Paket</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <form class="form-horizontal">
                                    <div class="form-group"><label class="col-lg-4 control-label">Jasa Pembuatan Visa</label>
                                        <div class="col-lg-8"><input type="checkbox">
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-lg-4 control-label">Kamar Hotel</label>
                                        <div class="col-lg-8"><input type="checkbox"></div>
                                    </div>
                                </form>
                                <div class="hr-line-dashed"></div>
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="submit">Cancel</button>
                                        <button class="btn btn-primary" type="submit">Save changes</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                                
                </div>
        </div>
    <?php } ?>	
	</div>
</div>			
	