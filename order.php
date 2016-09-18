<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="On the Spot Landing Page">
	<title>On the Spot - Your Package Delivery Needs!</title>
	
	<link rel="stylesheet"> <!---href="bill.css"--->
</head>

<body>
<ul class="navi">
	<li class="navi"><a href="home.html">Home</a></li>
	<li class="navi"><a class="active" href="order.html">Order</a></li>
	<li class="navi"><a href="tracking.html">Tracking</a></li>
	<li class="navi"><a href="contact & locations.html">Contact & Locations</a></li>
	<li class="navi"><a href="about.html">About</a></li>
</ul>

<div id="order">	
	<form action="order.php" method="post">
		<fieldset>
		<legend><h1>Order Form</h1></legend>
		<br>
		<p class="orderhead"><h2>Pickup Address</h2></p>

			<p>
				<label for="pickup_first_line">First Line</label>
				<input type="text" name="pickup_first_line" value="<?php echo $_GET["pickup_first_line"]; ?>">
			</p>
			
			<p>
				<label for="pickup_second_line">Second Line</label>
				<input type="text" name="pickup_second_line" value="<?php echo $_GET["pickup_second_line"]; ?>">
			</p>
			
			<p>
				<label for="pickup_postcode">Postcode</label> <!--- This should be a dropdown -->
				<input type="text" name="pickup_postcode" value="<?php echo $_GET["pickup_postcode"]; ?>">
			</p>
			
			<p>
				<label for="pickup_suburb">Suburb</label>  <!--- This should be a dropdown -->
				<input type="text" name="pickup_suburb" value="<?php echo $_GET["pickup_suburb"]; ?>">
			</p>
			
			<p>
				<label for="pickup_state">State</label>  <!--- This should be a dropdown -->
				<input type="text" name="pickup_state" value="<?php echo $_GET["pickup_state"]; ?>">
			</p>
			
			<p>
				<label for="pickup_country">Country</label>  <!--- This should be a dropdown -->
				<input type="text" name="pickup_country" value="<?php echo $_GET["pickup_country"]; ?>">
			</p>
			
		<br>
		
			<p class="orderhead"><h2>Recipent Details</h2></p>
			<p>
				<label for="recipent_first_name">First Name</label>
				<input type="text" name="recipent_first_name" value="<?php echo $_GET["recipent_first_name"]; ?>">
			</p>
			<p>
				<label for="recipent_last_name">Last Name</label>
				<input type="text" name="recipent_last_name" value="<?php echo $_GET["recipent_last_name"]; ?>">
			</p>
		
		<br>
		
		<p class="orderhead"><h2>Drop-off Location</h2></p>
		
			<p>
				<label for="dropoff_first_line">First Line</label>
				<input type="text" name="dropoff_first_line" value="<?php echo $_GET["dropoff_first_line"]; ?>">
			</p>
			
			<p>
				<label for="dropoff_second_line">Second Line</label>
				<input type="text" name="dropoff_second_line" value="<?php echo $_GET["dropoff_second_line"]; ?>">
			</p>
			
			<p>
				<label for="dropoff_postcode">Postcode</label> <!--- This should be a dropdown -->
				<input type="text" name="dropoff_postcode" value="<?php echo $_GET["dropoff_postcode"]; ?>">
			</p>
			
			<p>
				<label for="dropoff_suburb">Suburb</label>  <!--- This should be a dropdown -->
				<input type="text" name="dropoff_suburb" value="<?php echo $_GET["dropoff_suburb"]; ?>">
			</p>
			
			<p>
				<label for="dropoff_state">State</label>  <!--- This should be a dropdown -->
				<input type="text" name="dropoff_state" value="<?php echo $_GET["dropoff_state"]; ?>">
			</p>
			
			<p>
				<label for="dropoff_country">Country</label>  <!--- This should be a dropdown -->
				<input type="text" name="dropoff_country" value="<?php echo $_GET["dropoff_country"]; ?>">
			</p>
		
		<br>	
		<p class="orderhead"><h2>Package Details</h2></p>
			<p>
				<label for="package_description">Description</label>
				<input type="text" name="package_description" value="<?php echo $_GET["package_description"]; ?>">
			</p>
			<p>
				<label for="package_length">Length</label>
				<input type="text" name="package_length" value="<?php echo $_GET["package_length"]; ?>">
			</p>
			<p>
				<label for="package_width">Width</label>
				<input type="text" name="package_width" value="<?php echo $_GET["package_width"]; ?>">
			</p>
			<p>
				<label for="package_height">Height</label>
				<input type="text" name="package_height" value="<?php echo $_GET["package_height"]; ?>">
			</p>
			<p>
				<label for="package_weight">Weight</label>
				<input type="text" name="package_weight" value="<?php echo $_GET["package_weight"]; ?>">
			</p>
			<p>
				<input type="submit" value="Calculate Cost">
			</p>
			<p>
				<label for="cost_calculator">Cost</label>
				<input type="text" name="cost_calculator" readonly>
			</p>
			
		<p>
			<input type="submit" value="Submit Order">
		</p>
		</fieldset>
	</form>
</div>
</body>
</html>
