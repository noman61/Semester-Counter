<?php
ob_start();
session_start();
require_once 'dbconnect.php';

	// it will never let you open index(login) page if session is set
if ( isset($_SESSION['user'])!="" ) {
	header("Location: home.php");
	exit;
}

$error = false;
$GLOBALS['error'];
if( isset($_POST['btn-login']) ) {	

		// prevent sql injections/ clear user invalid inputs
	$email = trim($_POST['email']);
	$email = strip_tags($email);
	$email = htmlspecialchars($email);

	$pass = trim($_POST['pass']);
	$pass = strip_tags($pass);
	$pass = htmlspecialchars($pass);
		// prevent sql injections / clear user invalid inputs
	if(empty($email)){
		$error = true;
		$emailError = "Please enter your email address.";
		$GLOBALS['emailError'];
	} 
	else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
		$error = true;
		$emailError = "Please enter valid email address.";
	}

	else  if(empty($pass)){
		$error = true;
		$passError = "Please enter your password.";
		$GLOBALS['passError'];
	}

		// if there's no error, continue to login
	if (!$error) {

			$password = hash('sha256', $pass); // password hashing using SHA256

			$res="SELECT userId, userName, userPass FROM users WHERE userEmail='$email'";
			$row= $conn->query($res);
			$row = $row->fetch_assoc();  // if uname/pass correct it returns must be 1 row
			
			if($row['userPass']==$password ) {
				$_SESSION['user'] = $row['userId'];
				header("Location: home.php");
			} else {
				$errMSG = "Incorrect Credentials, Try again...";
			}

		}
		
	}
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>admin-log-in</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
		<link rel="stylesheet" href="style.css" type="text/css" />
		<style type="text/css">
			span.glyphicon-search{
				font-size: 25px;  
				background-color: none;
			}
			span.glyphicon-home{
				font-size: 25px;  
				background-color: none;
			}
			span.glyphicon-eye-open{
				font-size: 25px;  
				background-color: none;
			}
			span.lock1{
				font-size: 25px;  
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



				<br><br><br>
				<div class="panel panel-default"  style="height: 70px;margin-left: 5px;">
					<div class="panel-body">
						<div class="col-xs-5 text-right" style="padding-right: 20px;">
							<form method="post" action="index.php">
								<input type="date" name="search" style=" border-radius: 10px;height:35px;">
								<button type="submit" name="searchbtn" value="SEARCH" class="btn btn-primary btn-sm">
									<span class="glyphicon glyphicon-search"></span>SEARCH
								</button>
							</form>
						</div>     
						<!-- index-->
						<div class="col-xs-2 text-left" style=""> 
							<form action="index.php">
								<button type="submit" class="btn btn-primary" style="float: left;margin-left: 5px;">
									<a style="text-decoration: none;text-decoration-color: white;color: white;">
										<span class="glyphicon glyphicon-home ">
										</span>HOME
									</button></a>
								</form>
							</div>
							<!--view holidays-->
							<div class="col-xs-2 text-left">
								<form action="userview.php">
									<button type="submit" class="btn btn-primary" style="float: left;padding-left: 10px;">
										<a style="text-decoration: none;text-decoration-color: white;color: white;">
											<span class="glyphicon glyphicon-eye-open text-center"></span>HOLIDAYS
										</button></a>
									</form>
								</div>
								<!-- ADMIN-->
								<div class="col-xs-2 text-left">
								</form>     
								<form action="useradmin.php" method="post">
									<button type="submit" class="btn btn-primary" style="float: left;margin-left: 40px;">
										<a style="text-decoration: none;text-decoration-color: white;color: white;">
											<span class="glyphicon glyphicon glyphicon-lock lock1"></span>ADMIN
										</button></a>
									</form>
								</div>

								<br><br><br><br><br><br>
								<div id="login-form">
									<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

										<div class="col-md-12">

											<div class="form-group">
												<h2 class=""></h2>
											</div>

											<div class="form-group">
												<hr />
											</div>

											<?php
											if ( isset($errMSG) ) {

												?>
												<div class="form-group">
													<div class="alert alert-danger">
														<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
													</div>
												</div>
												<?php
											}
											?>

											<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
													<input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php if(isset($email)) {echo $email;} ?>" maxlength="40" />
												</div>
												<span class="text-danger"><?php if(isset($emailError)){ echo $emailError;} ?></span>
											</div>

											<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
													<input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
												</div>
												<span class="text-danger"><?php if(isset($passError)){ echo  $passError; }?></span>
											</div>

											<div class="form-group">
												<hr />
											</div>

											<div class="form-group">
												<button type="submit" class="btn btn-block btn-primary" name="btn-login">Sign In</button>
											</div>

											<div class="form-group">
												<hr />

											</div>

										</div>

									</form>

								</div>	
								<div style="position: relative; margin-top:36%;color: #FFFFFF;">
									<section class="panel panel-default text-center" style="Background: #333333;font-family: arial;font-size: 12px; padding:0px;bottom: 0px;">
										<!--div class="panel-body"-->
										<p style="text-align: center;margin-top: 8px;">&copy;Shahjalal University of Science and Technology-<?php echo date("Y");?></p>
										<!--/div-->
										<div class="panel-footer" style="padding-bottom: 0%; background-color: #4d4d4d">Created by Pioneer,dept of CSE,SUST.</div>
									</section>
								</div> 
							</div>
						</div>
					</body>
					</html>
					<?php ob_end_flush(); ?>
