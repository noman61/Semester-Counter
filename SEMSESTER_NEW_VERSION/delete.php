<?php
$query=mysql_connect("localhost","root","");
include_once 'dbconnect.php';
if( isset($_SESSION['user'])=="" ){
		header("Location: index.php");
	}
    $id = $_GET['id'];
    echo $id;
    $test="DELETE FROM `sust_student` WHERE user_id1=$id";
    $test=$conn->query($test);
    if($test){
    	$msg= "Successfully deleted";
	header('Location:view.php?msg='.$msg);
}
?>
