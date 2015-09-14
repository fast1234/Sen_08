<?php
include 'connect.php';
include 'send_mail.php';
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
	header("Location:login.php");
}
//	echo "hello how are you???";
	$passkey=$_GET['passkey'];
	$type=$_GET['type'];
	$emailid=$_GET['email'];
	$status=$_GET['status'];
	
	if( $status == 1){
	
	if($type == "sub_org"){
	
	$query= "INSERT INTO `sen_08`.`suborg_works_in` (`emailid`, `contestid`, `task`, `payment`, `budget`) VALUES ('".$emailid."', '".$passkey."', '', '', '')";
	$query_run=mysql_query($query) or die(mysql_error());
	if($query_run){
		echo "suborganizer has been added";		
		send_notification_as_accepted($emailid, $type, $passkey);
	}
	else {
		echo "cant aded in database";	
	}
	} else if ($type="volunteer") {

		$query= "INSERT INTO `sen_08`.`volunteers_in` (`emailid`, `contest_id`, `payment`) VALUES ('".$emailid."', '".$passkey."', '')";
		$query_run=mysql_query($query) or die(mysql_error());		
		if($query_run){
			echo "volunteer have been added";
			send_notification_as_accepted($emailid, $type, $passkey);
		
		}
		else {
			echo "cant add in database";
		}
		
	}
	}
	else {
		send_notification_as_reject($emailid, $type, $passkey);
	}
// 	echo "".$passkey."";
// 	echo "".$type."";
// 	echo "".$emailid."";


?>
