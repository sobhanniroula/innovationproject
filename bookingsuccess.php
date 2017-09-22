<?php
session_start();
if(!isset($_SESSION["username"]))
{
	header("location:index.php");
}
else{
?>

<?php
$to = 'katuwalarun1@gmail.com';
$subject = 'New reservation made';
 
$name= $_POST['name'];
$number= $_POST['number'];
$group= $_POST['group'];

$message = <<<EMAIL

Hi! I have made a Reservation.
$name
$number
$group

EMAIL;

$header = $name;

if($_POST) {
	mail($to, $subject, $message, $header);
}

?>

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
	    
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/compiled/layout.css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/elements.css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/icons.css" />
    <link href="css/lib/font-awesome.css" type="text/css" rel="stylesheet" />
    <link href='css/lib/fullcalendar.css' rel='stylesheet' />
    <link href='css/lib/fullcalendar.print.css' rel='stylesheet' media='print' />
    <link rel="stylesheet" href="css/compiled/calendar.css" type="text/css" media="screen" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

   
</head>



<body>
    
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
		<ul class="nav navbar-nav pull-right hidden-xs">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle hidden-xs hidden-sm" data-toggle="dropdown">
                    <?=$_SESSION['username'];?>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">                    
                    <li><a href="logout.php">Log out</a></li>
                </ul>
            </li>
		</ul>
    </header>
     
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

	
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/jquery-ui-1.10.2.custom.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>

    
<div class="container">
	<h3>Hello: <?php session_start(); if(isset($_SESSION['username'])){ echo $_SESSION['username']; } ?> </h3>
	<h4> Your appointment has been successfully booked. Please check the available time and date to see the update, before visiting the office.!! <h4>
</div>



  
</body>

</html>

<?php
}
?>