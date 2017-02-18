<?php

	session_start();
	$host="localhost"; //replace with database hostname 
    $username="root"; //replace with database username 
    $password=""; //replace with database password 
    $db_name="farmer"; //replace with database name
	$tbl_name="crop";
    $con=mysqli_connect($host, $username, $password)or die("cannot connect"); 
    mysqli_select_db($con, $db_name)or die("cannot select DB");
	
	$sql = "SELECT * FROM $tbl_name";
 # Execute the SELECT Query
 $result=mysqli_query($con,$sql);
  if(mysqli_num_rows($result)>0){
    ?>
	
	<script src="validator.js"></script>
<table border="2">
  <thead>
    <tr>
      <th>C_id</th>
      <th>F_id</th>
      <th>C_name</th>
      <th>C_quantity</th>
	  <th>C_start</th>
    </tr>
  </thead>
  <tbody>
    <?php
      //if( mysql_num_rows( $result )==0 ){
        //echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      //}else{
        while($row = $result->fetch_assoc()){
          echo "<tr><td>{$row['c_id']}</td><td>{$row['f_id']}</td><td>{$row['c_name']}</td><td>{$row['c_quantity']}</td><td>{$row['c_start']}</td></tr>\n";
        //}
      }
    ?>
  </tbody>
</table>
    <?php
  }
  else{
  echo "Login failed";
  }

?>