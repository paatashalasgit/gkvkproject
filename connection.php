<?php
$mysql_hostname = "localhost";
$mysql_user = "sandeepgyara";
$mysql_password = "Sandeep@123";
$mysql_database = "gkvk_db";
$prefix = "";
// $bd =mysql_connect($mysql_hostname,$mysql_user,$mysql_password) or die("Could not connect database");
// mysql_select_db($mysql_database, $bd) or die("Could not select database");
$connection = mysql_connect($mysql_hostname,$mysql_user,$mysql_password) or die("Could not connect database");
$db = mysql_select_db($mysql_database, $connection) or die("Could not select database");
?>