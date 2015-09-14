	<?php  
	include 'send_mail.php'; // send mail function
	if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
		header("Location:login.php");
	}
	$cid = $_GET['key'];
	$is = $_GET['is'];
	$query="SELECT emailid,name FROM contest WHERE cid=$cid";
	$run=mysql_query($query) or die(mysql_error());
	$result=mysql_fetch_array($run);
	$email_to=$result['emailid'];
	$e_name=$result['name'];
	
	$email=$_SESSION['email'];
	if (isset($_POST['contact_no']) && isset($_POST['reason']) ){
		
	$query="SELECT name FROM user WHERE emailid='$email'";
	$run=mysql_query($query) or die(mysql_error());
	$result=mysql_fetch_array($run);
	$name = $result['name'];
	$reason = $_POST['reason'];
	$contact = $_POST['contact_no'];
	$base_url= "http://localhost/star/activate_organiser.php?";
	$base_url_reject= "http://localhost/star/send_mail.php?";
	$contest_id = "passkey=".$cid."";
	$email_sen = "email=".$email."";
	
	$success ="status=1" ;
	$failure="status=0" ;
	
	$type="type=".$is."";
	$to = $email_to;   // now we just send the ur self
	$subject = "Regarding the participating the Evenet ";  // subject
		
	$body='Hi,

			I am '.$name.' .  I wish to apply for the post of  '.$is.' 
			I am interested in working and I would be fit for the same because,
		   	'.$reason.'
		   			
		   	Contact Number:  '.$contact.' 	
		   	Email  '.$email.'
		   			
		   	I look forward to your positive response.
		   			
		   	Have a good day.Thank you.
		   			 
		   	Regards 
		  	'.$name.'
		  						
			
		  	If you approve of the candidate applying and would like him/her to 
		  	work for you '.$is.' please click on this link.
			'.$base_url.''.$contest_id.'&'.$type.'&'.$email_sen.'&'.$success.'
			 You want to reject this '.$type.' please click on this link.
			'.$base_url1.''.$contest_id.'&'.$type.'&'.$email_sen.'&'.$failure.'
			';
	Send_Mail($to, $subject, $body);
	echo "<script>
		alert('Request has been sent to the organizer. Kindly wait for confirmation.');
		window.location.href='event_page.php?key=$cid';
		</script>";
	
	exit();
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
		<title>Star Contest</title>
 
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
				  
				</ol>
			<h2 class="page-title">Contact Organizer for:</h2>
			<h3><?php echo "$e_name";?></h3>
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
							<form role="form" action="contact.php?key=<?php echo $cid?>&is=<?php echo $is?>" method="post" >
								<div class="form-group">
									<label>Contact no:</label>
									<input type="number" class="form-control" name="contact_no" min="1000000000" max="10000000000" required>
								</div>
								<div class="form-group"> 
								 		<label>Give a reason for </label>
                						<textarea id="textarea" class="form-control"  name="reason" required></textarea>
              					</div>
								<div class="form-group">
									<label>Paricipate As:</label>	
	 				                <select name="type" disabled class="form-control" >
										<option value="volunteer" <?php if($is=='volunteer') echo 'selected'?> > Volunteer</option>
							            <option value="sub_org" <?php if($is=='sub_org') echo 'selected'?>> Sub-Organiser</option>					
									</select>
								</div>
																																																																																
								<div class="form-group">
								</div>
								 <input type="submit" class="btn btn-success" value="Send Request" >
							</form>
						</div><!-- /.contact-form-wrap -->
					</div><!-- /.col-sm-7 -->
					

				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.section -->
		<!-- END CONTACT SECTION -->
				
		

		
		
		<!-- BEGIN FOOTER -->
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
