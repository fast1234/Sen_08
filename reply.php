
<?php 

include "connect.php";

$id=$_GET['id'];
$cid=$_GET['key'];

$email=$_SESSION['email'];
$query = "SELECT * FROM user WHERE emailid='$email'" ;
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result, MYSQL_ASSOC);

print "<input type='hidden' name='id' value='$id'>";
if(isset($_POST['submit']))

{

	$name=$_POST['name'];

	$yourpost=$_POST['yourpost'];

	$subject=$_POST['subject'];
	
	$thedate=date("U"); //get unix timestamp

	$displaytime=date("F j, Y, g:i a");

	//we now strip HTML injections

	$subject=strip_tags($subject);

	$name=$row['name'];
	$yourpost=strip_tags($yourpost);

	$insertpost="INSERT INTO forumtutorial_posts(author,title,post,showtime,realtime,lastposter,parentid,contest_id) values('$name','$subject','$yourpost','$displaytime','$thedate','$name','$id','$cid')";

	mysql_query($insertpost) or die("Could not insert post"); //insert post

	$updatepost="Update forumtutorial_posts set numreplies=numreplies+'1', lastposter='$name',showtime='$displaytime', lastrepliedto='$thedate' where postid='$id'";

	mysql_query($updatepost) or die("Could not update post");
	header("Location:message.php?id=$id&key=$cid");
// 	print "Message posted, go back to <A href='message.php?id=$id&key=$cid'>Message</a>.";


}

?>