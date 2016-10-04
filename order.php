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
		<legend>Order Information</legend>
			<?php
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
				
				$_SESSION["username"] = "Carlin54";
				
				$user_query = "
					SELECT 
					customers.CUSTOMER_ID,
					customers.CUSTOMER_FIRST_NAME,
					customers.CUSTOMER_LAST_NAME
					FROM customers
					WHERE customers.CUSTOMER_USERNAME = \"" . $_SESSION["username"] . "\";";
				
				$user_result = $link->query($user_query);
				
				$sender_id = NULL;
				$sender_first_name = NULL;
				$sender_last_name = NULL;
				if ($user_result->num_rows == 0){
					echo "<p>Sorry, username " . $_SESSION["username"] . " is not found.</p>";
					exit;
				}else if($user_result->num_rows == 1){
					$row = $user_result->fetch_assoc();
					$_SESSION['sender_id'] = $sender_id = $row['CUSTOMER_ID'];
					$_SESSION['sender_first_name'] = $sender_first_name = $row['CUSTOMER_FIRST_NAME'];
					$_SESSION['sender_last_name'] = $sender_last_name = $row['CUSTOMER_LAST_NAME'];
					
				}else{
					echo "<p>Sorry, " . $_SESSION["username"] . " there is a database error.</p>";
					exit;					
				}
				$user_result->close();
				
				$_SESSION['pickup_first_line'] = $pickup_first_line = strtoupper($_GET['pickup_first_line']);
				$_SESSION['pickup_second_line'] = $pickup_second_line = strtoupper($_GET['pickup_second_line']);
				$_SESSION['pickup_postcode'] = $pickup_postcode = $_GET['pickup_postcode'];
				$_SESSION['pickup_suburb'] = $pickup_suburb = strtoupper($_GET['pickup_suburb']);
				$_SESSION['pickup_state'] = $pickup_state = strtoupper($_GET['pickup_state']);
				$_SESSION['pickup_country'] = $pickup_country = strtoupper($_GET['pickup_country']);
				
				$_SESSION['recipent_first_name'] = $recipent_first_name = strtoupper($_GET['recipent_first_name']);
				$_SESSION['recipent_last_name'] = $recipent_last_name = strtoupper($_GET['recipent_last_name']);
				
				$_SESSION['dropoff_first_line'] = $dropoff_first_line = strtoupper($_GET['dropoff_first_line']);
				$_SESSION['dropoff_second_line'] = $dropoff_second_line = strtoupper($_GET['dropoff_second_line']);
				$_SESSION['dropoff_postcode'] = $dropoff_postcode = $_GET['dropoff_postcode'];
				$_SESSION['dropoff_suburb'] = $dropoff_suburb = strtoupper($_GET['dropoff_suburb']);
				$_SESSION['dropoff_state'] = $dropoff_state = strtoupper($_GET['dropoff_state']);
				$_SESSION['dropoff_country'] = $dropoff_country = strtoupper($_GET['dropoff_country']);
				
				$_SESSION['package_description'] = $package_description = strtoupper($_GET['package_description']);
				$_SESSION['package_length'] = $package_length = $_GET['package_length'];
				$_SESSION['package_width'] = $package_width = $_GET['package_width'];
				$_SESSION['package_height'] = $package_height = $_GET['package_height'];
				$_SESSION['package_weight'] = $package_weight = $_GET['package_weight'];
				$_SESSION['package_m3'] = $package_m3 = $package_length * $package_width * $package_height;
				
				
				$package_m3_scalar = 0.0;
				$package_weight_scalar = 0.0;
				$cost_query = "
					SELECT * FROM `cost weight`
					ORDER BY DATE_ADDED;";
				$cost_result = $link->query($cost_query);
				if ($cost_result->num_rows == 0){
					echo "<p>Sorry, cannot no cost scalers in database.</p>";
				}else if($cost_result->num_rows > 0){
					$row = $cost_result->fetch_assoc();
					$package_m3_scalar = $row['SIZE_SCALER'];
					$package_weight_scalar = $row['WEIGHT_SCALER'];
				}
				$cost_result->close();
				
				$package_cost = $package_m3 * $package_m3_scalar + $package_weight * $package_weight_scalar;
				
				
				
				echo "<h2><u>Sender</u></h2>";
				echo "<table>
					<tr>
						<th>FIRST NAME</th>
						<th>LAST NAME</th>
					</tr>
					<tr>
						<td>" . $sender_first_name . "</td>
						<td>" . $sender_last_name . "</td>
					</tr>
				</table><p>";
				echo "<br>";
				
				echo "<h2><u>Pickup Address</u></h2>";
				echo "<table>
						<tr>
							<th>FIRST LINE</th>
							<th>SECOND LINE</th>
							<th>POSTCODE</th>
							<th>SUBURB</th>
							<th>STATE</th>
							<th>COUNTRY</th>
						</tr>
						<tr>
							<td>" . $pickup_first_line . "</td>
							<td>" . $pickup_second_line . "</td>
							<td>" . $pickup_postcode . "</td>
							<td>" . $pickup_suburb . "</td>
							<td>" . $pickup_state . "</td>
							<td>" . $pickup_country . "</td>
						</tr>
					</table><p>";
					echo "<br>";
					
				echo "<h2><u>Recipent</u></h2>";
				echo "<table>
					<tr>
						<th>FIRST NAME</th>
						<th>LAST NAME</th>
					</tr>
					<tr>
						<td>" . $recipent_first_name . "</td>
						<td>" . $recipent_last_name . "</td>
					</tr>
				</table><p>";
				echo "<br>";
				
				echo "<h2><u>Dropoff Address</u></h2>";
				echo "<table>
					<tr>
						<th>FIRST LINE</th>
						<th>SECOND LINE</th>
						<th>POSTCODE</th>
						<th>SUBURB</th>
						<th>STATE</th>
						<th>COUNTRY</th>
					</tr>
					<tr>
						<td>" . $dropoff_first_line . "</td>
						<td>" . $dropoff_second_line . "</td>
						<td>" . $dropoff_postcode . "</td>
						<td>" . $dropoff_suburb . "</td>
						<td>" . $dropoff_state . "</td>
						<td>" . $dropoff_country . "</td>
					</tr>
				</table><p>";
				echo "<br>";
				
				echo "<h2><u>Package</u></h2>";
				echo "<table>
							<tr>
								<th>DESCRIPTION</th>
								<th>LENGTH</th>
								<th>WIDTH</th>
								<th>HEIGHT</th>
								<th>M^3</th>
								<th>WEIGHT</th>
								<th>COST</th>
							</tr>
							<tr>
							<td>" . $package_description . "</td>
							<td>" . $package_length . "</td>
							<td>" . $package_width . "</td>
							<td>" . $package_height . "</td>
							<td>" . $package_m3 . "</td>
							<td>" . $package_weight . "</td>
							<td>$". $package_cost . "</td>
							</tr>
					</table><p>";
				echo "<br>";
								
				?>
				
			<input type="submit" value="Submit Order">

		</fieldset>
	</form>
</div>
</body>
</html>
