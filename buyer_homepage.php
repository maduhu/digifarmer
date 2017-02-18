<!DOCTYPE html>
<?php
	session_start();
	//print_r($_SESSION["b_name"]);
?>
<html lang="en">
<head>
  <title>Buyer Homepage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="procss.css"></link> 
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css"></link>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
  <script src="validator.js"></script>
 
  
  <style>
 
  ul.nav-pills {
      top: 20px;
      position: fixed;
  }
 
  
  
  @media screen and (max-width: 810px) {
    #section1, #section2, #section3, #section4  {
        margin-left: 150px;
    }
  }
  </style>
</head>
<body data-spy="scroll" data-target="#myScrollspy" data-offset="20" style="background-color:#e3f2fd">

	
  
  	<div class="container-fluid"style="background:#3175B2; height:120px;" >
		<div class="row" style="color:inherit">
			<div><h1 style="color:white;"><center>Digi Farmer</center></h1><div><i style="color:white;"><center>Lets build the digital farmer...</center></i>
			</div>
		</div>
	</div>
	</div>
	<div class="container-fluid"style="background:black; height:60px;" >
		<div class="row" style="color:inherit">
			<div class="col-sm-12"><h3 id="welcome" style="color:white;">Welcome, <?php print_r($_SESSION["b_name"]); ?></h3></div>
			<div><button type="button" class="btn btn-danger" style="float:right"><a href= "logout.php">Logout</a></button></div>
			
		</div>
	</div>
	
	<br><br>
	
<div class="container-fluid">
  <div class="row">
    <nav class="col-sm-3" id="myScrollspy">
	<div class="container-fluid" >
	
      <ul class="nav nav-pills nav-stacked" style="padding-top:210px">
        <li class="active"><a href="#section1">View Crop Deals</a></li>
		

          </ul>
        </div>
    </nav>
    <div class="col-sm-9 ">
	<br>
      <div id="section1">   
<div class="panel panel-primary">

      <div class="panel-heading"><h3>Crop Deals</h3></div>
      <div class="panel-body">	  
	  
	  
	  <?php

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
	<div class="table-responsive">	
<table class="table" border="2">
  <thead>
<tr>
      <th>Farmer ID</th>
      <th>Crop ID</th>
      <th>Crop Name</th>
      <th>Crop Sellingprice</th>
      <th>Crop Quantity</th>
      <th>Crop Sellingdate</th>
      <th>Crop Freshness Value</th>
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
  <input type="submit" class="btn btn-default"></input>
</form>





	  
	  
	  
	  
        
      </div>
	  </div>
	  </div>

		
		
       
  </div>
</div>
