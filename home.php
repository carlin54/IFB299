<?php
@$a=$_POST['heigth'];
@$b=$_POST['length'];
@$c=$_POST['width'];
@$d=$_POST['weight'];

if(isset($_POST['add']))
{
	$e=$a*$b*$c/6000;

	if($e>$d){
		$x=$e;
	}
	else{
		$x=$d;
	}
	if ($x<=5){
		$sum = 10;

	}
	else if ($x>5 && $x<=10){
		$sum = 15;

	}
	else if ($x>10 && $x<=15){
		$sum = 20;

	}
	else if ($x>15 && $x<=20){
		$sum = 25;

	}
	else if ($x>20 && $x<=25){
		$sum = 30;

	}
	else if ($x>25 && $x<=30){
		$sum = 35;

	}

}
?>


<!DOCTYPE html>
<html>
<head>
	<title>On the Spot - Your Package Delivery Needs!</title>
  <link rel="stylesheet" type="text/css" href="css/login.css"></link>
	<style>
	h4 {
		font-weight: bold;
		font-size: 180%;
	}
	p {
		font-weight: bold;
		font-size: 200%;
	}
	.left{float: left; width: 600px;  margin-right:-3px;}
  .right{ float:right; width:600px; margin-left:-3px;}

	table, th, td {
	    border: 1px solid black;
	    border-collapse: collapse;
	}
	td {
	    text-align: center;
	}
	th{
		text-align: center;
	}

	</style>
</head>

<body>
  <div id="nav"><br>
      <div id="nav_wrapper"><br>
          <ul>
              <li><a href="home.php">Home</a></li>
              <li><a href="order.html">Order</a></li>
              <li><a href="tracking.html">Tracking</a></li>
              <li><a href="contact & about.html">Contact & About</a></li>
              <li><a href="help.html">Help</a></li>
              <li><a href="login.php">Login</a></li>
              <li><a href="loginstaff.php">Staff Login</a></li>
          </ul>
        </div>
    </div>
</body>

<!---<body>
<ul class="navi">
	<li class="navi"><a class="active" href="home.html">Home</a></li>
	<li class="navi"><a href="order.html">Order</a></li>
	<li class="navi"><a href="tracking.html">Tracking</a></li>
	<li class="navi"><a href="contact & about.html">Contact & About</a></li>
	<li class="navi"><a href="help.html">Help</a></li>
	<li class="navi"><a href="login.php">Login</a></li>
	<li class="navi"><a href="loginstaff.php">Staff Login</a></li>
</ul>
   <div class="orderhead">

	<h1 class="orderhead">Bill's Package Delivery</h1>--->
<p>Bill's Package Delivery</p>

	<!---<h2 class="orderhead">Check our rate</h2>
		<p>
			<label for="pickuppostcode"> Pick up Post Code</label>
			<input type="text" id="pickuppost" name="pickuppostcode" style="width:75px;">
		</p>
		<p>
			<label for="pickuppostcode">Drop off Post Code</label>
			<input type="text" id="pickuppost" name="pickuppostcode" style="width:75px;">
		</p>--->


<body>
	<form method="post">
	<div class="boxhome">
		<h4>Dimensions</h4>
		<h2>
			<label>Height</label>
			<input type="text" placeholder="Enter Height" id="size" name="height" style="width:150px;">  CM</input>
		</h2>
		<h2>
			<label>Length</label>
			<input type="text" placeholder="Enter Length" id="size" name="length" style="width:150px;">  CM</input>
		</h2>
		<h2>
			<label>Width </label>
			<input type="text" placeholder="Enter Width" id="size" name="width" style="width:150px;">  CM</input>
		</h2>
		<h2>
			<label>Weight </label>
			<input type="text" placeholder="Enter Weight" id="size" name="weight" style="width:150px;">  KG</input>
		</h2>
		<!--<table>-->
			<tr>
				<td><input type="submit" name="add" value="Calculate Cost" class="btn-home"></td>
			</tr>
		<!--</table>-->
		<h2>
			<label>Total Cost </label>
			<input type="text" value="<?php echo @$sum ?>" id="calccost" name="calccost" style="width:100px" readonly>
			$
		</h2>
	</div>
</form>
</body>
<body>
	<div class="boxhome2">
		<h4>Package details</h4>
		<table style="width:100%">
			<tr>
				<th>Height*Length*width(cm)/6000 Or Weight(KG)</th>
				<th>Cost($)</th>
			</tr>
			<tr>
				<td>0~5</td>
				<td>10</td>
			</tr>
			<tr>
				<td>5~10</td>
				<td>15</td>
			</tr>
			<tr>
				<td>10~15</td>
				<td>20</td>
			</tr>
			<tr>
				<td>15~20</td>
				<td>25</td>
			</tr>
			<tr>
				<td>20~25</td>
				<td>30</td>
			</tr>
			<tr>
				<td>25~30</td>
				<td>35</td>
			</tr>
		</table>
		<h3>*Please contact us if your package over than 30.</h3>
		<center><img src="home_logo.jpg" width="130" height="120"/></center>
	</div>
</body>




   




<div class="bottomhome">
	<div class="left">
		Opening Hours<br>
		Mondey 9AM--5PM<br>
		Tuesday 9AM--5PM<br>
		Wednesday 9AM--5PM<br>
		Thursday 9AM--5PM<br>
		Friday 9AM--2PM<br>
	</div>
	<div class="right">
		Drop Off Locations<br>
		365 Turbot St, Spring Hill QLD 4000<br>
		Brisbane Rd, Booval QLD 4304<br>
		Central Brisbane St, Ipswich QLD 4305<br>
		Queens Plaza, Queen St, Brisbane QLD 4000<br>
		The Markets, West End QLD 4101<br>
	</div>
</div>
</html>
