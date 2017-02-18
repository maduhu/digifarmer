<?php
session_start();
            $host="localhost"; //replace with database hostname 
            $username="root"; //replace with database username 
            $password=""; //replace with database password 
            $db_name="farmer"; //replace with database name
			$tbl_name="buyer_registration";
            $con=mysqli_connect($host, $username, $password)or die("cannot connect"); 
            mysqli_select_db($con, $db_name)or die("cannot select DB");

$b_name=$_POST['b_name'];
$b_email=$_POST['b_email'];
$b_password=$_POST['b_password'];
$b_company=$_POST['b_company'];
$b_address=$_POST['b_address'];
$b_phone=$_POST['b_phone'];

$_SESSION["b_name"] = $b_name;
$sql="INSERT INTO $tbl_name(b_name,b_email,b_password,b_company,b_address,b_phone) VALUES ('$b_name','$b_email','$b_password','$b_company','$b_address',$b_phone)";
$result=mysqli_query($con,$sql);
if($result)
header("Location:buyer_homepage.php");

?>