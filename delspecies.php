<?php

include('session.php');
include('connection.php');

$species_id = $_GET['speciesid'];

$delspecies = mysql_query("delete from species_entry where species_entry_id = '$species_id'");

header("Location: admin_settings.php");

?>