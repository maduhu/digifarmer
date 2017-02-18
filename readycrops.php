<?php
 	session_start();

    $host="localhost"; //replace with database hostname 
    $username="root"; //replace with database username 
    $password=""; //replace with database password 
    $db_name="farmer"; //replace with database name
	$tbl_name="crop";
    $con=mysqli_connect($host, $username, $password)or die("cannot connect"); 
    mysqli_select_db($con, $db_name)or die("cannot select DB");
    $f_id=$_SESSION["f_id"];
    $getcrops="select * from crop where f_id=$f_id";
    $result=mysqli_query($con,$getcrops);
    date_default_timezone_set('Asia/Calcutta');
	$date = date('Y-m-d H:i:s ', time());
	//echo $date;
	?>
	<script src="validator.js"></script>
	
<div class="table-responsive">	
<table class="table" border="2">
  <thead>
<tr>
      <th>f_id</th>
      <th>c_id</th>
      <th>c_name</th>
      <th>c_freshness</th>
    </tr>

	<?php
    if(mysqli_num_rows($result)>0)
	{
		while($row = $result->fetch_assoc())
		 {
			$c_start = $row["c_start"];
			$c_name = $row["c_name"];
			$c_quantity=$row["c_quantity"];
			$c_id=$row["c_id"];
			
			//echo $c_start;
			//echo round(abs($date - $c_start) / 60,2). " minute";
			$ts1 = strtotime(str_replace('/', '-', $date));
			$ts2 = strtotime(str_replace('/', '-', $c_start));
			$diff = round(abs($ts1 - $ts2) / 60,2);
			$fresh1=pow(($diff/30),2);
			$freshness=1-sqrt($fresh1);

			if($diff>10)
			{
				//echo $c_name;
				if($freshness>0)
				{
				//	echo "freshess is $freshness ";
				}
				else
					{$freshness=0;}
			$readycrops="INSERT into ready_crops(f_id,c_id,c_name,c_freshness) Values($f_id,$c_id,'$c_name',$freshness)";
			$result2=mysqli_query($con,$readycrops);
			$cropwhichready = "SELECT * FROM ready_crops";
 # Execute the SELECT Query

 $result3=mysqli_query($con,$cropwhichready);
  if(mysqli_num_rows($result3)>0){
      //if( mysql_num_rows( $result )==0 ){
        //echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      //}else{
       
echo "<tr><td>{$row['f_id']}</td><td>{$row['c_id']}</td><td>{$row['c_name']}</td><td>$freshness</td></tr>";
        //}
      
  }
  else{
  echo "Login failed";
  }
			



			}
			
		}
	}

?>
   </thead>
  <tbody>
  </tbody>
</table>