<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="On the Spot Landing Page">
	<title>On the Spot - Your Package Delivery Needs!</title>
	
	<link rel="stylesheet" href="bill.css">
</head>

<body>
<ul class="navi">
	<li class="navi"><a href="home.html">Home</a></li>
	<li class="navi"><a class="active" href="order.html">Order</a></li>
	<li class="navi"><a href="tracking.html">Tracking</a></li>
	<li class="navi"><a href="contact & locations.html">Contact & Locations</a></li>
	<li class="navi"><a href="about.html">About</a></li>
</ul>

<p>

	<?php
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "ifb299";
		
		function pickup_location_data_check($link, $first_line, $second_line, $postcode, $suburb, $state, $country){
			return false;
		}
		
		function recipent_data_check($link, $first_name, $last_name){
			return false;
		}
		
		function dropoff_location_data_check($link, $first_line, $second_line, $postcode, $suburb, $state, $country){
			return false;
		}
		
		function package_data_check($link, $description, $size, $weight){
			return false;
		}
		

		
		$link = mysqli_connect($servername, $username, $password, $dbname);
		
		if (!$link) {
			echo "<p>Error: Unable to connect to MySQL." . PHP_EOL . "</p>";
			echo "<p>Debugging errno: " . mysqli_connect_errno() . PHP_EOL . "</p>";
			echo "<p>Debugging error: " . mysqli_connect_error() . PHP_EOL . "</p>";
			exit;
		}
		
		$pickup_first_line = $_GET["pickup_first_line"];
		$pickup_second_line = $_GET["pickup_second_line"];
		$pickup_postcode = $_GET["pickup_postcode"];
		$pickup_suburb = $_GET["pickup_suburb"];
		$pickup_state = $_GET["pickup_state"];
		$pickup_country = $_GET["pickup_country"];
		
		$recipent_first_name = $_GET["recipent_first_name"];
		$recipent_last_name = $_GET["recipent_last_name"];
		
		$dropoff_first_line = $_GET["dropoff_first_line"];
		$dropoff_second_line = $_GET["dropoff_second_line"];
		$dropoff_postcode = $_GET["dropoff_postcode"];
		$dropoff_suburb = $_GET["dropoff_suburb"];
		$dropoff_state = $_GET["dropoff_state"];
		$dropoff_country = $_GET["dropoff_country"];
		
		$package_description = $_GET["package_description"];
		$package_length = $_GET["package_length"];
		$package_width = $_GET["package_width"];
		$package_height = $_GET["package_height"];
		$package_weight = $_GET["package_weight"];
		
		
		mysqli_close($link);
?>

</p>

</body>
</html>
