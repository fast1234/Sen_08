<?php
include "connect.php"; //mysqli db connection here

$id=@$_GET['id'];
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
 	header("Location:login.php");
}
$ci=$_GET['key'];
$myemailid=$_SESSION['email'];
$issub=false;
$isorg=false;
$query="SELECT * FROM suborg_works_in WHERE contestid=$ci and emailid='$myemailid'";
$run=mysql_query($query) or die(mysql_error());
if(mysql_num_rows($run)!=0){
	$issub=true;
}
$query="SELECT * FROM contest WHERE cid=$ci and emailid='$myemailid'";
$run=mysql_query($query) or die(mysql_error());
if(mysql_num_rows($run)!=0){
	$isorg=true;
}
if(!$issub && !$isorg){
	die('u are lost!');
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

		
		<!-- BEGIN BERADCRUMB AND PAGE TITLE -->
		<div class="page-title-wrap">
			<div class="container">
				<ol class="breadcrumb">
				  
				</ol>
			<h2 class="page-title">My Committee</h2>
			</div></head>
 <!-- /.container -->
			
			<div class="border-bottom">
				<div class="container">
					<div class="border-bottom-color bg-info"></div>
				</div><!-- /.container -->
			</div><!-- /.border-bottom -->
		</div><!-- /.page-title-wrap -->
		<!-- END BERADCRUMB AND PAGE TITLE 
		
		
		<!-- BEGIN PRICING TABLE 1 -->
		<div class="section">
			<div class="container">
<?php 
$gettopic="SELECT * from forumtutorial_posts where postid='$id'";

$gettopic2=mysql_query($gettopic) or die("Could not get topic");

$gettopic3=mysql_fetch_array($gettopic2);


?>			
    
                <div class="row">
					
                    <div class="col-sm-6">
                    <a href='forum.php?key=<?php echo $ci?>' class='btn btn-lg btn-success btn-learn-more'>Back to main forum</a>
					<h3>Topic: <?php echo $gettopic3['title']?></h3>
                    	<div class="contact-form-wrap">

<?php 

print "<table class='table'>";

print "<tr><td width=40%><h3>Author</h3></td><td width=60%><h3>Post</td></h3></tr>";

print "<tr class='mainrow'><td valign='top'><strong>$gettopic3[author]</strong></td><td vakign='top'><strong>Last replied to at $gettopic3[showtime]</strong><br><br>";

$message=strip_tags($gettopic3['post']);

$message=nl2br($message);

print "<strong>$message</strong>";

print "</td></tr>";

$getreplies="Select * from forumtutorial_posts where parentid='$id' order by postid desc"; //getting replies

$getreplies2=mysql_query($getreplies) or die("Could not get replies");

while($getreplies3=mysql_fetch_array($getreplies2))

{

   print "<tr class='mainrow'><td valign='top'>$getreplies3[author]</td><td vakign='top'>Last replied to at $getreplies3[showtime]<br><br>";

   $message=strip_tags($getreplies3['post']);

   $message=nl2br($message);

   print "$message";

   print "</td></tr>";

}

print "</table>";

print "<form method='POST' action='reply.php?id=$id&key=$ci'><div class=\"form-group\">
			<label>Reply :</label>
			<textarea name=\"yourpost\" style=\"height: 130px\" class=\"form-control\"required></textarea>
</div>
				";
print "<input type='submit' name='submit' value='Reply' class='btn btn-success'>";
print "</div></div></div></form>";


?>  
								
</div></div></div></body></html>