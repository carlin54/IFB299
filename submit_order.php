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
	<form action="submit_order.php">
		<fieldset>
		<legend>Order Status</legend>
			<?php
				session_start();
				
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "ifb299";
		
				$link = mysqli_connect($servername, $username, $password, $dbname);
		
				if (!$link) {
					echo "<p>Error: Unable to connect to MySQL." . PHP_EOL . "</p>";
					echo "<p>Debugging errno: " . mysqli_connect_errno() . PHP_EOL . "</p>";
					echo "<p>Debugging error: " . mysqli_connect_error() . PHP_EOL . "</p>";
					exit;
				} else {
					echo "<p>Success: Connect to MySQL.</p>";
				}
				
				$sender_first_name = strtoupper("TO IMPLEMENT");
				$sender_last_name = strtoupper("TO IMPLEMENT");
				
				$pickup_first_line = $_SESSION['pickup_first_line'];
				$pickup_second_line = $_SESSION['pickup_second_line'];
				$pickup_postcode = $_SESSION['pickup_postcode'];
				$pickup_suburb = $_SESSION['pickup_suburb'];
				$pickup_state = $_SESSION['pickup_state'];
				$pickup_country = $_SESSION['pickup_country'];
				
				$recipent_first_name = $_SESSION['recipent_first_name'];
				$recipent_last_name = $_SESSION['recipent_last_name'];
				
				$dropoff_first_line = $_SESSION['dropoff_first_line'];
				$dropoff_second_line = $_SESSION['dropoff_second_line'];
				$dropoff_postcode = $_SESSION['dropoff_postcode'];
				$dropoff_suburb = $_SESSION['dropoff_suburb'];
				$dropoff_state = $_SESSION['dropoff_state'];
				$dropoff_country = $_SESSION['dropoff_country'];
				
				$package_description = $_SESSION['package_description'];
				$package_length = $_SESSION['package_length'];
				$package_width = $_SESSION['package_width'];
				$package_height = $_SESSION['package_height'];
				$package_weight = $_SESSION['package_weight'];
				$package_m3 = $_SESSION['package_m3'];
				

						
				?>
				<input type="submit">
			<input type="submit" value="Confirm">

		</fieldset>
	</form>
</div>
</body>
</html>
