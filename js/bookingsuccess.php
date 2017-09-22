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
$appointment_date=$_POST['appointment_date'];
$appointment_time=$_POST['appointment_time'];
$appointment_type=$_POST['appointment_type'];
$message=$_POST['message'];

//create connection
$conn = new mysqli ($servername, $dbusername, $dbpassword, $dbname);

//check connection
if ($conn->connect_error) {
	die("connection failed" . $conn->connect_error);	
}

// gives error if the space is empty
if (empty($username)){
	echo "Username cannot be blank";
	die();
}
if (empty($student_number)){
	echo "Student Number cannot be blank";
	die();
}
if (empty($class_group)){
	echo "Group cannot be blank";
	die();
}

$s1="INSERT INTO appointment_detail (username, student_number, class_group, appointment_date, appointment_time, appointment_type, message) VALUES ('$username', '$student_number', '$class_group', '$appointment_date', '$appointment_time', '$appointment_type', '$message')";

if ($conn->query($s1) === TRUE){
	 echo "";
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
     
	 <div id="sidebar-nav">
	
        <ul id="dashboard-menu">
            <li>                
                <a href="index.php">
                    <i class="icon-home"></i>
                    <span>Home</span>					
                </a>
				
            </li>            
            

            
            <li>
                <a class="dropdown-toggle ui-elements" href="index.php">
                    <i class="icon-code-fork"></i>
                    <span>Log Out</span>
                </a>
               
            </li>          
            
        </ul>
    </div>

	<!-- scripts for this page -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/jquery-ui-1.10.2.custom.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>

    
<div class="container">
	<h3>Hello: <?php session_start(); if(isset($_SESSION['username'])){ echo $_SESSION['username']; } ?> </h3>
	<h4> Your appointment has been successfully booked. You will be contacted soon!! <h4>
</div>



  
</body>

</html>