<?php
ob_start();
session_start();
require_once 'dbconnect.php';
date_default_timezone_set('Asia/Dhaka');
	// if session is not set this will redirect to login page
if( !isset($_SESSION['user']) ) {
  header("Location: index.php");
  exit;
}
	// select loggedin users detail
$res="SELECT * FROM users WHERE userId=".$_SESSION['user'];
$res= $conn->query($res);
$userRow=$res->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <!--meta http-equiv="refresh"content="5"/-->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Admin<?php echo $userRow['userEmail']; ?></title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
  <link rel="stylesheet" href="style.css" type="text/css" />
  <style type="text/css">
    span.glyphicon {
      font-size: 17px;  
    }
    span.glyphicon-pencil {
      font-size: 18px;  
    }
    span.glyphicon-time {
      font-size: 20px;  
    }

    span.glyphicon-remove-sign {
      font-size: 20px;  
    }

    span.glyphicon-user {
      font-size: 22px;  
      background-color: none;
    }
    span.glyphicon-eye-open{
      font-size: 22px;  
      background-color: none;
    }
     span.glyphicon-search{
      font-size: 22px;  
      background-color: none;
    }
   
   

  </style>
</head>
<body>

	<nav class="navbar navbar-default navbar-fixed-top " style="background-color:#0411A5">
    <div class="container">
      <div class="navbar-header">
        <img src="sust.png" alt="SUST-logo" style="height:100px;width:relative;float: left;">
        <a class="navbar-brand" href="home.php" style="color:#FFFFFF;margin-left: 5px;font-size: 20px;">Shahjalal University of Science and Technology</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
             <span style="color: #F29010;" class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['userEmail']; ?>&nbsp;<span class="caret"></span></a>
             <ul class="dropdown-menu">
              <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a>
              </li>
            </ul>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav> 

  <!--1st -->
  <br><br><br><br><br><br><br>
  <div class="panel panel-default" style="margin-left: 10px;
  margin-right: 10px;">
  <div class="panel-body ">
    <div class="col-xs-7 text-left" style="margin-left:2%;">
      <form action="homebody_2.php" method="post" autocomplete="off" >
        <span style="color: #F29010;" class="glyphicon glyphicon-calendar"></span>&nbsp;

        <input placeholder="Start Date"  type="date" name="start" id="start" style=" border-radius: 10px;">
        <span style="color: #F29010;" class="glyphicon glyphicon-resize-horizontal"></span>&nbsp;
        <input placeholder="End Date"  type="date" name="end" id="end" style=" border-radius: 10px;">
        <span style="color: #F29010;" class="glyphicon glyphicon-pencil"></span>&nbsp;
        <input type="text" name="event" placeholder="EVENT" style=" border-radius: 10px;">
        <input type="submit" name="holyday" onclick="return confirm('Are you sure you want to add new events?');" class="btn btn-primary btn-sm">
        <!--br> <h4 style="color: blue;"><?php echo $msg;?></h4-->
      </form>
    </div>
    <div class="col-xs-3 text-left">
     <form action="homebody.php" method="post" autocomplete="off" style="color: black;">
       <span style="color: #F29010;" class="glyphicon glyphicon-time"></span>&nbsp;
       <input placeholder="starting time"  type="date" name="date1" id="date1" style=" border-radius: 10px;">
       <input type="submit" name="sub" value="START" onclick="return confirm('Are you sure you want to start a new semester?');" class="btn btn-primary btn-sm">
     </form>
   </div>
   <div class="col-xs-1 text-center">
     <form method="post" action="#">
       <button type="submit" name="reset" value="reste" class="btn btn-danger btn-sm ">
        <span class="glyphicon glyphicon-remove-sign"></span> RESET
      </button>
    </form>
  </div>
</div>
</div>
<div class="container">
  <!--2nd panel -->
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="col-xs-4 text-left" >
       <form method="post" action="datecheck.php">
        <input type="date" name="search" style=" border-radius: 10px;margin-left: 50px;height: 35px;">

        <button type="submit" name="searchbtn" value="SEARCH" class="btn btn-primary btn-sm">
          <span class="glyphicon glyphicon-search"></span>SEARCH
        </button>
      </form>
    </div>
    <div class="col-xs-4 text-left" >
       <form action="view.php" method="post">
      <button type="submit" class="btn btn-primary" style="margin-left: 40px;">
       <a style="text-decoration: none;text-decoration-color: white;color: white;">
         <span class="glyphicon glyphicon glyphicon-eye-open text-center"></span>HOLIDAYS
       </button></a>
     </form>
    </div>
    <div class="col-xs-4 text-left" >
    </form>
    <div>      
      <form action="manage.php" method="post">
      <button type="submit" class="btn btn-primary" style="margin-left: 40px;">
       <a style="text-decoration: none;text-decoration-color: white;color: white;">
         <span class="glyphicon glyphicon-user text-center"></span>ACCOUNT
       </button></a>
     </form>
   </div>

 </div>
</div>
</div>
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
  $res= $conn->query($res);
  $userRow=$res->fetch_assoc();
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
       $test = $conn->query($test);
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
   $test = $test->fetch_assoc();

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
-o-box-shadow: inset 0px 0px 50px 0px #1A0707,5px 5px 5px 1px #242424;height: 200px;margin-left: 105px;margin-right: 105px;font-size: 20px;margin-top:40px;"> <div><h3 style="text-align: center;padding-top:56px;margin-left: 20px;margin-right:30px;color:#532FE0;">It is <?php echo date('d-M-Y')?> today and your semester had been started on <?php echo date("d-M-Y", strtotime($startingdate));?>. You have allready passed <?php echo $diff; ?> day(s) which includes <?php echo $pcount;?> offday(s) and <?php echo $totalOnday?> academic day(s). Finish the course before the end of this semester.</h3>
 </div> 
<div style="position: relative; margin-top:10%;color: #FFFFFF;">
        <section class="panel panel-default text-center" style="Background: #333333;font-family: arial;font-size: 12px; padding:0px;bottom: 0px;">
          <!--div class="panel-body"-->
          <p style="text-align: center;margin-top: 8px;">&copy;Shahjalal University of Science and Technology-<?php echo date("Y");?></p>
          <!--/div-->
          <div class="panel-footer" style="padding-bottom: 0%; background-color: #4d4d4d">Created by Pioneer,dept of CSE,SUST.</div>
        </section>
      </div>  
</div>
<script src="assets/jquery-1.11.3-jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>