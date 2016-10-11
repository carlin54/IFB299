<!DOCTYPE html>



<html>
<head>
	<meta charset="UTF-8">
	<meta name="On the Spot Landing Page">
	<title>On the Spot - Your Package Delivery Needs!</title>

	<link rel="stylesheet" type=text/css href="tracking.css"></link>
</head>

<body>
<ul class="navi">
	<li><a href="home.php">Home</a></li>
	<li class="navi"><a href="order.html">Order</a></li>
	<li class="navi"><a class="active" href="tracking.html">Tracking</a></li>
	<li class="navi"><a href="contact & about.html">Contact & About</a></li>
	<li class="navi"><a href="help.html">Help</a></li>
	<li class="navi"><a href="login.php">Login</a></li>
	<li class="navi"><a href="loginstaff.php">Staff Login</a></li>
</ul>
</body>

	<form action="tracking.php" onsubmit="return validate()">
		<fieldset>
			<legend>Package ID</legend>
			<input type="text" name="package_id" id="package_id" onsubmit="checkPackageID(this);">
			<label id="error_package_id"></label>
			<br>
			<br>
			<input type="submit" value="Submit">
		</fieldset>
	</form>

	  <div class="tabbed">
      <input name="tabbed" id="tabbed1" type="radio" checked>
      <section>
        <h1>
          <label for="tabbed1">Terms and conditions</label>
        </h1>
        <div>
          You are authorized to use this tracking system solely to track
	shipments tendered via Bill website by, for, or to you.
	No other use may be made of the tracking system and information without authorise written consent.
        </div>
      </section>
      <input name="tabbed" id="tabbed2" type="radio">
      <section>
        <h1>
          <label for="tabbed2">Tracking FAQS</label>
        </h1>
        <div>
         Needs any help regrading tracking or if unable to track your package please fell the
       contact us form and mention your problem in comment section
        </div>
      </section>

</html>




<script type="text/javascript">
function validate_package_id(){
	var package_id = document.getElementsByName('package_id')[0].value;

	if(package_id == ""){
		document.getElementById('error_package_id').innerHTML = '\tPlease enter the package\'s tracking number.';
		return false;
	}

	return true;
}
function validate() {
	return validate_package_id();
}
</script>
