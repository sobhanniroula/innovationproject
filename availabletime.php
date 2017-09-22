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
		<link rel="stylesheet" href="css/admin.css" type="text/css" media="screen" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />
   
		<style>
			table, th, td {
				border: 1px solid black;
				border-collapse: collapse;
			}
			th, td {
				padding: 5px;
			}
		</style>
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

		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script src="js/jquery-ui-1.10.2.custom.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src='js/fullcalendar.min.js'></script>
		<script src="js/theme.js"></script>
		<script type="text/JavaScript" src ="js/login.js"></script>
	
		<center>
			<div class="container">
				<section id="content">	
					<br>	
					<h1>Reserved Time</h1>
					<h5> Here is the list of reserved time from other students:</h5>
					<br>
					<br>
												
					<?php
					include('include/db_con.php');
					$sql="select * from appointment_detail ";
					$row=mysql_query($sql) or die (mysql_error($con));
					?>
					<table border="5">
						<tr>
							<th>Date</th>
							<th>Time</th>
						</tr>
						<?php
						while($data=mysql_fetch_array($row))
							{
						?>
						<tr>
							<td><?php echo $data[appointment_date]; ?></td>
							<td><?php echo $data[appointment_time]; ?></td>
						</tr>
						<?php
							}
						?>
					</table>
				</section>
					<br> <hr> <br>
			</div>
		</center>

			
	
		<center>
			<div class="container">
				<section id="content">	
					<br>	
					<h1>Unavailable Time</h1>
					<h5> Here is the list of unavailable time from the teacher:</h5>
					<br>
					<br>
					
					<?php
					include('include/db_con2.php');
					$sql="select * from unavailable_time";
					$row=mysql_query($sql) or die (mysql_error($con));
					?>
					<table border="5">
						<tr>
							<th>Date</th>
							<th>Time</th>
						</tr>
						<?php
							while($data=mysql_fetch_array($row))
							{
						?>
						<tr>
							<td><?php echo $data[unavailable_date]; ?></td>
							<td><?php echo $data[unavailable_time]; ?></td>
						</tr>
						<?php
							}
						?>
					</table>
				</section> <br> <hr> <br>
			</div>
		</center>
	  
	</body>
</html>

