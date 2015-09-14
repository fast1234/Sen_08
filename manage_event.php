<?php
require 'connect.php';
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
	header("Location:login.php");
}
$email = $_SESSION['email'];
if(!empty($_GET['key'])){
		$cid=$_GET['key'];
		$query = "SELECT * FROM contest WHERE cid='$cid' and emailid='$email'";
		$result = mysql_query($query) or die(mysql_error());
		if(mysql_num_rows($result)!=0){
			$eid=$_GET['key'];
			$query = "SELECT * FROM contest WHERE cid=".$eid ;
			$result = mysql_query($query) or die(mysql_error());
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
		}
		else
			die ('U are lost!');
}
else
	die ("U are lost!");
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
$query1 = "SELECT * FROM `sen_08`.`user` WHERE `emailid`='$email' ";
$result1=mysql_query($query1);
	$row1 = mysql_fetch_array($result1, MYSQL_ASSOC);
							echo "Hi, ";
							echo $row1['name'];
							
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
			<h2 class="page-title"><?php echo $row['name']?></h2>
			
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
						
						<!-- BLOG DETAIL SECTION -->
						<div class="section">
						   <ul class="media-list blog-list">
							  <li class="media">
								<a class="pull-left" >							<?php 
							$image="contest_img/$eid.jpg";
							if(file_exists($image)) $filename=$image; else $filename="contest_img/default.jpg";
							?>	
							<img class="media-object img-post" src="<?php echo $filename?>" alt="Image">
							</a>
							<div class="media-body">
									<h4 class="media-heading">
								
							
							Contest description
							<br><br>
							</h4>
							
							<p>
							<?php echo $row['description'];?>
							</p>
						</div><!-- /.media-body -->
							  </li>
						   </ul>
						   						

						<a href="edit_event.php?key=<?php echo $cid;?>" class="btn btn-lg btn-success btn-learn-more">Edit contest details</a>
        				<a href="view_participants.php?key=<?php echo $cid;?>" class="btn btn-lg btn-success btn-learn-more">View participants</a>
       					<a href="view_volunteers.php?key=<?php echo $cid;?>" class="btn btn-lg btn-success btn-learn-more">View volunteers</a>
       					<a href="mycommittee.php?key=<?php echo $cid;?>" class="btn btn-lg btn-success btn-learn-more">My committee</a>
       					
       
						
						</div><!-- /.section -->
						<!-- END BLOG DETAIL SECTION -->
						
							
					</div><!-- /.col-sm-8 col-md-9 -->
					<div class="col-sm-4 col-md-3">
						<div class="section sidebar">
							<div class="panel panel-square panel-success panel-no-border">
							  <div class="panel-heading lg">
								<h3 class="panel-title"><strong>Contest details</strong></h3>
							  </div>
							   <!-- List group -->
								<ul class="list-group success blog-detail-list square">
								  <li class="list-group-item">
									  Starts <?php echo $row['s_time']." on ".$row['fromdate']?>  
								  </li>
								  <li class="list-group-item">
									  Ends <?php echo $row['e_time']." on ".$row['todate']?>
								  </li>
								  <li class="list-group-item">
									  Category : <?php echo $row['category']?>
								  </li>
								  <li class="list-group-item">
									  Venue : <?php echo $row['venue']?>
								  </li>
								  <li class="list-group-item">
									  <?php echo $row['city']?>
								  </li>
								  <li class="list-group-item">
									Organizer: <?php echo $row['emailid']?>
							      </li>
								  <li class="list-group-item">
								    Organization: <?php echo $row['organization']?>
								  </li>
								  <li class="list-group-item">
								    Contact: <?php echo $row['emailid'].", ".$row['org_contact']?>
								  </li>
								  <?php 
								  if($row['vol_req']!=0){
								  ?>	  
								  <li class="list-group-item">
								    Stipend for Volunteer: <?php echo $row['vstipend']?>
								  </li>
								  <?php
								  }
								  ?>
								  <?php 
								  if($row['suborg_req']!=0){
								  ?>
								  <li class="list-group-item">
								    Stipend For Suborganizer: <?php echo $row['sstipend']?>
								  </li>
								 <?php
								  }
								  ?> 
								</ul>
							</div><!-- /.panel panel-default -->
							
						</div><!-- /.section -->
					</div><!-- /.col-sm-4 col-md-3 -->
				</div><!-- /.row -->
				</div>
		
		
		
		<!-- BEGIN FOOTER -->
	
		
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
		
		
		
		<!-- BEGIN BACK TO TOP BUTTON -->
		<div id="back-top">
			<i class="fa fa-chevron-up"></i>
		</div>
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