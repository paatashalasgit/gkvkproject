<?php
    include('connection.php');
    
    $accepted_genus = $_POST['accepted_genus'];
    $accepted_species = $_POST['accepted_species'];
    $accepted_author = $_POST['accepted_author'];    
    $accepted_year =  $_POST['accepted_year'];    
    $accepted_pdf = $_POST['accepted_pdf'];
    $accepted_url = $_POST['accepted_url'];
    
     $acceptedspecies_r = mysql_query("insert into accepted_species_entry (accepted_genus,	accepted_species,	accepted_author,	accepted_year,	accepted_pdf,	accepted_url
                            )values('$accepted_genus','$accepted_species','$accepted_author','$accepted_year','$accepted_pdf','$accepted_url')");    


?>