<?php
require 'connect.php';
if(!empty($_SESSION['email'])){
	header("Location:home_page.php");
}
$set=false;
if(@isset($_POST['email']) && @isset($_POST['password'])){
	$email=$_POST['email'];
	$password=$_POST['password'];
	if(@!empty($_POST['email']) && @!empty($_POST['password'])){	
		$password_h=md5($password);
		$query = "SELECT * FROM user WHERE emailid='".mysql_real_escape_string($email)."' AND password='".$password_h."'";
		if($query_run=mysql_query($query)){
			if(mysql_num_rows($query_run)==0){
				//echo 'Invalid username-password combination. Register <a href="login.php">Here</a>.';
				}
			else {
				$rows=mysql_fetch_array($query_run);
				if($rows['status']!=1){
					$set=true;
				}
				else{
					$_SESSION['email']=$email;
					header('Location: home_page.php');
				}
			}
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Sentir, Responsive admin and dashboard UI kits template">
		<meta name="keywords" content="admin,bootstrap,template,responsive admin,dashboard template,web apps template">
		<meta name="author" content="Ari Rusmanto, Isoh Design Studio, Warung Themes">
		<title>Star Contests</title>
 
		<!-- BOOTSTRAP CSS (REQUIRED ALL PAGE)-->
		<link href="assets1/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- PLUGINS CSS -->
		<link href="assets1/plugins/weather-icon/css/weather-icons.min.css" rel="stylesheet">
		<link href="assets1/plugins/prettify/prettify.min.css" rel="stylesheet">
		<link href="assets1/plugins/magnific-popup/magnific-popup.min.css" rel="stylesheet">
		<link href="assets1/plugins/owl-carousel/owl.carousel.min.css" rel="stylesheet">
		<link href="assets1/plugins/owl-carousel/owl.theme.min.css" rel="stylesheet">
		<link href="assets1/plugins/owl-carousel/owl.transitions.min.css" rel="stylesheet">
		<link href="assets1/plugins/chosen/chosen.min.css" rel="stylesheet">
		<link href="assets1/plugins/icheck/skins/all.css" rel="stylesheet">
		<link href="assets1/plugins/datepicker/datepicker.min.css" rel="stylesheet">
		<link href="assets1/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
		<link href="assets1/plugins/validator/bootstrapValidator.min.css" rel="stylesheet">
		<link href="assets1/plugins/summernote/summernote.min.css" rel="stylesheet">
		<link href="assets1/plugins/markdown/bootstrap-markdown.min.css" rel="stylesheet">
		<link href="assets1/plugins/datatable/css/bootstrap.datatable.min.css" rel="stylesheet">
		<link href="assets1/plugins/morris-chart/morris.min.css" rel="stylesheet">
		<link href="assets1/plugins/c3-chart/c3.min.css" rel="stylesheet">
		<link href="assets1/plugins/slider/slider.min.css" rel="stylesheet">
		<link href="assets1/plugins/salvattore/salvattore.css" rel="stylesheet">
		<link href="assets1/plugins/toastr/toastr.css" rel="stylesheet">
		<link href="assets1/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet">
		<link href="assets1/plugins/fullcalendar/fullcalendar/fullcalendar.print.css" rel="stylesheet" media="print">
		
		<!-- MAIN CSS (REQUIRED ALL PAGE)-->
		<link href="assets1/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="assets1/css/style.css" rel="stylesheet">
		<link href="assets1/css/style-responsive.css" rel="stylesheet">
 
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
 
	<body class="login tooltips">
		
		<!-- BEGIN PANEL DEMO -->
		<div class="box-demo">
			<div class="inner-panel">
				<div class="cog-panel" id="demo-panel"><i class="fa fa-cog fa-spin"></i></div>
				<p class="text-muted small text-center">COLOR SCHEMES</p>
				<div class="row text-center">
					<div class="col-xs-3">
						<div class="xs-tiles" data-toggle="tooltip" title="Default" id="color-reset">
							<div class="half-tiles bg-primary"></div>
							<div class="half-tiles bg-primary"></div>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="xs-tiles" data-toggle="tooltip" title="Success" id="bg-success">
							<div class="half-tiles bg-success"></div>
							<div class="half-tiles bg-success"></div>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="xs-tiles" data-toggle="tooltip" title="Info" id="bg-info">
							<div class="half-tiles bg-info"></div>
							<div class="half-tiles bg-info"></div>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="xs-tiles" data-toggle="tooltip" title="Danger" id="bg-danger">
							<div class="half-tiles bg-danger"></div>
							<div class="half-tiles bg-danger"></div>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="xs-tiles" data-toggle="tooltip" title="Warning" id="bg-warning">
							<div class="half-tiles bg-warning"></div>
							<div class="half-tiles bg-warning"></div>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="xs-tiles" data-toggle="tooltip" title="Dark" id="bg-dark">
							<div class="half-tiles bg-dark"></div>
							<div class="half-tiles bg-dark"></div>
						</div>
					</div>
				</div>
				<button class="btn btn-block btn-primary btn-sm" id="btn-reset">Reset to default</button>
				</div>
		</div>
		<!-- END PANEL DEMO -->
	
		
		
		
		<!--
		===========================================================
		BEGIN PAGE
		===========================================================
		-->
		<div class="login-header text-center">
			<a href="home_page.php"><img src="assets1/img/logo-login.png" class="logo" alt="Logo"></a>
		</div>
		<div class="login-wrapper">
			<div class="alert alert-warning alert-bold-border fade in alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <?php if(isset($_POST['email'])){if($set)echo "Please verify your email account."; else echo "Email-Password did not match." ;} else echo "Enter your EmaiId and Password."?>
			</div>
			<form role="form" action="login.php" method="POST">
				<div class="form-group has-feedback lg left-feedback no-label">
				  <input type="email" name="email" class="form-control no-border input-lg rounded" placeholder="Enter Email" autofocus required>
				  <span ></span>
				</div>
				<div class="form-group has-feedback lg left-feedback no-label">
				  <input type="password" name="password" class="form-control no-border input-lg rounded" placeholder="Enter password">
				  <span ></span>
				</div>
				<div class="form-group">
				  
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-warning btn-lg btn-perspective btn-block">LOGIN</button>
				</div>
			</form>
			<p class="text-center"><strong><a href="forgot_password.php">Forgot your password?</a></strong></p>
			<p class="text-center">or</p>
			<p class="text-center"><strong><a href="signup.php">Create new account</a></strong></p>
		</div><!-- /.login-wrapper -->
		<!--
		===========================================================
		END PAGE
		===========================================================
		-->
		
		<!--
		===========================================================
		Placed at the end of the document so the pages load faster
		===========================================================
		-->
		<!-- MAIN JAVASRCIPT (REQUIRED ALL PAGE)-->
		<script src="assets1/js/jquery.min.js"></script>
		<script src="assets1/js/bootstrap.min.js"></script>
		<script src="assets1/plugins/retina/retina.min.js"></script>
		<script src="assets1/plugins/nicescroll/jquery.nicescroll.js"></script>
		<script src="assets1/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="assets1/plugins/backstretch/jquery.backstretch.min.js"></script>
 
		<!-- PLUGINS -->
		<script src="assets1/plugins/skycons/skycons.js"></script>
		<script src="assets1/plugins/prettify/prettify.js"></script>
		<script src="assets1/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="assets1/plugins/owl-carousel/owl.carousel.min.js"></script>
		<script src="assets1/plugins/chosen/chosen.jquery.min.js"></script>
		<script src="assets1/plugins/icheck/icheck.min.js"></script>
		<script src="assets1/plugins/datepicker/bootstrap-datepicker.js"></script>
		<script src="assets1/plugins/timepicker/bootstrap-timepicker.js"></script>
		<script src="assets1/plugins/mask/jquery.mask.min.js"></script>
		<script src="assets1/plugins/validator/bootstrapValidator.min.js"></script>
		<script src="assets1/plugins/datatable/js/jquery.dataTables.min.js"></script>
		<script src="assets1/plugins/datatable/js/bootstrap.datatable.js"></script>
		<script src="assets1/plugins/summernote/summernote.min.js"></script>
		<script src="assets1/plugins/markdown/markdown.js"></script>
		<script src="assets1/plugins/markdown/to-markdown.js"></script>
		<script src="assets1/plugins/markdown/bootstrap-markdown.js"></script>
		<script src="assets1/plugins/slider/bootstrap-slider.js"></script>
		
		<script src="assets1/plugins/toastr/toastr.js"></script>
		
		<!-- FULL CALENDAR JS -->
		<script src="assets1/plugins/fullcalendar/lib/jquery-ui.custom.min.js"></script>
		<script src="assets1/plugins/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
		<script src="assets1/js/full-calendar.js"></script>
		
		<!-- EASY PIE CHART JS -->
		<script src="assets1/plugins/easypie-chart/easypiechart.min.js"></script>
		<script src="assets1/plugins/easypie-chart/jquery.easypiechart.min.js"></script>
		
		<!-- KNOB JS -->
		<!--[if IE]>
		<script type="text/javascript" src="assets1/plugins/jquery-knob/excanvas.js"></script>
		<![endif]-->
		<script src="assets1/plugins/jquery-knob/jquery.knob.js"></script>
		<script src="assets1/plugins/jquery-knob/knob.js"></script>

		<!-- FLOT CHART JS -->
		<script src="assets1/plugins/flot-chart/jquery.flot.js"></script>
		<script src="assets1/plugins/flot-chart/jquery.flot.tooltip.js"></script>
		<script src="assets1/plugins/flot-chart/jquery.flot.resize.js"></script>
		<script src="assets1/plugins/flot-chart/jquery.flot.selection.js"></script>
		<script src="assets1/plugins/flot-chart/jquery.flot.stack.js"></script>
		<script src="assets1/plugins/flot-chart/jquery.flot.time.js"></script>

		<!-- MORRIS JS -->
		<script src="assets1/plugins/morris-chart/raphael.min.js"></script>
		<script src="assets1/plugins/morris-chart/morris.min.js"></script>
		
		<!-- C3 JS -->
		<script src="assets1/plugins/c3-chart/d3.v3.min.js" charset="utf-8"></script>
		<script src="assets1/plugins/c3-chart/c3.min.js"></script>
		
		<!-- MAIN APPS JS -->
		<script src="assets1/js/apps.js"></script>
		<script src="assets1/js/demo-panel-login.js"></script>
		
	</body>
</html>