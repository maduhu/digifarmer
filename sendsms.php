<?php 
session_start();
/**
 * @author SuyashBansal
 * @author Kingster
 * @category SMS
 * @copyright 2015
 * @description Request this page with get or post params
 * @param uid = Way2SMS Username
 * @param pwd = Way2SMS Password
 * @param phone = Number to send to. Multiple Numbers separated by comma (,). 
 * @param msg = Your Message ( Upto 140 Chars)
 */


 $host="localhost"; //replace with database hostname 
    $username="root"; //replace with database username 
    $password=""; //replace with database password 
    $db_name="farmer"; //replace with database name
	$tbl_name="farmer_registration";
    $con=mysqli_connect($host, $username, $password)or die("cannot connect"); 
    mysqli_select_db($con, $db_name)or die("cannot select DB");
    $f_id=$_SESSION["f_id"];
	$sql="select f_phone from $tbl_name where f_id=$f_id";
    $result=mysqli_query($con,$sql);
	$row = $result->fetch_assoc();
	

include ('way2sms-api.php');
  $uid = "9823110336";
  $pwd = "C8483E";
  $phone = $row['f_phone'];
  $msg = "Stage 1 has started. Will be completed in 10 days."; 
$msg2="Stage 1 is completed and stage 2 is started. Will be completed in 10 days.";
$msg3="Stage 2 is complete. Now you may harvest your crops.";




//if (isset($_GET['uid']) && isset($_GET['pwd']) && isset($_GET['phone']) && isset($_GET['msg']))
//{
  $res3 = sendWay2SMS($uid, $pwd, $phone,$msg);
  $res2=sendWay2SMS($uid, $pwd, $phone,$msg2);
  $res= sendWay2SMS($uid, $pwd, $phone,$msg3);
  if(is_array($res)) echo $res[0]['result'] ? 'true' : 'thanks';
  else echo $res;
  header("Location:farmer_homepage.php");
  exit;
//}
/*else
  if (isset($_POST['uid']) && isset($_POST['pwd']) && isset($_POST['phone']) && isset($_POST['msg']))
  {
    $smsg = stripslashes($_POST['msg']);
    $res =  sendWay2SMS($_POST['uid'], $_POST['pwd'], $_POST['phone'], $smsg);
    if(is_array($res)) echo $res[0]['result'] ? 'true' : 'false';
    else echo $res;
    exit;
  }*/

?>