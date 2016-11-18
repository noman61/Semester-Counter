<?php
$query=mysql_connect("localhost","root","");
include_once 'dbconnect.php';
    $id = $_GET['id'];
    echo $id;
    $test=mysql_query("DELETE FROM `sust_student` WHERE user_id1=$id");
    if($test){
    	$msg= "successfully deleted";
	header('Location:view.php?msg='.$msg);
}
?>
