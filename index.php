<!DOCTYPE html>
<html lang="en">
<head>
  <title>Farmer Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="procss.css"></link> 
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css"></link>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
  <script src="validator.js"></script>
     <style>
   .icon {
	position:relative;
      width: 70%;
	  height:40px;
      margin: auto;
  }
  .panels {
	margin-top:100px;
	margin-bottom:100px;
	margin-right:100px;
	margin-left:100px;
	
  }
  </style>
  <body  style="background-color:#e3f2fd">
  
  	<div class="container-fluid"style="background:#3232ff; height:120px;" >
		<div class="row" style="color:inherit">
			<div><h1 style="color:white;"><center>Digi Farmer</center></h1><div><i style="color:white;"><center>Lets build the digital farmer...</center></i>
			</div>
		</div>
	</div>
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="row">
				<section class="feature">
					<div class="col-sm-4"><img src="farm.png" class="icon"></img></div>
					<div class="col-sm-8"><a href="farmer_registrationform.php"><h3>Farmer Registration </h3></a></div>
				</section>
				</div>
				<div class="row">
				<section class="feature">
					<div class="col-sm-4"><img src="buyer.png" class="icon"></img></div>
					<div class="col-sm-8"><a href="buyer_registrationform.html"><h3>Buyer Registration </h3></a></div>
				</section>
				</div>
			</div>
			<div class="col-sm-8" >
		</div>
	</div>
	<div class="col-sm-6">
	    <div class="panel panel-primary">
		
      <div class="panel-heading"><h3>Farmer Login</h3></div>
      <div class="panel-body">
			<form class="form-horizontal" role="form"  method="post" action="farmervalidate.php">
		<div class="form-group">
		<label class=" control-label col-xs-3">Phone Number:</label>
        <div class="col-xs-4">
            <input type="number" class="form-control" name="f_phone" placeholder="Contact Number" />
        </div>
		
      
    </div>
	<hr>
	
    <div class="form-group">
        <label class="control-label col-xs-3">Password:</label>
        <div class="col-xs-4">
            <input type="password" class="form-control" name="f_password" placeholder="Password" />
        </div>
    </div>
	<hr>
		
	<div class="form-group">
	<button type="submit"  class="btn btn-success center-block" ><span class="glyphicon glyphicon-log-in"></span> Login</button>
	</div>
	
	  </form>
	  </div>
	  </div>
    </div>
			<div class="col-sm-6">
		    <div class="panel panel-primary">
      <div class="panel-heading"><h3>Buyer Login</h3></div>
      <div class="panel-body">
			<form class="form-horizontal" role="form"  method="post" action="buyervalidate.php">
		<div class="form-group">
		<label class=" control-label col-xs-3">Email:</label>
        <div class="col-xs-4">
            <input type="email" class="form-control" name="b_email" placeholder="Email" />
        </div>
		
      
    </div>
	<hr>
    <div class="form-group">
        <label class="control-label col-xs-3">Password:</label>
        <div class="col-xs-4">
            <input type="password" class="form-control" name="b_password" placeholder="Password" />
        </div>
    </div>
	<hr>
		
	<div class="form-group">
	<button type="submit"  class="btn btn-success center-block" ><span class="glyphicon glyphicon-log-in"></span> Login</button>
	</div>
	</div>
	  </div>
	  </form>
    </div>
</div>
		
<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<div class="panel panel-primary">
      <div class="panel-heading"><h3>Government Schemes</h3></div>
      <div class="panel-body">
	  <marquee direction="up" scrollamount="3">
	  <?php
	$host="localhost"; //replace with database hostname 
    $username="root"; //replace with database username 
    $password=""; //replace with database password 
    $db_name="farmer"; //replace with database name
	$tbl_name="government_news";
    $con=mysqli_connect($host, $username, $password)or die("cannot connect"); 
    mysqli_select_db($con, $db_name)or die("cannot select DB");
	
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
	</marquee>
</div></div></div></div>	 

	  </div>
</body>