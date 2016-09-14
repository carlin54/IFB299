<!DOCTYPE html>

<html>
<body>

	<?php
		$link = mysqli_connect("localhost", "root", "", "ifb299");

		if (!$link) {
			echo "<p>Error: Unable to connect to MySQL." . PHP_EOL . "</p>";
			echo "<p>Debugging errno: " . mysqli_connect_errno() . PHP_EOL . "</p>";
			echo "<p>Debugging error: " . mysqli_connect_error() . PHP_EOL . "</p>";
			exit;
		}

		echo "<p>Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL . "</p>";
		echo "<p>Host information: " . mysqli_get_host_info($link) . PHP_EOL . "</p>";

		mysqli_close($link);
	?>

</body>
</html>

<!---Success: A proper connection to MySQL was made! The my_db database is great.
Host information: localhost via TCP/IP--->