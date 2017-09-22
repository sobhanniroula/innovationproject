<!DOCTYPE html >
<html>
<head>
		<title> Photography challenge </title>
		<meta charset="UTF-8">
		<meta name="description" content="Photography challenge">
		<meta name="keywords" content="HTML,CSS,XML,JavaScript,Php">
		<meta name="author" content="Sobhan Niroula">
		<link rel="stylesheet" type="text/css" href="style.css">
		
		
	</head>

<?php
include('include/db_con.php');

if(isset($_GET['user_id']))
{
$user_id=$_GET['user_id'];
$sql="delete from participants where user_id='".$user_id."'";
mysql_query($sql) or die (mysql_error($con));

header("location:adminpanal.php");
}
?>
</body>
</html>
