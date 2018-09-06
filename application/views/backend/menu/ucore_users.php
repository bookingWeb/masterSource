<!-- Content Header (Page header) -->
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Data Users</h2>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('home');?>">Home</a></li>
			<li class="active"><strong>Edit Groups</strong></li>
		</ol>
	</div>
	<div class="col-lg-2"></div>
</div>
<!-- Main content -->
 <div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title"><h5>Data Users</h5></div>
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
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
							<tr>
								<th>No</th>
								<th>Nama Lengkap</th>
								<th>Username</th>
								<th>Email</th>
								<th>Status</th>
								<th class="text-center">Groups</th>
								<th class="text-center">Aksi</th>
							</tr>
							</thead>
							<tbody>
								<?php if(sizeof($data_users)>0) {
									
									for($i=0;$i<sizeof($data_users);$i++) {
										$no = $i+1;
										$nama_lengkap = $data_users[$i]['nama_lengkap'];
										$username = $data_users[$i]['username'];
										$email = $data_users[$i]['email'];
										$status = $data_users[$i]['user_status'];
										$group_id = $data_users[$i]['group_id'];
										$nama_group = $data_users[$i]['nama_group'];
										
										if($status == 1){$status = "Aktif";}
										else{$status = "Non-Aktif";}
								?>
								<tr>
									<td><?=$no;?></td>
									<td><?=$nama_lengkap;?></td>
									<td><?=$username;?></td>
									<td><?=$email;?></td>
									<td><?=$nama_group.'<br/>';?></td>
									<td class="text-center">
										<a href="<?php echo site_url('menu/edit_status'); ?>" type="button" class="btn btn-defaul btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Status"><?=$status;?></a>
									</td>
									<td class="text-center">
										<a href="<?php echo site_url('menu/edit_groups'); ?>" type="button" class="btn btn-defaul btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Groups">Edit Groups</a>
									</td>
								</tr>
								<?php } } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

