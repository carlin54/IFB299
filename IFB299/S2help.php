<!DOCTYPE html>

<?php 

function value_status($post_value, $regex){
	if(isset($_POST[$post_value]) && $_POST[$post_value] != ""){	
		if(preg_match('/' . $regex . '/', $_POST[$post_value])){
			return 0;
		}else{
			return 1;
		}
	}else{
		return 2;
	}
}

function write_value($post_value, $set){
	if($set == 0){
		echo $set;
	}else if($set == 1){
		echo "Incorrect Format!";
	}else if($set == 2){
		echo "";
	}
}

$first_name_set	 	= value_status('first_name', '[A-Za-z]{3,16}');
$last_name_set 		= value_status('last_name', '[A-Za-z]{3,16}');
$email_set 			= value_status('email', '[A-Za-z-\@]{3,16}');
$phone_set 			= value_status('phone', '[0-9A-Za-z]{8}');
$address_set 		= value_status('address', '[A-Za-z-\s]{3,16}');
$city_set 			= value_status('city', '[A-Za-z]{3,64}');
$state_set 			= value_status('state', '[A-Z]{2,3}');
$zip_set 			= value_status('zip', '[0-9]{4}');
$hosting_set 		= value_status('hosting', '[yes|no]');
$comment_set 		= value_status('comment', '[A-Za-z0-9]{1,1024}');


$submit_help = 
	($first_name_set 	== 0 &&
	 $last_name_set 	== 0 &&
	 $email_set     	== 0 &&
	 $phone_set     	== 0 &&
	 $address_set   	== 0 &&
	 $city_set      	== 0 &&
	 $state_set      	== 0 &&
	 $zip_set       	== 0 &&
	 $hosting_set 		== 0 &&
	 $comment_set 		== 0);

echo "first_name " 	. $first_name_set	. "<br>";
echo "last_name " 	. $last_name_set 	. "<br>";
echo "email " 		. $email_set 		. "<br>";
echo "phone " 		. $phone_set 		. "<br>";
echo "address " 	. $address_set 		. "<br>";
echo "city " 		. $city_set 		. "<br>";
echo "state " 		. $state_set 		. "<br>";
echo "zip " 		. $zip_set 			. "<br>";
echo "hosting " 	. $hosting_set		. "<br>";
echo "comment " 	. $comment_set 		. "<br>";
echo "submit help " . $submit_help 		. "<br>"; 
	 
if($submit_help){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ifb299";

	$link = mysqli_connect($servername, $username, $password, $dbname);

	if (!$link) {
		echo "<p>Error: Unable to connect to MySQL." . PHP_EOL . "</p>";
		echo "<p>Debugging errno: " . mysqli_connect_errno() . PHP_EOL . "</p>";
		echo "<p>Debugging error: " . mysqli_connect_error() . PHP_EOL . "</p>";
		exit;
	} 
	
	$is_recipent = ($_POST['hosting'] == "yes");
	
	$insert_help = "
	INSERT INTO `help` 
	( 	FIRST_NAME,
		LAST_NAME,
		EMAIL,
		PHONE_NUMBER,
		ADDRESS_FIRST_LINE,
		ADDRESS_POSTCODE,
		ADDRESS_SUBURB,
		ADDRESS_STATE,
		ADDRESS_COUNTRY,
		IS_RECIPIENT
	)
	VALUES (
		'" . $_POST['first_name'] 	. "',
		'" . $_POST['last_name'] 	. "',
		'" . $_POST['email']		. "',
		'" . $_POST['phone']		. "',
		'" . $_POST['address']		. "',
		'" . $_POST['city']			. "',
		'" . $_POST['state']		. "',
		'" . $_POST['zip']			. "',
		'" . $is_recipent			. "',
		'" . $_POST['comment']		. "'
	)";
	
	
	
	if (!$link->query($insert_help) === TRUE){
		echo "<p>Error: " . $insert_help . "<br>" . $link->error . "</p>";
	}else{
		
		$_POST['first_name'] = "";
		$_POST['last_name'] = "";
		$_POST['email'] = "";
		$_POST['phone'] = "";
		$_POST['address'] = "";
		$_POST['city'] = "";
		$_POST['state'] = "";
		$_POST['zip'] = "";
		$_POST['comment'] = "";
		
	}
				
}

	

?>

<html>

<head>
    <title>On the Spot - Your Package Delivery Needs!</title>
    <link rel="stylesheet" type="text/css" href="css/login.css"></link>
    <link rel="shortcut icon" type="image/ico" href="favicon.ico" />
</head>

<body>
<!--<div id="nav"><br>
      <div id="nav_wrapper"><br>

  <ul class="navi">
	 <li class="navi"><a href="home.html">Home</a></li>
	 <li class="navi"><a href="create_order.php">Order</a></li>
	 <li class="navi"><a href="tracking.html">Tracking</a></li>
	 <li class="navi"><a href="contact & about.html">Contact & About</a></li>
	 <li class="navi"><a class="active" href="help.php">Help</a></li>
	 <li class="navi"><a href="login.php">Login</a></li>
	 <li class="navi"><a href="loginstaff.php">Staff Login</a></li>
</ul>-->

  <div id="nav"><br>
      <div id="nav_wrapper"><br>
          <ul>
              <li><a href="S2home.php">Home</a></li>
              <li><a href="S2create_order.php">Order</a></li>
              <li><a href="S2tracking.html">Tracking</a></li>
              <li><a href="S2contact & about.html">Contact & About</a></li>
              <li><a href="S2help.php">Help</a></li>
              <li><a href="loginhome.php">C home</a></li>
              <li><a href="customerlogout.php">Customer Logout</a></li>
          </ul>
        </div>
    </div>
</body>

  <div class="boxhelp">

    <form class="well form-horizontal" action=" " method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend><h1>Contact Us Today!</h1></legend>

<!-- Text input-->
<form action="S2help.php" method="post">
<div class="form-group">
  <!--<label class="col-md-4 control-label">First Name</label>-->
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="first_name" placeholder="First Name*" class="form-control"  type="text">
   <label for="first_name"><?php if($first_name_set == 1) echo "Invalid!"?></label>
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <!--<label class="col-md-4 control-label" >Last Name</label>-->
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" placeholder="Last Name*" class="form-control"  type="text">
  <label for="last_name"><?php if($last_name_set == 1) echo "Invalid!"?></label>
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <!--<label class="col-md-4 control-label">E-Mail</label>-->
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
	<input name="email" placeholder="E-Mail Address*" class="form-control"  type="text" value="">
	<label for="email"><?php if($email_set == 1) echo "Invalid!"?></label>
    </div>
  </div>
</div>


<!-- Text input-->

<div class="form-group">
  <!--<label class="col-md-4 control-label">Phone #</label>-->
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>

  <input name="phone" placeholder="Phone Number*" class="form-control" type="text">
  <label for="phone"><?php if($phone_set == 1) echo "Invalid!"?></label>
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <!--<label class="col-md-4 control-label">Address</label>-->
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="address" placeholder="Address*" class="form-control" type="text">
  <label for="address"><?php if($address_set == 1) echo "Invalid!"?></label>
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <!--<label class="col-md-4 control-label">City</label>-->
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="city" placeholder="City*" class="form-control"  type="text">
  <label for="city"><?php if($city_set == 1) echo "Invalid!"?></label>
    </div>
  </div>
</div>

<!-- Select Basic -->

<div class="form-group">
  <label class="col-md-4 control-label">State</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="state" class="form-control selectpicker" >
      <option>QLD</option>
      <option>NSW</option>
      <option>VIC</option>
      <option>WA</option>
      <option>SA</option>
      <option>ACT</option>
      <option>TAS</option>
    </select>
  </div>
</div>
</div>
<br>
<!-- Text input-->

<div class="form-group">
  <!--<label class="col-md-4 control-label">Zip Code</label>-->
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="zip" placeholder="Zip Code*" class="form-control"  type="text">
  <label for="zip"><?php if($zip_set == 1) echo "Invalid!"?></label>
    </div>
</div>
</div>

<!-- radio checks -->
 <div class="form-group">
                        <label class="col-md-4 control-label">Are you recepient?</label>
                        <div class="col-md-4">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="hosting" value="yes" /> Yes
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="hosting" value="no" /> No
                                </label>
                            </div>
                        </div>
                    </div>

<!-- Text area -->

<div class="form-group">
  <label class="col-md-4 control-label">Complaint description</label>
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
        	<textarea class="form-control" name="comment" placeholder="Complaint description"></textarea>
			<label for="comment"><?php if($comment_set == 1) echo "Invalid!"?></label>
  </div>
  </div>
</div>

<!-- Success message -->
<div class="alert alert-success" role="alert" id="success_message">Success<i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" class="btn btn-warning" >Send <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div><!-- /.container -->
