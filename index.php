<?php 
	include('include/db_con.php');
	session_start();
		if (isset($_POST['username'],$_POST['password']))
			   {
                $username=$_POST['username'];
                $password=$_POST['password'];
                     if (empty($username) || empty($password))
                   {
                      $error = 'All fields are required!!';
                    }
                     					 else {  
					 $login="select * from users where user_name='".$username."' and user_password ='".$password."'";
					 $result=mysql_query($login);
					 print_r($result);
					if(mysql_fetch_array($result)){
				 $_SESSION['logged_in']='true';
				 $_SESSION['username']=$username;
				header('Location:reservation.php');
					 exit();
					 } else {
					 $error='Incorrect details !!';
					 }
					       }
		}
  
  ?>
  
<!DOCTYPE HTML>
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
	<link rel="stylesheet" href="css/home.css" type="text/css" media="screen" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />
   <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">
		
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
			
                <a href="admin.php" class="dropdown-toggle hidden-xs hidden-sm" >
                    Admin Login   
                </a>
                
            </li>

    </header>
<div id="sidebar-nav">
        <ul id="dashboard-menu">
            <li>                
                <a href="index.php">
		<div class="pointer">
                        <div class="arrow"></div>
                        <div class="arrow_border"></div>
                    </div>
                    <i class="icon-home"></i>
                    <span>Home</span>
                </a>
            </li>            
            
            <li>
                <a href="calendar.php">
                    <i class="icon-calendar-empty"></i>
                    <span>Calendar</span>
                </a>
            </li>
            
           </ul>
    </div>
   
	<script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/jquery-ui-1.10.2.custom.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src='js/fullcalendar.min.js'></script>
    <script src="js/theme.js"></script>
	<script type="text/JavaScript" src ="js/login.js"></script>

	<div class="container">
	<section id="content">
		<form action="index.php" method="POST">
			<h1>Login</h1>
			<center>
			<?php  if (isset($error)) {?>
           <small style="color:#aa0000;"><?php echo $error; ?>
            <br /> <br />
           <?php } ?>
<input type="text" id="username" name="username" placeholder="Username"><br />
<input type="password" id="password" name="password" placeholder="Password"><br />
<input type="submit" value="Log in" name="sub" onClick="clicked()">
</center>

			<div>
				<a href="register.php">Register</a>
				<a href="requestpassword.php">Forgot password</a>
			</div>
		</form>
	</section>
</div>


</body>
</html>