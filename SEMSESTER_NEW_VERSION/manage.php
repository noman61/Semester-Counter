<?php
ob_start();
session_start();
if( isset($_SESSION['user'])=="" ){
	header("Location: index.php");
}
include_once 'dbconnect.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>MANAGE</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<style type="text/css">
		span.glyphicon {
			font-size: 20px;  
		}
		span.glyphicon-trash {
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
						<button type="submit" class="btn btn-primary" style="float: right;">
							<a style="text-decoration: none;text-decoration-color: white;color: white;">
								<span class="glyphicon glyphicon-wrench "></span>MANAGE
							</button></a>
						</form>
					</div>
					<!--manage account-->
					<div class="col-xs-2 text-right">
						<form action="createadmin.php">
							<button type="submit" class="btn btn-primary" style="float: left;margin-left:10px;padding-right: 10px;">
								<a style="text-decoration: none;text-decoration-color: white;color: white;">
									<span class="glyphicon glyphicon glyphicon-user  "></span>CREATE
								</button></a>
							</form>
						</div>
						<!-- return home-->
						<div class="col-xs-2 text-right">
						</form>     
						<form action="home.php" method="post">
							<button type="submit" class="btn btn-primary" style="float: left;margin-left: 10px;">
								<a style="text-decoration: none;text-decoration-color: white;color: white;">
									<span class="glyphicon glyphicon-home "></span>HOME
								</button></a>
							</form>
						</div>

					</div>
				</div>
				<!-- adding the table-->
				<div class="col-sm-offset-2 col-md-8"> 
					<br><br>
					<div style="box-shadow: inset 0px 0px 50px 0px #1A0707,5px 5px 5px 1px #242424;
					-webkit-box-shadow: inset 0px 0px 50px 0px #1A0707,5px 5px 5px 1px #242424;
					-moz-box-shadow: inset 0px 0px 50px 0px #1A0707,5px 5px 5px 1px #242424;
					-o-box-shadow: inset 0px 0px 50px 0px #1A0707,5px 5px 5px 1px #242424;height: 90px;margin-bottom: 20px;">
					<h2 style="text-align: center;color: #F29010;padding-top: 7px; text-decoration: underline;">LIST OF ADMINS</h2>
					<!-- print the message-->
					<?php 
					if(!empty($_GET['msg']))
						{ ?>
					<h3 style="text-align: center;color: #532FE0"><?php echo $_GET['msg']; ?></h3>
					<?php }
					?>
				</div>
				<hr/>
				<table class="table table-striped table-hover table-bordered" style="text-align: center;">

					<tr style="font-size: 20px; background-color: #A2A4BD;">
						<td>ID</td>
						<td>NAME</td>
						<td>EMAIL</td>
						<td>DELETE</td>
						<!--td>Update</td-->
					</tr>

					<?php
					$i=0;
					$sql="SELECT * FROM `users`";
					$result_set=$conn->query($sql);
					while($row=$result_set->fetch_assoc())
					{
						?>
						<tr>
							<?php $id=$row['userId'] ?>
							<td><?php echo $i+=1; ?></td>
							<td><?php echo $row['userName'] ?></td>
							<td><?php echo $row['userEmail'] ?></td>
							<td>
								<form action='admindelete.php?id=<?php echo $row['userId'];?>' method="post">
									<input type="hidden" name="Did" value="<?php echo $row['userId']; ?>">

									<button type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this user?');" name="submit" style="background-color:#ff0000;border-radius:3px;">
										<span class="glyphicon glyphicon-trash"></span>
									</button>


								</form>
							</td>
						</tr>
						<?php
					}
					?>
				</table> 
             <hr/>
             <div style="position: relative; margin-top:5%;color: #FFFFFF;">
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