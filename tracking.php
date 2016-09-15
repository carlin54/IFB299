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
		
		$query = "SELECT RECIPENT_ID FROM orders";
		$result = $link->query($query);
		
		if ($result->num_rows > 0) {
		// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "recipent_id: " . $row["RECIPENT_ID"] . "<br>";
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