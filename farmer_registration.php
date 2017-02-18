
 <?php
 	session_start();

    $host="localhost"; //replace with database hostname 
    $username="root"; //replace with database username 
    $password=""; //replace with database password 
    $db_name="farmer"; //replace with database name
	$tbl_name="farmer_registration";
    $con=mysqli_connect($host, $username, $password)or die("cannot connect"); 
    mysqli_select_db($con, $db_name)or die("cannot select DB");

	$f_name=$_POST['f_name'];

	/* Storing username in session variable */
	$_SESSION["f_name"] = $f_name;

	$f_phone=$_POST['f_phone'];
	$f_password=$_POST['f_password'];
	$f_address=$_POST['f_address'];
	$f_city=$_POST['f_city'];
	$f_landsize=$_POST['f_landsize'];
	$sql="INSERT INTO $tbl_name(f_name,f_phone,f_password,f_address,f_city,f_landsize) VALUES ('$f_name',$f_phone,'$f_password','$f_address','$f_city',$f_landsize)";
	
	$result=mysqli_query($con,$sql);

	if($result) {
		echo $result;
		echo "Thanks";
		header("Location:farmer_homepage.php");
	}	

?>