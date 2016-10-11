<?php
    session_start();

    //connect to database
    $db = mysqli_connect("localhost","root","","IFB299");

    if (isset($_POST['stafflogin_btn'])) {

      $EMPLOYEE_USERNAME = mysql_real_escape_string($_POST['EMPLOYEE_USERNAME']);
      $EMPLOYEE_PASSWORD = mysql_real_escape_string($_POST['EMPLOYEE_PASSWORD']);

      $EMPLOYEE_PASSWORD = $EMPLOYEE_PASSWORD;
      $sql = "SELECT * FROM employees  WHERE EMPLOYEE_USERNAME = '$EMPLOYEE_USERNAME' AND EMPLOYEE_PASSWORD = '$EMPLOYEE_PASSWORD'";
      $result = mysqli_query($db,$sql);

      if (mysqli_num_rows($result) == 1 ) {
        $_SESSION['message'] = "You are now logged in";
        $_SESSION['EMPLOYEE_USERNAME'] = $EMPLOYEE_USERNAME;
        header("location: loginstaffhome.php");
      }else {
        $_SESSION['message'] = "EMPLOYEE_USERNAME/EMPLOYEE_PASSWORD combination incorrect";
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
      <img src="img/loginstaff.jpg">
          <h1>Welcome Staff</h1>
             <form action="loginstaff.php" method="post">


               <table>
                    <tr>

                      <td><input type="text" name="EMPLOYEE_USERNAME" placeholder="Enter Username" class="textInput"></td>
                    </tr>
                    <tr>

                      <td><input type="password" name="EMPLOYEE_PASSWORD" placeholder="Enter Password" class="textInput"></td>
                    </tr>
                    <tr>

                      <td><input type="submit" name="stafflogin_btn" value="LOGIN" class="btn-login"></td>
                    </tr>
                </table>


             </form>
    </div>
</body>
</html>
