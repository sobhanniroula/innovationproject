<?php
$con=@mysql_connect("mysql.metropolia.fi:3306","sobhann","Lalita123");
mysql_select_db("sobhann",$con) or die(mysql_error($con));
error_reporting(E_ALL ^ E_NOTICE);
?>