<?php
    session_start();

    //connect to database
    $db = mysqli_connect("localhost","root","","authentication");

    if (isset($_POST['login_btn'])) {

      $username = mysql_real_escape_string($_POST['username']);
      $password = mysql_real_escape_string($_POST['password']);

      $password = $password;
      $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
      $result = mysqli_query($db,$sql);

      if (mysqli_num_rows($result) == 1 ) {
        $_SESSION['message'] = "You are now logged in";
        $_SESSION['username'] = $username;
        header("location: loginhome.php");
      }else {
        $_SESSION['message'] = "Username/password combination incorrect";
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
              <li><a href="Login.html">Login</a></li>
              <li><a href="help.html">Help</a></li>
          </ul>
        </div>
    </div>
</body>

<body>
    <div class="container">
      <img src="img/loginmen.jpg">
          <h1>Welcome</h1>
             <form action="login.php" method="post">


               <table>
                    <tr>

                      <td><input type="text" name="username" placeholder="Enter Username" class="textInput"></td>
                    </tr>
                    <tr>

                      <td><input type="password" name="password" placeholder="Enter Password" class="textInput"></td>
                    </tr>
                    <tr>

                      <td><input type="submit" name="login_btn" value="LOGIN" class="btn-login"></td>
                    </tr>
                </table>


             </form>
             Don't have an account? <a href = "register.html" tite = "register">Register now!
    </div>
</body>
</html>
