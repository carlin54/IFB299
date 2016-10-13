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
		if(isset($_POST['EMPLOYEE_FIRST_NAME']) && isset($_POST['EMPLOYEE_LAST_NAME']) && isset($_POST['EMPLOYEE_USERNAME']) && isset($_POST['EMPLOYEE_PASSWORD']) && isset($_POST['EMPLOYEE_PASSWORD1']) && isset($_POST['EMPLOYEE_MOBILE']))
		{
		
			$EMPLOYEE_FIRST_NAME = $_POST['EMPLOYEE_FIRST_NAME'];
			$EMPLOYEE_LAST_NAME = $_POST['EMPLOYEE_LAST_NAME'];
			$EMPLOYEE_USERNAME = $_POST['EMPLOYEE_USERNAME'];
			$EMPLOYEE_PASSWORD = $_POST['EMPLOYEE_PASSWORD'];
			$EMPLOYEE_PASSWORD1 = $_POST['EMPLOYEE_PASSWORD1'];
			$EMPLOYEE_MOBILE = $_POST['EMPLOYEE_MOBILE'];
			$EMPLOYEE_HOMEPHONE = $_POST['EMPLOYEE_HOMEPHONE'];
			
			if ($EMPLOYEE_PASSWORD != $EMPLOYEE_PASSWORD1) {
				echo '<p class="unsuccessful">Passwords did not match please try again!</p>';
				$validUser = 0;
			}
			
			$sql = "SELECT * FROM Employees WHERE EMPLOYEE_USERNAME ='$EMPLOYEE_USERNAME'";
			$result = mysqli_query($conn, $sql);

			if(mysqli_num_rows($result) > 0)
			{
				echo '<p class="unsuccessful">EMPLOYEE_ID already taken. Please try again.</p>';
				$validUser = 0;
			}
			else
			{
				$validUser = 1;
				// $EMPLOYEE_PASSWORD = password_hash($EMPLOYEE_PASSWORD, PASSWORD_DEFAULT);
	 			
	 			//$sql = "INSERT INTO Employees(EMPLOYEE_ID, EMPLOYEE_FIRST_NAME, EMPLOYEE_LAST_NAME, EMPLOYEE_USERNAME, EMPLOYEE_PASSWORD, EMPLOYEE_PASSWORD1, EMPLOYEE_MOBILE) VALUES ('$EMPLOYEE_ID', '$EMPLOYEE_FIRST_NAME', '$EMPLOYEE_LAST_NAME', '$EMPLOYEE_USERNAME','$EMPLOYEE_PASSWORD`, `$EMPLOYEE_PASSWORD1`, `$EMPLOYEE_MOBILE')";
	 			$sql = "INSERT INTO Employees(EMPLOYEE_FIRST_NAME, EMPLOYEE_LAST_NAME, EMPLOYEE_USERNAME, EMPLOYEE_PASSWORD, EMPLOYEE_MOBILE, EMPLOYEE_HOMEPHONE) VALUES ('$EMPLOYEE_FIRST_NAME','$EMPLOYEE_LAST_NAME', '$EMPLOYEE_USERNAME', '$EMPLOYEE_PASSWORD', '$EMPLOYEE_MOBILE', '$EMPLOYEE_HOMEPHONE')";

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
              <li><a href="home.html">Home</a></li>
              <li><a href="order.html">Order</a></li>
              <li><a href="tracking.html">Tracking</a></li>
              <li><a href="contact & about.html">Contact & About</a></li>
              <li><a href="help.html">Help</a></li>
              <li><a href="login.php">Login</a></li>
              <li><a href="loginstaff.php">Staff Login</a></li>
          </ul>
        </div>
    </div>
</body>
<body>
    <div class="container">
      <img src="img/register.png">
      <h1>New Employee Signup</h1>

	<form action="registerstaff299.php" method="POST" autocomplete="off">
		<table>
		<tr>
		<td>First Name:</td><td><input type="text" name="EMPLOYEE_FIRST_NAME" <?php if ($validUser == 0){ echo 'value="'.$EMPLOYEE_FIRST_NAME.'"'; }?> required/></td>
		</tr>
		<tr>		
		<td>Last Name:</td><td><input type="text" name="EMPLOYEE_LAST_NAME" <?php if ($validUser == 0){ echo 'value="'.$EMPLOYEE_LAST_NAME.'"'; }?> required/></td>
		</tr>
		<tr>		
		<td>User Name:</td><td><input type="text" name="EMPLOYEE_USERNAME" <?php if ($validUser == 0){ echo 'value="'.$EMPLOYEE_USERNAME.'"'; }?> required/></td>
		</tr>

		<tr>
		<td>Password:</td><td><input type="password" name="EMPLOYEE_PASSWORD" required /></td>
		</tr>
		<tr>
		<td>Repeat Password:</td><td><input type="password" name="EMPLOYEE_PASSWORD1" required /></td>
		</tr>
		<tr>
		<td>Phone Number:</td><td><input type="text" name="EMPLOYEE_MOBILE" <?php if ($validUser == 0){ echo 'value="'.$EMPLOYEE_MOBILE.'"'; }?> required/></td>
		</tr>
		<tr>
		<td>Phone Number:</td><td><input type="text" name="EMPLOYEE_HOMEPHONE" <?php if ($validUser == 0){ echo 'value="'.$EMPLOYEE_HOMEPHONE.'"'; }?> required/></td>
		</tr>
		<tr>		
		 <td></td><td><input type="submit" value="Submit" name="Submit" class="btn-register" /></td>
	    </tr>
	 </table>
	 </form>
		<p>*Please complete this form to signup for a new account. All fields must be	completed.</p>
						Already have an account? <a href = "login.php" tite = "login">Login now!
						</div>

	  </table>
	  </form>
</body>
<html>

	
