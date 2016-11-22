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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="assets/jquery-1.11.3-jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

	//Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});
	
	//Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
});
</script>
<style type="text/css">
	span.glyphicon {
    font-size: 20px;  
}

span.glyphicon-home {
    font-size: 30px;  
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
						<div style="float: right;margin-left: 280px;margin-top: 5px;">
					<form method="post" action="home.php">
					<button style="background-color: #FFFFFF;border-radius: 7px;">
						<a href="home.php" style="text-decoration: none;">
							<span class="glyphicon glyphicon-home"></span>HOME
						</button></a>
						</form>
                       </div>
					</div>
				</div>
			</nav>


			<br><br><br><div id="container">
				<div class="col-sm-offset-2 col-md-8"> 
					<br><br>
					<div style="box-shadow: inset 0px 0px 50px 0px #1A0707,5px 5px 5px 1px #242424;
					-webkit-box-shadow: inset 0px 0px 50px 0px #1A0707,5px 5px 5px 1px #242424;
					-moz-box-shadow: inset 0px 0px 50px 0px #1A0707,5px 5px 5px 1px #242424;
					-o-box-shadow: inset 0px 0px 50px 0px #1A0707,5px 5px 5px 1px #242424;height: 90px;margin-bottom: 20px;">
					<h2 style="text-align: center;color: #F29010;padding-top: 7px; text-decoration: underline;">LIST OF HOLIDAYS</h2>
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

					<tr style="font-size: 20px; background-color:#5b9291;">
						<td>ID</td>
						<td>DATE</td>
						<td>EVENT</td>
						<td>DELETE</td>
						<!--td>Update</td-->
					</tr>

					<?php
					$i=0;
					$sql="SELECT * FROM `sust_student` ORDER BY date ASC";
					$result_set=$conn->query($sql);
					while($row=$result_set->fetch_assoc())
					{
						?>
						<tr>
							<?php $id=$row['user_id1'] ?>
							<td><?php echo $i+=1; ?></td>
							<td><?php echo $row['date'] ?></td>
							<td><?php echo $row['event'] ?></td>
							<td>
								<form action='delete.php?id=<?php echo $row['user_id1'];?>' method="post">
									<input type="hidden" name="Did" value="<?php echo $row['user_id1']; ?>">

									<button type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this event?');" name="submit" style="background-color: #cc3300;border-radius:3px;">
										<span class="glyphicon glyphicon-trash"></span>
									</button>


								</form>
							</td>
							<!--td>
								<form action='home.php?uid=<//?php echo $row['user_id1'];?>' method="post">
									<input type="hidden" name="Uid" value="<?php //echo $row['user_id1']; ?>">
									<input type="submit" value="Update" name="submit" style="background-color: #61CB33;color: blue; border-radius: 5px;"></form>
								</td-->
							</tr>
							<?php
						}
						?>
					</table> 
					<a href="#" class="scrollToTop"></a>
					<style type="text/css">
						.scrollToTop{
							width:110px; 
							height:130px;
							padding:20px; 
							text-align:center; 
							background: whiteSmoke;
							font-weight: bold;
							color: #444;
							text-decoration: none;
							position:fixed;
							top:500px;
							right:10px;
							display:none;
							background: url('arrow_up.png') no-repeat 0px 20px;
						}
						.scrollToTop:hover{
							text-decoration:none;
						}
					</style>
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