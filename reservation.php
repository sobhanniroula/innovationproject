<?php
session_start();
if(!isset($_SESSION["username"]))
{
	header("location:index.php");
}
else{
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
    <link rel="stylesheet" href="css/admin.css" type="text/css" media="screen" />
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
                <a class="dropdown-toggle ui-elements" href="availabletime.php">
                    <i class="icon-code-fork"></i>
                    <span>Reservations</span>
                    <i class="icon-chevron-down"></i>
                </a>
               
            </li>          
            
        </ul>
    </div>
   
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/jquery-ui-1.10.2.custom.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>

   	
<div class="container">
            <h3 class="modal-title">Reserve An Appointment </h3>
       
  <h4>Welcome: <?php session_start(); if(isset($_SESSION['username'])){ echo $_SESSION['username']; } ?> </h4>
  <h6> Fill your basic information below: <h6>
  <form class="form-horizontal" role="form" action="bookingsuccess.php" method="POST" id="select">
     <div class="form-group">
      <label class="control-label col-sm-2" > Your Name:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="username" placeholder="Full Name" id="name" />
      </div>
	  </div>
	 <div class="form-group">
      <label class="control-label col-sm-2" >Student Number:</label>
      <div class="col-sm-4">          
        <input type="number" class="form-control" name="student_number" placeholder="Example 1234567" id="number"/>
     </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" > Group:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="class_group" placeholder="Example TI13s1" id="group" />
      </div>
    </div>
    	<div class="form-group">
      <label class="control-label col-sm-2" > Appointment Date:</label>
      <div class="col-sm-4">
        <input type="date" name="appointment_date" class="form-control" cols="30"  value="<?php if(isset($_POST['appointment_time'])){ echo $_POST['appointment_time']; }?>" />
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" > Appointment Time:</label>
      <div class="col-sm-4">
        <select type="text" class="text_select" name="appointment_time" >  
			<option value="00">- Select -</option>
			<option value="09:00">09:00</option>
			<option value="09:30">09:30</option>
			<option value="10:00">10:00</option>
			<option value="10:30">10:30</option>
			<option value="11:00">11:00</option>
			<option value="11:30">11:30</option>
			<option value="12:00">12:00</option>
			<option value="12:30">12:30</option>
			<option value="13:00">13:00</option>
			<option value="13:30">13:30</option>
			<option value="14:00">14:00</option>
			<option value="14:30">14:30</option>
			<option value="15:00">15:00</option>
			<option value="15:30">15:30</option>
			<option value="16:00">16:00</option>
			<option value="16:30">16:30</option>
		</select>
		</div>
		 <a href="availabletime.php" target="_blank"> Click here to see the available date & time </a>
	 </div>
    	<div class="form-group">
      <label class="control-label col-sm-2"  >Appointment type:</label>
      <div class="col-sm-4">
        <select type="text" class="text_select" name="appointment_type" >  
<option value="00">- Select -</option> 
<option value="Sick Leave"> Sick Leave </option> 
<option value="Recommendation Letter"> Recommendation Letter </option> 
<option value="Graduation"> Graduation </option> 
<option value="Credit Transfer"> Credit Transfer </option> 
<option value="Study Discussion"> Study Discussion </option> 
<option value="Extra Courses"> Extra Courses </option> 
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
<?php
}
?>