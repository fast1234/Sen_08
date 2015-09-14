<?php
require_once 'connect.php';

if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
	header("Location:login.php");
} 

function generateRandomString($length) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

$email=$_SESSION['email'];

if(isset($_POST['live'])){
	
	$name=$_POST['name'];
	$organization=$_POST['organization'];
	$org_contact=$_POST['org_contact'];
	$category=$_POST['category'];
	$fromdate=$_POST['fromdate'];
	$s_time=$_POST['starttime'];
	$e_time=$_POST['endtime'];
	$todate=$_POST['todate'];
	$venue=$_POST['venue'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$pincode=$_POST['pincode'];
	$description=$_POST['description'];
	$vol_req=$_POST['vol_req'];
	$suborg_req=$_POST['suborg_req'];
	$vstipend=$_POST['vstipend'];
	$sstipend=$_POST['sstipend'];
	$query = "INSERT INTO `sen_08`.`contest` (`emailid`,`category`,`name`, `fromdate`, `todate`, `description`, `org_contact`, `organization`, `s_time`, `e_time` ,`venue`,`city`,`state`,`pincode`,`vol_req`,`suborg_req`,`is_live`,`vstipend`,`sstipend`) VALUES ('".$email."','".$category."','".mysql_real_escape_string($name)."','".$fromdate."','".$todate."','".$description."','".$org_contact."','".$organization."','".$s_time."','".$e_time."','".$venue."','".$city."','".$state."','".$pincode."','".$vol_req."','".$suborg_req."','1','".$vstipend."','".$sstipend."')";
	$query_run = mysql_query($query) or die(mysql_error());
	$query="SELECT max(cid) FROM contest WHERE emailid='$email'";
	$query_run = mysql_query($query) or die(mysql_error());
	$run=mysql_fetch_array($query_run);
	$tempname  = $_FILES['logo']['tmp_name'];
	$filesize = $_FILES['logo']['size'];
	$filetype = $_FILES['logo']['type'];
	if($filesize>0){
		if($filetype=='image/jpeg'){
			if(move_uploaded_file($tempname,'contest_img/'.$run[0].'.jpg')){
				//echo 'File "'.$filename.'" uploaded!<br><hr> ';
			}
		}
		//else  echo 'Pl. choose a valid file.<br><hr> ';
	}

	header("Location:manage_event.php?key=$run[0]");
	
	//echo "success";
}

else if(isset($_POST['saved'])){
	
$name=$_POST['name'];
	$organization=$_POST['organization'];
	$org_contact=$_POST['org_contact'];
	$category=$_POST['category'];
	$fromdate=$_POST['fromdate'];
	$s_time=$_POST['starttime'];
	$e_time=$_POST['endtime'];
	$todate=$_POST['todate'];
	$venue=$_POST['venue'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$pincode=$_POST['pincode'];
	$description=$_POST['description'];
	$vol_req=$_POST['vol_req'];
	$suborg_req=$_POST['suborg_req'];
	$vstipend=$_POST['vstipend'];
	$sstipend=$_POST['sstipend'];	
	$query = "INSERT INTO `sen_08`.`contest` (`emailid`,`category`,`name`, `fromdate`, `todate`, `description`, `org_contact`, `organization`, `s_time`, `e_time` ,`venue`,`city`,`state`,`pincode`,`vol_req`,`suborg_req`,`is_live`,`vstipend`,`sstipend`) VALUES ('".$email."','".$category."','".mysql_real_escape_string($name)."','".$fromdate."','".$todate."','".$description."','".$org_contact."','".$organization."','".$s_time."','".$e_time."','".$venue."','".$city."','".$state."','".$pincode."','".$vol_req."','".$suborg_req."','0','".$vstipend."','".$sstipend."')";
	$query_run = mysql_query($query) or die(mysql_error());
	$query="SELECT max(cid) FROM contest WHERE emailid='$email'";
	$query_run = mysql_query($query) or die(mysql_error());
	$run=mysql_fetch_array($query_run);
	
	$tempname  = $_FILES['logo']['tmp_name'];
	$filesize = $_FILES['logo']['size'];
	$filetype = $_FILES['logo']['type'];
	if(isset($tempname)){
		if($filetype=='image/jpeg'){
			if(move_uploaded_file($tempname,'contest_img/'.$run[0].'.jpg')){
				//echo 'File "'.$filename.'" uploaded!<br><hr> ';
			}
		}
		//else  echo 'Pl. choose a valid file.<br><hr> ';
	}	//echo "saved";
	header("Location:manage_event.php?key=$run[0]");
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
      function checkDate() {
            var EnteredDate = document.getElementById("fromdate").value; //for javascript
			var EnteredDate1 = document.getElementById("todate").value;
			var EnteredTime = document.getElementById("starttime").value;
			var EnteredTime1 = document.getElementById("endtime").value;
			
            var EnteredDate = $("#fromdate").val();
			var EnteredDate1 = $("#todate").val();			// For JQuery
			var EnteredTime = $("#starttime").val();
			var EnteredTime1 = $("#endtime").val();
			
			var h = EnteredTime.substring(0,2);
			var m = EnteredTime.substring(3,5);
			var h1 = EnteredTime1.substring(0,2);
			var m1	 = EnteredTime1.substring(3,5);
			
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
          	function Checkfiles()
            {
                var fup = document.getElementById('filename');
                var fileName = fup.value;
                var ext = fileName.substring(fileName.lastIndexOf('.') + 1);

            if(ext == "" ||ext =="GIF" || ext=="gif" || ext =="JPEG" || ext=="jpeg" || ext =="png" || ext=="PNG" || ext=="JPG" || ext=="jpg")
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
			<h2 class="page-title">Create a contest</h2>
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
							<form role="form" action="create_event.php" method="POST" onSubmit="if(!checkDate())return false;" enctype="multipart/form-data">
								<div class="form-group">
									<label>Event Name :</label>
									<input type="text" class="form-control" name="name" maxlength="20" required>
									
								</div>
								<div class="form-group">
									<label>Organization:</label>
									<input type="text" class="form-control" name="organization">
								</div>
								<div class="form-group">
									<label>Contact no.:</label>
									<input type="number" class="form-control" name="org_contact" min="1000000000" max="10000000000"required>
								</div>
								<div class="form-group" >
									<label>Category:</label>
									<select name="category" required class = "form-control">
         							    <option value="other">Other</option>
										<option value="sports">Sports</option>
										<option value="food">Food n Drinks</option>
										<option value="music">Music</option>
										<option value="arts">Arts</option>
										<option value="literary">Literary</option>
										<option value="classes">Classes</option>
												
									</select>
								</div>
								<label>Starts at:</label>
								
								<div class="form-group">
									
									<input type="date" class="input" id="fromdate" name="fromdate"  required>
								
								</div>
								<label>Start time :</label>
								<div class="form-group">
									
									<input type="time" class="input" id="starttime"name="starttime" required >
								</div>
								<label>End at:</label>								
								<div class="form-group">
									
									<input type="date" class="input" id="todate" name="todate"  required >
								</div>
								<label>End time:</label>
								<div class="form-group">
									
									<input type="time" class="input" id="endtime"name="endtime" required>
								</div>
								<div class="form-group">
									<label>Venue:</label>
									 <input type="text" class="form-control" name="venue" required>
								</div>
								<div class="form-group">
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
									<input type="hidden" class="form-control"name="state" >
									<input type="hidden" class="form-control" name="pincode" >
								<div class="form-group">
									<label>Event Description:</label>
									<textarea style="height: 100px" class="form-control" name="description" required></textarea>
								</div>																
								<div class="form-group">
									<label>Logo:</label>
									<input type="file" id="filename" class="form-control"  name="logo">
								</div>	
								<div class="form-group">
									<label>Required Volunteers:</label>
									<input type="number" id="vol_req" class="form-control" name="vol_req" min="0" >
								</div>
								<div class="form-group">
									<label>Stipend for Volunteer:</label>
									<input type="number" id="stipV" class="form-control" value="<?php echo $vstipend?>" name="vstipend" min="0">
								</div>	
								<div class="form-group">
									<label>Required SubOrganizers:</label>
									<input type="number" id="suborg_req" class="form-control" name="suborg_req" min="0">
								</div>
								<div class="form-group">
									<label>Stipend for Suborganizer:</label>
									<input type="number" id="stipS" class="form-control" value="<?php echo $sstipend?>" name="sstipend" min="0" >
								</div>	
								<div class="form-group">
								</div>
								<br>
								<input type="submit" name="live" class="btn btn-success" value="Go live	" onClick="if(!checkDate())return false;">
								<input type="submit" name="saved" class="btn btn-success" value="Save this Contest(Go live later)"onClick="if(!checkDate())return false;">
								
							</form>
						</div></div></div></div></div>
						
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