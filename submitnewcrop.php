<?php

    include("connection.php");
    
    $crop  = $_POST['crop'];
    
    $crop_insert  = mysql_query("insert into resource_crop(resource_name) values('$crop')");

?>