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

		<div class="col-sm-6">
					<h3>Topics:</h3>
                    <div class="contact-form-wrap"> 
<?php 

include "connect.php"; //mysql db connection here


print "<table class='table'>";

print "<tr><td width=10%>Topic</td><td width=30%>Topic Starter</td><td width=10%>Replies</td><td width='50%'>Last replied time</td></tr>";
$cid=$_GET['key'];
$getthreads="SELECT * from forumtutorial_posts where parentid='0' and contest_id=$cid order by lastrepliedto DESC";

$getthreads2=mysql_query($getthreads) or die("No threads here");

while($getthreads3=mysql_fetch_array($getthreads2))

{

  @$getthreads3[title]=strip_tags($getthreads3[title]);

  @$getthreads3[author]=strip_tags($getthreads3[author]);

  print "<tr><td><A href='message.php?id=$getthreads3[postid]&key=$cid'>$getthreads3[title]</a></td><td>$getthreads3[author]</td><td>$getthreads3[numreplies]</td><td>$getthreads3[showtime]<br>Last post by <b>$getthreads3[lastposter]</b></td></tr>";

}

print "</table>";



?>  
</div></div></body></html>