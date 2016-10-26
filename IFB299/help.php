<!DOCTYPE html>
<html>

<head>
    <title>On the Spot - Your Package Delivery Needs!</title>
    <link rel="stylesheet" type="text/css" href="css/login.css"></link>
    <link rel="shortcut icon" type="image/ico" href="favicon.ico" />
</head>

<body>
<div id="nav"><br>
      <div id="nav_wrapper"><br>

  <ul class="navi">
	 <li class="navi"><a href="home.html">Home</a></li>
	 <li class="navi"><a href="create_order.php">Order</a></li>
	 <li class="navi"><a href="tracking.html">Tracking</a></li>
	 <li class="navi"><a href="contact & about.html">Contact & About</a></li>
	 <li class="navi"><a class="active" href="help.php">Help</a></li>
	 <li class="navi"><a href="login.php">Login</a></li>
	 <li class="navi"><a href="loginstaff.php">Staff Login</a></li>
</ul>


  <div class="boxhelp">

    <form class="well form-horizontal" action=" " method="post"  id="contact_form">
<fieldset>

<!-- Form Name -->
<legend><h1>Contact Us Today!</h1></legend>

<!-- Text input-->
<form action="tracking.php">
<div class="form-group">
  <!--<label class="col-md-4 control-label">First Name</label>-->
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="first_name" placeholder="First Name*" class="form-control"  type="text">
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
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <!--<label class="col-md-4 control-label">E-Mail</label>-->
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" placeholder="E-Mail Address*" class="form-control"  type="text">
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
      <option value=" " >Please select your state</option>
      <option>Queensland</option>
      <option>New south Wales</option>
      <option >Victoria</option>
      <option >Western Australia</option>
      <option >South Australia</option>
      <option >Australian Capital territory</option>
      <option >Tasmania</option>

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
  </div>
  </div>
</div>

<!-- Success message -->
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

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
