<script type="text/javascript" src="<?php echo $themes_url; ?>js/jquery-2.1.0.min.js"></script>
<link href="<?php echo $themes_url ?>/css/signin.css" rel="stylesheet" type="text/css"/>
<body>
<div id="formWrapper">

<div id="form">
	<form action="<?php echo site_url('ucore/submit');?>" method="POST">
		<div class="logo">
		<g>
			<img src="<?php echo $themes_url; ?>/img/book.png" style="width:90%;height:15%;">
			
		</g>
		</div>
		<div class="form-item">
			<p class="formLabel">Email</p>
			<input type="text" name="uname" id="uname" class="form-style" autocomplete="off" required="" />
		</div>
		<div class="form-item">
			<p class="formLabel">Password</p>
			<input type="password" name="password" id="password" class="form-style" required="" />
			<div class="pw-view"><i class="fa fa-eye"></i></div>
			<p><a href="#" ><small>Forgot Password ?</small></a></p>	
		</div>
		<div class="form-item">
		<p class="pull-left"><a href="#"><small>Register</small></a></p>
		<input type="submit" name="tombol" class="login pull-right" value="Log In" onclick="lebetLogin()">
		<div class="clear-fix"></div>
		</div>
		<?php if ($e!="") { ?>	
			<div id="notifications" class="alert alert-danger alert-dismissable">
				<!-- <button type="button" class="form-style" data-dismiss="alert" aria-hidden="true">×</button> -->
				<font color="red">
				<?php 
					if ($e=="1") { echo "Username / Password Salah!</p>"; }
					if ($e=="2") { echo "Username / Password Tidak Terdaftar, Silahkan ajukan pendaftaran akun anda sebagai member Umrohnesias!"; }
					if ($e=="3") { echo "Travel Agent tidak aktif, Silahkan hubungi admin)!"; }
				?>
				</font>
			</div>
		<?php } ?>
	</form>
</div>

</div>
</body>
</html>

<script type="text/javascript">
	$('#notifications').slideDown('slow').delay(1500).slideUp('slow');
	$(document).ready(function(){
		var formInputs = $('input[type="email"],input[type="password"]');
		formInputs.focus(function() {
	       $(this).parent().children('p.formLabel').addClass('formTop');
	       $('div#formWrapper').addClass('darken-bg');
	       $('div.logo').addClass('logo-active');
		});
		formInputs.focusout(function() {
			if ($.trim($(this).val()).length == 0){
			$(this).parent().children('p.formLabel').removeClass('formTop');
			}
			$('div#formWrapper').removeClass('darken-bg');
			$('div.logo').removeClass('logo-active');
		});
		$('p.formLabel').click(function(){
			 $(this).parent().children('.form-style').focus();
		});
	});
	function lebetLogin()
	{
		$("#add_err").css('display', 'none', 'important');
		$("#add_err").css('display', 'inline', 'important');
		$("#add_err").html("<img src='<?php echo $themes_url;?>img/loading2.gif' style='height:75px;width:auto;'/>")
			   
	}
</script>