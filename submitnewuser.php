<?php

     include('connection.php');
     
     $full_name  =  $_POST['full_name'];
     $user_name =  $_POST['user_name'];
     $user_email = $_POST['user_email'];
     $user_phone = $_POST['user_phone'];
     $user_password  = $_POST['user_password'];
     $user_department = $_POST['user_department'];
     $user_role = $_POST['user_role'];
     
//      $targetDir = "images/users/  ";
// $fileName = basename($_FILES["file"]["user_image"]);
// $targetFilePath = $targetDir . $fileName;
// $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);


 $userimagename = $user_name.'.jpg';
            move_uploaded_file($val['tmp_name'],'./images/users/'.$userimagename);
            $imagepath = "./images/users/".$userimagename;
     
    
     $user_insert = mysql_query("insert into user_cred (username, password, name, user_role, email, phone, department, photo ) 
                values('$user_name', '$user_password', '$full_name', '$user_role', '$user_phone', '$user_department',  '$imagepath')");
    


?>