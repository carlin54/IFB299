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
				
				function add_address($link, $first_line, $second_line, $postcode, $suburb, $state, $country){
	
					$address_query = "
					SELECT addresses.ADDRESS_ID 
					FROM `addresses`
					WHERE 
					addresses.ADDRESS_FIRST_LINE = 	'" . $first_line 	. "' AND 
					addresses.ADDRESS_SECOND_LINE = '" . $second_line 	. "' AND 
					addresses.ADDRESS_POSTCODE = 	'" . $postcode 		. "' AND 
					addresses.ADDRESS_SUBURB = 		'" . $suburb 		. "' AND 
					addresses.ADDRESS_STATE = 		'" . $state 		. "' AND 
					addresses.ADDRESS_COUNTRY = 	'" . $country		. "'";
					
					$address_result = $link->query($address_query);
				
					if ($address_result->num_rows == 0){
						$insert_address = "
						INSERT INTO address 
						( 	ADDRESS_FIRST_LINE,
							ADDRESS_SECOND_LINE,
							ADDRESS_POSTCODE,
							ADDRESS_SUBURB,
							ADDRESS_STATE,
							ADDRESS_COUNTRY
						)
						VALUES (
							'" . $first_line 	. "',
							'" . $second_line 	. "',
							'" . $postcode		. "',
							'" . $suburb 		. "',
							'" . $state 		. "',
							'" . $country 		. "'
						)
						";
						
						if($link->query($insert_address) === TRUE){
							$address_result->close();
							$address_result = $link->query($address_query);
							$row = $address_result->fetch_assoc();
							$address_result->close();
							return $row['ADDRESS_ID'];
						}else{
							return NULL;
						}
						
					}else if($address_result->num_rows == 1){
						$row = $address_result->fetch_assoc();
						$address_result->close();
						return $row['ADDRESS_ID'];
					}else{
						return NULL;				
					}
					
					$address_result->close();
					
					return NULL;

				}
				function add_recipent($link, $first_name, $last_name){
					
					$insert_recipent = "
						RECIPENT_ID
						RECIPENT_FIRST_NAME
						RECIPENT_LAST_NAME
					";
					/////////////////////////////////////////////////////////
					$recipent_query = "
					SELECT recipents.RECIPENT_ID 
					FROM `recipents`
					WHERE 
					recipents.ADDRESS_FIRST_LINE = 	'" . $first_line 	. "' AND 
					recipents.ADDRESS_SECOND_LINE = '" . $second_line 	. "'";
					
					$recipent_result = $link->query($recipent_query);
				
					if ($recipent_result->num_rows == 0){
						$insert_recipent = "
						INSERT INTO address 
						( 	RECIPENT_FIRST_NAME,
							RECIPENT_LAST_NAME
						)
						VALUES (
							'" . $first_name 	. "',
							'" . $last_name 	. "'
						)
						";
						
						if($link->query($insert_recipent) === TRUE){
							$recipent_result->close();
							$recipent_result = $link->query($recipent_query);
							$row = $recipent_result->fetch_assoc();
							$recipent_result->close();
							return $row['RECIPENT_ID'];
						}else{
							return NULL;
						}
						
					}else if($recipent_result->num_rows == 1){
						$row = $recipent_result->fetch_assoc();
						$recipent_result->close();
						return $row['RECIPENT_ID'];
					}else{
						return NULL;				
					}
					
					$recipent_result->close();
					
					return NULL;
					/////////////////////////////////////////////////////////
				}
									
				
				
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
							
			
				$sender_id = $_SESSION['sender_id'];
				
				
				$pickup_first_line = $_SESSION['pickup_first_line'];
				$pickup_second_line = $_SESSION['pickup_second_line'];
				$pickup_postcode = $_SESSION['pickup_postcode'];
				$pickup_suburb = $_SESSION['pickup_suburb'];
				$pickup_state = $_SESSION['pickup_state'];
				$pickup_country = $_SESSION['pickup_country'];
				$pickup_address_id = add_address($link, $pickup_first_line, $pickup_second_line, $pickup_postcode, $pickup_suburb, $pickup_state, $pickup_country);
				
				$recipent_first_name = $_SESSION['recipent_first_name'];
				$recipent_last_name = $_SESSION['recipent_last_name'];
				$recipent_id = add_recipent($link, $recipent_first_name, $recipent_last_name);
				
				$dropoff_first_line = $_SESSION['dropoff_first_line'];
				$dropoff_second_line = $_SESSION['dropoff_second_line'];
				$dropoff_postcode = $_SESSION['dropoff_postcode'];
				$dropoff_suburb = $_SESSION['dropoff_suburb'];
				$dropoff_state = $_SESSION['dropoff_state'];
				$dropoff_country = $_SESSION['dropoff_country'];
				$dropoff_address_id = add_address($link, $dropoff_first_line, $dropoff_second_line, $dropoff_postcode, $dropoff_suburb, $dropoff_state, $dropoff_country);
				
				$package_description = $_SESSION['package_description'];
				$package_length = $_SESSION['package_length'];
				$package_width = $_SESSION['package_width'];
				$package_height = $_SESSION['package_height'];
				$package_weight = $_SESSION['package_weight'];
				$package_m3 = $_SESSION['package_m3'];
				
				$date_of_order = date("Y-m-d");
								
				$insert_order = "
				INSERT INTO orders 
				( 	RECIPENT_ID,
					SIZE,
					WEIGHT,
					ORDER_PICKED_UP_BY,
					ORDER_DROPPED_OFF_BY,
					DATE_OF_ORDER,
					DATE_OF_PICKUP,
					DATE_OF_DELIVERY,
					COST,
					CUSTOMER_ID,
					DESCRIPTION,
					STATUS_ID,
					PICKUP_LOCATION,
					DROP_OFF_LOCATION
				)
				VALUES (
					'" . $recipent_id 			. "',
					'" . $package_m3 			. "',
					'" . $package_weight		. "',
					'" . NULL 					. "',
					'" . NULL 					. "',
					'" . $date_of_order 		. "',
					'" . $cost 					. "',
					'" . $sender_id				. "',
					'" . $package_description 	. "',
					'" . $status_id 			. "',
					'" . $pickup_address_id 	. "',
					'" . $dropoff_address_id 	. "'
				)
				"
				?>
				<input type="submit">
			<input type="submit" value="Confirm">

		</fieldset>
	</form>
</div>
</body>
</html>
