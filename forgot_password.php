<?php
require 'connect.php';
include 'send_mail.php'; // send mail function

if(!empty($_SESSION['email'])){
	header("Location:home_page.php");
}

function generateRandomString($length = 5) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}
$sent=false;
if (isset($_POST['email'])) {
	$email = $_POST['email'];
	$query="SELECT * FROM user WHERE emailid='".$email."'";
	$result   = mysql_query($query);
	$count=mysql_num_rows($result);
	// If the count is equal to one, we will send message other wise display an error message.
	if($count!=0)
	{
		$rows=mysql_fetch_array($result);

		$pass = generateRandomString(5);  // generate random number string of length 5
		$pass_h = md5($pass);
		$activation =md5($rows['emailid'].time());
		$sqlupdate = "UPDATE user SET password='".$pass_h."' WHERE emailid='".$email."'";; //update the pass word qury
		mysql_query($sqlupdate);

		//Details for sending E-mai
		$to = $rows['emailid'];   // recovery email
		$subject = "Password Recovery";  // subject

		$body='Hi, We are sending the password . Please change your password after login.
			   email = '.$to.'
			   password ='.$pass.'
				';

		if(Send_Mail($to, $subject, $body)){
			$sent=true;
		}
		//send_confirnmation($to);
	}
	//If the message is sent successfully, display sucess message otherwise display an error message.
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
			  <?php if (isset($_POST['email'])){if($sent) echo "A mail for reset password has been sent to your Email account."; else echo "Not found your email in our database.";} else echo "Enter your email address to recover your password.";?>
			</div>
			<form role="form" action="forgot_password.php" method="POST">
				<div class="form-group has-feedback lg left-feedback no-label">
				  <input type="email" name="email" class="form-control no-border input-lg rounded" placeholder="Enter email" autofocus>
				  <span class="fa fa-envelope form-control-feedback"></span>
				</div>
				<div class="form-group">
					<button type="submit" name="submit" class="btn btn-warning btn-lg btn-perspective btn-block">RESET PASSWORD</button>
				</div>
			</form>
			<p class="text-center"><strong><a href="login.php">Back to login</a></strong></p>
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
		<script src="assets1/js/demo-panel-login.js"></script>
		
	</body>
</html>