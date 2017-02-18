<?php
$host="localhost";
$username="root"
$password="";
$db_name="Farmer";
$tbl_name="government_news";
mysql_connect($host,$username,$password) or die("cannot connect");
mysql_select_db($db_name) or die("cannot select DB");

$date=$_POST['date'];
$description=$_POST['description'];
$sql="INSERT INTO $tbl_name VALUES ($date,'$description')";
$result=mysql_query($sql) or die(mysql_error);
if($result)
echo "Thanks";


?>