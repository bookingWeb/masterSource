<!-- Content Header (Page header) --><div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Menu Permissions</h2>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('home');?>">Home</a></li>
			<li class="active"><strong>Permissions</strong></li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<!-- Main content -->
 <div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title"><h5>Form Edit Permissions</h5></div>
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
					<form action="<?php echo site_url('menu/edit_menu');?>" method="post" id="form_edit">
						<div class="form-group">
							<label>User Group</label>
							<div class="input-group">
								<select id="group_id" name="group_id" class="form-control">
									<?php foreach ($groups as $k => $v) :?>
									<option value="<?php echo $v['id'];?>" <?php if ( isset($group_id) && $group_id == $v['id']) echo 'selected="selected"';?>>
										<?php echo $v['group'];?> - 
										<?php echo $v['deskripsi'];?>
									</option>
									<?php endforeach;?>
								</select>
								<span class="input-group-btn">
									<button class="btn btnCustom btn-primary" type="submit" id="btn_select_group" name="btn_select_group" value="OK" style="margin-top:0px"><i class="fa fa-refresh"></i></button>
								</span>
							</div>
						</div>
						<hr />
						<div class="row">
							<div class="col-md-12">
								<?php echo $menu_html;?>
							</div>
						</div>
						<hr />
						<div class="form-group">
							<button class="btn btn-primary" type="submit" id="btn_submit" name="btn_submit" value="Save"> Simpan </button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

