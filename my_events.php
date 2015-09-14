<?php
require 'connect.php';
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
	header("Location:login.php");
}
$email = $_SESSION['email'];

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Sentir, Responsive admin and dashboard UI kits template">
		<meta name="keywords" content="admin,bootstrap,template,responsive admin,dashboard template,web apps template">
		<meta name="author" content="Ari Rusmanto, Isoh Design Studio, Warung Themes">
		<title>StarContests</title>
 
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
			<h2 class="page-title">My contests</h2>
			</div><!-- /.container -->
			
			<div class="border-bottom">
				<div class="container">
					<div class="border-bottom-color bg-info"></div>
				</div><!-- /.container -->
			</div><!-- /.border-bottom -->
		</div><!-- /.page-title-wrap -->
		<!-- END BERADCRUMB AND PAGE TITLE -->
		
		
		<!-- BEGIN LATEST WORK SECTION -->
		<div class="section work-section">
			<div class="container">
				<div class="section-heading">
					<div class="inner-border"></div>
									</div><!-- /.section-heading -->
				
				<ul class="work-category-wrap">
					
					<li class="filter" data-filter="Participated" >Participated</li>
					<li class="filter" data-filter="Organized">Organized</li>
					<li class="filter" data-filter="Suborganized">Suborganized</li>
					<li class="filter" data-filter="Volunteered">Volunteered</li>
					
				</ul>
				
				
				<div id="work-mixitup" class="work-content">
					<div class="row">
						
						
						<?php 
							$query = "SELECT * FROM contest,participates_in WHERE participates_in.emailid='$email' and contest_id=cid";
					$result = mysql_query($query);
							while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { 
							$image="contest_img/".$row['cid'].".jpg";
							if(file_exists($image)) $filename=$image; else $filename="contest_img/default.jpg";
							$cid=$row['cid'].' ';
							//echo $cid;
							?>	
						<!-- Begin work item -->
						<div class="col-sm-4 col-md-3 col-xs-6 mix Participated">
						<div class="work-item">
						<div class="hover-wrap">
					
						<a href="event_page.php?key=<?php echo $cid ?>"> 
						<i class="glyphicon glyphicon-plus icon-plus"></i>
						</a>						
						</div><!-- /.hover-wrap -->	
						
								<img src="<?php echo $filename;?>" height=205 width=200  alt="Img work">
								<div class="the-box no-border transparent no-margin">
									
									<p class="project-name"><?php echo $row['name'].' '; ?></p>
									<p class="project-category"><?php echo $row['venue'].', ';  echo $row['city'].'   '; ?> </p>
									
								</div><!-- /.the-box no-border transparent -->
							
						</div><!-- /.work-item -->
						</div><!-- /.col-sm-4 col-md-3 col-xs-6 mix -->
						<!-- End work item -->
						
						
						   <?php	
							}
						?>
						
						<?php 
							$query = "SELECT * FROM contest WHERE emailid='$email'";
					$result = mysql_query($query);
							while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { 
							$image="contest_img/".$row['cid'].".jpg";
							if(file_exists($image)) $filename=$image; else $filename="contest_img/default.jpg";
							$cid=$row['cid'].' ';
							?>	
						
						
						<!-- Begin work item -->
						<div class="col-sm-4 col-md-3 col-xs-6 mix Organized">
							<div class="work-item">
								<div class="hover-wrap">
						<a href="event_page.php?key=<?php echo $cid ?>"> 
									<i class="glyphicon glyphicon-plus icon-plus"></i>
									</a>
								</div><!-- /.hover-wrap -->
								
								<img src="<?php echo $filename;?>" height=205 width=200  alt="Img work">
								<div class="the-box no-border transparent no-margin">
									<p class="project-name"><?php echo $row['name'].' '; ?></p>
									<p class="project-category"><?php echo $row['venue'].', ';  echo $row['city'].'   '; if($row['is_live']==0) echo "(Make it live)";?> </p>
								</div><!-- /.the-box no-border transparent -->
							</div><!-- /.work-item -->
						</div><!-- /.col-sm-4 col-md-3 col-xs-6 mix -->
						<!-- End work item -->
						<?php	
							}
						?>
						
						
						
						
						
						
						<?php 
							$query = "SELECT * FROM contest,suborg_works_in WHERE suborg_works_in.emailid='$email' and contestid=cid";
					$result = mysql_query($query);
							
							$count=0;
							while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { 
							$count++;
							$image="contest_img/".$row['cid'].".jpg";
							if(file_exists($image)) $filename=$image; else $filename="contest_img/default.jpg";
							$cid=$row['cid'].' ';
							
							?>	
						
						<!-- Begin work item -->
						<div class="col-sm-4 col-md-3 col-xs-6 mix Suborganized">
							<div class="work-item">
								<div class="hover-wrap">
						<a href="event_page.php?key=<?php echo $cid ?>"> 
									<i class="glyphicon glyphicon-plus icon-plus"></i>
									</a>
								</div><!-- /.hover-wrap -->
								<img src="<?php echo $filename;?>" height=205 width=200  alt="Img work">
								<div class="the-box no-border transparent no-margin">
									
									<p class="project-name"><?php echo $row['name'].' '; ?></p>
									<p class="project-category"><?php echo $row['venue'].', ';  echo $row['city'].'   '; ?> </p>
								
								</div><!-- /.the-box no-border transparent -->
							</div><!-- /.work-item -->
						</div><!-- /.col-sm-4 col-md-3 col-xs-6 mix -->
						<!-- End work item -->
						<?php	
							}
						?>
						
						
						
						
						
						
						
						
						<?php 
							$query = "SELECT * FROM contest,volunteers_in WHERE volunteers_in.emailid='$email' and contest_id=cid";
					$result = mysql_query($query);
							
							$count=0;
							while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { 
							$count++;
							$image="contest_img/".$row['cid'].".jpg";
							if(file_exists($image)) $filename=$image; else $filename="contest_img/default.jpg";
							$cid=$row['cid'].' ';
							
							?>	
						
						<!-- Begin work item -->
						<div class="col-sm-4 col-md-3 col-xs-6 mix Volunteered">
							<div class="work-item">
								<div class="hover-wrap">
						<a href="event_page.php?key=<?php echo $cid ?>"> 
									<i class="glyphicon glyphicon-plus icon-plus"></i>
									</a>
								</div><!-- /.hover-wrap -->
								
								<img src="<?php echo $filename;?>" height=205 width=200  alt="Img work">
								<div class="the-box no-border transparent no-margin">
									
									<p class="project-name"><?php echo $row['name'].' '; ?></p>
									<p class="project-category"><?php echo $row['venue'].', ';  echo $row['city'].'   '; ?> </p>
								
								</div><!-- /.the-box no-border transparent -->
							</div><!-- /.work-item -->
						</div><!-- /.col-sm-4 col-md-3 col-xs-6 mix -->
						<!-- End work item -->
						<?php	
							}
						?>
						
						
						
						
						
						
					</div><!-- /.row -->
				</div><!-- /#work-mixitup -->
				
			</div><!-- /.container -->
		</div><!-- /.section -->
		<!-- END LATEST WORK SECTION -->
		
		
		
	
		
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