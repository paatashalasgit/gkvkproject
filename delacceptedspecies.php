<?php

include('connection.php');
include('session.php');

$acceptedspeciesid = $_GET['acceptedspeciesid'];

$del_acceptedspecies = mysql_query("delete from accepted_species_entry where accepted_species_entry_id = '$acceptedspeciesid'");

header("Location: admin_settings.php");



?>