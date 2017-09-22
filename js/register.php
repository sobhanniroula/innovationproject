<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
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
	<link rel="stylesheet" href="css/home.css" type="text/css" media="screen" />

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

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
          if((document.forms["signupform"]["usertype1"].checked==false)&& (document.forms["signupform"]["usertype2"].checked==false))
      
            {
               alt += "payment type  must be filled out\n";
                     
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
            
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>Users</span>
                    <i class="icon-chevron-down"></i>
                </a>
                
            </li>
            
            
            <li>
                <a href="calendar.php">
                    <div class="pointer">
                        <div class="arrow"></div>
                        <div class="arrow_border"></div>
                    </div>
                    <i class="icon-calendar-empty"></i>
                    <span>Calendar</span>
                </a>
            </li>
            
            
            <li>
                <a href="#">
                    <i class="icon-cog"></i>
                    <span>My Info</span>
                </a>
            </li>
            
        </ul>
    </div>
    <!-- end sidebar -->
	<script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/jquery-ui-1.10.2.custom.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src='js/fullcalendar.min.js'></script>
    <script src="js/theme.js"></script>
<div class="container">
<?php 
include('include/db_con.php');
if(isset($_POST['Submit']))
{
$fn=$_POST['firstname'];
$ln=$_POST['lastname'];
$phone=$_POST['daytimephone'];
$email=$_POST['email'];
$pass=$_POST['password1'];
$city=$_POST['city'];
$country=$_POST['country'];
$intr=$_POST['usertype'];

$s1="INSERT INTO users (first_name,last_name,day_phone,user_name,user_password,city,country,payment_type)VALUES('".$fn."','".$ln."','".$phone."','".$email."','".$pass."','".$city."','".$country."','".$intr."')";
mysql_query($s1) or die (mysql_error($con));
}
?>
	<section id="content">
		<form action="registersuccess.php" method="POST" name="signupform" onSubmit="return signup();">
			<h1>Register</h1>
			<div>
				<input type="text" name="firstname" placeholder="Firstname" id="firstname" />
			</div>
			<div>
				<input type="text" name="lastname" placeholder="Lastname" id="lastname" />
			</div>
			<div>
				<input type="text" name="daytimephone" placeholder="Phone" id="daytimephone" />
			</div>
			<div>
				<input type="text" name="email" placeholder="Email" id="email" />
			</div>
			<div>
				<input type="password" name="password1" placeholder="Password" id="password1" />
			</div>
			<div>
				<input type="password" name="password2" placeholder="Confirm Password" id="password2" />
			</div>
			<div>
				<input type="text" name="city" name="city" placeholder="City/State" id="city" />
			</div>
			<div>
				<input type="text" name="country" placeholder="Country" id="country" />
			</div>
			<div>
			<h6> Payment Type: </h6>
				<input type="radio" name="usertype" id="usertype1" value="cash" /> Cash
				<input type="radio" name="usertype" id="usertype2" value="paypal" /> Paypal/CreditCard
			</div>
			<div>
				<input type="submit" name="Submit" value="Register" />
				<input type="reset" name="reset" value="Reset"  />
				<a href="index.php">Login</a>
			</div>
		</form><!-- form -->
	</section><!-- content -->
</div><!-- container -->

</body>
</html>