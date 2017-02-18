<?php
	$host="localhost"; //replace with database hostname 
    $username="root"; //replace with database username 
    $password=""; //replace with database password 
    $db_name="farmer"; //replace with database name
	$tbl_name="government_news";
    $con=mysqli_connect($host, $username, $password)or die("cannot connect"); 
    mysqli_select_db($con, $db_name)or die("cannot select DB");
	//$f_phone=$_POST['f_phone'];
	//$f_password=$_POST['f_password'];
	$sql="Select * FROM $tbl_name";
	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0)
	{
		while($row = $result->fetch_assoc()) {
			$date = $row["date"];
			$description = $row["description"];
			
			echo $date;
			echo "  " . $description;
			echo "<br>";
			}
			
	}
else
		echo 'Failed';
	?>	
