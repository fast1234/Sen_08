<?php
require 'connect.php';
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
	header("Location:login.php");
}
$email = $_SESSION['email'];
$update=false;
if(!empty($_GET['key'])){
		$cid=$_GET['key'];
		$query = "SELECT * FROM contest WHERE cid='$cid' and emailid='$email'";
		$result = mysql_query($query) or die(mysql_error());
		if(mysql_num_rows($result)!=0){
			$email = $_SESSION['email'];
			$query = "SELECT * FROM `sen_08`.`contest` WHERE `cid`='$cid' ";
			if($result=mysql_query($query)){
				$row = mysql_fetch_array($result, MYSQL_ASSOC);
				$name=$row['name'];
				$cat=$row['category'];
				$city=$row['city'];
				$desc=$row['description'];
				$e_time=$row['e_time'];
				$s_time=$row['s_time'];
				$fromdate=$row['fromdate'];
				$todate=$row['todate'];
				$org=$row['organization'];
				$live=$row['is_live'];
				$logo=$row['logo'];
				$contact=$row['org_contact'];
				$pin=0;
				$state=0;
				$sub_req=$row['suborg_req'];
				$venue=$row['venue'];
				$vol_req=$row['vol_req'];
				$vstipend=$row['vstipend'];
				$sstipend=$row['sstipend'];
				
			}
			else
				echo "Failed to fetch infomation";
			if(isset($_POST['saved']) or isset($_POST['live'])){
				
				$name=$_POST['name'];
				$cat=$_POST['category'];
				$city=$_POST['city'];
				$desc=$_POST['description'];
				$e_time=$_POST['e_time'];
				$s_time=$_POST['s_time'];
				$fromdate=$_POST['fromdate'];
				$todate=$_POST['todate'];
				$org=$_POST['organization'];
				if(isset($_POST['live'])){
					$live=1;
				}	
				//$logo=$_POST['logo'];
				$contact=$_POST['org_contact'];
				$pin=$_POST['pincode'];
				$state=$_POST['state'];
				$sub_req=$_POST['suborg_req'];
				$venue=$_POST['venue'];
				$vol_req=$_POST['vol_req'];
				$vstipend=$_POST['vstipend'];
				$sstipend=$_POST['sstipend'];
				$query = "UPDATE `contest` SET `name`='$name',`fromdate`='$fromdate',`todate`='$todate',
						`description`='$desc',`organization`='$org',`org_contact`='$contact',`s_time`='$s_time',`logo`='',`venue`='$venue',`city`='$city',`state`='$state',`pincode`='$pin',`vol_req`='$vol_req',`suborg_req`='$sub_req',`e_time`='$e_time',`category`='$cat', `is_live`='$live', `vstipend`='$vstipend',`sstipend`='$sstipend' WHERE cid=$cid";
				$query_run=mysql_query($query) or die(mysql_error());
				
				$tempname  = $_FILES['logo']['tmp_name'];
				$filesize = $_FILES['logo']['size'];
				$filetype = $_FILES['logo']['type'];
				if(isset($tempname)){
					if($filetype=='image/jpeg'){
						if(move_uploaded_file($tempname,'contest_img/'.$cid.'.jpg')){
// 							echo 'File "'.$filename.'" uploaded!<br><hr> ';
						}
					}
// 					else  echo 'Pl. choose a valid file.<br><hr> ';
				}
				
				$update=true;
				header("Location:manage_event.php?key=$cid");
				//echo 'Update(s) saved!';
			}
			
			
		}
		else
			die("U are lost!");
}
else
	die("U are lost!");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Sentir, Responsive admin and dashboard UI kits template">
		<meta name="keywords" content="admin,bootstrap,template,responsive admin,dashboard template,web apps template">
		<meta name="author" content="Ari Rusmanto, Isoh Design Studio, Warung Themes">
		<title>Star contests</title>
 
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
      function checkDate() {
            var EnteredDate = document.getElementById("fromdate").value; //for javascript
			var EnteredDate1 = document.getElementById("todate").value;
			var EnteredTime = document.getElementById("s_time").value;
			var EnteredTime1 = document.getElementById("e_time").value;
			
            var EnteredDate = $("#fromdate").val();
			var EnteredDate1 = $("#todate").val();			// For JQuery
			var EnteredTime = $("#s_time").val();
			var EnteredTime1 = $("#e_time").val();
			
			var h = EnteredTime.substring(0,2);
			var m = EnteredTime.substring(3,5);
			var h1 = EnteredTime1.substring(0,2);
			var m1 = EnteredTime1.substring(3,5);
			
            var month = EnteredDate.substring(5,7);
            var date = EnteredDate.substring(8, 10);
            var year = EnteredDate.substring(0, 4);
			
			var month1 = EnteredDate1.substring(5,7);
            var date1 = EnteredDate1.substring(8, 10);
            var year1 = EnteredDate1.substring(0, 4);
			
			var startTimeObject = new Date();
			startTimeObject.setHours(h,m,0);
			var endTimeObject = new Date();
			endTimeObject.setHours(h1-1,m1,0);
            
			var myDate = new Date(year, month - 1, date);
			var myDate1 = new Date(year1, month1 - 1, date1);

            var today = new Date();

            if ((myDate >=today) && (myDate1>=myDate)) {
             
			 if(myDate1>myDate)
			 {
				 return Checkfiles();
			 }
			 else{
				if(startTimeObject > endTimeObject)
				{
					alert('End time and start time are not valid or Contest Should be at-lest 1 hour long.');
					return false;
				}
					else
				{
					 return Checkfiles();
				} 
			 }
			}        
		    
			
            else{
                alert("Either Start date isn't valid or End date is small than start date!!!");
          	return false;		}
			
        }

      function Checkfiles()
      {
          var fup = document.getElementById('filename');
          var fileName = fup.value;
          var ext = fileName.substring(fileName.lastIndexOf('.') + 1);

      if(ext=="" || ext =="GIF" || ext=="gif" || ext =="JPEG" || ext=="jpeg" || ext =="png" || ext=="PNG" || ext=="JPG" || ext=="jpg")
      {
          return stip();
      }
      else
      {
          alert("Upload gif,jpeg,jpg,png Images only");
          return false;
      }
      function stip()
		{
			var vno = document.getElementById('vol_req');
			var sno = document.getElementById('suborg_req');
			var sv = document.getElementById('stipV');
			var ss = document.getElementById('stipS');
			
				
				if(vno.value==0 && sv.value>0)
				{
					alert("Stipend for Volunteer!!!")
			        return false;
					
				}
				else if(sno.value==0 && ss.value>0)
				{
					alert("Stipend for Suborgnizers!!!")
					return false;
				}
				else
				{
					return true;
				}
		}
      }		
    	
      </script>
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
<!-- 						<a href="about_us">About us</a> -->
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
			<h2 class="page-title">Edit an Event</h2>
			<h4><?php if($update)echo "Update(s)saved!"?></h4>
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
							<form name="form1" action="edit_event.php?key=<?php echo $cid;?>" role="form" method="POST" onSubmit="if(!checkDate())return false;" enctype="multipart/form-data" >
								<div class="form-group">
									<label>Event Name :</label>
									<input type="text" name="name" maxlength="20" value="<?php echo $name?>" class="form-control">
									
								</div>
								<div class="form-group">
									<label>Org. Contact:</label>
									<input type="text" class="form-control" value="<?php echo $contact?>" name="org_contact">
								</div>
								<div class="form-group">
									<label>Organization :</label>
									<input type="text" class="form-control" value="<?php echo $org;?>" name="organization">
								</div>
								<div class="form-group" >
									<label>category:</label>
									<select name="category" required class = "form-control">
         							    <option value="sports" <?php if($cat=="sports") echo " selected";?>>Sports</option>
										<option value="food" <?php if($cat=="food") echo " selected";?>>Food n Drinks</option>
										<option value="music" <?php if($cat=="music") echo " selected";?>>Music</option>
										<option value="arts" <?php if($cat=="arts") echo " selected";?>>Arts</option>
										<option value="literary" <?php if($cat=="literary") echo " selected";?>>Literary</option>
										<option value="classes" <?php if($cat=="classes") echo " selected";?>>Classes</option>
										<option value="other" <?php if($cat=="other") echo " selected";?>>Other</option>		
									</select>
								</div>
								<label>Starts at:</label>
								<div class="form-group">
									
									<input type="date" class="input" id="fromdate" name="fromdate" value="<?php echo $fromdate;?>" required>
								</div>
								<label>Start time :</label>
								<div class="form-group">
									
									<input type="time" class="input" id="s_time" name="s_time" value="<?php echo $s_time;?>" required >
								</div>
<label>End at:</label>								
								<div class="form-group">
									
									<input type="date" class="input" id="todate" name="todate" value="<?php echo $todate;?>" required >
								</div>
								<label>End time:</label>
								<div class="form-group">
									
									<input type="time" class="input" id="e_time" name="e_time" value="<?php echo $e_time;?>" required >
								</div>
								<div class="form-group">
									<label>Venue:</label>
									 <input type="text" class="form-control" name="venue" value="<?php echo $venue?>" required>
								</div><div class="form-group">
									<label>City:</label>
								<select name="city" required class = "form-control">

<option>Ahmedabad</option>
<option>Bengaluru/Bangalore</option>
<option>Chandigarh</option>
<option>Chennai</option>
<option>Delhi</option>
<option>Gurgaon</option>
<option>Hyderabad/Secunderabad</option>
<option>Kolkatta</option>
<option>Mumbai</option>
<option>Noida</option>
<option>Pune</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Andhra Pradesh-</i></font></option>
<option>Anantapur</option>
<option>Guntakal</option>
<option>Guntur</option>
<option>Hyderabad/Secunderabad</option>
<option>kakinada</option>
<option>kurnool</option>
<option>Nellore</option>
<option>Nizamabad</option>
<option>Rajahmundry</option>
<option>Tirupati</option>
<option>Vijayawada</option>
<option>Visakhapatnam</option>
<option>Warangal</option>
<option>Andra Pradesh-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Arunachal Pradesh-</i></font></option>
<option>Itanagar</option>
<option>Arunachal Pradesh-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Assam-</i></font></option>
<option>Guwahati</option>
<option>Silchar</option>
<option>Assam-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Bihar-</i></font></option>
<option>Bhagalpur</option>
<option>Patna</option>
<option>Bihar-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Chhattisgarh-</i></font></option>
<option>Bhillai</option>
<option>Bilaspur</option>
<option>Raipur</option>
<option>Chhattisgarh-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Goa-</i></font></option>
<option>Panjim/Panaji</option>
<option>Vasco Da Gama</option>
<option>Goa-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Gujarat-</i></font></option>
<option>Ahmedabad</option>
<option>Anand</option>
<option>Ankleshwar</option>
<option>Bharuch</option>
<option>Bhavnagar</option>
<option>Bhuj</option>
<option>Gandhinagar</option>
<option>Gir</option>
<option>Jamnagar</option>
<option>Kandla</option>
<option>Porbandar</option>
<option>Rajkot</option>
<option>Surat</option>
<option>Vadodara/Baroda</option>
<option>Valsad</option>
<option>Vapi</option>
<option>Gujarat-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Haryana-</i></font></option>
<option>Ambala</option>
<option>Chandigarh</option>
<option>Faridabad</option>
<option>Gurgaon</option>
<option>Hisar</option>
<option>Karnal</option>
<option>Kurukshetra</option>
<option>Panipat</option>
<option>Rohtak</option>
<option>Haryana-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Himachal Pradesh-</i></font></option>
<option>Dalhousie</option>
<option>Dharmasala</option>
<option>Kulu/Manali</option>
<option>Shimla</option>
<option>Himachal Pradesh-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Jammu and Kashmir-</i></font></option>
<option>Jammu</option>
<option>Srinagar</option>
<option>Jammu and Kashmir-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Jharkhand-</i></font></option>
<option>Bokaro</option>
<option>Dhanbad</option>
<option>Jamshedpur</option>
<option>Ranchi</option>
<option>Jharkhand-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Karnataka-</i></font></option>
<option>Bengaluru/Bangalore</option>
<option>Belgaum</option>
<option>Bellary</option>
<option>Bidar</option>
<option>Dharwad</option>
<option>Gulbarga</option>
<option>Hubli</option>
<option>Kolar</option>
<option>Mangalore</option>
<option>Mysoru/Mysore</option>
<option>Karnataka-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Kerala-</i></font></option>
<option>Calicut</option>
<option>Cochin</option>
<option>Ernakulam</option>
<option>Kannur</option>
<option>Kochi</option>
<option>Kollam</option>
<option>Kottayam</option>
<option>Kozhikode</option>
<option>Palakkad</option>
<option>Palghat</option>
<option>Thrissur</option>
<option>Trivandrum</option>
<option>Kerela-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Madhya Pradesh-</i></font></option>
<option>Bhopal</option>
<option>Gwalior</option>
<option>Indore</option>
<option>Jabalpur</option>
<option>Ujjain</option>
<option>Madhya Pradesh-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Maharashtra-</i></font></option>
<option>Ahmednagar</option>
<option>Aurangabad</option>
<option>Jalgaon</option>
<option>Kolhapur</option>
<option>Mumbai</option>
<option>Mumbai Suburbs</option>
<option>Nagpur</option>
<option>Nasik</option>
<option>Navi Mumbai</option>
<option>Pune</option>
<option>Solapur</option>
<option>Maharashtra-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Manipur-</i></font></option>
<option>Imphal</option>
<option>Manipur-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Meghalaya-</i></font></option>
<option>Shillong</option>
<option>Meghalaya-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Mizoram-</i></font></option>
<option>Aizawal</option>
<option>Mizoram-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Nagaland-</i></font></option>
<option>Dimapur</option>
<option>Nagaland-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Orissa-</i></font></option>
<option>Bhubaneshwar</option>
<option>Cuttak</option>
<option>Paradeep</option>
<option>Puri</option>
<option>Rourkela</option>
<option>Orissa-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Punjab-</i></font></option>
<option>Amritsar</option>
<option>Bathinda</option>
<option>Chandigarh</option>
<option>Jalandhar</option>
<option>Ludhiana</option>
<option>Mohali</option>
<option>Pathankot</option>
<option>Patiala</option>
<option>Punjab-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Rajasthan-</i></font></option>
<option>Ajmer</option>
<option>Jaipur</option>
<option>Jaisalmer</option>
<option>Jodhpur</option>
<option>Kota</option>
<option>Udaipur</option>
<option>Rajasthan-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Sikkim-</i></font></option>
<option>Gangtok</option>
<option>Sikkim-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Tamil Nadu-</i></font></option>
<option>Chennai</option>
<option>Coimbatore</option>
<option>Cuddalore</option>
<option>Erode</option>
<option>Hosur</option>
<option>Madurai</option>
<option>Nagerkoil</option>
<option>Ooty</option>
<option>Salem</option>
<option>Thanjavur</option>
<option>Tirunalveli</option>
<option>Trichy</option>
<option>Tuticorin</option>
<option>Vellore</option>
<option>Tamil Nadu-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Tripura-</i></font></option>
<option>Agartala</option>
<option>Tripura-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Union Territories-</i></font></option>
<option>Chandigarh</option>
<option>Dadra & Nagar Haveli-Silvassa</option>
<option>Daman & Diu</option>
<option>Delhi</option>
<option>Pondichery</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Uttar Pradesh-</i></font></option>
<option>Agra</option>
<option>Aligarh</option>
<option>Allahabad</option>
<option>Bareilly</option>
<option>Faizabad</option>
<option>Ghaziabad</option>
<option>Gorakhpur</option>
<option>Kanpur</option>
<option>Lucknow</option>
<option>Mathura</option>
<option>Meerut</option>
<option>Moradabad</option>
<option>Noida</option>
<option>Varanasi/Banaras</option>
<option>Uttar Pradesh-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Uttaranchal-</i></font></option>
<option>Dehradun</option>
<option>Roorkee</option>
<option>Uttaranchal-Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-West Bengal-</i></font></option>
<option>Asansol</option>
<option>Durgapur</option>
<option>Haldia</option>
<option>Kharagpur</option>
<option>Kolkatta</option>
<option>Siliguri</option>
<option>West Bengal - Other</option>
<option disabled="disabled" style="background-color:#3E3E3E"><font color="#FFFFFF"><i>-Other-</i></font></option>
<option>Other</option>
</select>						</div>
									<input type="hidden" class="form-control"name="state" value="<?php echo $state?>" required >
								
									<input type="hidden" class="form-control" name="pincode" value="<?php echo $pin?>" required>
								<div class="form-group">
									<label>Event Description:</label>
									<textarea style="height: 100px" class="form-control" name="description"  required><?php echo $desc?></textarea>
								</div>																
								<div class="form-group">
									<label>Logo:</label>
									<input type="file" id="filename" class="form-control" name="logo">
								</div>	
								<div class="form-group">
									<label>Required Volunteer:</label>
									<input type="number" id="vol_req" class="form-control" value="<?php echo $vol_req?>" name="vol_req" >
								</div>
								<div class="form-group">
									<label>Stipend for Volunteer:</label>
									<input type="number" id="stipV" class="form-control" value="<?php echo $vstipend?>" name="vstipend" >
								</div>
								<div class="form-group">
									<label>Required SubOrganizer:</label>
									<input type="number" id="suborg_req" class="form-control" value="<?php echo $sub_req?>" name="suborg_req">
								</div>
									
								<div class="form-group">
									<label>Stipend for Suborganizer:</label>
									<input type="number" id="stipS" class="form-control" value="<?php echo $sstipend?>" name="sstipend" >
								</div>		
									
								<div class="form-group">
								</div>
								<br>
								<input type="submit" name="saved" class="btn btn-success" value="UPDATE AND CONTINUE">
								<?php if($live==0) print '<input type="submit" name="live" class="btn btn-success" value="MAKE EVENT LIVE">'?>
								
							</form>
						</div></div></div></div></div>
						
		
		
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