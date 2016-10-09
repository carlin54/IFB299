<?php
    session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <!---<h1>On the Spot - Your Package Delivery Needs!</h1>--->
    <link rel="stylesheet" type="text/css" href="loginhomestyle.css"></link>
</head>
<body>
  <div class="header">
    <h1>On the Spot - Your Package Delivery Needs!</h1>
  </div>
  <div id="nav"><br>
    <div id="nav_wrapper"><br>
      <ul>
        <li><a href="home.html">Home</a></li>
        <li><a href="order.html">Order</a></li>
        <li><a href="tracking.html">Tracking</a></li>
        <li><a href="contact & locations.html">Contact & Locations</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="help.html">Help</a></li>
        <li><a href="stafflogout.php">Staff Lougout</a></li>
      </ul>
    </div>
  </div>
</body>

<h1>Welcome, <?php echo $_SESSION['EMPLOYEE_USERNAME']; ?></h1>
<h2>Your Task Information</h2>
<body>
  <div class="container">
    <h1>
      Task One......<br>
      Task Two......<br>
      Task Three......<br>
      Task Four......<br>
    </h1>
  </div>
</body>
</html>
