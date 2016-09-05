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
	<li class="navi"><a>Tracking</a></li>
	<li class="navi"><a>Contact & Locations</a></li>
	<li class="navi"><a>About</a></li>
</ul>

<p>
<?php
	$link = mysqli_connect("localhost", "root", "ifb299", "onthespot");
	
	if ($link === false) {
		die("Error: Could not connect to database " . mysqli_connect_error());
	} else {
		echo "Connection successful";
	}
	
	
        $custName = mysqli_real_escape_string($link, $_POST[name]);
        $custNumber = mysqli_real_escape_string($link, $_POST[number]);
        $custAddress = mysqli_real_escape_string($link, $_POST[pickupaddress]);
        $custSuburb = mysqli_real_escape_string($link, $_POST[pickupsuburb]);
        $custPost = mysqli_real_escape_string($link, $_POST[pickuppostcode]);


        $sql = "INSERT INTO customers (name, number, street, suburb, postcode)
                VALUES ('$custName', '$custNumber', '$custAddress',
                '$custSuburb', '$custPost')";
        if (mysqli_query($sql, $link)) {
                echo "done";
        } else {
                echo "fail" . mysqli_error($link);
        }

        mysqli_close($link);
?>

</p>

</body>
</html>