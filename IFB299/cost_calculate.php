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
	
	$package_m3_scalar = 0.0;
	$package_weight_scalar = 0.0;
	$package_insurance_scalar = 0.0;
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
		$package_insurance_scalar = $row['INSURANCE_SCALER'];
	}
	$cost_result->close();

	@$package_height = $_POST['heigth'];
	@$package_length = $_POST['length'];
	@$package_width = $_POST['width'];
	@$package_weight = $_POST['weight'];
	@$package_insurance = $_POST['insurance'];
	
	
	
	if(isset($_POST['calculate']))
	{
		$package_m3 = $package_height * $package_length * $package_width;
		$package_cost = $package_m3 * $package_m3_scalar + 
						$package_weight * $package_weight_scalar +
						$package_insurance * $package_insurance_scalar;
	}

?>


<body>
	<form method="post">
		<input type="text" placeholder="Enter height (cm)" name="heigth"/>
		<input type="text" placeholder="Enter length (cm)" name="length"/>
		<input type="text" placeholder="Enter width (cm)" name="width"/>
		<input type="text" placeholder="Enter weight (g)" name="weight"/>
		<input type="text" placeholder="Enter insured for ($)" name="insurance"/>
		<input type="text" value="<?php echo @$package_cost ?>"/>
		<input type="submit" value="Calculate" name="calculate"/>
	</form>
</body>

