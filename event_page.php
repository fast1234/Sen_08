<?php
require 'connect.php';
require 'send_mail.php';

$login=true;
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
	$login=false;
// 	header("Location:login.php");
}
$isorg=false;
$vol=false;
$sub=false;
$part=false;
$isvol=false;
$issub=false;
$eid = $_GET['key'];	
if($login)$email=$_SESSION['email']; else $email='';
$query = "SELECT * FROM contest WHERE cid=".$eid ;
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result, MYSQL_ASSOC);
if($row['emailid']==$email){
	header("Location:manage_event.php?key=$eid");
}

if($row['vol_req']>0)
	$vol=true;
if($row['suborg_req']>0)
	$sub=true;

$query="SELECT * FROM participates_in WHERE contest_id=$eid and emailid='$email'";
$run=mysql_query($query) or die(mysql_error());
if(mysql_num_rows($run)!=0){
	$part=true;
}
$query="SELECT * FROM volunteers_in WHERE contest_id=$eid and emailid='$email'";
$run=mysql_query($query) or die(mysql_error());
if(mysql_num_rows($run)!=0){
	$isvol=true;
}
$query="SELECT * FROM suborg_works_in WHERE contestid=$eid and emailid='$email'";
$run=mysql_query($query) or die(mysql_error());
if(mysql_num_rows($run)!=0){
	$issub=true;
}
$query="SELECT * FROM contest WHERE cid=$eid and emailid='$email'";
$run=mysql_query($query) or die(mysql_error());
if(mysql_num_rows($run)!=0){
	$isorg=true;
}

if(isset($_POST['participate'])){
	send_notification();
	if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
		header("Location:login.php");
	}
	$query="INSERT INTO `sen_08`.`participates_in` (`emailid`, `contest_id`, `slot_id`, `opponent_id`, `feedback`) VALUES ('$email', '$eid', NULL, NULL, NULL)";
	$run=mysql_query($query) or die(mysql_error());
	$part=true;
}

// echo $row['name'];
// echo "<a href = register_event.php?key=$eid Register this Event</a><br>";
// echo "<a href = volunteer_event.php?key=$eid Volunteer this Event</a><br>";
// echo "<a href = suborganizer_event.php?key=$eid Become suborganizer of this Event</a><br>";

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
							<?php if(!$login) print "<a href=\"about_us.php\">About us</a>";?>
					</li>

					<li class="parent">
						<a href="my_profile.php"><?php if($login){
							$email=$_SESSION['email'];
$query1 = "SELECT * FROM `sen_08`.`user` WHERE `emailid`='$email' ";
$result1=mysql_query($query1);
	$row1 = mysql_fetch_array($result1, MYSQL_ASSOC);
							echo "Hi, ";
							echo $row1['name'];
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
				<ol class="breadcrumb">				</ol>
			<h2 class="page-title"><?php echo $row['name']?></h2>
			<h4><?php if($part) echo "You have participated this contest";?></h4>
			
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
						   </div>
						<form method="post">
						<input type='submit' name="participate" value="Participate" class="btn btn-lg btn-success btn-learn-more" <?php if($part||$isorg||$issub||$isvol) echo "style='display:none'"?> onclick="return confirm('Are you sure you want to paricipate this contest?');">
      <tr>  <tr>				<a href="contact.php?key=<?php echo $eid;?>&is=sub_org" class="btn btn-lg btn-success btn-learn-more" <?php if(!$sub||$part||$isorg||$issub||$isvol) echo "style='display:none'"?>>Be a suborganizer</a>
       	<tr>	<tr>			<a href="contact.php?key=<?php echo $eid;?>&is=volunteer" class="btn btn-lg btn-success btn-learn-more" <?php if(!$vol||$part||$isorg||$issub||$isvol) echo "style='display:none'"?>>Be a volunteer</a>
       					<a href="mycommittee.php?key=<?php echo $eid;?>" class="btn btn-lg btn-success btn-learn-more" <?php if(!$issub) echo "style='display:none'"?>>My committee</a>
       					
       					</form>
       
						   
						
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
									  Starts: <?php echo $row['s_time']." on ".$row['fromdate']?>  
								  </li>
								  <li class="list-group-item">
									  Ends: <?php echo $row['e_time']." on ".$row['todate']?>
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
									Organizer: <?php
												$name_o=$row['emailid'];
												$query="SELECT name FROM user WHERE user.emailid='$name_o'";
												$query_r=mysql_query($query);
												$tuple=mysql_fetch_array($query_r,MYSQL_ASSOC);
												echo $tuple['name']; 
												
										?>
							      </li>
								  <li class="list-group-item">
								    Organization: <?php echo $row['organization']?>
								  </li>
								  <li class="list-group-item">
								    Email: <?php echo $row['emailid']?>
								  </li>
								 	<li class="list-group-item">
								 	Contact: <?php echo $row['org_contact']?>
									</li>
									<li class="list-group-item">
								 	Volunteer Stipend: <?php echo $row['vstipend']?>
									</li>
									<?php
									if($row['suborg_req']>0){
									?>
									<li class="list-group-item">
								 	Suborganizer Payment: <?php echo $row['sstipend']?>
									</li>
									<?php
									}
									?>
	
<?php $addr=$row['venue'].', '.$row['city'];?>
<script type="text/javascript">
var address = <?php echo json_encode($addr); ?>;
</script>
    <meta charset="utf-8">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&libraries=places"></script>

    <style>
      #map {
        height: 200px;
        width: 250px;
        border: 1px solid #333;
        margin-top: 0.6em;
        vertical-align: center; 
      }
    </style>

    <script>
  var geocoder;
  var map;
      var infowindow;

      function initialize() {
        geocoder = new google.maps.Geocoder();
        var loca = new google.maps.LatLng(23.2200, 72.6800);

        map = new google.maps.Map(document.getElementById('map'), {
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          center: loca,
          zoom: 8
        });

      }

      function callback(results, status) {
        if (status == google.maps.places.PlacesServiceStatus.OK) {
          for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
          }
        }
      }

      function createMarker(place) {
        var placeLoc = place.geometry.location;
        var marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location
        });

        google.maps.event.addListener(marker, 'mouseover', function() {
          infowindow.setContent(place.name);
          infowindow.open(map, this);
        });
      }

  function codeAddress() {
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location
        });
        var request = {
          location: results[0].geometry.location,
          radius: 50000,
          name: 'ski',
          keyword: 'mountain',
          type: ['park']
        };
        infowindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(map);
        service.nearbySearch(request, callback);
      } else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
  }

      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
        
        <div id="text">
							  </li>
	  
								</ul>
							</div><!-- /.panel panel-default -->
	<form>
        <center><input type="button" class="btn btn-lg btn-success btn-learn-more" value="View the location" onclick="codeAddress();" ></input></center>
    </form>
    
    <div id="map"></div>
						</div><!-- /.section -->
						
					</div><!-- /.col-sm-4 col-md-3 -->
				</div><!-- /.row -->

				<div class="section-heading">
					<h3>More Contests from this category</h3>
				</div><!-- /.section-heading -->
				
				
						<?php 
							$s_date=date('Y-m-d');
							$cat=$row['category'];
							$query = "SELECT * FROM contest WHERE  category = '$cat' and fromdate>'$s_date'";
							$result = mysql_query($query);
							$count=0;
							while (($row1 = mysql_fetch_array($result, MYSQL_ASSOC)) && $count<4) {
							$count++; 
							$cid=$row1['cid'].' ';
							
							?>	
						<div id="work-mixitup" class="work-content similar-work">
					<div class="row">
						<!-- Begin work item -->
						<div class="col-sm-4 col-md-3 col-xs-6 mix literary">
							<div class="work-item">
								<div class="hover-wrap">
									<a href="event_page.php?key=<?php echo $cid; ?>">
									<i class="glyphicon glyphicon-plus icon-plus"></i>
									</a>
								</div><!-- /.hover-wrap -->
								<?php 
							$image="contest_img/$eid.jpg";
							if(file_exists($image)) $filename=$image; else $filename="contest_img/default.jpg";
							?>
								<img src='<?php echo $filename?>' height=205 width=200  alt="Img work">
								<div class="the-box no-border transparent no-margin">
									
									<p class="project-name"><?php echo $row1['name'].' '; ?></p>
									<p class="project-category"><?php echo $row1['venue'].', ';  echo $row1['city'].'   '; ?> </p>
								
								</div><!-- /.the-box no-border transparent -->
							</div><!-- /.work-item -->
						</div><!-- /.col-sm-4 col-md-3 col-xs-6 mix -->
						<!-- End work item -->
						<?php	
							}
						?>
						</div>
						</div>
							</div><!-- /.row -->
				</div><!-- /.work-content -->
				</div>
				</div></div>
		
		
		
		<!-- BEGIN FOOTER -->
		
		
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