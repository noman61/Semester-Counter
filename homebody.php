<?php
$query=mysql_connect("localhost","root","");
include_once 'dbconnect.php';
$insertdate = trim($_POST['date1']);
$insertdate = mysql_real_escape_string($insertdate);
// date formation for php mysql
$newDate = date("Y-m-d", strtotime($insertdate));
//echo $newDate;
$msg ="";
if($newDate!='1970-01-01'){
$res=mysql_query("UPDATE `counter_start` SET `start`='$newDate' WHERE id='1'");
}
if($res){
    	$msg= "You have succesfully inserted the new starting date";
	header('Location:home.php?msg='.$msg);
}
else{
	$msg= "Please inter a valid date";
	header('Location:home.php?msg='.$msg);
}
?>
