<?php
include 'connect.php';
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
	header("Location:login.php");
}
$passkey=$_GET['passkey'];
$query="SELECT * FROM user WHERE activation='".$passkey."'";
$result   = mysql_query($query);
$count=mysql_num_rows($result);

if($count == 1){
	
	$rows=mysql_fetch_array($result);
	$status =$rows['status'] ;
	if ( $status == 0 ){
		$status = 1;
		$sqlupdate = "UPDATE user SET status='".$status."' WHERE activation='".$passkey."'";; // update the status
		mysql_query($sqlupdate);
		echo "your account has been fully activated";
	}
	else{
		echo "your email is already verifired";
	}
}
else {
	echo "there is no activation code";
}

?>