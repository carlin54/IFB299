<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="On the Spot Landing Page">
	<title>On the Spot - Your Package Delivery Needs!</title>
	
	<link rel="stylesheet" href="bill.css">
</head>

<body>
<ul class="navi">
	<li class="navi"><a href="home.html">Home</a></li>
	<li class="navi"><a class="active" href="order.html">Order</a></li>
	<li class="navi"><a href="tracking.html">Tracking</a></li>
	<li class="navi"><a href="contact & locations.html">Contact & Locations</a></li>
	<li class="navi"><a href="about.html">About</a></li>
</ul>

<p>

<?php
	$link = mysqli_connect("localhost", "root", "ifb299", "onthespot");
	
	if ($link === false) {
		die("Error: Could not connect to database " . mysqli_connect_error());
	} else {
		echo "Connection successful";
	}
    
	mysqli_close($link);
?>

</p>

</body>
</html>