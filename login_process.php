<?php
	session_start(); // Starting Session
    // include('connection.php');
	$error=''; // Variable To Store Error Message
	if (isset($_POST['login_submit'])) 
	{
		if (empty($_POST['login_name']) || empty($_POST['login_passwd'])) 
		{
			$error = "Username or Password is invalid";
			
			echo "Login Failed";
		}
		else
		{
			
			$username=$_POST['login_name'];
			$password=$_POST['login_passwd'];
				
// 		    echo $username;
// 			echo $password;
					
					
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);
			
		
			$query = mysql_query("select * from user_cred where password='$password' AND username='$username'", $connection);
			$nrows = mysql_num_rows($query);
			$row = mysql_fetch_assoc($query); 
			if ($nrows == 1 && $row['user_role']=="admin" || "researcher")
			{
			    $_SESSION['user_role'] = $row['user_role'];
				$_SESSION['login_user']=$username; // Initializing Session
				header("location: index.php"); // Redirecting To Other Page
			} 
			else 
			{
				$error = "Username or Password is invalid";
				echo "Username or Password is invalid not an admin";
			}
			mysql_close($connection);
		}
	}
?>