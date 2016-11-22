<?php
$query=mysql_connect("localhost","root","");
include_once 'dbconnect.php';
if( isset($_SESSION['user'])=="" ){
		header("Location: index.php");
	}
$start = trim($_POST['start']);
$end = trim($_POST['end']);
$event = trim($_POST['event']);
//$insertcause = trim($_POST['cause']);

$start = mysql_real_escape_string($start);
$end = mysql_real_escape_string($end);
$event = mysql_real_escape_string($event);
//$insertdate = date('m/d/Y', $insertdate);
//echo $insertdate;
//echo "==";
//echo "===";
$start = date("Y-m-d", strtotime($start));
$end = date("Y-m-d", strtotime($end));

if($start=='1970-01-01'){
	$msg= "Please inter a valid date";
		header('Location:home.php?msg='.$msg);
}
else if($end=='1970-01-01'){
	$msg= "Please inter a valid date";
		header('Location:home.php?msg='.$msg);
}

$begin = new DateTime($start);
$end = new DateTime($end);
$end = $end->modify( '+1 day' ); 

$interval = new DateInterval('P1D');
$daterange = new DatePeriod($begin, $interval ,$end);
$count=0; 
foreach($daterange as $date){
	$alldate = $date->format("Y-m-d");

	if($alldate!='1970-01-01'){
		$res="INSERT INTO `sust_student` (`user_id1`, `date`, `event`, `category1`) VALUES
			('', '$alldate', '$event', '');";
			$res= $conn->query($res);
	}
	if($res){
		$msg= "You have succesfully inserted events";
		header('Location:home.php?msg='.$msg);
	}
	else{
		$msg= "Please inter a valid date";
		header('Location:home.php?msg='.$msg);
	}
}
?>

