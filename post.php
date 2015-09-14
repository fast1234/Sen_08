<?php include "connect.php";
$cid=$_GET['key'];
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
	
		
		<!-- BEGIN CONTACT SECTION -->
		<div class="section">
			<div class="container">
				
                <div class="row">
					
                    <div class="col-sm-6">
					<h3>New Topic:</h3>
                    	<div class="contact-form-wrap">

							<form role="form" action ="forum.php?key=<?php echo $cid;?>" method="post">
								<div class="form-group">
<label>Name:</label>
									<?php
										$email=$_SESSION['email'];
$query = "SELECT * FROM user WHERE emailid='$email'" ;
			$result = mysql_query($query) or die(mysql_error());
			$row = mysql_fetch_array($result, MYSQL_ASSOC);										

									?>
									<input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" readonly>
									
								</div>
								<div class="form-group">
									<label>Subject:</label>
									<input type="text" name="subject"class="form-control"required>
								</div>
								
								<div class="form-group">
									<label>Message :</label>
									<textarea name="yourpost" style="height: 230px" class="form-control"required></textarea>
								</div>
								<input type="submit" name="submit" value="Post" class="btn btn-success">
							
						
<?php


if(isset($_POST['submit']))

{

   $name=$_POST['name'];
   $yourpost=$_POST['yourpost'];
   $subject=$_POST['subject'];
	$thedate=date("U"); //get unix timestamp
      $displaytime=date("F j, Y, g:i a");
      $subject=strip_tags($subject);
      $name=strip_tags($name);
      $yourpost=strip_tags($yourpost); 
      
      $insertpost="INSERT INTO forumtutorial_posts(author,title,post,showtime,realtime,lastposter,contest_id) values('$name','$subject','$yourpost','$displaytime','$thedate','$name','$cid')";
      mysql_query($insertpost) or die(mysql_error()); //insert post
      print "<br><br>Message posted.";

  
}
?>
</form>
</div></div></body>
</html>