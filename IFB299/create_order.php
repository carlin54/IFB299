<!DOCTYPE html>
<!-- Apply hooks to the on change text boxes for the fields--->

<head>
    <title>On the Spot - Your Package Delivery Needs!</title>
    <link rel="stylesheet" type="text/css" href="css/login.css"></link>
    	<link rel="shortcut icon" type="image/ico" href="favicon.ico" />
</head>
<body>
  <div id="nav"><br>
      <div id="nav_wrapper"><br>
          <ul>
              <li><a href="home.php">Home</a></li>
              <li><a href="create_order.php">Order</a></li>
              <li><a href="tracking.html">Tracking</a></li>
              <li><a href="contact & about.html">Contact & About</a></li>
              <li><a href="help.php">Help</a></li>
              <li><a href="login.php">Login</a></li>
              <li><a href="loginstaff.php">Staff Login</a></li>
          </ul>
        </div>
    </div>
</body>

<?php
	session_start();
	if (!isset($_SESSION['CUSTOMER_USERNAME'])){
		header('Location: http://localhost/IFB299/login.php') ;
	}

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

?>
<div class="boxhome3">
<div id="order">
	<form action="review_order.php" onsubmit="return validate();">

		<fieldset>
		<legend><h1>Order Form</h1></legend>
		<br>
		<p class="orderhead"><h2>Pickup Address</h2></p>

			<p>
				<h2>
					<h2><label for="pickup_first_line">First Line</label>
					<input type="text" name="pickup_first_line">
					<label id="error_pickup_first_line"></label>
				</h2>
			</p>

			<p>
				<h2>
					<h2><label for="pickup_second_line">Second Line</label>
					<input type="text" name="pickup_second_line">
					<label id="error_pickup_second_line"></label>
				</h2>
			</p>

			<p>
				<h2><label for="pickup_postcode">Postcode</label> <!--- This should be a dropdown -->
				<?php
					$fetch_postcodes = "SELECT * FROM `deliverable postcodes`";
					$postcode_results = $link->query($fetch_postcodes);

					echo "<select name='pickup_postcode'>";
					while ($row = $postcode_results->fetch_array(MYSQLI_ASSOC)) {
						echo "<option value='" . $row['POSTCODE'] . "'>" . $row['POSTCODE'] . "</option>";
					}
					echo "</select>";
				?>
				<label id="error_pickup_postcode"></label>
			</p>

			<p>
			<p>
				<h2><label for="pickup_suburb">Suburb</label>  <!--- This should be a dropdown -->
				<input type="text" name="pickup_suburb">
				<label id="error_pickup_suburb"></label>
			</p>

			<p>
				<h2><label for="pickup_state">State</label>  <!--- This should be a dropdown -->
				<input type="text" name="pickup_state">
				<label id="error_pickup_state"></label>
			</p>

			<p>
				<h2><label for="pickup_country">Country</label>  <!--- This should be a dropdown -->
				<input type="text" name="pickup_country">
				<label id="error_pickup_country"></label>
			</p>

		<br>

			<p class="orderhead"><h2>Recipent Details</h2></p>
			<p>
				<h2><label for="recipent_first_name">First Name</label>
				<input type="text" name="recipent_first_name">
				<label id="error_recipent_first_name"></label>
			</p>
			<p>
				<h2><label for="recipent_last_name">Last Name</label>
				<input type="text" name="recipent_last_name">
				<label id="error_recipent_last_name"></label>
			</p>

		<br>

		<p class="orderhead"><h2>Drop-off Location</h2></p>

			<p>
				<h2><label for="dropoff_first_line">First Line</label>
				<input type="text" name="dropoff_first_line">
				<label id="error_dropoff_first_line"></label>
			</p>

			<p>
				<h2><label for="dropoff_second_line">Second Line</label>
				<input type="text" name="dropoff_second_line">
				<label id="error_dropoff_second_line"></label>
			</p>

			<p>
				<h2><label for="dropoff_postcode">Postcode</label>

				<?php
					$fetch_postcodes = "SELECT * FROM `deliverable postcodes`";
					$postcode_results = $link->query($fetch_postcodes);

					echo "<select name='dropoff_postcode'>";
					while ($row = $postcode_results->fetch_array(MYSQLI_ASSOC)) {
						echo "<option value='" . $row['POSTCODE'] . "'>" . $row['POSTCODE'] . "</option>";
					}
					echo "</select>";
				?>

				<label id="error_dropoff_postcode"></label>
			</p>

			<p>
				<h2><label for="dropoff_suburb">Suburb</label>  <!--- This should be a dropdown -->
				<input type="text" name="dropoff_suburb">
				<label id="error_dropoff_suburb"></label>
			</p>

			<p>
				<h2><label for="dropoff_state">State</label>  <!--- This should be a dropdown -->
				<input type="text" name="dropoff_state">
				<label id="error_dropoff_state"></label>
			</p>

			<p>
				<h2><label for="dropoff_country">Country</label>  <!--- This should be a dropdown -->
				<input type="text" name="dropoff_country">
				<label id="error_dropoff_country"></label>
			</p>

		<br>
		<p class="orderhead"><h2>Package Details</h2></p>
			<p>
				<h2><label for="package_description">Description</label>
				<input type="text" name="package_description">
				<label id="error_package_description"></label>
			</p>
			<p>
				<h2><label for="package_length">Length (cm)</label>
				<input type="text" name="package_length">
				<label id="error_package_length"></label>
			</p>
			<p>
				<h2><label for="package_width">Width (cm)</label>
				<input type="text" name="package_width">
				<label id="error_package_width"></label>
			</p>
			<p>
				<h2><label for="package_height">Height (cm)</label>
				<input type="text" name="package_height">
				<label id="error_package_height"></label>
			</p>
			<p>
				<h2><label for="package_weight">Weight (g)</label>
				<input type="text" name="package_weight">
				<label id="error_package_weight"></label>
			</p>
			<p>
				<h2><label for="package_insurance">Insurance ($)</label>
				<input type="text" name="package_insurance">
				<label id="error_package_insurance"></label>
			</p>
		<p>
			<tr>
				<input type="submit" value="Submit Order"  class="btn-create">
			</tr>
		</p>
		</fieldset>
	</form>

</div>
</div>
</body>
</html>


<script type="text/javascript">

function isNumeric(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}

// address
function validate_first_line(str, lbl){
	lbl.innerHTML = '';
	if(str.length == 0){
		lbl.innerHTML = '\tPlease fill the field!';
		return false;
	}
	if(str.length < 5){
		lbl.innerHTML = '\tToo few characters entered (min : 5)!';
		return false;
	}
	if(str.length > 48){
		lbl.innerHTML = '\tToo many characters entered (max : 48)!';
		return false;
	}
	//regex
	return true;
}
function validate_second_line(str, lbl){
	lbl.innerHTML = '';
	if(str.length != 0 && str.length < 5){
		lbl.innerHTML = '\tToo few characters entered (min : 5)!';
		return false;
	}
	if(str.length != 0 && str.length > 48){
		lbl.innerHTML = '\tToo many characters entered (max : 48)!';
		return false;
	}

	return true;
}
function validate_postcode(str, lbl){
	lbl.innerHTML = '';
	if(str.length == 0){
		lbl.innerHTML = '\tPlease fill the field!';
		return false;
	}
	if(str.length > 4){
		lbl.innerHTML = '\tThere are too many digits (require : 4)!';
		return false;
	}
	if(str.length < 4){
		lbl.innerHTML = '\tThere are too few digits (require : 4)!';
		return false;
	}
	if(!isNumeric(str)){
		lbl.innerHTML = '\tThis is not a number!';
		return false;
	}
	return true;
}
function validate_suburb(str, lbl){
	lbl.innerHTML = '';
	if(str.length == 0){
		lbl.innerHTML = '\tPlease fill the field!';
		return false;
	}
	if(str.length < 3){
		lbl.innerHTML = '\tToo few charcters (min : 3)!';
		return false;
	}
	if(str.length > 32){
		lbl.innerHTML = '\tToo many charcters (max : 32)!';
		return false;
	}
	return true;
}
function validate_state(str, lbl){
	lbl.innerHTML = '';
	if(str.length == 0){
		lbl.innerHTML = '\tPlease fill the field!';
		return false;
	}
	if(str.length > 3){
		lbl.innerHTML = '\tToo many charcters (require : 3)!';
		return false;
	}
	if(str.length < 3){
		lbl.innerHTML = '\tToo many charcters (require : 3)!';
		return false;
	}
	return true;
}
function validate_country(str, lbl){
	lbl.innerHTML = '';
	if(str.length == 0){
		lbl.innerHTML = '\tPlease fill the field!';
		return false;
	}
	if(str.length > 24){
		lbl.innerHTML = '\tToo many charcters (max : 24)!';
		return false;
	}
	return true;
}

// name
function validate_first_name(str, lbl){
	lbl.innerHTML = '';
	if(str.length == 0){
		lbl.innerHTML = '\tPlease fill the field!';
		return false;
	}
	if(str.length < 2){
		lbl.innerHTML = '\tToo few characters (min : 2)!';
		return false;
	}
	if(str.length > 16){
		lbl.innerHTML = '\tToo many characters (max : 16)!';
		return false;
	}

	return true;
}
function validate_last_line(str, lbl){
	lbl.innerHTML = '';
	if(str.length == 0){
		lbl.innerHTML = '\tPlease fill the field!';
		return false;
	}
	if(str.length < 2){
		lbl.innerHTML = '\tToo few characters (min : 2)!';
		return false;
	}
	if(str.length > 32){
		lbl.innerHTML = '\tToo many characters (max : 32)!';
		return false;
	}
	return true;
}

// package
function validate_description(str, lbl){
	lbl.innerHTML = '';
	if(str.length > 64){
		lbl.innerHTML = '\tToo many characters (max : 64)!';
		return false;
	}
	return true;
}
function validate_length(str, lbl){
	lbl.innerHTML = '';
	if(str.length == 0){
		lbl.innerHTML = '\tPlease fill the field!';
		return false;
	}
	if(!isNumeric(str)){
		lbl.innerHTML = '\tThis is not a number!';
		return false;
	}
	if(parseInt(str) < 1){
		lbl.innerHTML = 'This is not long enough (min : 1cm)!';
		return false;
	}
	if(parseInt(str) > 300){
		lbl.innerHTML = 'This is too long (max : 300cm)!';
		return false;
	}
	return true;
}
function validate_width(str, lbl){
	lbl.innerHTML = '';
	if(str.length == 0){
		lbl.innerHTML = '\tPlease fill the field!';
		return false;
	}
	if(!isNumeric(str)){
		lbl.innerHTML = '\tThis is not a number!';
		return false;
	}
	if(parseInt(str) < 1){
		lbl.innerHTML = '\tThis is not wide enough (min : 1cm)!';
		return false;
	}
	if(parseInt(str) > 250){
		lbl.innerHTML = '\tThis is too wide (max : 250cm)!';
		return false;
	}
	return true;
}
function validate_height(str, lbl){
	lbl.innerHTML = '';
	if(str.length == 0){
		lbl.innerHTML = '\tPlease fill the field!';
		return false;
	}
	if(!isNumeric(str)){
		lbl.innerHTML = '\tThis is not a number!';
		return false;
	}
	if(parseInt(str) < 1){
		lbl.innerHTML = 'This is too short (min : 1cm)!';
		return false;
	}
	if(parseInt(str) > 150){
		lbl.innerHTML = 'This is too tall (max : 150cm)!';
		return false;
	}
	return true;
}
function validate_weight(str, lbl){
	lbl.innerHTML = '';
	if(str.length == 0){
		lbl.innerHTML = '\tPlease fill the field!';
		return false;
	}
	if(!isNumeric(str)){
		lbl.innerHTML = '\tThis is not a number!';
		return false;
	}
	if(parseInt(str) < 50){
		lbl.innerHTML = 'This is short light (min : 100g)!';
		return false;
	}
	if(parseInt(str) > 150000){
		lbl.innerHTML = 'This is too heavy (max : 150000g)!';
		return false;
	}
	return true;
}
function validate_insurance(str, lbl){
	lbl.innerHTML = '';
	if(!isNumeric(str)){
		lbl.innerHTML = '\tPlease fill the field!';
	}
	if(parseInt(str) > 250){
		lbl.innerHTML = 'This is too much (max : $250)!';
		return false;
	}
	return true;
}
function validate() {
	//there must be a better way to do this
	//this is so fucking bad
	//I fucking hate this

	var str_pickup_first_line = document.getElementsByName('pickup_first_line')[0].value;
	var lbl_pickup_first_line = document.getElementById('error_pickup_first_line');
	var str_pickup_second_line = document.getElementsByName('pickup_second_line')[0].value;
	var lbl_pickup_second_line = document.getElementById('error_pickup_second_line');
	var str_pickup_postcode = document.getElementsByName('pickup_postcode')[0].value;
	var lbl_pickup_postcode = document.getElementById('error_pickup_postcode');
	var str_pickup_suburb = document.getElementsByName('pickup_suburb')[0].value;
	var lbl_pickup_suburb = document.getElementById('error_pickup_suburb');
	var str_pickup_state = document.getElementsByName('pickup_state')[0].value;
	var lbl_pickup_state = document.getElementById('error_pickup_state');
	var str_pickup_country = document.getElementsByName('pickup_country')[0].value;
	var lbl_pickup_country = document.getElementById('error_pickup_country');

	var str_first_name = document.getElementsByName('recipent_first_name')[0].value;
	var lbl_first_name = document.getElementById('error_recipent_first_name');
	var str_last_name = document.getElementsByName('recipent_last_name')[0].value;
	var lbl_last_name = document.getElementById('error_recipent_last_name');

	var str_dropoff_first_line = document.getElementsByName('pickup_first_line')[0].value;
	var lbl_dropoff_first_line = document.getElementById('error_dropoff_first_line');
	var str_dropoff_second_line = document.getElementsByName('dropoff_second_line')[0].value;
	var lbl_dropoff_second_line = document.getElementById('error_dropoff_second_line');
	var str_dropoff_postcode = document.getElementsByName('dropoff_postcode')[0].value;
	var lbl_dropoff_postcode = document.getElementById('error_dropoff_postcode');
	var str_dropoff_suburb = document.getElementsByName('dropoff_suburb')[0].value;
	var lbl_dropoff_suburb = document.getElementById('error_dropoff_suburb');
	var str_dropoff_state = document.getElementsByName('dropoff_state')[0].value;
	var lbl_dropoff_state = document.getElementById('error_dropoff_state');
	var str_dropoff_country = document.getElementsByName('dropoff_country')[0].value;
	var lbl_dropoff_country = document.getElementById('error_dropoff_country');

	var str_description = document.getElementsByName('package_description')[0].value;
	var lbl_description = document.getElementById('error_package_description');
	var str_length = document.getElementsByName('package_length')[0].value;
	var lbl_length = document.getElementById('error_package_length');
	var str_width = document.getElementsByName('package_width')[0].value;
	var lbl_width = document.getElementById('error_package_width');
	var str_height = document.getElementsByName('package_height')[0].value;
	var lbl_height = document.getElementById('error_package_height');
	var str_weight = document.getElementsByName('package_weight')[0].value;
	var lbl_weight = document.getElementById('error_package_weight');
	var str_insurance = document.getElementsByName('package_insurance')[0].value;
	var lbl_insurance = document.getElementById('error_package_insurance');




	// pickup
	return	validate_first_line		(str_pickup_first_line, 	lbl_pickup_first_line)
	&& 		validate_second_line	(str_pickup_second_line, 	lbl_pickup_second_line)
	&& 		validate_postcode		(str_pickup_postcode, 		lbl_pickup_postcode)
	&& 		validate_suburb			(str_pickup_suburb, 		lbl_pickup_suburb)
	&& 		validate_state			(str_pickup_state, 			lbl_pickup_state)
	&& 		validate_country		(str_pickup_country, 		lbl_pickup_country)

	// name
	&& 		validate_first_name		(str_first_name, 			lbl_first_name)
	&& 		validate_last_line		(str_last_name, 			lbl_last_name)

	// dropoff
	&& 		validate_first_line		(str_dropoff_first_line, 	lbl_dropoff_first_line)
	&& 		validate_second_line	(str_dropoff_second_line, 	lbl_dropoff_second_line)
	&& 		validate_postcode		(str_dropoff_postcode, 		lbl_dropoff_postcode)
	&& 		validate_suburb			(str_dropoff_suburb, 		lbl_dropoff_suburb)
	&& 		validate_state			(str_dropoff_state, 		lbl_dropoff_state)
	&& 		validate_country		(str_dropoff_country, 		lbl_dropoff_country)

	// package
	&& 		validate_description	(str_description, 			lbl_description)
	&&		validate_length			(str_length, 				lbl_length)
	&&		validate_width			(str_width, 				lbl_width)
	&& 		validate_height			(str_height, 				lbl_height)
	&& 		validate_weight			(str_weight, 				lbl_weight)
	&& 		validate_insurance		(str_insurance, 			lbl_insurance);


}

</script>

<?php
	$link->close();
?>
