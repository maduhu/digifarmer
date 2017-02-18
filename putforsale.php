<?php
session_start();
$host="localhost"; //replace with database hostname 
    $username="root"; //replace with database username 
    $password=""; //replace with database password 
    $db_name="farmer"; //replace with database name
	$tbl_name="put_for_sale";
	$tb_name="crop";
    $con=mysqli_connect($host, $username, $password)or die("cannot connect"); 
    mysqli_select_db($con, $db_name)or die("cannot select DB");
    $price=$_POST['price'];
    $c_id=$_POST['c_id'];
    $f_id=$_SESSION['f_id'];
    date_default_timezone_set('Asia/Calcutta');
	$date = date('Y-m-d H:i:s ', time());
    $que="select c_name,c_quantity,c_start from $tb_name where c_id=$c_id";
    $result=mysqli_query($con,$que); 
    if(mysqli_num_rows($result)>0)
	{
		while($row = $result->fetch_assoc())
		 {
			$c_start = $row["c_start"];
			$c_name = $row["c_name"];
			$c_quantity=$row["c_quantity"]; 
			}
			}
			$que1="select c_freshness from ready_crops where c_id=$c_id";
    $result1=mysqli_query($con,$que1); 
    if(mysqli_num_rows($result1)>0)
	{
		while($row1 = $result1->fetch_assoc())
		 {
			$c_freshness = $row1["c_freshness"];  
		}
	}


    $sql="INSERT INTO $tbl_name VALUES ($f_id,$c_id,'$c_name',$price,$c_quantity,'$date',$c_freshness)";
    $result2=mysqli_query($con,$sql);

    if($result2)
    {
      $sql1="DELETE FROM $tb_name where c_id=$c_id";
      $result3=mysqli_query($con,$sql1);
    }
	
	header("Location:farmer_homepage.php");
   

?>