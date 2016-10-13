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


	<h1>New Customer Signup</h1>
	<p>Please complete this form to signup for a new account. All fields must be 
	completed.</p>
	<?php
			$validUser = 1;
		if(isset($_POST['CUSTOMER_ID']) && isset($_POST['CUSTOMER_FIRST_NAME']) && isset($_POST['CUSTOMER_LAST_NAME']) && isset($_POST['CUSTOMER_USERNAME']) && isset($_POST['CUSTOMER_PASSWORD']) && isset($_POST['CUSTOMER_PASSWORD1']) && isset($_POST['CUSTOMER_MOBILE']))
		{
			$CUSTOMER_ID = $_POST['CUSTOMER_ID'];
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
				echo '<p class="unsuccessful">CUSTOMER_ID already taken. Please try again.</p>';
				$validUser = 0;
			}
			else
			{
				$validUser = 1;
				// $CUSTOMER_PASSWORD = password_hash($CUSTOMER_PASSWORD, PASSWORD_DEFAULT);
	 			
	 			//$sql = "INSERT INTO customers(CUSTOMER_ID, CUSTOMER_FIRST_NAME, CUSTOMER_LAST_NAME, CUSTOMER_USERNAME, CUSTOMER_PASSWORD, CUSTOMER_PASSWORD1, CUSTOMER_MOBILE) VALUES ('$CUSTOMER_ID', '$CUSTOMER_FIRST_NAME', '$CUSTOMER_LAST_NAME', '$CUSTOMER_USERNAME','$CUSTOMER_PASSWORD`, `$CUSTOMER_PASSWORD1`, `$CUSTOMER_MOBILE')";
	 			$sql = "INSERT INTO customers(CUSTOMER_FIRST_NAME, CUSTOMER_LAST_NAME, CUSTOMER_USERNAME, CUSTOMER_PASSWORD, CUSTOMER_MOBILE, CUSTOMER_HOMEPHONE) VALUES ('$CUSTOMER_FIRST_NAME','$CUSTOMER_LAST_NAME', '$CUSTOMER_USERNAME', '$CUSTOMER_PASSWORD', '$CUSTOMER_MOBILE', '$CUSTOMER_HOMEPHONE')";

				$result = mysqli_query($conn, $sql);
			}
		}

		mysqli_close($conn);
		
     ?>

	<form action="signup299.php" method="POST" autocomplete="off">
		<table>
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
		
		<td></td><td><input type="submit" value="Submit" name="Submit" /></td>
	</tr>
	</table>
	</form>
	
