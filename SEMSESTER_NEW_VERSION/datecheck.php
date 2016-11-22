<?php 
$query=mysql_connect("localhost","root","");
include_once 'dbconnect.php';
if( isset($_SESSION['user'])=="" ){
		header("Location: index.php");
	}
$start = trim($_POST['search']);
$start = mysql_real_escape_string($start);
 $start = date("Y-m-d", strtotime($start));
 $dayNo= date('N', strtotime( $start));

$test = "SELECT `date` FROM `sust_student` WHERE `date`='$start'";
$test = $conn->query($test);
$test = $test->fetch_assoc();
$msg="";
 $dateprint = date("d-M-y", strtotime($start));
 if($start=='1970-01-01')
{
	$msg="Please insert a valid date.";
	header('Location:home.php?msg='.$msg);
}
else if($test!=0)
{
	$row = "SELECT `event` FROM `sust_student` WHERE `date`='$start'";
	$row = $conn->query($row);
	$row=$row->fetch_assoc();
     $event=$row['event'];
     $msg=$dateprint." is ".$event.".";
	header('Location:home.php?msg='.$msg);

}
else if ($dayNo=='5'||$dayNo=='6') 
{
 $msg=$dateprint." is a weekly holiday.";
	header('Location:home.php?msg='.$msg);
}
else
{
	$msg=$dateprint." is a onday.";
	header('Location:home.php?msg='.$msg);
}
?>