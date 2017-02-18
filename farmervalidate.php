<?php

	session_start();
	$host="localhost"; //replace with database hostname 
    $username="root"; //replace with database username 
    $password=""; //replace with database password 
    $db_name="farmer"; //replace with database name
	$tbl_name="farmer_registration";
    $con=mysqli_connect($host, $username, $password)or die("cannot connect"); 
    mysqli_select_db($con, $db_name)or die("cannot select DB");
	$f_phone=$_POST['f_phone'];
	$f_password=$_POST['f_password'];
	$sql="Select f_name, f_phone, f_password,f_id FROM $tbl_name WHERE f_phone=$f_phone AND f_password='$f_password'";
	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)==1)
	{
		while($row = $result->fetch_assoc())
		 {
			$f_name = $row["f_name"];
			$f_id= $row["f_id"];
		}
		
		/* Storing username in session */
		$_SESSION["f_name"] = $f_name;
		$_SESSION["f_id"] = $f_id;
		header("Location: farmer_homepage.php");

		// $query="Select f_name from $tbl_name WHERE f_phone=$f_phone";
		// $result1=mysqli_query($con,$query);
	 //     if ($result1->num_rows > 0) {
  //   // output data of each row
  //          while($row = $result->fetch_assoc()) {
		// 	echo $row['f_name'];
		// //header('Location: farmer_homepage.html');
			
	}
	// }
	// }
	else
		echo 'Login Failed';
	?>
		
				
			