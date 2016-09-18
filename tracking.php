<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="On the Spot Landing Page">
	<title>On the Spot - Your Package Delivery Needs!</title>
	
	<link rel="stylesheet">  <!-- href="bill.css" -->
</head>

<body>
<ul class="navi">
	<li class="navi"><a href="home.html">Home</a></li>
	<li class="navi"><a href="order.html">Order</a></li>
	<li class="navi"><a class="active" href="tracking.html">Tracking</a></li>
	<li class="navi"><a href="contact & locations.html">Contact & Locations</a></li>
	<li class="navi"><a href="about.html">About</a></li>
</ul>

	
	<form action="tracking.php">
		<fieldset>
			<legend>Package Infomation</legend>
			
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
				}
				
				$query = "
					SELECT 
					recipents.RECIPENT_FIRST_NAME,
					recipents.RECIPENT_LAST_NAME,
					addresses.ADDRESS_FIRST_LINE,
					addresses.ADDRESS_SECOND_LINE,
					addresses.ADDRESS_POSTCODE,
					addresses.ADDRESS_SUBURB,
					addresses.ADDRESS_STATE,
					addresses.ADDRESS_COUNTRY,
					status.STATUS_DESCRIPTION,
					orders.SIZE,
					orders.WEIGHT,
					orders.COST,
					orders.DATE_OF_ORDER,
					orders.DATE_OF_PICKUP,
					orders.DATE_OF_DELIVERY
					FROM orders

					INNER JOIN customers
					ON orders.CUSTOMER_ID=customers.CUSTOMER_ID
					
					INNER JOIN recipents
					ON orders.RECIPENT_ID=recipents.RECIPENT_ID

					INNER JOIN status
					ON orders.STATUS_ID=status.STATUS_ID

					INNER JOIN addresses
					ON orders.DROP_OFF_LOCATION=addresses.ADDRESS_ID
					
					WHERE orders.ORDER_ID = " . $_GET["package_id"] . ";";
				//There may be an issue with double joining
				$result = $link->query($query);
				
				if ($result->num_rows == 0){
					echo "<p>Sorry, package not found.</p>";
				}else if($result->num_rows == 1){
					$row = $result->fetch_assoc();
					
					echo "<h2><u>Recipent</u></h2>";
					echo "<p><table>
							<tr>
								<th>FIRST NAME</th>
								<th>LAST NAME</th>
							</tr>
							<tr>
								<td>" . $row['RECIPENT_FIRST_NAME'] . "</td>
								<td>" . $row['RECIPENT_LAST_NAME'] . "</td>
							</tr>
						</table></p>";
					echo "<br>";
					
					echo "<h2><u>Delivery Address</u></h2>";
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
								<td>" . $row['ADDRESS_FIRST_LINE'] . "</td>
								<td>" . $row['ADDRESS_SECOND_LINE'] . "</td>
								<td>" . $row['ADDRESS_POSTCODE'] . "</td>
								<td>" . $row['ADDRESS_SUBURB'] . "</td>
								<td>" . $row['ADDRESS_STATE'] . "</td>
								<td>" . $row['ADDRESS_COUNTRY'] . "</td>
							</tr>
						</table><p>";
					echo "<br>";
					
					echo "<h2><u>Package</u></h2>";
					echo "<table>
							<tr>
								<th>COST</th>
								<th>STATUS</th>
								<th>SIZE</th>
								<th>WEIGHT</th>
								<th>DATE OF ORDER</th>
								<th>DATE OF PICKUP</th>
								<th>DATE OF DELIVERY</th>
							</tr>
							<tr>
								<td>$". $row['COST'] 				. "</td>
								<td>" . $row['STATUS_DESCRIPTION'] 	. "</td>
								<td>" . $row['SIZE'] 				. " m^3</td>
								<td>" . $row['WEIGHT'] 				. " kg</td>
								<td>" . $row['DATE_OF_ORDER'] 		. "</td>
								<td>" . $row['DATE_OF_PICKUP'] 		. "</td>
								<td>" . $row['DATE_OF_DELIVERY']	. "</td>
							</tr>
						</table><p>";					
					echo "<br>";
					
				}else{
					echo "Error: More than one package found with that ID.";
				}
				
				
				mysqli_close($link);
			?>
			<input type="submit" value="Submit">
		</fieldset>
	</form>

	<body>

	

</body>
</html>





<!---Success: A proper connection to MySQL was made! The my_db database is great.
Host information: localhost via TCP/IP--->