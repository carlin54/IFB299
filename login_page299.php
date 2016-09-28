

	<?php
		if(isset($_POST['submit']))
		{
			$CUSTOMER_ID = htmlentities($_POST['CUSTOMER_ID']);
			$CUSTOMER_PASSWORD = htmlentities($_POST['CUSTOMER_PASSWORD']);
			
			$table = "logins";
			
			$con = mysqli_connect($hostname, $CUSTOMER_ID, $CUSTOMER_PASSWORD, $dbname) or die("Could not connect to database");
			$query = "SELECT * FROM $table WHERE Customers ='$CUSTOMER_ID'";
			
			$query = mysqli_query($con, $query);
			$result = mysqli_fetch_assoc($query);
			if($result == NULL)
			{
				echo "<p class='unsuccessful'>Incorrect ID or password, please try again.</p>";

			}
			else
			{
				$hash = $result['CUSTOMER_PASSWORD'];
				if(password_verify($CUSTOMER_PASSWORD, $hash))
				{
					if($result['Approved'] == 1)
					{
						$_SESSION['CUSTOMER_ID'] = $CUSTOMER_ID;
						if($result['PasswordExpired'] == 1){
							$_SESSION['logged_in'] = false;
							header("Location:expired_password.php");
						} else {
						$_SESSION['logged_in'] = true;
						header("Location:home.html");
						}
					}
					else
					{
						echo "<p class='unsuccessful'>User is not approved</p>";
					}
					
				}
				else
				{
					echo "<p class='unsuccessful'>Incorrect ID or password, please try again.</p>";
				}
			}

		}
	?>
	<title>Login</title>
	<h1>System Login</h1>
		<p>Please enter your ID and password to continue.</p>
		<form action="" method="POST" autocomplete="off">
			<table>
			<tr>
			<td>ID: </td><td><input type="text" name="ID" placeholder="CUSTOMER_ID" required></td><td rowspan="3">
				<img alt="Padlock" longdesc="Padlock" src="images/padlock.png" width="10%"></td>
			</tr>
			<tr>
			<td>Password: </td><td><input type="password" name="password" placeholder="CUSTOMER_PASSWORD" required></td>
			</tr>
			<tr>
			<td></td><td>
				<input type="submit" name="submit" value="Login" /></td>
			</tr>
		</table>
		</form>
		<p><a href="signup299.php">I don't have an account</a></p>
	
