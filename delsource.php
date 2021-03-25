<?php

include('session.php');
include('connection.php');

$paper_no = $_GET['paperno'];

$delsource = mysql_query("delete from source_entry where paper_no = '$paper_no'");

header("Location: list_crops.php");

?>