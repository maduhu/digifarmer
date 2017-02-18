<?php
 	session_start();

    $host="localhost"; //replace with database hostname 
    $username="root"; //replace with database username 
    $password=""; //replace with database password 
    $db_name="farmer"; //replace with database name
	$tbl_name="crop";
    $con=mysqli_connect($host, $username, $password)or die("cannot connect"); 
    mysqli_select_db($con, $db_name)or die("cannot select DB");
    $b_email=$_SESSION["b_email"];
    $sql="select * from put_for_sale";
    $result=mysqli_query($con,$sql);
    ?>
	
	<script src="validator.js"></script>
	<div class="table-responsive">	
<table class="table" border="2">
  <thead>
<tr>
      <th>f_id</th>
      <th>c_id</th>
      <th>c_name</th>
      <th>c_sellingprice</th>
      <th>c_quantity</th>
      <th>c_sellingdate</th>
      <th>c_freshness</th>
    </tr>
    <?php
    if(mysqli_num_rows($result)>0)
	{
		while($row = $result->fetch_assoc())
		 {
			$f_id = $row["f_id"];
			$c_id = $row["c_id"];
			$c_name=$row["c_name"];
			$c_sellingprice=$row["c_sellingprice"];
			$c_quantity=$row["c_quantity"];
			$c_sellingdate=$row["c_sellingdate"];
			$c_freshness=$row["c_freshness"];
			echo "<tr><td>{$row['f_id']}</td><td>{$row['c_id']}</td><td>{$row['c_name']}</td><td>{$row['c_sellingprice']}</td><td>{$row['c_quantity']}</td><td>{$row['c_sellingdate']}</td><td>{$row['c_freshness']}</td></tr>";
		}
	}
else
	echo "login faild";
?>
 </thead>
  <tbody>
  </tbody>
</table>
<form method="post" action="sold.php"> 
  Enter the crop id from above table which you want to buy<input type="number" name="c_id" id="c_id">
  <input type="submit"></input>
</form>




