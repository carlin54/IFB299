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
         $sql = "SELECT * FROM customers WHERE CUSTOMER_ID ='$CUSTOMER_ID'";
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
          <h1>New Customer Signup</h1>

          <form action="signup299.php" method="POST" autocomplete="off">
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
                <td><input type="password" name="CUSTOMER_PASSWORD" required /placeholder="Create Password*"></td>
              </tr>
              <tr>
                <td><input type="password" name="CUSTOMER_PASSWORD1" required /placeholder="Enter Password Again*"></td>
              </tr>
              <tr>
                <td><input type="text" name="CUSTOMER_MOBILE" placeholder="Enter Movile phone*"<?php if ($validUser == 0){ echo 'value="'.$CUSTOMER_MOBILE.'"'; }?> required/></td>
              </tr>
              <tr>
                <td><input type="submit" name="Submit" value="Submit" class="btn-login"></td>
              </tr>

            </table>
          </form>
					<p>*Please complete this form to signup for a new account. All fields must be
						completed.</p>
						Already have an account? <a href = "login.php" tite = "login">Login now!
						</div>
</body>
</html>
