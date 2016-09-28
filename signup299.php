	<?php
	          
                		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "ifb299";
		
		$dbhandle = mysql_connect($servername, $username, $password) or die("Could not connect to database");
        $selecttable = mysql_select_db($dbname, $dbhandle);
		
		//$link = mysqli_connect($servername, $username, $password, $dbname);
		//if (!$link) {
		//			echo "<p>Error: Unable to connect to MySQL." . PHP_EOL . "</p>";
		//			echo "<p>Debugging errno: " . mysqli_connect_errno() . PHP_EOL . "</p>";
		//			echo "<p>Debugging error: " . mysqli_connect_error() . PHP_EOL . "</p>";
		//			exit;
		//		}

       //$dbhandle = mysql_connect($hostname, $username, $password) or die("Could not connect to database");
       //$selecttable = mysql_select_db($database, $dbhandle);
		
		
		
		
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
		
			$query = mysql_query("SELECT * FROM `customers` WHERE CUSTOMER_ID='$CUSTOMER_ID'");
			
			if(mysql_num_rows($query) > 0)
			{
				echo '<p class="unsuccessful">CUSTOMER_ID already taken. Please try again.</p>';
				$validUser = 0;
			}
			else if ($CUSTOMER_PASSWORD != $CUSTOMER_PASSWORD1) {
				echo '<p class="unsuccessful">Passwords did not match please try again!</p>';
				$validUser = 0;
			}
			else
			{
				$validUser = 1;
				$PASSWORD = password_hash($CUSTOMER_PASSWORD, PASSWORD_DEFAULT);
				mysql_query("INSERT INTO `customers`(`CUSTOMER_ID`, `CUSTOMER_FIRST_NAME`, `CUSTOMER_LAST_NAME`, `CUSTOMER_USERNAME`, `CUSTOMER_PASSWORD`, `CUSTOMER_PASSWORD1`, `CUSTOMER_MOBILE`) VALUES ('$CUSTOMER_ID', '$CUSTOMER_FIRST_NAME', '$CUSTOMER_LAST_NAME', '$CUSTOMER_USERNAME','$CUSTOMER_PASSWORD`, `$CUSTOMER_PASSWORD1`, `$CUSTOMER_MOBILE')"); 
				
					           								
			}
		}
		mysql_close();
		
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
		<td>ID:</td><td><input type="text" name="CUSTOMER_ID" <?php if ($validUser == 0){ echo 'value="'.$CUSTOMER_LAST_NAME.'"'; }?> required/></td>
		</tr>
		<tr>
		<td>Password:</td><td><input type="password" name="CUSTOMER_PASSWORD" required /></td>
		</tr>
		<tr>
		<td>Repeat Password:</td><td><input type="password" name="CUSTOMER_PASSWORD1" required /></td>
		</tr>
		<tr>
		<td>Phone Number:</td><td><input type="text" name="phone" <?php if ($validUser == 0){ echo 'value="'.$CUSTOMER_MOBILE.'"'; }?> required/></td>
		</tr>
		<tr>
		
		<td></td><td><input type="submit" value="Submit" name="Submit" /></td>
	</tr>
	</table>
	</form>
	