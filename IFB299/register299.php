<?php


		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "ifb299";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}




     ?>

<title>Signup</title>


	<?php

		$validUser = 1;
		if(
		isset($_POST['CUSTOMER_FIRST_NAME']) && 
		isset($_POST['CUSTOMER_LAST_NAME']) && 
		isset($_POST['CUSTOMER_USERNAME']) && 
		isset($_POST['CUSTOMER_PASSWORD']) && 
		isset($_POST['CUSTOMER_PASSWORD1']) && 
		isset($_POST['CUSTOMER_MOBILE']) && 
		isset($_POST['CUSTOMER_HOMEPHONE'])
		){
			$CUSTOMER_FIRST_NAME = $_POST['CUSTOMER_FIRST_NAME'];
			$CUSTOMER_LAST_NAME = $_POST['CUSTOMER_LAST_NAME'];
			$CUSTOMER_USERNAME = $_POST['CUSTOMER_USERNAME'];
			$CUSTOMER_PASSWORD = $_POST['CUSTOMER_PASSWORD'];
			$CUSTOMER_PASSWORD1 = $_POST['CUSTOMER_PASSWORD1'];
			$CUSTOMER_MOBILE = $_POST['CUSTOMER_MOBILE'];
			$CUSTOMER_HOMEPHONE = $_POST['CUSTOMER_HOMEPHONE'];
			
			if ($CUSTOMER_PASSWORD != $CUSTOMER_PASSWORD1) {
				echo '<p class="unsuccessful">Passwords did not match please try again!</p>';
				$validUser = 0;
			}

			$sql = "SELECT * FROM customers WHERE CUSTOMER_USERNAME ='$CUSTOMER_USERNAME'";
			$result = mysqli_query($conn, $sql);

			if(mysqli_num_rows($result) > 0)
			{
				echo '<p class="unsuccessful">CUSTOMER USERNAME already taken. Please try again.</p>';
				$validUser = 0;
			}
			else
			{
				$validUser = 1;
				$sql = "INSERT INTO customers(CUSTOMER_FIRST_NAME, CUSTOMER_LAST_NAME, CUSTOMER_USERNAME, CUSTOMER_PASSWORD, CUSTOMER_MOBILE, CUSTOMER_HOMEPHONE) VALUES ('$CUSTOMER_FIRST_NAME','$CUSTOMER_LAST_NAME', '$CUSTOMER_USERNAME', '$CUSTOMER_PASSWORD', '$CUSTOMER_MOBILE', '$CUSTOMER_HOMEPHONE')";

				$result = mysqli_query($conn, $sql);
			}
		}

		mysqli_close($conn);

     ?>

<!DOCTYPE html>
<html>
<head>
    <title>On the Spot - Your Package Delivery Needs!</title>
    <link rel="stylesheet" type="text/css" href="css/register.css"></link>
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
<body>
    <div class="container">
      <img src="img/register.png">
      <h1>New Customer Signup</h1>

	<form action="register299.php" method="POST" autocomplete="off">
		<!--<table>
		<tr>
		<td>First Name:</td><td><input type="text" name="CUSTOMER_FIRST_NAME" <?php if ($validUser == 0){ echo 'value="'.$CUSTOMER_FIRST_NAME.'"'; }?> required/></td>
		</tr>
		<tr>
		<td>Last Name:</td><td><input type="text" name="CUSTOMER_LAST_NAME" <?php if ($validUser == 0){ echo 'value="'.$CUSTOMER_LAST_NAME.'"'; }?> required/></td>
		</tr>
		<tr>
		<td>User Name:</td><td><input type="text" name="CUSTOMER_USERNAME" <?php if ($validUser == 0){ echo 'value="'.$CUSTOMER_USERNAME.'"'; }?> required/></td>
		</tr>

		<tr>
		<td>Password:</td><td><input type="password" name="CUSTOMER_PASSWORD" required /></td>
		</tr>
		<tr>
		<td>Repeat Password:</td><td><input type="password" name="CUSTOMER_PASSWORD1" required /></td>
		</tr>
		<tr>
		<td>Phone Number:</td><td><input type="text" name="CUSTOMER_MOBILE" <?php if ($validUser == 0){ echo 'value="'.$CUSTOMER_MOBILE.'"'; }?> required/></td>
		</tr>
		<tr>
		<td>Phone Number:</td><td><input type="text" name="CUSTOMER_HOMEPHONE" <?php if ($validUser == 0){ echo 'value="'.$CUSTOMER_HOMEPHONE.'"'; }?> required/></td>
		</tr>
		<tr>
		 <td></td><td><input type="submit" value="Submit" name="Submit" class="btn-register" /></td>
	</tr>
</table>-->

	<table>
		<tr>
			<td><input type="text" name="CUSTOMER_FIRST_NAME" placeholder="Enter First Name*"<?php if ($validUser == 0){ echo 'value="'.$CUSTOMER_FIRST_NAME.'"'; }?> required/></td>
		</tr>
		<tr>
			<td><input type="text" name="CUSTOMER_LAST_NAME" placeholder="Enter Last Name*"<?php if ($validUser == 0){ echo 'value="'.$CUSTOMER_LAST_NAME.'"'; }?> required/></td>
		</tr>
		<tr>
			<td><input type="text" name="CUSTOMER_USERNAME" placeholder="Enter User Name*"<?php if ($validUser == 0){ echo 'value="'.$CUSTOMER_USERNAME.'"'; }?> required/></td>
		</tr>
		<tr>
			<td><input type="password" name="CUSTOMER_PASSWORD" required /placeholder="Create Password*"> </td>
		</tr>
		<tr>
			<td><input type="password" name="CUSTOMER_PASSWORD1" required /placeholder="Enter Password Again*"></td>
		</tr>
		<tr>
			<td><input type="text" name="CUSTOMER_MOBILE" placeholder="Enter Mobile phone*"<?php if ($validUser == 0){ echo 'value="'.$CUSTOMER_MOBILE.'"'; }?> required/></td>
		</tr>
		<tr>
			<td><input type="text" name="CUSTOMER_HOMEPHONE" placeholder="Enter Mobile phone*"<?php if ($validUser == 0){ echo 'value="'.$CUSTOMER_HOMEPHONE.'"'; }?> required/></td>
		</tr>
		<tr>
			<td><input type="submit" name="Submit" value="Submit" class="btn-register"></td>
		</tr>

	</table>





	</form>
	<div>
		<p>*Please complete this form to signup for a new account. All fields must be	completed.</p>
		Already have an account? <a href = "login.php" tite = "login">Login now!
	</div>
</body>
</html>