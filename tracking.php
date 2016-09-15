<!DOCTYPE html>

<html>
<body>

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
	
		echo "<p>Success: A proper connection to MySQL was made! The ifb299 database is great." . PHP_EOL . "</p>";
		echo "<p>Host information: " . mysqli_get_host_info($link) . PHP_EOL . "</p>";
		
		
		echo "<p>Package ID:" . $_GET["package_id"] . "</p>";
		
		$query = "
			SELECT * FROM orders

			INNER JOIN customers
			ON orders.CUSTOMER_ID=customers.CUSTOMER_ID
			
			INNER JOIN recipents
			ON orders.RECIPENT_ID=recipents.RECIPENT_ID

			INNER JOIN status
			ON orders.STATUS_ID=status.STATUS_ID

			INNER JOIN addresses
			ON orders.DROP_OFF_LOCATION=addresses.ADDRESS_ID
			
			WHERE orders.ORDER_ID = " . $_GET["package_id"] . ";";
		
		$result = $link->query($query);
		
		if ($result->num_rows > 0) {
		// output data of each row
			while($row = $result->fetch_assoc()) {
				echo implode("\t",$row) . "<br>";
			}
		} else {
			echo "0 results";
		}
		
		mysqli_close($link);
	?>

</body>
</html>

<!---Success: A proper connection to MySQL was made! The my_db database is great.
Host information: localhost via TCP/IP--->