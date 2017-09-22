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
$servername = "mysql.metropolia.fi:3306";
$dbusername = "sobhann";
$dbpassword = "Lalita123";
$dbname = "sobhann";

//include('include/db_con.php');
//session_start();
//if(isset($_POST['sub']))
//{
$username=$_POST['username'];
$student_number=$_POST['student_number'];
$class_group=$_POST['class_group'];
$appointment_time=$_POST['appointment_time'];
$appointment_type=$_POST['appointment_type'];
$message=$_POST['message'];

//create connection
$conn = new mysqli ($servername, $dbusername, $dbpassword, $dbname);

//check connection
if ($conn->connect_error) {
	die("connection failed" . $conn->connect_error);	
}

$s1="INSERT INTO appointment_detail (username, student_number, class_group, appointment_time, appointment_type, message) VALUES ('$username', '$student_number', '$class_group', '$appointment_time', '$appointment_type', '$message')";

if ($conn->query($s1) === TRUE){
	 echo "thank you";
	//header ("location:bookingsuccess.php");
} else {
	echo "Error:" . $s1 . "<br>" . $conn->error;
}
$conn->close();
//}
//mysql_query($s1) or die (mysql_error($con));
//header ("location:bookingsuccess.php");
//}
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
            <a class="navbar-brand" href="calendar.html"><img src="logo.png" alt="logo" /></a>
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
            
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>Info</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="user-list.html">Available Time</a></li>
                    <li><a href="new-user.html">User list</a></li>   
                </ul>
            </li>
            
            <li>
                <a class="dropdown-toggle ui-elements" href="#">
                    <i class="icon-code-fork"></i>
                    <span>Reservations</span>
                    <i class="icon-chevron-down"></i>
                </a>
               
            </li>          
            
        </ul>
    </div>
    <!-- end sidebar -->


	<!-- main container -->
    

	<!-- scripts for this page -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/jquery-ui-1.10.2.custom.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>

    <!-- builds fullcalendar example -->
    

	<?php  if (isset($error)) {?>
           <small style="color:#aa0000;"><?php echo $error; ?>
            <br /> <br />
           <?php } ?>

<div class="container">
            <h3 class="modal-title">Reserve An Appointment </h3>
       
  <h4>Welcome: <?php session_start(); if(isset($_SESSION['username'])){ echo $_SESSION['username']; } ?> </h4>
  <h6> Fill your basic information below: <h6>
  <form class="form-horizontal" role="form" action="bookingsuccess.php" method="POST" id="select">
     <div class="form-group">
      <label class="control-label col-sm-2" > Your Email:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="username" placeholder="Email" />
      </div>
	  </div>
	 <div class="form-group">
      <label class="control-label col-sm-2" >Student Number:</label>
      <div class="col-sm-4">          
        <input type="number" class="form-control" name="student_number" placeholder="Example 1234567" />
     </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" > Group:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="class_group" placeholder="Example TI13s1" />
      </div>
    </div>
    	<div class="form-group">
      <label class="control-label col-sm-2" > Appointment Date & Time:</label>
      <div class="col-sm-4">
        <input type="datetime-local" name="appointment_time" class="form-control" cols="30" id="fname" value="<?php if(isset($_POST['appointment_time'])){ echo $_POST['appointment_time']; }?>" />
      </div>
    </div>
    	<div class="form-group">
      <label class="control-label col-sm-2"  >Appointment type:</label>
      <div class="col-sm-4">
        <select type="text" class="text_select" name="appointment_type" >  
<option value="00">- Select -</option> 
<option value="sick_leave"> Sick Leave </option> 
<option value="recommendation_letter"> Recommendation Letter </option> 
<option value="graduation"> Graduation </option> 
<option value="credit_transfer"> Credit Transfer </option> 
<option value="study_discussion"> Study Discussion </option> 
<option value="extra_courses"> Extra Courses </option> 
           </select>
      </div>  
    </div>
	
	  	  
	  <div class="form-group">
      <label class="control-label col-sm-2" > Message:</label>
      <div class="col-sm-4">
        <textarea name="message" form="select" cols="40" rows="7" placeholder="Why do you want to book an appointment?"></textarea>
      </div> 
	  </div>
	  
	<div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit" value="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
  
 
</div>

   	
</body>

</html>