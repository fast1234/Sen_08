<?php
include 'Mail.php';
include 'connect.php';

function Send_Mail($to,$subject,$body)
{	
	$from ="starcontest";
	
	$headers = array(
			'From' => $from,
			'To' => $to,
			'Subject' => $subject
	);
	
	$smtp = Mail::factory('smtp', array(
			'host' => 'ssl://smtp.gmail.com',
			'port' => '465',
			'auth' => true,
			'username' => 'starcontests8@gmail.com',
			'password' => 'senteam8'
	));
	
	$mail = $smtp->send($to, $headers, $body);
	
	if (PEAR::isError($mail)) {
		echo('<p>' . $mail->getMessage() . '</p>');
		return 0;
	} else {
		//echo('<p>Message successfully sent!</p>');
		return 1;
	}		
}

function send_confirnmation($to ){
	$base_url='http://localhost/star/activation.php?passkey=';
	$activation =md5($to.time());
	$subject ="Email Verification" ;
	$body ='<strong>Welcome to Star Contests.</strong>
			
			Thank you for registering on our website. We hope ans we will make
			efforts to make sure we share a frutiful journey. 
			
			Just a little thing, before we can get you started we need to check your account. Not to worry, just a click away.
			To verify your email id click on the link below, 
			
			'.$base_url.$activation.'
					
			You can do a lot of interesting stuff now. Want to create a contest? Interested in participating in contests 
			of your interests? You can do all that much more right on StarContests.com.
					
			1. Go to Create a contest and enter your contest details to garner more registrations online.
					
			2. Go to sub-organize or volunteer if you are interested in working.
					
			3. Find out all contests according to your interests or locality.
					
			COME, EXPLORE.
					
					
					
		    Regards
					
			Shivani 
					
			(Team Star Tech)
					
					
					';
	
			 

	Send_Mail($to, $subject, $body);
	//echo "hello form the confirmation";
}

function send_notification(){
	
	$cid = $_GET['key'];
	$query="SELECT * FROM contest WHERE cid=$cid";
	$run=mysql_query($query) or die(mysql_error());
	$result=mysql_fetch_array($run);
	$to=$_SESSION['email'];
	
	$name=$result['name'];
	$organization=$result['organization'];
	$org_contact=$result['org_contact'];
	$category=$result['category'];
	$fromdate=$result['fromdate'];
	$s_time=$result['s_time'];
	$e_time=$result['e_time'];
	$todate=$result['todate'];
	$venue=$result['venue'];
	$city=$result['city'];
	$state=$result['state'];
	$pincode=$result['pincode'];
	$description=$result['description'];
	//$logo=$result['logo'];
	
	$subject = "Regarding participating in the contest ";
	
	$body='Hello there.
			 
		   You have regsitered for the contest '.$name.' . 
		   Just so you do not forget anything,
		   		
		   Details of the contest are as follows,
		   		
		   Contest Name '.$name.'
		   Category  '.$category.'
		   Venue  '.$venue.'
		   Start Date '.$fromdate.'
		   Event Start time '.$s_time.'	
		   End date '.$todate.'
		   End time '.$e_time.'
		   City '.$city.'
		   State '.$state.'	
		   Contest Description '.$description.'	

			For further details or queries contact the contest organizer,
			Contact	'.$org_contact.'
		   		
		   Have a good time out there. All the best. Cheers!
		   		
		   Regards
		   Team Star Tech.';
		   			
	
	
			Send_Mail($to, $subject, $body);
	
}

function send_notification_as_accepted($emailid, $type, $passkey){
	
	$to =$emailid;
	$subject = "Regarding the approval as $type";
	$link ="localhost/star/event_page.php?key=".$passkey."";
	
	
	$query="SELECT emailid,name FROM contest WHERE cid=$passkey"; // select organiser 
	$run=mysql_query($query) or die(mysql_error());
	$result=mysql_fetch_array($run); 
	$email_org=$result['emailid'];  // organiser email
	$name_org=$result['name'];     // organiser name
	
	echo $body='Hi
		   	
		   Organiser has approved your request for '.$type.' . For further details click on this link	  
		   link '.$link.'
		   Regards
		   Star Contest Team
		   Cheer
	
			If you want to Know further detail of this event Drop a mail to the Organiser with email id is
		   	Name '.$name_org.'	
			Email id	'.$email_org.'';
	
	Send_Mail($to, $subject, $body);
	
}
function send_notification_as_reject($emailid, $type, $passkey){

	$to =$emailid;
	$subject = "Regarding the Rejecting as $type";
	$link ="localhost/sen8/event_page.php?key=".$passkey."";


	$query="SELECT emailid,name FROM contest WHERE cid=$passkey"; // select organiser
	$run=mysql_query($query) or die(mysql_error());
	$result=mysql_fetch_array($run);
	$email_org=$result['emailid'];  // organiser email
	$contact_org=$result['org_contact'];     // organiser name


	$body='Hi

		   Organisee has Rejected you as '.$type.' . for this event
		   link '.$link.'
		   Regards
		   Star Contest Team
		   Cheer

			If you want to Know further detail of rejection Drop a mail to the Organiser with email id is
		   	Email id	'.$email_org.'';

	Send_Mail($to, $subject, $body);


}



?>
