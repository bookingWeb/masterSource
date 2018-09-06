<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<link rel="icon" href="https://www.umrohnesia.id/umrohnesia/img/favicon.png" type="image/png"/>

    <title>UCore ERP | Login</title>

    <link href="<?php echo $themes_url; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $themes_url; ?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo $themes_url; ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo $themes_url; ?>css/ionicons.min.css" rel="stylesheet">
    <link href="<?php echo $themes_url; ?>css/loginstyle.css" rel="stylesheet">
	
	<script src="<?php echo $themes_url; ?>js/jquery-3.1.1.min.js"></script>	
	<script src="<?php echo $themes_url; ?>js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo $themes_url; ?>js/jquery-easyui/jquery.easyui.min.js"></script>	
	<script type="text/javascript" src="<?php echo $themes_url; ?>js/jquery.form.js"></script>
	
<style>
@media only screen and (min-width: 300px) 
{	  
	.form-box .body,
	.form-box .footer {
	  padding: 10px 20px;
	   background: none; 
	  color: #444;
	}
	.bg{
		background: url('http://localhost/umrohnes/erp/themes/backend/img-login/full.png');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-position: top right; 
		background-size: 270px 200px;
	}	
	
	.header{
		background: white !important;
	}
	h2{
		margin-top: -10px
	}
	.btn-custom{
		border-radius: 20px;
		width: 40%;
		background: #676a6c;
	}
	#form_lebet{
		margin-left: -20px
	}
	label{
		font-size: 18px;
		font-weight: 400
	}
	.form-box{
		margin-top: 30px
	}
	span{
		font-weight: 300
	}
	.margin{
		margin-left: 0px
	}
	.reg{
		font-weight: 500;
		text-decoration: underline;
	}
	
	.lf{
		width: auto; 
		height: 250px;
		position: absolute;
		z-index: -1;
		float: right;
		display: none;
	}
	.logos{
		width: 30%; 
		height: auto; 
		margin-bottom: 50px
	}
	img.vert-move {
		-webkit-animation: mover 1s infinite  alternate;
		animation: mover 1s infinite  alternate;
	}
	img.vert-move {
		-webkit-animation: mover 1s infinite  alternate;
		animation: mover 1s infinite  alternate;
	}
	@-webkit-keyframes mover {
		0% { transform: translateY(0); }
		100% { transform: translateY(-10px); }
	}
	@keyframes mover {
		0% { transform: translateY(0); }
		100% { transform: translateY(-10px); }
	}
}
@media only screen and (min-width: 768px) 
{
	.bg{
		background: url('http://localhost/umrohnes/erp/themes/backend/img-login/full.png');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-position: right; 
		background-size: 810px 640px;
	}	

	.header{
		background: white !important;
	}
	h2{
		margin-top: -10px
	}
	.btn-custom{
		border-radius: 20px;
		width: 40%;
		background: #676a6c;
	}
	#form_lebet{
		margin-left: -20px
	}
	label{
		font-size: 18px;
		font-weight: 400
	}
	.form-box{
		margin-top: 30px
	}
	span{
		font-weight: 300
	}
	.margin{
		margin-left: 0px
	}
	.reg{
		font-weight: 500;
		text-decoration: underline;
	}
	
	.lf{
		width: auto; 
		height: 250px;
		display: block;
	}
	.logos{
		width: 40%; 
		height: auto; 
		margin-bottom: 50px
	}
	img.vert-move {
		-webkit-animation: mover 1s infinite  alternate;
		animation: mover 1s infinite  alternate;
	}
	img.vert-move {
		-webkit-animation: mover 1s infinite  alternate;
		animation: mover 1s infinite  alternate;
	}
	@-webkit-keyframes mover {
		0% { transform: translateY(0); }
		100% { transform: translateY(-10px); }
	}
	@keyframes mover {
		0% { transform: translateY(0); }
		100% { transform: translateY(-10px); }
	}
}

@media only screen and (min-width: 1320px) 
{
	.bg{
		background: url('http://localhost/umrohnes/erp/themes/backend/img-login/full.png');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-position: right; 
		background-size: 850px 660px;
	}	

	.header{
		background: white !important;
	}
	h2{
		margin-top: -10px
	}
	.btn-custom{
		border-radius: 20px;
		width: 40%;
		background: #676a6c;
	}
	#form_lebet{
		margin-left: -20px
	}
	label{
		font-size: 18px;
		font-weight: 400
	}
	.form-box{
		margin-top: 30px
	}
	span{
		font-weight: 300
	}
	.margin{
		margin-left: 0px
	}
	.reg{
		font-weight: 500;
		text-decoration: underline;
	}
	
	.lf{
		width: auto; 
		height: 250px;
	}
	.logos{
		width: 65%; 
		height: auto; 
		margin-bottom: 50px
	}
	img.vert-move {
		-webkit-animation: mover 1s infinite  alternate;
		animation: mover 1s infinite  alternate;
	}
	img.vert-move {
		-webkit-animation: mover 1s infinite  alternate;
		animation: mover 1s infinite  alternate;
	}
	@-webkit-keyframes mover {
		0% { transform: translateY(0); }
		100% { transform: translateY(-10px); }
	}
	@keyframes mover {
		0% { transform: translateY(0); }
		100% { transform: translateY(-10px); }
	}
}
@media only screen and (min-width: 1920px) 
{
	.bg{
		background: url('http://localhost/umrohnes/erp/themes/backend/img-login/full.png');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-position: right; 
		background-size: 1080px 960px;
	}	

	.header{
		background: white !important;
	}
	h2{
		margin-top: -10px
	}
	.btn-custom{
		border-radius: 20px;
		width: 40%;
		background: #676a6c;
	}
	#form_lebet{
		margin-left: -20px
	}
	label{
		font-size: 18px;
		font-weight: 400
	}
	.form-box{
		margin-top: 30px
	}
	span{
		font-weight: 300
	}
	.margin{
		margin-left: 0px
	}
	.reg{
		font-weight: 500;
		text-decoration: underline;
	}
	
	.lf{
		width: auto; 
		height: 750px;
	}
	
	.logos{
		width: 80%; 
		height: auto; 
		margin-top: 150px
		margin-bottom: 50px
	}
	img.vert-move {
		-webkit-animation: mover 1s infinite  alternate;
		animation: mover 1s infinite  alternate;
	}
	img.vert-move {
		-webkit-animation: mover 1s infinite  alternate;
		animation: mover 1s infinite  alternate;
	}
	@-webkit-keyframes mover {
		0% { transform: translateY(0); }
		100% { transform: translateY(-10px); }
	}
	@keyframes mover {
		0% { transform: translateY(0); }
		100% { transform: translateY(-10px); }
	}
}
</style>
</head>
	<body class="bg">
		<div class="row">
			<div class="col-md-1 col-sm-12">
				<img src="<?php echo $themes_url;?>logo/color/long.png" class="lf vert-move">
			</div>
			<div class="col-md-4 col-sm-11">
				<div class="form-box" id="login-box">
					<img src="<?php echo $themes_url;?>logo/color/1.png" class="logos vert-move">
				<h2>Enterprise</h2>
				<h2>Resource</h2>
				<h2>Planning</h2>
					<form action="<?php echo site_url('ucore/submit');?>" method="POST">
						<div class="body" style="padding:0 0 0 0">
							<div class="form-group">
								<label class="form-group">Username</label>
								<input type="text" id="uname" name="uname" class="form-control" style="border-bottom: 1px solid #676a6c; border-radius: 0px !important; margin-top:-10px; background: none" />
							</div>
							<div class="form-group">
								<label class="form-group">Password</label>
								<input type="password" id="upass" name="upass" class="form-control"  style="border-bottom: 1px solid #676a6c; border-radius: 0px !important; margin-top:-10px; background: none"/>
							</div>          							   
						</div>
						<div class="footer" style="padding:20px 0 0 0">    								
							<button type="submit" onclick="lebetLogin()" id="tombol" name="tombol" value="tombol" class="btn bg-olive btn-custom">Login</button>  
							  <div class="form-group">
								<div class="err" id="add_err"></div>					
							</div>                 
						</div>
						<?php if ($e!="") { ?>	
							<div id="notifications" class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<i class="icon fa fa-ban"></i>
								<?php 
									if ($e=="1") { echo "Username / Password Salah!"; }
									if ($e=="2") { echo "Username / Password Tidak Terdaftar, Silahkan ajukan pendaftaran akun anda sebagai member Umrohnesias!"; }
									if ($e=="3") { echo "Travel Agent tidak aktif, Silahkan hubungi admin)!"; }
								?>
							</div>
						<?php } ?>
					</form>
				</div>
			</div>
			<div class="col-md-7  col-sm-1 ks">
				
			</div>
		</div>
		
		<script>   
			$('#notifications').slideDown('slow').delay(1500).slideUp('slow');
		</script>
		
		<script>
			function lebetLogin()
			{
				$("#add_err").css('display', 'none', 'important');
				$("#add_err").css('display', 'inline', 'important');
				$("#add_err").html("<img src='<?php echo $themes_url;?>img-login/loading2.gif' style='height:75px;width:auto;'/>")
					   
			}
		</script>
	</body>
</html>
