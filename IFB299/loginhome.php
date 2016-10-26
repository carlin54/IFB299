<?php
    session_start();
	if(isset($_POST['CUSTOMER_USERNAME'])){
		 header("location: http://localhost/IFB299/register299.php");
	}
?>


<!DOCTYPE html>
<html>
<head>
    <!---<h1>On the Spot - Your Package Delivery Needs!</h1>--->
    <link rel="stylesheet" type="text/css" href="loginhomestyle.css"></link>
    <link rel="shortcut icon" type="image/ico" href="favicon.ico" />
</head>
<body>
  <div class="header">
      <h1>On the Spot - Your Package Delivery Needs!</h1>

  </div>
  <div id="nav"><br>
      <div id="nav_wrapper"><br>
          <ul>
              <li><a href="S2home.php">Home</a></li>
              <li><a href="S2create_order.php">Order</a></li>
              <li><a href="S2tracking.html">Tracking</a></li>
              <li><a href="S2contact & about.html">Contact & About</a></li>
              <li><a href="S2help.php">Help</a></li>
              <li><a href="customerlogout.php">Customer Logout</a></li>
          </ul>
        </div>
    </div>
</body>
<h1>Welcome, <?php echo $_SESSION['CUSTOMER_USERNAME']; ?></h1>
<h2>Your Package Information</h2>
<body>
  <div class="container">
    <h1>
      Package One......<br>
      Package Two......<br>
      Package Three......<br>
      Package Four......<br>
    </h1>
  </div>
</body>



</html>
