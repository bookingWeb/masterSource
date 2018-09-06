<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Inventory</h2>
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
					<h5>Inventory</h5>
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
								<input type="text" name="search" placeholder="Cari Jenis Inventory/Harga" class="input-sm form-control">
								<span class="input-group-btn">
									<a class="btn btn-sm btn-primary"> Cari</a>
								</span>
							</div>
						</div>
					</div>

					<div class="table-responsive">
						<table class="table table-striped" id="tableInventory">
							<thead>
								<tr>
									<th width="10px">No</th>
									<th>Nama</th>
									<th>Kategori</th>
									<th>Jenis</th>
									<th>Satuan</th>
									<th width="150px">Aksi</th>
								</tr>
							</thead>
							<tbody id="tableInventoryBody"></tbody>
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
					<h5>Input Inventory</h5>
				</div>

				<div class="ibox-content">
					<input type="hidden" id="idEditInventory">
					<div class="row">
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Inventory</label>
							<div class="col-sm-10">
								<input type="text" id="inpNamaInv" name="nm_inventory" class="form-control" placeholder="Masukan Nama Inventory">
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
							<label class="col-sm-2 control-label">Jenis</label>
							<div class="col-sm-10">
								<input type="text" id="inpJenis" name="jenis" class="form-control" placeholder="Masukan Jenis">
							</div>
						</div>
					</div><br/>
					<div class="row">
						<div class="form-group">
							<label class="col-sm-2 control-label">Satuan</label>
							<div class="col-sm-10">
								<input type="number" id="inpSatuan" name="satuan" class="form-control" placeholder="Masukan Satuan">
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

		httpSend('inventory/getData', val).done(r => {
			if(r.msg == 'success') setTableList(r.inventory);
			else setNullTableList();
		});
	}

	function setTableList(data){
		$('#tableInventoryBody').empty();
		var strAppend = '';
		for(var i=0; i < data.length; i++){
			strAppend +=
				'<tr>'+
					'<td>'+(i+1)+'</td>'+
					'<td>'+data[i].nama_inventory+'</td>'+
					'<td>'+data[i].kategori_inventory+'</td>'+
					'<td>'+data[i].jenis_inventory+'</td>'+
					'<td>'+data[i].satuan+'</td>'+
					'<td>'+
						'<a class="btn btn-sm btn-danger" onclick="deleteList('+data[i].id_inventory+')">Delete</a> '+
						'<a class="btn btn-sm btn-info" onclick="editList('+data[i].id_inventory+')">Edit</a>'+
					'</td>'+
				'</tr>';
		}
		$('#tableInventory').append(strAppend);
	}

	function setNullTableList(){
		$('#tableInventoryBody').empty();
		var strAppend =
			'<tr>'+
				'<td colspan = "6" align="center">'+
					'Data Not Found'+
				'<td>'+
			'</tr>';
		$('#tableInventory').append(strAppend);
	}

	function simpanForm(){
		var val = {
			csrf_token: $('meta[name="csrf_token"]').attr('content'),
			valNamaInventory: $('#inpNamaInv').val(),
			valKategori: $('#inpKategori').val(),
			valJenis: $('#inpJenis').val(),
			valSatuan: $('#inpSatuan').val()
		};

		httpSend('inventory/simpanData', val).done(r => {
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
			valIdInventory: $('#idEditInventory').val(),
			valNamaInventory: $('#inpNamaInv').val(),
			valKategori: $('#inpKategori').val(),
			valJenis: $('#inpJenis').val(),
			valSatuan: $('#inpSatuan').val()
		};

		httpSend('inventory/simpanEditData', val).done(r => {
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
			csrf_token: $('meta[name="csrf_token"]').attr('content'), valIdInventory: val
		};

		httpSend('inventory/getSingleDataInventory', val).done(r => {
			if(r.msg == 'success') {
				$('#idEditInventory').val(r.inventory.id_inventory);
				$('#inpNamaInv').val(r.inventory.nama_inventory);
				$('#inpKategori').val(r.inventory.kategori_inventory);
				$('#inpJenis').val(r.inventory.jenis_inventory);
				$('#inpSatuan').val(r.inventory.satuan);
				$('#btnSimpan').hide(); $('#btnSimpanEdit').show();
				$('#rowList').hide(); $('#rowInput').show();
			}else {
				alert('Data Gagal Di Edit');
			}
		});
	}

	function deleteList(val) {
		var val = {
			csrf_token: $('meta[name="csrf_token"]').attr('content'), valIdInventory: val
		};

		httpSend('inventory/deleteData', val).done(r => {
			if(r.msg == 'success') {
				alert('Data Berhasil Di Delete');
				setDataTable();
			}else {
				alert('Data Gagal Di Delete');
			}
		});
	}

	function clearForm(){
		$('#idEditInventory').val('');
		$('#inpNamaInv').val('');
		$('#inpKategori').val('');
		$('#inpJenis').val('');
		$('#inpSatuan').val('');
	}
</script>