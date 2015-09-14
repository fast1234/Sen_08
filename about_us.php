<?php
require_once 'connect.php';
$login=true;
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
	$login=false;
// 	header("Location:login.php");
}
// echo $login;
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
					<a href="index.html"><img src="Images/logo.png" alt="Logo"></a>
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
						<?php if(!$login) print "<a href=\"about_us.php\">About us</a>";?>
					</li>
				
					<li class="parent">
						<a href="my_profile.php"><?php if($login){
							$email=$_SESSION['email'];
$query = "SELECT * FROM `sen_08`.`user` WHERE `emailid`='$email' ";
$result=mysql_query($query);
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
							echo "Hi, ";
							echo $row['name'];
							}
							 else echo 'Login here';?></a>
						<?php if($login){?>
						<ul class="sub-menus">
							<li class="sub-list"><a href="my_events.php">My Contests</a></li>
							<li class="sub-list"><a href="edit_profile.php">Edit profile</a></li>
							<li class="sub-list"><a href="logout.php">Logout</a></li>
							
						</ul>
						<?php }?>
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

			<h2 class="page-title">About us</h2>
			</div><!-- /.container -->
			
			<div class="border-bottom">
				<div class="container">
					<div class="border-bottom-color bg-info"></div>
				</div><!-- /.container -->
			</div><!-- /.border-bottom -->
		</div><!-- /.page-title-wrap -->
		<!-- END BERADCRUMB AND PAGE TITLE -->
		
		
		
		<!-- BEGIN FIRST SECTION -->
		<!-- <div class="section">
			<div class="container text-center">
				<h3>Kami adalah kumpulan <span class="text-info">begundal</span> IT</h3>
				<h4 class="light-font line-height-28 margin-top-50">
				Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.<br />
				Typi non habent claritatem insitam est usus legentis in iis qui facit eorum claritatem.<br />
				Investigationes demonstraverunt lectores legere me lius quod<br />
				</h4>
			</div><!-- /.container -->
		</div><!-- /.section -->
		<!-- END FIRST SECTION --> 
		
		
		<!-- BEGIN ABOUT SECTION -->
		<div class="section">
			<div class="container">
				<div class="row">
						<!-- <h3 class="margin-bottom-30"><strong>More</strong> about us</h3> --> 
									<h4 class="light-font line-height-28 margin-top-50">
	
						A semester ago, we set out to build a platform that provides the local talent with a chance to prove itself, 
						a one-step solution for organizers to organize any contest/event, for participants to search for and register in
						contests of their interest in their locality and for sub-organizers and volunteers to search for relevant work 
						and apply for the same. In all, a platform that facilitates all aspects of contest/tournament/event organizing 
						for various entities. 
						</h4>
						</p>
						<p>
						<br>
						<h4>We are a mixed bag - developers, designers, authors, thinkers and web afficionados. We're comfortable being the 
						geniuses behind the scenes but sometimes people want to know who we are. WE ARE STAR-TECH.</h4>
						</p>
					<div class="col-sm-6">
						<!-- <div class="progress no-rounded progress-md">
						  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
							Twitter Bootstrap 85%
						  </div>
						</div> -->
						<!-- <div class="progress no-rounded progress-md">
						  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
							PHP MySQL 70%
						  </div>
						</div>
						<div class="progress no-rounded progress-md">
						  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
							Web Design 90%
						  </div>
						</div>
						<div class="progress no-rounded progress-md">
						  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
							UI and UX Design 80%
						  </div>
						</div>
						<div class="progress no-rounded progress-md">
						  <div class="progress-bar progress-bar-dark" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
							Wordpress 60%
						  </div>
						</div> --> 
					</div><!-- /.col-sm-6 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.section -->
		<!-- END ABOUT SECTION -->
		
		
		
		<!-- BEGIN FUN FACT -->
		 <div class="section bg-success text-center">
			<div class="container">
				<h2 class="margin-bottom-300">SOME FUN FACTS</h2><br><br>
				<div class="row">
					<div class="col-sm-3">
						<h1 class="number-fact">1</h1>
						<h1 class="content-fact"><i>Bossy Leader!</i></h1>
					</div><!-- /.col-sm-4 -->
					<div class="col-sm-3">
						<h1 class="number-fact">Countless</h1>
						<h1 class="content-fact"><i>Hours of work!</i></h1>
					</div><!-- /.col-sm-4 -->
					<div class="col-sm-3">
						<h1 class="number-fact">All</h1>
						<h1  class="content-fact"><i>Happy clients!</i></h1>
					</div><!-- /.col-sm-4 -->
					<div class="col-sm-3">
						<h1 class="number-fact">314</h1>
						<h1 class="content-fact"><i>Cups of coffee consumed!</i></h1>
					</div><!-- /.col-sm-4 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.section bg-success -->
		<!-- END FUN FACT --> 
		
		
		
		<!-- BEGIN THE TEAM -->
		
<div class="section">
		<div class="section">
			<div class="container">
				<div class="section-heading">
					<div class="inner-border"></div>
					<h3>MEET THE TEAM</h3>
				</div>
				<div class="section">
				<div class="container">
	<div class="row">
	
	<div class="col-md-4">
	</div>	
		<div class="col-sm-3">
						
						<div class="team-item danger">
							<h4 class="name">Prachi Kothari</h4>
							<!-- <img src="assets/img/avatar/medium/avatar-9.jpg" alt="Avatar" class="img-circle avatar"> --> 
							 <img src="Images/prachi.jpg" alt="Avatar" class="img-circle avatar"> 
							<p class="position">The KingPin</p>
							<p class="about">
							I am not bossy, I just have better ideas. Prachi is an amateur ornithologist.
							She has that laughter that makes her eyes sparkle, but wait for her to get angry and you won't know what hit you.
	
							</p>
							
						</div><!-- /.team-item -->
					</div>
					</div>
					
</div>
</div>					<!-- /.section-heading -->
				<div class="row">
					<div class="col-sm-3">
						<div class="team-item info">
							<h4 class="name">Yash Jain</h4>
							<img src="Images/yash.jpg" alt="Avatar" class="img-circle avatar">
							<p class="position">The Poindexter</p>
							<p class="about">
							Yash is an avid coder. C, C++, Java you name it, he knows it. 
							When Yash is not coding or getting psyched about his future, he watches James Bond Flicks.
							The name is Jain, Yash Jain.
							</p>
							
						</div><!-- /.team-item -->
					</div><!-- /.col-sm-3 -->
					<div class="col-sm-3">
						<div class="team-item success">
							<h4 class="name">Shivani Thakker</h4>
							<img src="Images/shivani.jpg" alt="Avatar" class="img-circle avatar">
							<p class="position">The Bibliophile</p>
							<p class="about">
							A true Gryffindor at heart.When Shivani is not working, she is holed up in a corner with a book. 
							Aspires to be at IIM-A. Her presence lights up the room. Doesn't stop talking, unless told to.
							</p>
							
						</div><!-- /.team-item -->
					</div><!-- /.col-sm-3 -->
					<div class="col-sm-3">
						<div class="team-item warning">
							<h4 class="name">Rachit Mishra</h4>
							<img src="Images/rachit.jpg" alt="Avatar" class="img-circle avatar">
							<p class="position">The Jocund One</p>
							<p class="about"> 
							Rachit likes to read and keep up with current affairs.
							Loves listening to rap music. Blogs about random stuff. Dreams to explore the Amazon Rainforest. 
							Fight club is Rachit's favorite movie. 
							
							</p>
							
						</div><!-- /.team-item -->
					</div><!-- /.col-sm-3 -->
					<div class="col-sm-3">
						<div class="team-item danger">
							<h4 class="name">Krupal Barot</h4>
							<img src="Images/krupal.jpg" alt="Avatar" class="img-circle avatar">
							<p class="position">The Samaritan</p>
							<p class="about">
							He is the 24-hour go-to-man. What he lacks in people skills, makes up for it with his coding skills. 
							Watches Hindi sitcoms in his free time. Give him any task and he won't disappoint you.
							</p>
							
						</div><!-- /.team-item -->
					</div></div></div></div>
<div class="section">
<div class="container">					
					<div class="row">
					<div class="col-sm-3">
						<div class="team-item info">
							<h4 class="name">Dhaval Chaudhary</h4>
							<img src="Images/dhaval.jpg" alt="Avatar" class="img-circle avatar">
							<p class="position">The Artist</p>
							<p class="about">
							His domain is front-end designing. Creates beautiful, usable layouts. Die-hard Shahrukh Khan fan. 
							Difficult to persuade.
							When Dhaval is not working, he is trying to beat Archit or Soham at DOTA. 
							</p>
							
						</div><!-- /.team-item -->
					</div>  
					<div class="col-sm-3">
						<div class="team-item success">
							<h4 class="name">Soham Darji</h4>
							<img src="Images/soham.jpg" alt="Avatar" class="img-circle avatar">
							<p class="position">The insufferable know-it-all</p>
							<p class="about">
							Crazy Lord of the Rings fan. Follows MinutePhysics religiously. He loves his bicycle.
							When he is not coding, he is either listening to music or trying to beat Dhaval or Archit at DOTA.
							</p>
							
						</div><!-- /.team-item -->
					</div><!-- /.col-sm-3 -->
				
					<div class="col-sm-3">
						<div class="team-item warning">
							<h4 class="name">Archit Gajjar</h4>
							<img src="Images/archit.jpg " data-rotate="90" alt="Avatar" class="img-circle avatar">
							<p class="position">The Dota Addict</p>
							<p class="about">
							His first love is Robotics. Loud music, fast driving. Pizza-lover. 
							When he is not working, he is trying to become Dendi or Mushi.
							</p>
							
						</div><!-- /.team-item -->
					</div><!-- /.col-sm-3 -->
					
					<div class="col-sm-3">
						<div class="team-item danger">
							<h4 class="name">Hardik Beladiya</h4>
							<img src="Images/hardik.png" alt="Avatar" class="img-circle avatar">
							<p class="position">The old music connoisseur</p>
							<p class="about">
							The future Elon Musk. Wants to work for renewable energy. 
							In his free time, he explores the internet or watches Captain Jack Sparrow at work.
							</p>
							
						</div><!-- /.team-item -->
					</div>
					</div><!-- /.col-sm-3 -->
					<!-- /.col-sm-3 -->
					
					<!-- /.col-sm-3 -->
				<!-- /.row -->
			</div><!-- .container -->
		</div><!-- /.section -->
		<!-- END THE TEAM -->
</div>		
		
		
		
		
		
		
		
		
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