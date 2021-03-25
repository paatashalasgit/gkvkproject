<?php

include('connection.php');
include('session.php');


$user_id = $_GET['userid'];

$deluser = mysql_query("delete from user_cred where user_cred_id = '$user_id' ");

header("Location: admin_settings.php");


?>