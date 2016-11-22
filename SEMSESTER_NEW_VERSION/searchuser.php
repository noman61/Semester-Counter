searchuser.php<?php
ob_start();
session_start();
require_once 'dbconnect.php';

	// it will never let you open index(login) page if session is set
if ( isset($_SESSION['user'])!="" ) {
	header("Location: home.php");
	exit;
}
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Smart Home Login</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
		<link rel="stylesheet" href="style.css" type="text/css" />
		<style type="text/css">
			span.glyphicon-search{
				font-size: 30px;  
				background-color: none;
			}
			span.glyphicon-home{
				font-size: 30px;  
				background-color: none;
			}
			span.glyphicon-eye-open{
				font-size: 30px;  
				background-color: none;
			}
			span.lock1{
				font-size: 30px;  
				background-color: none;
			}
		</style>
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top" style="background-color:#0411A5;">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">
						<img src="sust.png" alt="SUST-logo" style="height:100px;width:relative;float: left;">
						<a class="navbar-brand" href="#" style="color:#FFFFFF;margin-left: 2px;font-size: 25px;">Shahjalal University of Science and Technology</a>
					</div>
				</div>
			</nav>
			<div class="container">



				<br><br><br><div class="panel panel-default"  style="height: 70px;margin-left: 5px;">
				<div class="panel-body">
					<div>
					</form>
					<!--SEARCH-->

					<div class="col-xs-5 text-right" style="padding-right: 20px;">
						<form method="post" action="#datecheck.php">
							<input type="date" name="search" style=" border-radius: 10px;">
							<button type="submit" name="searchbtn" value="SEARCH" class="btn btn-success btn-sm">
								<span class="glyphicon glyphicon-search"></span>SEARCH
							</button>
						</form>
					</div>     
					<!-- index-->
					<div class="col-xs-2 text-left" style=""> 
						<form action="index.php" method="post">
							<button type="submit" class="btn btn-success" style="float: left;margin-left: 5px;">
								<a style="text-decoration: none;text-decoration-color: white;color: white;">
									<span class="glyphicon glyphicon-home "></span>HOME
								</button></a>
							</form>
						</div>
						<!--view holidays-->
						<div class="col-xs-2 text-left">
							<form action="userview.php">
								<button type="submit" class="btn btn-success" style="float: left;padding-left: 10px;">
									<a style="text-decoration: none;text-decoration-color: white;color: white;">
										<span class="glyphicon glyphicon-eye-open text-center"></span>HOLIDAYS
									</button></a>
								</form>
							</div>
							<!-- ADMIN-->
							<div class="col-xs-2 text-left">
							</form>     
							<form action="useradmin.php" method="post">
								<button type="submit" class="btn btn-success" style="float: left;margin-left: 40px;">
									<a style="text-decoration: none;text-decoration-color: white;color: white;">
										<span class="glyphicon glyphicon glyphicon-lock lock1"></span>ADMIN
									</button></a>
								</form>
							</div>

						</div>
					</div>
					<!--home for user-->

				</div>

			</body>
			</html>
			<?php ob_end_flush(); ?>
			<div style="position: relative; margin-top: 37%;color: #FFFFFF;">
				<section class="panel panel-default text-center" style="Background: #262626;font-family: arial;font-size: 12px; padding:0px;bottom: 0px;">
					<!--div class="panel-body"-->
					<p style="text-align: center;margin-top: 8px;">&copy;Shahjalal University of Science and Technology-<?php echo date("Y");?></p>
					<!--/div-->
					<div class="panel-footer" style="padding-bottom: 0%; background-color: #666666;">Created by Pioneer,dept of CSE,SUST.</div>
				</section>
			</div>	