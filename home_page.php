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
		
		<script type="text/javascript">
		
		spge = '<?php $c=0;?>';

		// then
		//alert(spge);

		</script>
	</head>
 
	<body class="tooltips no-padding">
		
		<!--
		===========================================================
		BEGIN PAGE
		===========================================================
		-->
	
		
		<!-- BEGIN TOP NAVBAR -->
		<div class="top-navbar">
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
		
		
		
		<!-- BEGIN HEADER FULL IMAGE SLIDE -->
		<div class="full-slide-image" id="full-img-slide">
			<div class="slide-inner more-padding">
				<div class="slide-text-content">
					<div class="container-fluid">
						<h1> <font size="7">If it's not here, it's not happening</font></h1>
						<div class="clear"></div>
						<h3>
						<i>"All of us do not have equal talents, but all of us should have an equal opportunity to develop our talents</i><br><i>-John F. Kennedy"</i>
						</h3>
						<div class="clear"></div>
						<a href="create_event.php">
						<button class="btn btn-lg btn-warning btn-learn-more btn-border-only">Create a Contest</button></a>
						<a href="search_event.php" class="btn btn-lg btn-success btn-learn-more">Participate</a>
					</div><!-- /.container -->
				</div><!-- /.slide-text-content -->
			</div><!-- /.slide-inner -->
		</div><!-- /.full-slide-image -->
		<!-- END HEADER FULL IMAGE SLIDE -->
		
		
		
		<!-- BEGIN TEXT SECTION -->
		<div class="section">
			<div class="container">
			<p class="text-center text-slogan">
			We at StarContests believe that the saddest thing in life is wasted talent. We provide you with a one step platform to create, participate, suborganize or volunteer for any contest/tournament/event.
			

			</p>
			</div><!-- /.container -->
		</div><!-- /.section -->
		<!-- END TEXT SECTION -->
		
		<!-- BEGIN FEATURE SECTION -->
		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="the-box bg-danger no-border box-feature text-center">
							<h4 class="heading"><b>CREATE A CONTEST</b></h4>
							<div class="p-wrap">
								<p>
									Organizing a contest? Post all your details here and we'll make your life easier.
								</p>
							</div><!-- /.p-wrap -->
							<div class="btn-wrap">
								<a href="create_event.php" button class="btn btn-danger btn-learn-more">DO IT NOW</button></a>
							</div><!-- /.btn-wrap -->
						</div><!-- /.the-box bg-danger no-border box-feature text-center -->
					</div><!-- /.col-sm-3 -->
				<div class="col-sm-3">
						<div class="the-box bg-warning no-border box-feature text-center">
							<h4 class="heading"><b>PARTICIPATE</b></h4>
							<p>
								Get to know about contests of your interests happening around you and register here.
							</p>
							<div class="btn-wrap">
								<a href="search_event.php" button class="btn btn-warning btn-learn-more">DO IT NOW</button></a>
							</div><!-- /.btn-wrap -->
						</div><!-- /.the-box bg-warning no-border box-feature text-center -->
					</div><!-- /.col-sm-3 -->
					<div class="col-sm-3">
						<div class="the-box bg-success no-border box-feature text-center">
							<h4 class="heading"><b>BE A SUBORGANIZER</b></h4>
							<p>
							Looking for some experience along with earning some money? Well, that is possible.
							</p>
							<div class="btn-wrap">
								<a href="search_event.php" button class="btn btn-success btn-learn-more">DO IT NOW</button></a>
							</div><!-- /.btn-wrap -->
						</div><!-- /.the-box bg-success no-border box-feature text-center -->
					</div><!-- /.col-sm-3 -->
					<div class="col-sm-3">
						<div class="the-box bg-info no-border box-feature text-center">
							<h4 class="heading"><b>BE A VOLUNTEER</b>	</h4>
							<p>
							Looking for some volunteering experience? Make a difference, every person counts!
							</p>
							<div class="btn-wrap">
								<a href="search_event.php" button class="btn btn-info btn-learn-more">DO IT NOW</button></a>
							</div><!-- /.btn-wrap -->
						</div><!-- /.the-box bg-info no-border box-feature text-center -->
					</div><!-- /.col-sm-3 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.section -->
		<!-- END FEATURE SECTION -->
		
		
		
		
		
		<!-- BEGIN LATEST WORK SECTION -->
		<div class="section work-section">
			<div class="container">
				<div class="section-heading">
					<div class="inner-border"></div>
					<h3>Upcoming contests</h3>
				</div><!-- /.section-heading -->
				
				<ul class="work-category-wrap">
					
					<li class="filter" data-filter="sports" >Sports</li>
					<li class="filter" data-filter="music">Music</li>
					<li class="filter" data-filter="arts" onclick="c();">Arts</li>
					<li class="filter" data-filter="food">Food and Drink</li>
					<li class="filter" data-filter="literary">Literary</li>
					<li class="filter" data-filter="classes">Classes</li>
					<li class="filter" data-filter="other">Miscellaneous</li>
					
				</ul>
				
				
				<div id="work-mixitup" class="work-content">
					<div class="row">
						
						
						<?php 
						$c=0;
						$s_date=date('Y-m-d');
							$query = "SELECT * FROM contest WHERE  category='sports' and fromdate>'$s_date'";
							$result = mysql_query($query);
							$count=0;
							while (($row = mysql_fetch_array($result, MYSQL_ASSOC)) && $count<12) { 
							$count++;
							$image="contest_img/".$row['cid'].".jpg";
							if(file_exists($image)) $filename=$image; else $filename="contest_img/default.jpg";
							$cid=$row['cid'].' ';
							//echo $cid;
							?>	
						<!-- Begin work item -->
						<div class="col-sm-4 col-md-3 col-xs-6 mix sports">
						<div class="work-item">
						<div class="hover-wrap">
					
						<a href="event_page.php?key=<?php echo $cid ?>"> 
						<i class="glyphicon glyphicon-plus icon-plus"></i>
						</a>						
						</div><!-- /.hover-wrap -->	
						
								<img src="<?php echo $filename;?>" height=205 width=200  alt="Img work">
								<div class="the-box no-border transparent no-margin">
									
									<p class="project-name"><?php echo $row['name'].' '; ?></p>
									<p class="project-category"><?php echo $row['city'].'   '; ?> </p>
									<p class="project-category"><?php echo $row['fromdate']; ?> </p>
									
								</div><!-- /.the-box no-border transparent -->
							
						</div><!-- /.work-item -->
						</div><!-- /.col-sm-4 col-md-3 col-xs-6 mix -->
						<!-- End work item -->
						
						
						   <?php	
							}
							?>
						
						<?php 
							$query = "SELECT * FROM contest WHERE  category='music'  and fromdate>'$s_date'";
							$result = mysql_query($query);
							$count=0;
							while (($row = mysql_fetch_array($result, MYSQL_ASSOC))&&$count<12) { 
							$count++;
							$image="contest_img/".$row['cid'].".jpg";
							if(file_exists($image)) $filename=$image; else $filename="contest_img/default.jpg";
							$cid=$row['cid'].' ';
							?>	
						
						
						<!-- Begin work item -->
						<div class="col-sm-4 col-md-3 col-xs-6 mix music" >
							<div class="work-item">
								<div class="hover-wrap">
						<a href="event_page.php?key=<?php echo $cid ?>"> 
									<i class="glyphicon glyphicon-plus icon-plus"></i>
									</a>
								</div><!-- /.hover-wrap -->
								
								<img src="<?php echo $filename;?>" height=205 width=200  alt="Img work">
								<div class="the-box no-border transparent no-margin">
									<p class="project-name"><?php echo $row['name'].' '; ?></p>
									<p class="project-category"><?php  echo $row['city'].'   '; ?> </p>
								<p class="project-category"><?php echo $row['fromdate']; ?> </p>
									
								</div><!-- /.the-box no-border transparent -->
							</div><!-- /.work-item -->
						</div><!-- /.col-sm-4 col-md-3 col-xs-6 mix -->
						<!-- End work item -->
						<?php	
							}
						?>
						
						
						
						
						
						
						<?php 
							$query = "SELECT * FROM contest WHERE  category='arts'  and fromdate>'$s_date'";
							$result = mysql_query($query);
							
							$count=0;
							while (($row = mysql_fetch_array($result, MYSQL_ASSOC)) && $count<12) { 
							$count++;
							$image="contest_img/".$row['cid'].".jpg";
							if(file_exists($image)) $filename=$image; else $filename="contest_img/default.jpg";
							$cid=$row['cid'].' ';
							
							?>	
						
						<!-- Begin work item -->
						<div class="col-sm-4 col-md-3 col-xs-6 mix arts">
							<div class="work-item">
								<div class="hover-wrap">
						<a href="event_page.php?key=<?php echo $cid ?>"> 
									<i class="glyphicon glyphicon-plus icon-plus"></i>
									</a>
								</div><!-- /.hover-wrap -->
								<img src="<?php echo $filename;?>" height=205 width=200  alt="Img work">
								<div class="the-box no-border transparent no-margin">
									
									<p class="project-name"><?php echo $row['name'].' '; ?></p>
									<p class="project-category"><?php echo $row['city'].'   '; ?> </p>
								<p class="project-category"><?php echo $row['fromdate']; ?> </p>
									
								</div><!-- /.the-box no-border transparent -->
							</div><!-- /.work-item -->
						</div><!-- /.col-sm-4 col-md-3 col-xs-6 mix -->
						<!-- End work item -->
						<?php	
							}
						?>
						
						
						<?php 
							$query = "SELECT * FROM contest WHERE  category='food' and fromdate>'$s_date'";
							$result = mysql_query($query);
							
							$count=0;
							while (($row = mysql_fetch_array($result, MYSQL_ASSOC)) && $count<12) { 
							$count++;
							$image="contest_img/".$row['cid'].".jpg";
							if(file_exists($image)) $filename=$image; else $filename="contest_img/default.jpg";
							$cid=$row['cid'].' ';
							
							?>	
						
						<!-- Begin work item -->
						<div class="col-sm-4 col-md-3 col-xs-6 mix food">
							<div class="work-item">
								<div class="hover-wrap">
						<a href="event_page.php?key=<?php echo $cid ?>"> 
									<i class="glyphicon glyphicon-plus icon-plus"></i>
									</a>
								</div><!-- /.hover-wrap -->
								
								<img src="<?php echo $filename;?>" height=205 width=200  alt="Img work">
								<div class="the-box no-border transparent no-margin">
									
									<p class="project-name"><?php echo $row['name'].' '; ?></p>
									<p class="project-category"><?php echo $row['city'].'   '; ?> </p>
								<p class="project-category"><?php echo $row['fromdate']; ?> </p>
									
								</div><!-- /.the-box no-border transparent -->
							</div><!-- /.work-item -->
						</div><!-- /.col-sm-4 col-md-3 col-xs-6 mix -->
						<!-- End work item -->
						<?php	
							}
						?>
						
					
						<?php 
							$query = "SELECT * FROM contest WHERE  category='literary' and fromdate>'$s_date'";
							$result = mysql_query($query);
							
							$count=0;
							while (($row = mysql_fetch_array($result, MYSQL_ASSOC)) && $count<12) { 
							$count++;
							$image="contest_img/".$row['cid'].".jpg";
							if(file_exists($image)) $filename=$image; else $filename="contest_img/default.jpg";
							$cid=$row['cid'].' ';
							
							?>	
						
						<!-- Begin work item -->
						<div class="col-sm-4 col-md-3 col-xs-6 mix literary">
							<div class="work-item">
								<div class="hover-wrap">
						<a href="event_page.php?key=<?php echo $cid ?>"> 
									<i class="glyphicon glyphicon-plus icon-plus"></i>
									</a>
								</div><!-- /.hover-wrap -->
								<img src="<?php echo $filename;?>" height=205 width=200  alt="Img work">
								<div class="the-box no-border transparent no-margin">
									
									<p class="project-name"><?php echo $row['name'].' '; ?></p>
									<p class="project-category"><?php echo $row['city'].'   '; ?> </p>
								<p class="project-category"><?php echo $row['fromdate']; ?> </p>
									
								</div><!-- /.the-box no-border transparent -->
							</div><!-- /.work-item -->
						</div><!-- /.col-sm-4 col-md-3 col-xs-6 mix -->
						<!-- End work item -->
						<?php	
							}
						?>
						
						
						
						
						<?php 
							$query = "SELECT * FROM contest WHERE  category='classes' and fromdate>'$s_date'";
							$result = mysql_query($query);
							
							$count=0;
							while (($row = mysql_fetch_array($result, MYSQL_ASSOC)) && $count<12) { 
							$count++;
							$image="contest_img/".$row['cid'].".jpg";
							if(file_exists($image)) $filename=$image; else $filename="contest_img/default.jpg";
							$cid=$row['cid'].' ';
							
							?>	
						
						<!-- Begin work item -->
						<div class="col-sm-4 col-md-3 col-xs-6 mix classes">
							<div class="work-item">
								<div class="hover-wrap">
						<a href="event_page.php?key=<?php echo $cid ?>"> 
									<i class="glyphicon glyphicon-plus icon-plus"></i>
									</a>
								</div><!-- /.hover-wrap -->
								<img src="<?php echo $filename;?>" height=205 width=200  alt="Img work">
								<div class="the-box no-border transparent no-margin">
									
									<p class="project-name"><?php echo $row['name'].' '; ?></p>
									<p class="project-category"><?php echo $row['city'].'   '; ?> </p>
								<p class="project-category"><?php echo $row['fromdate']; ?> </p>
									
								</div><!-- /.the-box no-border transparent -->
							</div><!-- /.work-item -->
						</div><!-- /.col-sm-4 col-md-3 col-xs-6 mix -->
						<!-- End work item -->
						<?php	
							}
						?>
						
						
						
						
						<?php 
							$query = "SELECT * FROM contest WHERE  category='other' and fromdate>'$s_date'";
							$result = mysql_query($query);
							
							$count=0;
							while (($row = mysql_fetch_array($result, MYSQL_ASSOC)) && $count<12) { 
							$count++;
							$image="contest_img/".$row['cid'].".jpg";
							if(file_exists($image)) $filename=$image; else $filename="contest_img/default.jpg";
							$cid=$row['cid'].' ';
							
							?>	

						<!-- Begin work item -->
						<div class="col-sm-4 col-md-3 col-xs-6 mix other">
							<div class="work-item">
								<div class="hover-wrap">
						<a href="event_page.php?key=<?php echo $cid ?>"> 
									<i class="glyphicon glyphicon-plus icon-plus"></i>
									</a>
								</div><!-- /.hover-wrap -->
								<img src="<?php echo $filename;?>" height=205 width=200  alt="Img work">
								<div class="the-box no-border transparent no-margin">
									
									<p class="project-name"><?php echo $row['name'].' '; ?></p>
									<p class="project-category"><?php echo $row['city'].'   '; ?> </p>
								<p class="project-category"><?php echo $row['fromdate']; ?> </p>
									
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
			$("#full-img-slide").backstretch([
			  "Images/1.jpg",
			  "Images/2.jpg",
			  "Images/3.jpg",
			  "Images/4.jpg",
			  "Images/5.jpg"
			  ], {
				fade: 750,
				duration: 6000
			});
		</script>
		<script>
			$(document).ready(function(){
				$(function(){
				 var shrinkHeader = 250;
				  $(window).scroll(function() {
					var scroll = getCurrentScroll();
					  if ( scroll >= shrinkHeader ) {
						   $('.top-navbar').addClass('shrink-nav');
						   $('.top-navbar').addClass('dark-color');
						}
						else {
						   $('.top-navbar').removeClass('shrink-nav');
						   $('.top-navbar').removeClass('dark-color');
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