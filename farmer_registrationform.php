<!DOCTYPE HTML>
<head>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<script src="validator.js"></script>
</head>
<body>
<body  style="background-color:#e3f2fd">
  
  	<div class="container-fluid"style="background:#3175B2; height:120px;" >
		<div class="row" style="color:inherit">
			<div><h1 style="color:white;"><center>Digi Farmer</center></h1><div><i style="color:white;"><center>Lets build the digital farmer...</center></i>
			</div>
		</div>
	</div>
	<br><br>	

<div class="row">
	<div class=" col-md-6 col-md-offset-3">
	    <div class="panel panel-primary" style="right:50px">
		
	
      <div class="panel-heading"><h3>Farmer Registration</h3></div>
      <div class="panel-body">
<form name="farmer_registrationform" method="post" action="farmer_registration.php">
  
  <div class="form-group">
  <div class="cotainer-fluid">
  	<div class="row">
  		<div class="col-md-4 col-md-offset-3">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="f_name"id="f_name" placeholder="Enter your name here">
  </div></div></div></div>

  <div class="form-group">
  	<div class="cotainer-fluid">
  	<div class="row">
  		<div class="col-md-4 col-md-offset-3">
    <label for="f_phone">Mobile number</label>
    <input type="number" class="form-control" name="f_phone" id="f_phone" placeholder="Enter your mobile number">
  </div></div></div></div>

  <div class="form-group">
  	<div class="cotainer-fluid">
  	<div class="row">
  		<div class="col-md-4 col-md-offset-3">
    <label for="f_password">Password</label>
    <input type="password" class="form-control" name="f_password" id="f_password" placeholder="Password">
  </div></div></div></div>
  
  <div class="form-group">
  	<div class="cotainer-fluid">
  	<div class="row">
  		<div class="col-md-4 col-md-offset-3">
    <label for="f_password2">Re-enter Password</label>
    <input type="password" class="form-control" id="f_password2" placeholder="Re-enter Password">
  </div></div></div></div>

<div class="form-group">
  	<div class="cotainer-fluid">
  	<div class="row">
  		<div class="col-md-4 col-md-offset-3">
    <label for="f_address">Address</label>
    <input type="text" class="form-control" name="f_address" id="f_address" placeholder="Enter your address here">
  </div></div></div></div>

<div class="form-group">
  	<div class="cotainer-fluid">
  	<div class="row">
  		<div class="col-md-4 col-md-offset-3">
    <label for="f_city">City</label>
    <input type="text" class="form-control" name="f_city" id="f_city" placeholder="Enter your city of residence">
  </div></div></div></div>


<div class="form-group">
  	<div class="cotainer-fluid">
  	<div class="row">
  		<div class="col-md-4 col-md-offset-3">
    <label for="f_city">Land size</label>
    <input type="number" class="form-control" name="f_landsize" id="f_landsize" placeholder="Enter the size of land in acres">
  </div></div></div></div>


<div class="form-group">
  	<div class="cotainer-fluid">
  	<div class="row">
  		<div class="col-md-4 col-md-offset-3">
  		<p class="help-block">All fields are compulsory.</p>
		<button type="reset" class="btn btn-default">Reset</button>

  		<button style="margin-left:25px;" type="submit" class="btn btn-default">Submit</button>
  	</div></div></div></div></form></div></div></div></div></div>



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



