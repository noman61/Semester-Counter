<?php
ob_start();
session_start();
if( isset($_SESSION['user'])=="" ){
	header("Location: index.php");
}
include_once 'dbconnect.php';

$error = false;

if ( isset($_POST['btn-signup']) ) {

		// clean user inputs to prevent sql injections
	$name = trim($_POST['name']);
	$name = strip_tags($name);
	$name = htmlspecialchars($name);

	$email = trim($_POST['email']);
	$email = strip_tags($email);
	$email = htmlspecialchars($email);

	$pass = trim($_POST['pass']);
	$pass = strip_tags($pass);
	$pass = htmlspecialchars($pass);

		// basic name validation
	if (empty($name)) {
		$error = true;
		$nameError = "Please enter your full name.";
	} else if (strlen($name) < 3) {
		$error = true;
		$nameError = "Name must have atleat 3 characters.";
	} else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true;
		$nameError = "Name must contain alphabets and space.";
	}

		//basic email validation
	if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
		$error = true;
		$emailError = "Please enter valid email address.";
	} else {
			// check email exist or not
		$query = "SELECT userEmail FROM users WHERE userEmail='$email'";
		$result = mysql_query($query);
		$count = mysql_num_rows($result);
		if($count!=0){
			$error = true;
			$emailError = "Provided Email is already in use.";
		}
	}
		// password validation
	if (empty($pass)){
		$error = true;
		$passError = "Please enter password.";
	} else if(strlen($pass) < 6) {
		$error = true;
		$passError = "Password must have atleast 6 characters.";
	}

		// password encrypt using SHA256();
	$password = hash('sha256', $pass);

		// if there's no error, continue to signup
	if( !$error ) {

		$query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";
		$res = mysql_query($query);

		if ($res) {
			$errTyp = "success";
			$errMSG = "Successfully registered, you may login now";
			unset($name);
			unset($email);
			unset($pass);
		} else {
			$errTyp = "danger";
			$errMSG = "Something went wrong, try again later...";	
		}	

	}


}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>MANAGE</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<style type="text/css">
		span.glyphicon-wrench {
			font-size: 25px;  
		}
		span.glyphicon-home {
			font-size: 25px;  
		}
		span.user {
			font-size: 25px;  
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" style="background-color:#0411A5;">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">
					<img src="sust.png" alt="SUST-logo" style="height:100px;width:relative;float: left;">
					<a class="navbar-brand" href="#" style="color:#FFFFFF;margin-left: 5px;font-size: 25px;">Shahjalal University of Science and Technology</a>
				</div>
			</div>
		</nav>
		<div class="container">

			<br><br><br><div class="panel panel-default"  style="height: 70px;margin-left: 5px;">
			<div class="panel-body">
				<div>
				</form>
				<div class="col-xs-5 text-right" style="">      
					<!-- create new account-->
					<form action="manage.php">
					<button type="submit" class="btn btn-success" style="float: right;">
							<a style="text-decoration: none;text-decoration-color: white;color: white;">
								<span class="glyphicon glyphicon-wrench "></span>MANAGE
							</button></a>
						</form>
					</div>
					<!--manage account-->
					<div class="col-xs-2 text-right">
						<form action="createadmin.php">
					<button type="submit" class="btn btn-success" style="float: left;margin-left:10px;padding-right: 10px;">
							<a style="text-decoration: none;text-decoration-color: white;color: white;">
								<span class="glyphicon glyphicon glyphicon-user  user "></span>CREATE
							</button></a>
						</form>
					</div>
					<!-- return home-->
					<div class="col-xs-2 text-right">
					</form>     
					<form action="home.php" method="post">
						<button type="submit" class="btn btn-success" style="float: left;margin-left: 10px;">
							<a style="text-decoration: none;text-decoration-color: white;color: white;">
								<span class="glyphicon glyphicon-home "></span>HOME
							</button></a>
						</form>
					</div>

				</div>
			</div>


			<br><br><div id="login-form">
				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

					<div class="col-md-12">   
						<div class="form-group">
							<hr />
						</div>

						<?php
						if ( isset($errMSG) ) {

							?>
							<div class="form-group">
								<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
									<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
								</div>
							</div>
							<?php
						}
						?>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
								<input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />
							</div>
							<span class="text-danger"><?php echo $nameError; ?></span>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
								<input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
							</div>
							<span class="text-danger"><?php echo $emailError; ?></span>
						</div>

						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
								<input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
							</div>
							<span class="text-danger"><?php echo $passError; ?></span>
						</div>

						<div class="form-group">
							<hr />
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
						</div>

						<div class="form-group">
							<hr />
						</div>

						<!--div class="form-group">
							<a href="home.php">Home...</a>
						</div-->

					</div>

				</form>
			</div>	

		</div>
	</body>
	</html>
	<?php ob_end_flush(); ?>
	<section class="panel panel-default text-center" style="margin-top:40%;Background: #DEDEDE;
font-family: arial;
font-size: 12px;
padding: 0px;">
<!--div class="panel-body"-->
<p>&copy;Shahjalal University of Science and Technology-<?php echo date("Y");?></p>
<!--/div-->
<div class="panel-footer" style="padding-bottom: 0%;">Created by Pioneer,dept of CSE,SUST.</div>
</section>