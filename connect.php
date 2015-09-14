<?php
@session_start();
if(!mysql_connect('localhost','root','') || !mysql_select_db('sen_08')) {
	echo mysql_error();
}
?>