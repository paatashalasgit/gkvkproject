<?php
session_start();
include ('connection.php');

$user_check=$_SESSION['login_user'];
$user_role= $_SESSION['user_role'];
$query = mysql_query("select * from user_cred where  username='$user_check'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 0) {

	mysql_close($connection); 
	header('Location: login.php'); 
}

// session_register('source_entry_lastid');
// $source_entry_lastid = $_SESSION['source_entry_lastid'];


?>