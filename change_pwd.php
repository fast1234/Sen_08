<?php


			require "connect.php";
			
			if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
				header("Location:login.php");
			}
			$key=0;
			if(isset($_POST['submit'])){
				$email=$_SESSION['email'];
				$query = "SELECT password FROM user WHERE emailid='$email'";
				$query_run=mysql_query($query);
				$row = mysql_fetch_array($query_run);
				if($row['password']==md5($_POST['cpw'])){
					$query_run = mysql_query($query) or die(mysql_error);
					if($_POST['pw']==$_POST['rpw']){
						$pwh=md5($_POST['pw']);
						$query="UPDATE user SET password='$pwh' WHERE emailid='$email'";
						$query_run = mysql_query($query) or die(mysql_error);
						header("Location:edit_profile.php");
					}
					else
						$key=1;
				}
				else
					$key=2;
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
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- PLUGINS CSS-->
		<link href="assets/plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
		<link href="assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
		<link href="assets/plugins/owl-carousel/owl.theme.css" rel="stylesheet">
		<link href="assets/plugins/owl-carousel/owl.transitions.css" rel="stylesheet">
		
		<!-- MAIN CSS (REQUIRED ALL PAGE)-->
		<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/css/style-responsive.css" rel="stylesheet">
 
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
 
	<body class="tooltips">
		
		<!--
		===========================================================
		BEGIN PAGE
		===========================================================
		-->
	
<!-- BEGIN TOP NAVBAR -->
		<div class="top-navbar dark-color">
			<div class="container">
			
				<!-- Begin logo -->
				<div class="logo">
					<a href="home_page.php"><img src="Images/logo.png" alt="Logo"></a>
				</div><!-- /.logo -->
				<!-- End logo -->
				
				<!-- Begin button toggle nav -->
				<!-- End button toggle nav -->
				
				<!-- Begin visible phone and search nav -->
				<!-- End visible phone and search nav -->
				
				<!-- Begin nav menu -->
				<ul class="menus">
					<li class="parent">
						<a href="home_page.php">Home</a>
						
					</li>
					<li class="parent">
						<a href="search_event.php">Browse Contests</a>
					</li>
				
					<li class="parent">
						<a href="my_profile.php"><?php 
							$email=$_SESSION['email'];
$query = "SELECT * FROM `sen_08`.`user` WHERE `emailid`='$email' ";
$result=mysql_query($query);
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
							echo "Hi, ";
							echo $row['name'];
							
							?></a>
						<ul class="sub-menus">
							<li class="sub-list"><a href="my_events.php">My Contests</a></li>
							<li class="sub-list"><a href="edit_profile.php">Edit profile</a></li>
							<li class="sub-list"><a href="logout.php">Logout</a></li>
							
						</ul>
					</li>
<!-- 					<li class="parent"><a href="contact.html">Contact Us</a></li> -->
					
					<!-- Begin right icon -->
					<!-- End right icon -->
				</ul>
				<!-- End nav menu -->
			</div><!-- /.container -->
		</div><!-- /.top-navbar -->
		<!-- END TOP NAVBAR -->		
		
		
		<!-- BEGIN BERADCRUMB AND PAGE TITLE -->
		<div class="page-title-wrap">
			<div class="container">
				<ol class="breadcrumb">
				  <li><a href="index.html">Home</a></li>
				  <li class="active">Contact</li>
				</ol>
			<h2 class="page-title">Change Password</h2>
			<h4>
			<?php if($key==1) echo "Passwords didnt match"; else if ($key==2) echo "Wrong currennt password.";;
			?>
			</h4>
			</div><!-- /.container -->
			
			<div class="border-bottom">
				<div class="container">
					<div class="border-bottom-color bg-info"></div>
				</div><!-- /.container -->
			</div><!-- /.border-bottom -->
		</div><!-- /.page-title-wrap -->
		<!-- END BERADCRUMB AND PAGE TITLE -->
		
		
		
		<!-- BEGIN CONTACT SECTION -->
		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-sm-7">
						<div class="contact-form-wrap">
							<form role="form" action="change_pwd.php" method="post">
								<div class="form-group">
									<label>Current Password:</label>
									<input type="password" name="cpw" class="form-control" required>
								</div>
								<div class="form-group">
									<label>New password:</label>
									<input type="password" name="pw" class="form-control" pattern=".{5,15}" required title="5 to 15 characters">
																	</div>
								<div class="form-group">
									<label>Repeat Password:</label>
									<input type="password" name="rpw" class="form-control" pattern=".{5,15}" required title="5 to 15 characters">
								</div>
							<input type="submit" class="btn btn-success" name="submit" value="Save password" >
							</form>
						</div><!-- /.contact-form-wrap -->
					</div><!-- /.col-sm-7 --></div></div></div>
					
					
					
					
		
		<!-- BEGIN CALL TO ACTION -->
		
		
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-4">
						<a href='about_us.php'><h4>ABOUT STAR CONTESTS</h4></a>
						<p>
								We are a software engineering team of 9 people at DA-IICT.
						Our platform addresses different aspects of contest/tournament/event organizing
						for organizers, participants, sub-organizers and volunteers. It is a platform for local talent and 
						local organizers.
						

						</p>
					</div><!-- /.col-sm-4 -->
					<div class="col-sm-6 col-md-3">
						<h4>CONTACT</h4>
						<div class="media media-contact">
						  <span class="pull-left">
							</span>
						  <div class="media-body">
							<address>
							  Software Engineering Project Team 8<br>
							  DAIICT<br>
							  
							  
							</address>
						  </div><!-- /.media-body -->
						</div><!-- /.media -->
						<div class="media media-contact">
						  <span class="pull-left">
							</span>
						  <div class="media-body">
							<address>
							  Star contests<br>
							  starcontests8@gmail.com
							  9898542584
							</address>
						  </div><!-- /.media-body -->
						</div><!-- /.media -->
					</div><!-- /.col-sm-3 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</footer><!-- /.section -->
		
		<div class="footer">
			<div class="container">
				<div class="row">
					<div class="col-sm-5">
						
					</div><!-- /.col-sm-5 -->
					<div class="col-sm-7 text-right">
						<ul class="list-inline">
						</ul>
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.footer -->
		<!-- END FOOTER -->
		
		
		
		<!-- END BACK TO TOP -->
		
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
		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/plugins/retina/retina.min.js"></script>
		<script src="assets/plugins/backstretch/jquery.backstretch.min.js"></script>
		<script src="assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="assets/plugins/owl-carousel/owl.carousel.min.js"></script>
		<script src="assets/plugins/mixitup/jquery.mixitup.js"></script>
		<script>
			$(document).ready(function(){
				$(function(){
				 var shrinkHeader = 250;
				  $(window).scroll(function() {
					var scroll = getCurrentScroll();
					  if ( scroll >= shrinkHeader ) {
						   $('.top-navbar').addClass('shrink-nav');
						}
						else {
						   $('.top-navbar').removeClass('shrink-nav');
						}
				  });
					function getCurrentScroll() {
						return window.pageYOffset || document.documentElement.scrollTop;
					}
				});
			})
		</script>
		<script src="assets/js/apps.js"></script>
	</body>
</html>