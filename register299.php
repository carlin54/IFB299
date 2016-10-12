<?php
@$a=$_POST['heigth'];
@$b=$_POST['length'];
@$c=$_POST['width'];
@$d=$_POST['weight'];

if(isset($_POST['add']))
{
	$e=$a*$b*$c/6000;
	
	if($e>$d){
		$x=$e;
	}
	else{
		$x=$d;
	}
	if ($x<=5){
		$sum = 10;
		
	}
	else if ($x>5 && $x<=10){
		$sum = 15;
	
	}
	else if ($x>10 && $x<=15){
		$sum = 20;
	
	}
	else if ($x>15 && $x<=20){
		$sum = 25;
	
	}
	else if ($x>20 && $x<=25){
		$sum = 30;
	
	}
	else if ($x>25 && $x<=30){
		$sum = 35;
	
	}
	
}
?>


<body>
<form method="post">
<input type="text" placeholder="Enter height (cm)" name="height"/>
<input type="text" placeholder="Enter length (cm)" name="length"/>
<input type="text" placeholder="Enter width (cm)" name="width"/>
<input type="text" placeholder="Enter weight (kg)" name="weight"/>
<input type="text" value="<?php echo @$sum ?>"/>
<input type="submit" value="ADD" name="add"/>
</form>
</body>
