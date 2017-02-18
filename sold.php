<?php
 	session_start();

    $host="localhost"; //replace with database hostname 
    $username="root"; //replace with database username 
    $password=""; //replace with database password 
    $db_name="farmer"; //replace with database name
	$tbl_name="crop";
    $con=mysqli_connect($host, $username, $password)or die("cannot connect"); 
    mysqli_select_db($con, $db_name)or die("cannot select DB");
    $c_id=$_POST['c_id'];
    $sql="SELECT * from put_for_sale where c_id=$c_id";
    $result=mysqli_query($con,$sql);
    //if(mysqli_num_rows($result)>0)
	//{
	$row = $result->fetch_assoc();
   //{
    echo $f_id=$row['f_id'];
    echo $c_sellingdate=$row['c_sellingdate'];
    echo $c_sellingprice=$row['c_sellingprice'];
    echo $c_quantity=$row['c_quantity'];
  
//}
$query="INSERT INTO sold_crops(f_id,c_id,c_sellingdate,c_sellingprice,c_quantity) values($f_id,$c_id,'$c_sellingdate',$c_sellingprice,$c_quantity)";
      $result1=mysqli_query($con,$query);
      if($result1>0)
      	echo "success";
      $query1="DELETE from put_for_sale where c_id=$c_id";
        $result2=mysqli_query($con,$query1);
		
		header("Location:sendsms2.php");
        

      ?>


    




