
<?php


if (isset($_GET['day'])){
		$day = $_GET['day'];
	} else {
		$day = date("j");
	}
	if(isset($_GET['month'])){
		$month = $_GET['month'];
	} else {
		$month = date("n");
	}
	if(isset($_GET['year'])){
		$year = $_GET['year'];
	}else{
		$year = date("Y");
	}
$currentTimeStamp = strtotime( "$day-$month-$year");
$monthName = date("F", $currentTimeStamp);




?>

