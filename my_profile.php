<?php

require_once 'connect.php';
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
	header("Location:login.php");
}
if(isset($_GET['key'])){
	$email = $_GET['key'];
}else
	$email=$_SESSION['email'];
$query = "SELECT * FROM `sen_08`.`user` WHERE `emailid`='$email' ";
if($result=mysql_query($query)){
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	$name=$row['name'];
	$date=$row['dob'];
	$sex=$row['gender'];
	$add=$row['address'];
	$city=$row['city'];
	$pin=$row['pincode'];
	$state=$row['state'];
	$emailid=$row['emailid'];
	$contact=$row['contact'];
	$award=$row['award'];
}
else
	echo "Failed to fetch infomation";

	
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Sentir, Responsive admin and dashboard UI kits template">
		<meta name="keywords" content="admin,bootstrap,template,responsive admin,dashboard template,web apps template">
		<meta name="author" content="Ari Rusmanto, Isoh Design Studio, Warung Themes">
		<title>STAR CONTESTS</title>
 
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
<!-- 						<a href="about_us.php">About us</a> -->
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
				 
				</ol>
			<h2 class="page-title"><?php echo $name; ?> </h2>
			<h4></h4>
			</div><!-- /.container -->
			
			<div class="border-bottom">
				<div class="container">
					<div class="border-bottom-color bg-info"></div>
				</div><!-- /.container -->
			</div><!-- /.border-bottom -->
		</div><!-- /.page-title-wrap -->
		<!-- END BERADCRUMB AND PAGE TITLE -->
		
		
		
				<div class="container">
				<div class="row">
					<div class="col-sm-8 col-md-9">
						
						<!-- BLOG LIST SECTION -->
						<div class="section">
						   <ul class="media-list blog-list">
							  <li class="media">
								<a class="pull-left" >
								<?php 
							$image="usr_img/$emailid.jpg";
							if(file_exists($image)) $filename=$image; else $filename="usr_img/default.jpg";
							?>
								  <img class="media-object img-post" src="<?php echo $filename; ?>">
								</a>
								<div class="media-body">
									<h4><strong>Awards and achievements:</strong><br></h4>
									<p>
									<?php echo $award;?>
									<br><br>
									<h4><strong>Areas of interest:</strong><br></h4>
									<?php 
									$query = "SELECT * FROM `sen_08`.`interested_in` WHERE `emailid`='$email' ";
									$result=mysql_query($query) or die(mysql_error());
									while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
										echo $row['category']."<br> ";
									}
										
									?>

									</p>
								</div><!-- /.media-body -->
							  </li>
						   </ul>
						   
						   
						   <!-- Begin pagination -->
							<!-- End pagination -->
						</div><!-- /.section -->
						<!-- END BLOG LIST SECTION -->
						<?php if($email==$_SESSION['email'])
					{

						?>
					
					<a href="edit_profile.php" class="btn btn-lg btn-success btn-learn-more">Edit profile</a>
					<br><br><br>
					<?php
}
					?>
						
					</div><!-- /.col-sm-8 col-md-9 -->
					
					
					<div class="col-sm-4 col-md-3">
					
						<!-- BEGIN SIDEBAR -->
						<div class="section sidebar">
							
							<!-- Begin blog detail -->
							<div class="panel panel-square panel-success panel-no-border">
							  <div class="panel-heading lg">
								<h3 class="panel-title"><strong>Details</strong></h3>
							  </div>
							   <!-- List group -->
								<ul class="list-group success blog-detail-list square">
								  <li class="list-group-item">
									 Contact: <?php echo $contact; ?>
								  </li>
								  <li class="list-group-item">
								  	 Email: <?php echo $emailid; ?>
							
								  </li>
								  <li class="list-group-item">
									  Address: <?php echo $add; ?>
									  

								  </li>
								  <li class="list-group-item">
									  City: <?php echo $city; ?>

								  </li>
								  <li class="list-group-item">
									  Born on: <?php echo $date; ?>

								  </li>
								</ul>
							</div><!-- /.panel panel-default -->
							<!-- End blog detail -->
							
							
							<!-- Begin Categories -->
							
						
						</div><!-- /.section -->
						<!-- END SIDEBAR -->
						
					</div><!-- /.col-sm-4 col-md-3 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		
		
      
		
		<!-- BEGIN FOOTER -->
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-4">
						<a href="about_us.php"><h4>ABOUT STAR CONTESTS</a></h4>
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
		
        
        </body>
</html>
					