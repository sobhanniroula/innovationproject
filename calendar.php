

<!DOCTYPE html>
<html>
<head>
	<title>Appointment Reservation Software</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="css/compiled/layout.css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/elements.css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/icons.css" />

    <!-- libraries -->
    <link href="css/lib/font-awesome.css" type="text/css" rel="stylesheet" />
    <link href='css/lib/fullcalendar.css' rel='stylesheet' />
    <link href='css/lib/fullcalendar.print.css' rel='stylesheet' media='print' />
    
    <!-- this page specific styles -->
    <link rel="stylesheet" href="css/compiled/calendar.css" type="text/css" media="screen" />

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>



<body>
<?php
include('include/db_con.php');
session_start();
if(isset($_POST['sub']))
{
$username=$_POST['username'];
$roomtype=$_POST['field_1'];
$startdate=$_POST['startdate'];
$enddate=$_POST['enddate'];
$room_nos=$_POST['room_nos'];
$amount=$_POST['roomprice'];

$checkroom= "select count(*) from roomdetail where room_type='".$roomtype."' ";
$check=mysql_query($checkroom) or die (mysql_error($con));
$roomcount=mysql_fetch_array($check);
 $checkcount=$roomcount[0];
if($checkcount>=10)
{
?> <script>alert("Sorry Rooms Are not Available :( please try another Option !!");</script>
<?php }
else{
$s1="INSERT INTO roomdetail (username,checkin_date,checkout_date,room_type,no_of_room,amount)VALUES('".$username."','".$startdate."','".$enddate."','".$roomtype."','".$room_nos."','".$amount."')";
mysql_query($s1) or die (mysql_error($con));
header("location:success.php");
}
}
?> 


    <!-- navbar -->
    <header class="navbar navbar-inverse" role="banner">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" id="menu-toggler">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="logo.png" alt="logo" /></a>
        </div> 	
		
    </header>
    <!-- end navbar -->

    <!-- sidebar -->
    <div id="sidebar-nav">
	
        <ul id="dashboard-menu">
            <li>                
                <a href="index.php">
                    <i class="icon-home"></i>
                    <span>Home</span>					
                </a>
				
            </li>            
            
            
            
            
            
        </ul>
    </div>
    <!-- end sidebar -->


	<!-- main container -->
    <div class="content">
        
        <!-- settings changer -->
        

        <div id="pad-wrapper">
                <div class="row calendar-wrapper">
                    <div class="col-md-12">

                        <!-- div that fullcalendar plugin uses  -->
                        <div id='calendar'></div>

                        <!-- edit image pop up -->
                        
                    </div>
                </div>
        </div>
    </div>
    <!-- end main container -->
	

	<!-- scripts for this page -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/jquery-ui-1.10.2.custom.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src='js/fullcalendar.min.js'></script>
    <script src="js/theme.js"></script>

    <!-- builds fullcalendar example -->
    <script>
	
        $(document).ready(function() {
        
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();
            
            $('#calendar').fullCalendar({
                header: {
                    left: 'month,agendaWeek,agendaDay',
                    center: 'title',
                    right: 'today prev,next'
                },
				selectable: true,
                selectHelper: true,
                
                
            });
            
        });
    </script>

	

<div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Reserve</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Reserve An Appointment </h4>
        </div>
        <div class="modal-body">
<div class="container">
  <h3>Welcome: <?php session_start(); if(isset($_SESSION['username'])){ echo $_SESSION['username']; } ?> </h3>
  <h6> Fill your basic information below: <h6>
  <form class="form-horizontal" role="form" action="calendar.php">
     <div class="form-group">
      <label class="control-label col-sm-2" for="num">Student Number:</label>
      <div class="col-sm-4">          
        <input type="number" class="form-control" id="num" placeholder="Example 1234566">
     </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="name"> Group:</label>
      <div class="col-sm-4">
        <input type="name" class="form-control" id="name" placeholder="Example TI13s1">
      </div>
    </div>
    	<div class="form-group">
      <label class="control-label col-sm-2" for="fname"> Appointment Date:</label>
      <div class="col-sm-4">
        <input type="date" name="startdate1" class="form-control" id="fname" placeholder="startdate" value="<?php if(isset($_POST['startdate1'])){ echo $_POST['startdate1']; }?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="lname"> Appointment Time:</label>
      <div class="col-sm-4">
        <input type="time" name="enddate1" class="form-control" id="fname" placeholder="enddate" value="<?php if(isset($_POST['enddate1'])){ echo $_POST['enddate1']; }?>">
      </div>
    </div>
	<div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
	
	
</body>
</html>