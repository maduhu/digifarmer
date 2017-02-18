<?php

	session_start();
	$host="localhost"; //replace with database hostname 
    $username="root"; //replace with database username 
    $password=""; //replace with database password 
    $db_name="farmer"; //replace with database name
	$tbl_name="buyer_registration";
    $con=mysqli_connect($host, $username, $password)or die("cannot connect"); 
    mysqli_select_db($con, $db_name)or die("cannot select DB");
    $b_email=$_POST['b_email'];
	$b_password=$_POST['b_password'];
	$sql="Select b_name, b_email, b_password FROM $tbl_name WHERE b_email='$b_email' AND b_password='$b_password'";
	$result=mysqli_query($con,$sql);
	
	if(mysqli_num_rows($result)==1)
	{
		while($row = $result->fetch_assoc()) {
			$b_name = $row["b_name"];
		}
		
		/* Storing username in session */
		$_SESSION["b_name"] = $b_name;
		$_SESSION["b_email"] = $b_email;
		header("Location: buyer_homepage.php");
	}
	else
		echo "login failed";
	?>