<?php

include('connection.php');
include('session.php');


$crop_id  = $_GET['cropid'];

$delcrop = mysql_query("delete from resource_crop where resource_crop_id = '$crop_id'");

header("Location: admin_settings.php");


?>