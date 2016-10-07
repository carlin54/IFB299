<?php
    session_start();

    //connect to database
    $db = mysqli_connect("localhost","root","","IFB299");

    if (isset($_POST['login_btn'])) {

      $CUSTOMER_USERNAME = mysql_real_escape_string($_POST['CUSTOMER_USERNAME']);
      $CUSTOMER_PASSWORD = mysql_real_escape_string($_POST['CUSTOMER_PASSWORD']);

      $CUSTOMER_PASSWORD = $CUSTOMER_PASSWORD;
      $sql = "SELECT * FROM customers  WHERE CUSTOMER_USERNAME = '$CUSTOMER_USERNAME' AND CUSTOMER_PASSWORD = '$CUSTOMER_PASSWORD'";
      $result = mysqli_query($db,$sql);

      if (mysqli_num_rows($result) == 1 ) {
        $_SESSION['message'] = "You are now logged in";
        $_SESSION['CUSTOMER_USERNAME'] = $CUSTOMER_USERNAME;
        header("location: loginhome.php");
      }else {
        $_SESSION['message'] = "CUSTOMER_USERNAME/CUSTOMER_PASSWORD combination incorrect";
      }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>On the Spot - Your Package Delivery Needs!</title>
    <link rel="stylesheet" type="text/css" href="css/login.css"></link>
</head>
<body>
  <div id="nav"><br>
      <div id="nav_wrapper"><br>
          <ul>
              <li><a href="home.html">Home</a></li>
              <li><a href="order.html">Order</a></li>
              <li><a href="tracking.html">Tracking</a></li>
              <li><a href="contact & locations.html">Contact & Locations</a></li>
              <li><a href="about.html">About</a></li>
              <li><a href="help.html">Help</a></li>
              <li><a href="login.php">Login</a></li>
              <li><a href="loginstaff.php">Staff Login</a></li>
          </ul>
        </div>
    </div>
</body>
<body>
    <div class="container">
      <img src="img/loginmen.png">
          <h1>Welcome Customer</h1>
             <form action="login.php" method="post">
               <table>
                    <tr>
                      <td><input type="text" name="CUSTOMER_USERNAME" placeholder="Enter Username" class="textInput"></td>
                    </tr>
                    <tr>
                      <td><input type="password" name="CUSTOMER_PASSWORD" placeholder="Enter Password" class="textInput"></td>
                    </tr>
                    <tr>
                      <td><input type="submit" name="login_btn" value="LOGIN" class="btn-login"></td>
                    </tr>
                </table>
             </form>
             Don't have an account? <a href = "register299.php" tite = "register">Register now!
    </div>
</body>
</html>
