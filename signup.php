<?php
require_once 'connect.php';
require_once 'send_mail.php';
if(!empty($_SESSION['email'])){
	header("Location: home_page.php");
}
$var=0;
//echo "iasnfc";
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pw']) && isset($_POST['rpw'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$pw=$_POST['pw'];
	$rpw=$_POST['rpw'];
	//echo $name;
	if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['pw']) && !empty($_POST['rpw']) ){
		$query = "SELECT emailid FROM user WHERE emailid='$email'";
		if($query_run= mysql_query($query)){
			if(mysql_num_rows($query_run)==0){
				if($pw==$rpw){
					$pwh=md5($pw);
					$query = "INSERT INTO `sen_08`.`user` (`emailid`, `name`, `dob`, `address`, `gender`, `city`, `pincode`, `state`, `password`) VALUES ('".mysql_real_escape_string($email)."', '".mysql_real_escape_string($name)."', '', '', '', '', '', '', '".$pwh."')";
					if($query_run=mysql_query($query)){
						send_activation($email);
						$var=3;
						//$_SESSION['email']=$email;
						//header('Location: login.php');
					}
					else echo 'Failed to connect database2.';
				}
				else $var=1;//echo 'Passwords didn\'t match. Re-enter password.';
			}
			else $var=2;//echo 'Email ID "'.$email.'" already registered.';
		}
		else echo 'Failed to connect database1.';
	}
	else echo 'All filds are required.';
}

function send_activation($to){
	$activation =md5($to.time());
	$sqlupdate = "UPDATE user SET activation ='".$activation."' WHERE emailid='".$to."'";;
	if (mysql_query($sqlupdate)){
		//echo "sucsefully query run";
	}
	$base_url='http://localhost/star/activation.php?passkey=';
	$activation =md5($to.time());
	$subject ="Email Verification" ;
	$body ='Hi,  We need to make sure your Email is valid. Please verify your email and get started using your Website account.
			'.$base_url.$activation.'';

	Send_Mail($to, $subject, $body);
	//echo "hello form the confirmation";

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
			<!-- 	<a href="http://themeforest.net/item/sentir-responsive-admin-and-dashboard-ui-kits/7700260?ref=arirusmanto" class="btn btn-block btn-danger btn-sm" id="btn-reset"><i class="fa fa-shopping-cart"></i> Buy this template</a>--> 
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
			  <?php if($var==1)echo "Passwords did't match."; else if($var==2) echo "This EmailId already registered." ; else if($var==0) echo "Come, Explore."; else if($var==3) echo "Registered! An email has been sent to your registered emailId. Please go through registration process." ?>
			</div>
			<form role="form" action="signup.php" method="POST">
				<div class="form-group has-feedback lg left-feedback no-label">
				  <input type="text" name="name" class="form-control no-border input-lg rounded" placeholder="Full name" value='<?php if(isset($_POST["name"])) echo $name;?>' autofocus required>
				  <span ></span>
				</div>
				<div class="form-group has-feedback lg left-feedback no-label">
				  <input type="email" name="email" class="form-control no-border input-lg rounded" placeholder="Enter email" value='<?php if(isset($_POST["email"])) echo $email;?>' required>
				  <span ></span>
				</div>
				<div class="form-group has-feedback lg left-feedback no-label">
				  <input type="password" name="pw" class="form-control no-border input-lg rounded" placeholder="Enter password" pattern=".{5,15}" required title="5 to 15 characters">
				  <span ></span>
				</div>
				<div class="form-group has-feedback lg left-feedback no-label" >
				  <input type="password" name="rpw" class="form-control no-border input-lg rounded" placeholder="Re-enter password" pattern=".{5,15}" required title="5 to 15 characters">
				  <span ></span>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-warning btn-lg btn-perspective btn-block">REGISTER</button>
				</div>
			</form>
			<p class="text-center"><strong><a href="login.php">Back to Login</a></strong></p>
		</div><!-- /.login-wrapper -->
		
		
		<!-- Text popup -->
		<div id="text-popup" class="white-popup wide mfp-with-anim mfp-hide">
			<h4>TERMS</h4>
			<p>
			Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
			</p>
			<p>
			Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
			</p>
			<hr />
			<h4>CONDITIONS</h4>
			<p>
			Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
			</p>
			<p>
			Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
			</p>
		</div>
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