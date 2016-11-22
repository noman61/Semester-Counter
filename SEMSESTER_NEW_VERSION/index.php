<?php
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
	<title>Home</title>
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
					<!--SEARCH-->

					<div class="col-xs-5 text-right" style="padding-right: 20px;">
						<form method="post" action="datecheckuser.php">
							<input type="date" name="search" style=" border-radius: 10px;height:35px;">
							<button type="submit" name="searchbtn" value="SEARCH" class="btn btn-primary btn-sm">
								<span class="glyphicon glyphicon-search"></span>SEARCH
							</button>
						</form>
					</div>     
					<!-- index-->
					<div class="col-xs-2 text-left" style=""> 
						<form action="index.php" method="post">
							<button type="submit" class="btn btn-primary" style="float: left;margin-left: 5px;">
								<a style="text-decoration: none;text-decoration-color: white;color: white;">
									<span class="glyphicon glyphicon-home "></span>HOME
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

						</div>
					</div>
					<!--here will be serach option and fron page of the admin and user-->

<hr/>
					<div class="page-header">
						<div style="box-shadow: inset 0px 0px 50px 0px #1A0707,5px 5px 5px 1px #242424;
						-webkit-box-shadow: inset 0px 0px 50px 0px #1A0707,5px 5px 5px 1px #242424;
						-moz-box-shadow: inset 0px 0px 50px 0px #1A0707,5px 5px 5px 1px #242424;
						-o-box-shadow: inset 0px 0px 50px 0px #1A0707,5px 5px 5px 1px #242424;height: 90px;margin-bottom: 20px;">
						<h3 style="text-align: center;color: #F29010;padding-top: 7px;">Welcome to Semester Counter</h3>
						<!-- print the message-->
						<?php 
						if(!empty($_GET['msg']))
							{ ?>
						<h3 style="text-align: center;color: #532FE0"><?php echo $_GET['msg']; ?></h3>
						<?php }
						?>
					</div>
					<div class="col-lg-12" style="box-shadow: inset 0px 0px 50px 0px #1A0707,5px 5px 5px 1px #242424;
					-webkit-box-shadow: inset 0px 0px 50px 0px #1A0707,5px 5px 5px 1px #242424;
					-moz-box-shadow: inset 0px 0px 50px 0px #1A0707,5px 5px 5px 1px #242424;
					-o-box-shadow: inset 0px 0px 50px 0px #1A0707,5px 5px 5px 1px #242424;padding-bottom: 20px;">
					<div class="container">
						<?php 
      // semester starting date
						$res="SELECT * FROM `counter_start` WHERE id='1'";

						$userRow=$conn->query($res);
						$userRow= $userRow->fetch_assoc();
						$startingdate=date("Y-m-d", strtotime($userRow['start']));
          // semester starting date close 
						$currentdate= date('Y-m-d');
//calculating day difference
						$date1=date_create("$startingdate");
						$date2=date_create("$currentdate");
						$diff=date_diff($date1,$date2);
						$diff=$diff->format("%a");
						$diff=$diff+1;
    //echo "<br>day different".$diff."<br>";
//get all the date between starting date and current date 
						$begin = new DateTime( $startingdate);
						$end = new DateTime(  $currentdate );
						$end = $end->modify( '+1 day' ); 
						$interval = new DateInterval('P1D');
						$daterange = new DatePeriod($begin, $interval ,$end); 
						$count=0;
     // all date between todays and starting date
						foreach($daterange as $date)
						{
       $alldate = $date->format("Y-m-d");// all day between two date
       $dayNo= date('N', strtotime( $alldate));// day no
      // echo "<br>";
      //check holy day start
       $test = "SELECT `date` FROM `sust_student` WHERE `date`='$alldate'";
       $test =$conn->query($test);
       $test =$test->fetch_assoc();

       if($test!=0)
       {
       // echo "holiday day";
       // echo "<br>";
       	$count+=1;
       }
       else if ($dayNo=='5'||$dayNo=='6') 
       {
      // echo "Friday or Sunday"."<br>";
       	$count+=1;
       }
   }
   $pcount=$count;
   $totalOnday=$diff-$count;
   $W=0;
   $D=0;
   if($totalOnday==1)
   {
   	$W=1;
   	$D="A";
   }
   else if($totalOnday==2)
   {
   	$W=1;
   	$D="B";
   }
   else if($totalOnday==3)
   {
   	$W=1;
   	$D="C";
   }
   else if($totalOnday==4)
   {
   	$W=1;
   	$D="D";
   }
   else if($totalOnday==5)
   {
   	$W=1;
   	$D="E";
   }
   else if($totalOnday>5)
   {
   	$W=(int)(($totalOnday/5)+1);
   	$DAY=($totalOnday%5);

   	if($DAY==1)
   	{
   		$D="A";
   	}
   	else if($DAY==2)
   	{
   		$D="B";
   	}
   	else if($DAY==3)
   	{
   		$D="C";
   	}
   	else if($DAY==4)
   	{
   		$D="D";
   	}
   	else
   		$D="E";
   }
   $count="WEEK: ".$W." :: DAY: ".$D;
   COUNTER($count);
   STARTINGDATE($startingdate);
 //TODAYCHECK($currentdate);
   ?>
   <!--SEMESTER COUNTER-->
   <div style="text-align: center;">
   	<?php function COUNTER($totalOnday)
   	{?>
   	<h1  style=" text-align: center; color: rgb(255, 0, 0);
   	font-size: 70px;
   	text-shadow: rgb(255, 255, 255) 0px -1px 4px, rgb(255, 255, 0) 0px -2px 10px, rgb(255, 128, 0) 0px -10px 20px, rgb(255, 0, 0) 0px -18px 40px;"> <?php echo $totalOnday; ?> </h1> <?php
   }
   ?>
   <!--SEMESTER starting date-->
   <div class="wrapper">
   	<?php function STARTINGDATE($startingdate)
   	{?>  
   	<h1 style="text-align: center; color: rgb(168, 64, 64);
   	font-size: 45px;
   	text-shadow: rgb(255, 255, 255) 0px -1px 4px, rgb(255, 255, 0) 0px -2px 10px, rgb(255, 128, 0) 0px -10px 20px, rgb(255, 0, 0) 0px -18px 40px;"> <?php
   	$startingdate = date("d-M-Y", strtotime($startingdate));
   	echo "Semester Started: ".$startingdate; ?> </h1> <?php
   }
   ?>
</div>
<!-- add clock with current date and time -->
<script type="text/javascript">
	tday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
	tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

	function GetClock(){
		var d=new Date();
		var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getYear();
		if(nyear<1000) nyear+=1900;
		var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

		if(nhour==0){ap=" AM";nhour=12;}
		else if(nhour<12){ap=" AM";}
		else if(nhour==12){ap=" PM";}
		else if(nhour>12){ap=" PM";nhour-=12;}

		if(nmin<=9) nmin="0"+nmin;
		if(nsec<=9) nsec="0"+nsec;

		document.getElementById('clockbox').innerHTML="Today: "+tday[nday]+", "+tmonth[nmonth]+" "+ndate+","+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";
	}

	window.onload=function(){
		GetClock();
		setInterval(GetClock,1000);
	}
</script>
<div  style="text-align: center;color: rgb(173, 121, 121);
font-size: 30px;
//background-color: rgb(232, 204, 204);
text-shadow: rgb(255, 255, 255) 0px 0px 5px, rgb(255, 255, 255) 0px 0px 10px, rgb(255, 255, 255) 0px 0px 15px, rgb(255, 45, 149) 0px 0px 20px, rgb(255, 45, 149) 0px 0px 30px, rgb(255, 45, 149) 0px 0px 40px, rgb(255, 45, 149) 0px 0px 50px, rgb(255, 45, 149) 0px 0px 75px;">
<div id="clockbox"></div>
<!--today is a on day or off day-->
<?php TODAYCHECK($currentdate); ?>
<div class="wrapper">
	<?php function TODAYCHECK($currentdate)
	{ 
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "startingandroid_db";
// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
   $dayNo= date('N', strtotime( $currentdate));// day no
   $test = "SELECT `date` FROM `sust_student` WHERE `date`='$currentdate'";
   $test = $conn->query($test);
   $test =$test->fetch_assoc();
   if($test!=0)
   {
   	$today="is a holiday.";
   }
   else if ($dayNo=='5'||$dayNo=='6') 
   {
   	$today="is a weekly holiday.";
   }
   else
   {
   	$today="is a onday.";
   }
   echo $today;
}
?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div style=" box-shadow: inset 0px 0px 50px 0px #1A0707,5px 5px 5px 1px #242424;
-webkit-box-shadow: inset 0px 0px 50px 0px #1A0707,5px 5px 5px 1px #242424;
-moz-box-shadow: inset 0px 0px 50px 0px #1A0707,5px 5px 5px 1px #242424;
-o-box-shadow: inset 0px 0px 50px 0px #1A0707,5px 5px 5px 1px #242424;height: 200px;margin-left: 105px;margin-right: 105px;font-size: 20px;margin-top:40px;"> <div><h3 style="text-align: center;padding-top:56px;margin-left: 20px;margin-right:30px;color:#532FE0;">It is <?php echo date('d-M-Y')?> today and your semester had been started on <?php echo date("d-M-Y", strtotime($startingdate));?>. You have allready passed <?php echo $diff; ?> day(s) which includes <?php echo $pcount;?> offday(s) and <?php echo $totalOnday?> academic day(s). Finish the course before the end of this semester.</h3> </div> 

<div style="position: relative; margin-top:10%;color: #FFFFFF;">
	<section class="panel panel-default text-center" style="Background: #333333;font-family: arial;font-size: 12px; padding:0px;bottom: 0px;">
		<!--div class="panel-body"-->
		<p style="text-align: center;margin-top: 8px;">&copy;Shahjalal University of Science and Technology-<?php echo date("Y");?></p>
		<!--/div-->
		<div class="panel-footer" style="padding-bottom: 0%; background-color: #4d4d4d">Created by Pioneer,dept of CSE,SUST.</div>
	</section>
</div> 
</div>
</body>
</html>
<?php ob_end_flush(); ?>
