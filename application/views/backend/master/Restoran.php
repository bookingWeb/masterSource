<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Restoran</h2>
		<ol class="breadcrumb">
			<li><a href="">Home</a></li>
			<li class="active"><strong>Master</strong></li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row" id="rowList">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Restoran</h5>
				</div>

				<div class="ibox-content">
					<div class="row">
						<div class="col-sm-7">
							<span class="input-group-btn">
								<a class="btn btn-sm btn-primary" id="btnTambah"> Tambah</a>
							</span>
						</div>
						<div class="col-sm-5">
							<div class="input-group">
								<input type="text" name="search" placeholder="Cari Jenis Restoran/Harga" class="input-sm form-control">
								<span class="input-group-btn">
									<a class="btn btn-sm btn-primary"> Cari</a>
								</span>
							</div>
						</div>
					</div>

					<div class="table-responsive">
						<table class="table table-striped" id="tableRestoran">
							<thead>
								<tr>
									<th width="10px">No</th>
									<th>Nama Menu</th>
									<th>Kategori</th>
									<th>Satuan</th>
									<th>Harga</th>
									<th width="150px">Aksi</th>
								</tr>
							</thead>
							<tbody id="tableRestoranBody"></tbody>
						</table>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<div class="dataTables_info" id="datatable_info" role="status" aria-live="polite"></div>
						</div>

						<div class="col-sm-6">
							<div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row" id="rowInput" hidden>
		<div class="col-lg-12" id="colInput">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Input Restoran</h5>
				</div>

				<div class="ibox-content">
					<input type="hidden" id="idEditMenu">
					<div class="row">
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Menu</label>
							<div class="col-sm-10">
								<input type="text" id="inpNamaMenu" name="nm_menu" class="form-control" placeholder="Masukan Nama Menu">
							</div>
						</div>
					</div><br/>
					<div class="row">
						<div class="form-group">
							<label class="col-sm-2 control-label">Kategori</label>
							<div class="col-sm-10">
								<input type="text" id="inpKategori" name="kategori" class="form-control" placeholder="Masukan Kategori">
							</div>
						</div>
					</div><br/>
					<div class="row">
						<div class="form-group">
							<label class="col-sm-2 control-label">Satuan</label>
							<div class="col-sm-10">
								<input type="text" id="inpSatuan" name="satuan" class="form-control" placeholder="Masukan Satuan">
							</div>
						</div>
					</div><br/>
					<div class="row">
						<div class="form-group">
							<label class="col-sm-2 control-label">Harga</label>
							<div class="col-sm-10">
								<input type="number" id="inpHarga" name="harga" class="form-control" placeholder="Harga">
							</div>
						</div>
					</div><br/>

					<div class="row" align="center">
						<div class="col-sm-12">
							<a class="btn btn-white" id="btnCancel">Cancel</a>&nbsp;
							<a class="btn btn-primary" id="btnSimpan">Simpan</a>
							<a class="btn btn-info" id="btnSimpanEdit">Simpan</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function() {
		$.ajaxSetup({
			headers: { 'csrf_token': $('meta[name="csrf_token"]').attr('content') }
		});
		$('#btnSimpanEdit').hide();

		setDataTable();

		$("#btnTambah").click(function() {
			$('#btnSimpan').show();
			$('#btnSimpanEdit').hide();
			$('#rowList').hide();
			$('#rowInput').show();
		});

		$("#btnCancel").click(function() {
			$('#rowList').show();
			$('#rowInput').hide();
			clearForm();
		});

		$("#btnSimpan").click(function() { simpanForm(); });
		$("#btnSimpanEdit").click(function() { simpanEditForm(); });
	});

	function setDataTable(){
		var val = { csrf_token: $('meta[name="csrf_token"]').attr('content') };

		httpSend('restoran/getData', val).done(r => {
			if(r.msg == 'success') setTableList(r.restoran);
			else setNullTableList();
		});
	}

	function setTableList(data){
		$('#tableRestoranBody').empty();
		var strAppend = '';
		for(var i=0; i < data.length; i++){
			strAppend +=
				'<tr>'+
					'<td>'+(i+1)+'</td>'+
					'<td>'+data[i].nama_menu+'</td>'+
					'<td>'+data[i].kategori+'</td>'+
					'<td>'+data[i].satuan+'</td>'+
					'<td>'+data[i].harga+'</td>'+
					'<td>'+
						'<a class="btn btn-sm btn-danger" onclick="deleteList('+data[i].id_restoran+')">Delete</a> '+
						'<a class="btn btn-sm btn-info" onclick="editList('+data[i].id_restoran+')">Edit</a>'+
					'</td>'+
				'</tr>';
		}
		$('#tableRestoran').append(strAppend);
	}

	function setNullTableList(){
		$('#tableRestoranBody').empty();
		var strAppend =
			'<tr>'+
				'<td colspan = "6" align="center">'+
					'Data Not Found'+
				'<td>'+
			'</tr>';
		$('#tableRestoran').append(strAppend);
	}

	function simpanForm(){
		var val = {
			csrf_token: $('meta[name="csrf_token"]').attr('content'),
			valNamaMenu: $('#inpNamaMenu').val(),
			valKategori: $('#inpKategori').val(),
			valSatuan: $('#inpSatuan').val(),
			valHarga: $('#inpHarga').val()
		};

		httpSend('restoran/simpanData', val).done(r => {
			if(r.msg == 'success'){
				alert('Data Berhasil Di Tambah');
				$('#rowList').show(); $('#rowInput').hide();
				setDataTable(); clearForm();
			}else{
				alert('Data Gagal Di Tambah');
			}
		});
	}

	function simpanEditForm(){
		var val = {
			csrf_token: $('meta[name="csrf_token"]').attr('content'),
			valIdMenu: $('#idEditMenu').val(),
			valNamaMenu: $('#inpNamaMenu').val(),
			valKategori: $('#inpKategori').val(),
			valSatuan: $('#inpSatuan').val(),
			valHarga: $('#inpHarga').val()
		};

		httpSend('restoran/simpanEditData', val).done(r => {
			if(r.msg == 'success'){
				alert('Data Berhasil Di Edit');
				$('#rowList').show(); $('#rowInput').hide();
				setDataTable(); clearForm();
			}else{
				alert('Data Gagal Di Edit');
			}
		});
	}

	function editList(val) {
		var val = {
			csrf_token: $('meta[name="csrf_token"]').attr('content'), valIdMenu: val
		};

		httpSend('restoran/getSingleDataRestoran', val).done(r => {
			if(r.msg == 'success') {
				$('#idEditMenu').val(r.restoran.id_restoran);
				$('#inpNamaMenu').val(r.restoran.nama_menu);
				$('#inpKategori').val(r.restoran.kategori);
				$('#inpSatuan').val(r.restoran.satuan);
				$('#inpHarga').val(r.restoran.harga);
				$('#btnSimpan').hide(); $('#btnSimpanEdit').show();
				$('#rowList').hide(); $('#rowInput').show();
			}else {
				alert('Data Gagal Di Edit');
			}
		});
	}

	function deleteList(val) {
		var val = {
			csrf_token: $('meta[name="csrf_token"]').attr('content'), valIdMenu: val
		};

		httpSend('restoran/deleteData', val).done(r => {
			if(r.msg == 'success') {
				alert('Data Berhasil Di Delete');
				setDataTable();
			}else {
				alert('Data Gagal Di Delete');
			}
		});
	}

	function clearForm(){
		$('#idEditMenu').val('');
		$('#inpNamaMenu').val('');
		$('#inpKategori').val('');
		$('#inpSatuan').val('');
		$('#inpHarga').val('');
	}
</script>