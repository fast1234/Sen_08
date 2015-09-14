<?php
require_once 'connect.php';
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
 	header("Location:login.php");
}
$ci=$_GET['key'];
$myemailid=$_SESSION['email'];
$issub=false;
$isorg=false;
$query='SELECT * FROM suborg_works_in WHERE contestid='.$ci.' and emailid=\''.$myemailid.'\'';
$run=mysql_query($query) or die(mysql_error());
if(mysql_num_rows($run)!=0){
	$issub=true;
}
$query='SELECT * FROM contest WHERE cid='.$ci.' and emailid=\''.$myemailid.'\'';
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
	function Checkfiles()
            {
                var fup = document.getElementById('filename');
                var fileName = fup.value;
                var ext = fileName.substring(fileName.lastIndexOf('.') + 1);

            if(ext =="GIF" || ext=="gif" || ext =="JPEG" || ext=="jpeg" || ext =="png" || ext=="PNG" || ext=="JPG" || ext=="jpg")
            {
                return true;
            }
            else
            {
                alert("Upload gif,jpeg,jpg,png Images only");
                return false;
            }
            }		
          	
			
        </script>
	</head>
 
	<body class="tooltips no-padding">
		
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
			<h2 class="page-title">My Committee</h2>
			</div><!-- /.container -->
			
			<div class="border-bottom">
				<div class="container">
					<div class="border-bottom-color bg-info"></div>
				</div><!-- /.container -->
			</div><!-- /.border-bottom -->
		</div><!-- /.page-title-wrap -->
		<!-- END BERADCRUMB AND PAGE TITLE -->
		
		
		
		<!-- BEGIN FIRST SECTION -->
		<?php
		
		$query = "SELECT * FROM contest WHERE cid='$ci'";
		$result = mysql_query($query);
		$name=null;
		$fromdate=null;
		$todate=null;
		$venue=null;
		$s_time=null;
		$e_time=null;
		$city=null;
		$organization=null;
		
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { 
			$name=$row['name'].' ';
			$fromdate=$row['fromdate'];
			$todate=$row['todate'];
			$venue=$row['venue'];
			$s_time=$row['s_time'];
			$e_time=$row['e_time'];
			$city=$row['city'];
			$organization=$row['organization'];
		}	
		?>	
						
		
		<div class="section">
			<div class="container text-center">
				<h3><?php echo $name ;?></h3>
				<h4 class="light-font line-height-28 margin-top-50 margin-bottom-50">
				
				<?php  echo $venue.",".$city ?><br />
				<?php echo $fromdate ." TO ". $todate ?><br />
				<?php echo $s_time .' TO '. $e_time ?><br />
				</h4>
				<a href="forum.php?key=<?php echo $ci;?>" class="btn btn-lg btn-success btn-learn-more">Go to Forum</a>
			</div><!-- /.conatiner -->
		</div><!-- /.section -->
		<!-- END FIRST SECTION -->
		
		
		
		<!-- BEGIN PRICING TABLE 1 -->
		<div class="section">
			<div class="container">
				<div class="row">
				
				
				<?php
				
				//for the organizer
				//$ci=17;
				$query = "SELECT * FROM contest WHERE cid=$ci";
				$result = mysql_query($query);
				$row = mysql_fetch_array($result, MYSQL_ASSOC);
				$emailid=$row['emailid'];
				//echo $emailid;
				if($emailid==$myemailid){ 
					
					$query2 = "SELECT * FROM suborg_works_in WHERE contestid='$ci'";
					$result2 = mysql_query($query2);
					$tas=0;
					
					if(mysql_num_rows($result2)==0){?>
						<div class="section">
						<div class="container">
						<p class="text-center text-slogan">
						<b>This contest has no sub-organizers yet!</b>
						</p>
						</div><!-- /.container -->
						</div>
						<?php
					}
					
					while ($row2 = mysql_fetch_array($result2, MYSQL_ASSOC)) {
						$i=1 ;
						
						$eid=$row2['emailid'];	
						$qu = "SELECT * FROM user WHERE emailid='$eid'";
						$re = mysql_query($qu);
						$rr = mysql_fetch_array($re, MYSQL_ASSOC); 
						$name=$rr['name'];
						$task=$row2['task'];
						$payment=$row2['payment'];
						$budget=$row2['budget'];
						$des=$row2['des'];
						
						/*if(isset($_POST['submit'])){
								//echo 'i am in';
								$tas=$_POST['task'];
								echo $tas;
								$query4="UPDATE suborg_works_in SET task='$tas'  WHERE emailid='$eid'";
								echo $query4;
								$result4=mysql_query($query4);
								@$ans=mysql_fetch_array($result4, MYSQL_ASSOC);
						}*/
						
							
				?>
				
					<div class="col-sm-6 col-md-3">
						<div class="pricing-table-1">
							<div class="heading">
								 <span class="package"><?php echo "Suborganizer: 	".$name ?></span> 
							</div><!-- /.heading -->
							
							<div class="body">
							<form role="form" method="POST" action="get.php?key=<?php echo $ci;?>"onSubmit="if(!Checkfiles())return false;">
								<div class="list-package">
									Assign Task:<input type="word" name="task" value="<?php echo $task; ?>">
									Budget Alloted:<input type="word" name="budget" value="<?php echo $budget; ?>">
									               <input type="hidden" value="<?php echo $eid?>" name="email">
									 	           <input type="hidden" value="<?php echo $payment?>" name="payment">
								</div>
							                                                                              
								<center><button class="btn btn-success"  align ="centre" name="submit" >update </button></a></center>
								<div class="list-package"><left><label>Details of expenditure:</label></left><span><?php echo $des; ?></span>
								</div>
								
							</form>

							<!--<div class="list-package">Budget Alloted: <?php echo $budget ?></div>-->
							<div class="list-package">Budget remaining:<?php echo $payment ?>  </div>
							<!-- /.body -->
							<div button class="wrapper"><center><a href="http://localhost/star/images/<?php echo $eid.$ci;?>.jpg"  download target="_blank"><button class="btn btn-success">Download Bills/Documents</button></a></span><center>
							</div>
							</div>
						
						</div><!-- /.pricing-table-1 -->
					</div><!-- /.col-sm-3 -->
				<?php
					}
				}
				else{
					
				
				?>
				
				
				<?php			
				//for the remaining team
				//$ci=17;
				$query = "SELECT * FROM suborg_works_in WHERE contestid=$ci";
				$result = mysql_query($query);
				while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
					$des1=null;		
					$emailid=$row['emailid'];
					$qu = "SELECT * FROM user WHERE emailid='$emailid'";
					$re = mysql_query($qu);
					while ($rr = mysql_fetch_array($re, MYSQL_ASSOC)) { 
					$name=$rr['name'];
					}
					$task=$row['task'];
					$payment=$row['payment'];
					$budget=$row['budget'];
					if($emailid==$myemailid){
							if(isset($_POST['submit'])){
								$val=$_POST['exp'];
								$des1=$_POST['des1'];
								$payment-=$val;
								$query1="UPDATE suborg_works_in SET payment='$payment',des='$des1'  WHERE emailid='$myemailid'";
								$result1=mysql_query($query1);
								@$ans=mysql_fetch_array($result1, MYSQL_ASSOC);
							}
							
							/*if(isset($_POST['submit1'])){
								$des1=$_POST['des1'];
							
								$query5="UPDATE suborg_works_in SET des='$des1'  WHERE emailid='$emailid'";
								$result5=mysql_query($query5);
								@$ans=mysql_fetch_array($result5, MYSQL_ASSOC);
							}
							*/
							/*if(isset($_POST['submit2'])){
								$bill=$_POST['bill'];
								$query5="UPDATE suborg_works_in SET bill='$bill'  WHERE emailid='$emailid'";
								$result5=mysql_query($query5);
								@$ans=mysql_fetch_array($result5, MYSQL_ASSOC);
							}*/
						
					
				?>
				
					<div class="col-sm-6 col-md-3">
						<div class="pricing-table-1">
							<div class="heading">
								<span class="package">Hi <?php echo $name ?></span>
								<!--<span class="price"><font size="6"><?php echo $task ?></font></span>-->
								
							</div><!-- /.heading -->
							<div class="body">
							<center><div class="list"><center><label>Task Assigned:</label> <?php echo $task ?></center></div></center>
							<div class="list"><center><label>Budget Alloted:</label> <?php echo $budget ?></center></div>
							<div class="list"><center><label>Budget remaining:</label><?php echo $payment ?></center>  </div>
							<br>
							<form role="form" action="mycommittee.php?key=<?php echo $ci;?>" method="POST">
								<div class="list-package  align="center" >
									Add Expense:<input type=number name="exp" min=0 max=<?php echo $payment;?> >
								</div><!-- /.list-package -->
								<!--<center><button class="btn btnsuccess" align ="centre" name	="submit" <?php if($payment<=0){echo "disabled";}?> >submit</button></center>-->
								
								<div class="list-package" align=center" >
									Details of Expenditure: <input type=word name="des1" value="<?php echo $des1; ?>" >
								</div><!-- /.list-package--> 							
								<br><center><button  class="btn btn-success" align ="centre" name="submit" <?php if($payment<=0){echo "disabled";}?> >submit</button></center>
							</form>
							<br>
							<form action="mycommittee.php?key=<?php echo $ci;?>" method="post" enctype="multipart/form-data">
							<label>Upload jpg file containing all bills:</label><br>
							<input type="file" id="filename" name="fileToUpload" id="fileToUpload"><br>
							<center><input class="btn btn-success" type="submit" value="Upload Image" name="submit2" align="center"></center>
							
							</form>
						<?php							
						
						if(isset($_POST['submit2'])){
						$target_dir = "C:/xampp/htdocs/star/images/";
						$target_file = $target_dir .basename($_FILES["fileToUpload"]["name"]);
						//echo $target_file;
						$oldname=basename($_FILES["fileToUpload"]["name"]);
						$uploadOk = 1;
						$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						// Check if image file is a actual image or fake image
						if(isset($_POST["submit"])) {
							$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
							if($check !== false) {
								echo "File is an image - " . $check["mime"] . ".";
								$uploadOk = 1;
							} else {
								echo "File is not an image.";
								$uploadOk = 0;
							}
						}
						// Check if file already exists
						if (file_exists($target_file)) {
							echo "Sorry, file already exists.";
							$uploadOk = 0;
						}
						// Check file size
						if ($_FILES["fileToUpload"]["size"] > 700000) {
							echo "Sorry, your file is too large.";
							$uploadOk = 0;
						}
						// Allow certain file formats
						if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 
						&& $imageFileType != "gif" ) {
							echo "Sorry, only JPG file is  allowed.";
							$uploadOk = 0;
						}
						// Check if $uploadOk is set to 0 by an error
						if ($uploadOk == 0) {
							echo "Sorry, your file was not uploaded.";
						// if everything is ok, try to upload file
						} else {
							if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
								echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
								rename("$target_dir/$oldname","$target_dir/$emailid$ci.jpg");
								
							} else {
								echo "Sorry, there was an error uploading your file.";
							}
						}

						}
							
					?>
						
							</div><!-- /.body -->
							
							
						</div><!-- /.pricing-table-1 -->
					</div><!-- /.col-sm-3 -->
				<?php
					}
					}
				?>
				
				<?php
				//$ci=17;
				$query = "SELECT * FROM suborg_works_in WHERE contestid='$ci'";
				
				$result = mysql_query($query);
				$index=1;
			
				while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { 
					$emailid=$row['emailid'];
					$qu = "SELECT * FROM user WHERE emailid='$emailid'";
					
					$re = mysql_query($qu);
					while ($rr = mysql_fetch_array($re, MYSQL_ASSOC)) { 
					$name=$rr['name'];
					}
					$task=$row['task'];
					$payment=$row['payment'];
					$budget=$row['budget'];
					//$myemailid='y@y.com';
					if($emailid!=$myemailid){
						
					
				?>
				
					<div class="col-sm-6 col-md-3">
						<div class="pricing-table-1">
							<div class="heading">
								<span class="package">Details of <?php echo $name ?></span>
								<span class="price"><font size="6"><?php echo $task ?></font></span>
								
							</div><!-- /.heading -->
							<div class="body">
							<div class="list-package">Budget Alloted: <?php echo $budget ?></div>
							<div class="list-package">Budget remaining:<?php echo $payment ?>  </div>
							</div><!-- /.body -->
						</div><!-- /.pricing-table-1 -->
					</div><!-- /.col-sm-3 -->
				
			<?php
					
				$index++;
				}
			
			}
		}		
			?>	
		<!-- END PRICING TABLE 1 -->


		
</div>
</div>
</div>		
		
	
	
		
		
		
		
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
