<?php
    session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <title>On the Spot - Your Package Delivery Needs!</title>
    <link rel="stylesheet" type="text/css" href="loginhomestyle.css"></link>
</head>
<div class="header">
    <h1>On the Spot - Your Package Delivery Needs!</h1>
</div>
<div>
  <h1>
  Welcome Staff<br>
  <?php echo $_SESSION['EMPLOYEE_USERNAME']; ?>
  </h1>
</div>


</body>
</html>
