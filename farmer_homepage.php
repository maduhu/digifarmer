<!DOCTYPE html>
<?php 
	session_start();

	//print_r($_SESSION["f_name"]);

?>

<html lang="en">
<head>
  <title>Farmer Homepage</title>
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
    #section1, #section2, #section3, #section4, #section5  {
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
			<div class="col-sm-12"><h3 id="welcome" style="color:white;">Welcome, <?php print_r($_SESSION["f_name"]);?> </h3></div>
			<div><button type="submit" class="btn btn-danger" style="float:right"><a href= "logout.php">Logout</a></button></div>
			
		</div>
	</div>
	
	<br><br>
	
<div class="container-fluid">
  <div class="row">
    <nav class="col-sm-3" id="myScrollspy">
	<div class="container-fluid" >
	
      <ul class="nav nav-pills nav-stacked" style="padding-top:210px">
        <li class="active"><a href="#section1">Add your crops</a></li>
        <li><a href="#section2">Sell your crops</a></li>
        <li><a href="#section3">View your crops</a></li>
		<li><a href="#section4">View sold crops</a></li>
		<li><a href="#section5">Tips for Farmers</a></li>
                       
          </ul>
        </div>
    </nav>
    <div class="col-sm-9 ">
	<br>
      <div id="section1">   
<div class="panel panel-primary">
<form data-toggle="validator" role="form" name="add_crop" method="post" action="addcropdetails.php">
      <div class="panel-heading"><h3>Add Your Crops</h3></div>
      <div class="panel-body">	  
	<label for="c_name">Crop Name</label>
    <input type="text" class="form-control" name="c_name"id="c_name" placeholder="Enter the name of crop you want to add in your farm">
	<label for="c_quantity">Quantity</label>
    <input type="number" class="form-control" name="c_quantity" id="c_quantity" placeholder="Enter the quantity of crops">
	<label for="c_start">Crop started date</label>
    <input type="datetime-local" class="form-control" name="c_start" id="c_start" placeholder="Password">
	<div class="row">
  		<div class="col-md-4 col-md-offset-3">
  		<p class="help-block">All fields are compulsory.</p>
		<input type="reset" class="btn btn-default"></input>

  		<input style="margin-left:25px;" type="submit" class="btn btn-default"></input>
        
      </div>
	  </div>
	  </div>
	 </form>
</div>	 
	  
	  
	  
      <div id="section2"> 
	  <div class="panel panel-primary">
        <div class="panel-heading"><h3>Sell Your Crops</h3></div>
      <div class="panel-body">	 
	  
	  
	  
	  <?php
 	

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

<div class="table-responsive">	
<table class="table" border="2">
<thead>
<tr>
      <th>Farmer ID</th>
      <th>Crop ID</th>
      <th>Crop Name</th>
      <th>Crop Freshness Value</th>
    	<th>Crop Estimated Price</th>
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
  	$price=$freshness*30;
       
echo "<tr><td>{$row['f_id']}</td><td>{$row['c_id']}</td><td>{$row['c_name']}</td><td>$freshness</td><td>$price</td></tr>";
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
<form method="post" action="putforsale.php">
	Enter your total selling price<input type="number" name="price" id="price"> 
	Enter the crop id from above table<input type="number" name="c_id" id="c_id">
	<input type="submit" class="btn btn-primary"></input>
</form>

	  
	  
	  
	  
	  
	  
      </div> 
		</div>
		
		
		
       <div id="section3"> 
	  <div class="panel panel-primary">
        <div class="panel-heading"><h3>View Your Crops</h3></div>
      <div class="panel-body">	 
	  
	  
	  <?php
 	

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
	
<div class="table-responsive">	
<table class="table" border="2">
  <thead>
<tr>
      <th>Farmer ID</th>
      <th>Crop ID</th>
      <th>Crop Name</th>
      <th>Crop Freshness Value</th>
	  
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
      </div> 
		</div>
		
				
     
	
	 <div id="section5"> 
	  <div class="panel panel-primary">
        <div class="panel-heading"><h3>Tips for Farmers</h3></div>
      <div class="panel-body">	 
	  <button class="btn btn-info"><a href="wheat.html">Wheat</a></button>
	  <button class="btn btn-info"><a href="rice.html">Rice</a></button>
	  <button class="btn btn-info"><a href="maize.html">Maize</a></button>
      </div> 
		</div>     
      
    </div>
  </div>
</div>
