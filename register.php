<?php 
include('include/db_con.php');
if(isset($_POST['Submit']))
{
$fn=$_POST['firstname'];
$ln=$_POST['lastname'];
$email=$_POST['email'];
$uname=$_POST['username'];
$pass=$_POST['password1'];


$s1="INSERT INTO users (first_name,last_name,email,user_name,user_password)VALUES('".$fn."','".$ln."','".$email."','".$uname."','".$pass."')";
mysql_query($s1) or die (mysql_error($con));
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

    
	<script>
     
        function signup()
      {

          var alt="";
          var x=document.forms["signupform"]["firstname"].value;
          if (x==null || x=="")
            {
              alt +="First name must be filled out\n";
              
            
            }
         var y=document.forms["signupform"]["lastname"].value;
         if (y==null || y=="")
            {
              
              alt += "Last name must be filled out\n";
              
            }
			var x=document.forms["signupform"]["daytimephone"].value;
          if (x==null || x=="")
            {
              alt +="First name must be filled out\n";
              
            
            }
          var z=document.forms["signupform"]["email"].value;
          var atpos=z.indexOf("@");
          var dotpos=z.lastIndexOf(".");
              
           if (atpos<1 || dotpos<atpos+2 || dotpos+2>=z.length)
              {
             alt += "Not a valid e-mail address\n";
             
              }
         
          var v=document.forms["signupform"]["password1"].value; 
         
          if (v==null || v=="")
            {
              alt += "password must be filled out\n";
                 
            }
         var t=document.forms["signupform"]["password2"].value; 
         if (t==null || t=="")
            {
              alt += "confirm password must be filled out\n";
                
            }
			 if (v != t)
            {
              alt += "password  doesn't  match\n";
                 
            }
   
        if (alt != "")
             {
               alert(alt);
              return false;
             }
			 else {
			 	form.Submit()
			 }
}

     </script>	
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
    <script src='js/fullcalendar.min.js'></script>
    <script src="js/theme.js"></script>
<div class="container">

	<section id="content">
		<form method="POST" name="signupform" action="register.php"  onSubmit="return signup();">
			<h1>Register</h1>
			<div>
				<input type="text" name="firstname" placeholder="Firstname" id="firstname" />
			</div>
			<div>
				<input type="text" name="lastname" placeholder="Lastname" id="lastname" />
			</div>			
			<div>
				<input type="text" name="email" placeholder="Email" id="email" />
			</div>
			<div>
				<input type="text" name="username" placeholder="Username" id="username" />
			</div>
			<div>
				<input type="password" name="password1" placeholder="Password" id="password1" />
			</div>
			<div>
				<input type="password" name="password2" placeholder="Confirm Password" id="password2" />
			</div>			
			<div>
				<input type="submit" name="Submit" value="Submit" />
				<input type="reset" name="reset" value="Reset"  />
				<a href="index.php">Login</a>
			</div>
		</form>
	</section>
</div>

</body>
</html>