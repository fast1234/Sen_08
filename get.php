<?php
require_once 'connect.php';

$t=$_POST['task'];
$b=$_POST['budget'];
$e=$_POST['email'];
$cid=$_GET['key'];
$payment=$_POST['payment'];
$payment=$b;
$query4="UPDATE suborg_works_in SET task='$t' ,budget='$b',payment='$payment' WHERE emailid='$e' AND contestid='$cid'";
$result4=mysql_query($query4);
@$ans=mysql_fetch_array($result4, MYSQL_ASSOC);

header("location:mycommittee.php?key=$cid");

?>