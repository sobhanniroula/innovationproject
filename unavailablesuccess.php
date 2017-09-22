<?php
$servername = "mysql.metropolia.fi:3306";
$dbusername = "sobhann";
$dbpassword = "Lalita123";
$dbname = "sobhann";

$unavailable_date=$_POST['unavailable_date'];
$unavailable_time=$_POST['unavailable_time'];

//create connection
$conn = new mysqli ($servername, $dbusername, $dbpassword, $dbname);

//check connection
if ($conn->connect_error) {
	die("connection failed" . $conn->connect_error);	
}

$s1="INSERT INTO unavailable_time (unavailable_date, unavailable_time) VALUES ('$unavailable_date', '$unavailable_time')";

if ($conn->query($s1) === TRUE){
	 echo "";
	} else {
	echo "Error:" . $s1 . "<br>" . $conn->error;
}

$conn->close();
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
            <a class="navbar-brand" href="#"><img src="logo.png" alt="logo" /></a>
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

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/jquery-ui-1.10.2.custom.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>

    
<div class="container">
		<h4> You have successfully entered your unavailable time. <h4>
</div>

  
</body>

</html>