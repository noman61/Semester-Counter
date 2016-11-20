<?php
$query=mysql_connect("localhost","root","");
include_once 'dbconnect.php';
if( isset($_SESSION['user'])=="" ){
		header("Location: index.php");
	}
    $id = $_GET['id'];
    echo $id;
    $test=mysql_query("DELETE FROM `users` WHERE userId=$id");
    if($test){
    	$msg= "You have successfully deleted and admin.";
	header('Location:manage.php?msg='.$msg);
}
?>
