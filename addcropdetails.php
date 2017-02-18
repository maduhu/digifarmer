<?php
 	session_start();

    $host="localhost"; //replace with database hostname 
    $username="root"; //replace with database username 
    $password=""; //replace with database password 
    $db_name="farmer"; //replace with database name
	$tbl_name="crop";
    $con=mysqli_connect($host, $username, $password)or die("cannot connect"); 
    mysqli_select_db($con, $db_name)or die("cannot select DB");
    $f_name=$_SESSION["f_name"];
    $f_id=$_SESSION["f_id"];
    $c_name=$_POST['c_name'];
    $c_quantity=$_POST['c_quantity'];
    $c_start=$_POST['c_start'];
    $sql="INSERT INTO $tbl_name(f_id,c_name,c_quantity,c_start) VALUES ($f_id,'$c_name',$c_quantity,'$c_start')";
	$result=mysqli_query($con,$sql);
	if($result) {
		header("Location:sendsms.php");
	}
	else
		echo "login failed";
	?>

