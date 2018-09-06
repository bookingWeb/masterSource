<!-- Content Header (Page header) -->
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Menu Tambah</h2>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('home');?>">Home</a></li>
			<li class="active"><strong>Tambah Menu</strong></li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<!-- Main content -->
 <div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title"><h5>Form Tambah Menu</h5></div>
				<div class="ibox-content">
					<?php if (!empty($errors)): ?> 
						<div class="row">
							<div class="alert alert-danger alert-dismissable"> 
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> 
								<h4><i class="icon fa fa-ban"></i> Error!</h4> 
								<span class="content">
									<?php echo trim($errors); ?>
								</span>
							</div> 
						</div>
					<?php endif; ?>
					<form id="form-validation-menu" action="" method="POST" class="form-horizontal">
						<div class="form-group">
							<label class="col-md-3 control-label" for="val-parent">
								Parent Menu
								<span class="text-danger">*</span>
							</label>
							<div class="col-md-8">
								<select class="form-control" id="parent" name="parent" style="width:100%;">
									<option value="0">Pilih Parent</option>
									<?php foreach($data_parent as $parent) {
										echo "<option value='".$parent['idmenu']."'>".$parent['nama_menu']."</option>";
									} ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="nama_menu	">
								Nama Menu
								<span class="text-danger">*</span>
							</label>
							<div class="col-md-8">
								<input type="text" id="nama_menu" name="nama_menu" class="form-control"
									placeholder="Enter your nama menu">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="url	">
								Url
								<span class="text-danger">*</span>
							</label>
							<div class="col-md-8">
								<input type="text" id="url" name="url" class="form-control"
									placeholder="Enter your url">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="status">
								Status
								<span class="text-danger">*</span>
							</label>
							<div class="col-md-8">
								<label>
									<input type="radio" name="status" value="1" class="square-blue"
										   checked>
								</label>
								<label class="m-l-10">
									Active
								</label>
								<label>
									<input type="radio" name="status" value="0" class="square-blue">
								</label>
								<label class="m-l-10">
									Not Active
								</label>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="icon">
								Icon
								<span class="text-danger">*</span>
							</label>
							<div class="col-md-8">
								<input type="text" id="icon" name="icon" class="form-control"
									placeholder="fa fa-contoh (contoh : user)">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="sequence">
								Urutan Menu
								<span class="text-danger">*</span>
							</label>
							<div class="col-md-8">
								<select class="form-control" id="sequence" name="sequence" style="width:100%;">
									<option value="0">Pilih Urutan</option>
									<?php for($i=1;$i<=10;$i++){
										echo "<option value='".$i."'>".$i."</option>";
									} ?>
								</select>
							</div>
						</div>
						<div class="row"><hr></div>
						<div class="form-group form-actions">
							<div class="pull-right">
								<div class="col-md-12">
									<button type="submit" name="simpan" value="simpan" class="btn btn-effect-ripple btn-primary">Simpan</button>
									<button type="reset" class="btn btn-effect-ripple btn-default reset_btn">Reset</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>   
    $('#notifications').slideDown('slow').delay(3500).slideUp('slow');
</script>

<script>
$(document).ready(function () {
	$('#form-validation-menu').bootstrapValidator({
		fields: {
			parent: {
				validators: {
					notEmpty: {
						message: 'The parent is required and cannot be empty'
					}
				}
			},
			nama_menu: {
				validators: {
					notEmpty: {
						message: 'The nama_menu is required and cannot be empty'
					}
				}
			},
			url: {
				validators: {

					notEmpty: {
						message: 'The url is required and cannot be empty'
					}
				}
			},
			icon: {
				validators: {
					notEmpty: {
						message: 'The icon is required and cannot be empty'
					}
				}
			},
			sequence: {
				validators: {
					notEmpty: {
						message: 'The secuence is required and cannot be empty'
					}
				}
			},
		},
	}).on('reset', function (event) {
		$('#form-validation-menu').data('bootstrapValidator').resetForm();
	});
	
	$('#terms').on('ifChanged', function (event) {
		$('#form-validation-menu').bootstrapValidator('revalidateField', $('#terms'));
	});
	$('.reset_btn').on('click', function () {
		var icheckbox = $('.custom_icheck');
		var radiobox = $('.custom_radio');
		icheckbox.prop('defaultChecked') == false ? icheckbox.iCheck('uncheck') : icheckbox.iCheck('check').iCheck('update');
		radiobox.prop('defaultChecked') == false ? radiobox.iCheck('uncheck') : radiobox.iCheck('check').iCheck('update');
	});
});
</script>

<!-- begining of page level js -->
<script type="text/javascript" src="<?php echo $themes_url; ?>vendors/bootstrapvalidator/js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="<?php echo $themes_url; ?>vendors/bootstrap-maxlength/js/bootstrap-maxlength.js"></script>
<script type="text/javascript" src="<?php echo $themes_url; ?>vendors/sweetalert2/js/sweetalert2.min.js"></script>
<script type="text/javascript" src="<?php echo $themes_url; ?>vendors/card/jquery.card.js"></script>
<script type="text/javascript" src="<?php echo $themes_url; ?>vendors/iCheck/js/icheck.js"></script>
<script src="<?php echo $themes_url; ?>js/passtrength/passtrength.js"></script>
<script type="text/javascript" src="<?php echo $themes_url; ?>js/custom_js/form2.js"></script>
<script type="text/javascript" src="<?php echo $themes_url; ?>js/custom_js/form3.js"></script>
<script type="text/javascript" src="<?php echo $themes_url; ?>js/custom_js/form_validations.js"></script>
<!-- end of page level js -->

