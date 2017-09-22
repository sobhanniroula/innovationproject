<!DOCTYPE html>
<html lang="en">
<head>
  <title>Reserve</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include('include/db_con.php');
session_start();
if(isset($_POST['sub']))
{
$username=$_POST['username'];
$roomtype=$_POST['field_1'];
$startdate=$_POST['startdate'];
$enddate=$_POST['enddate'];
$room_nos=$_POST['room_nos'];
$amount=$_POST['roomprice'];

$checkroom= "select count(*) from roomdetail where room_type='".$roomtype."' ";
$check=mysql_query($checkroom) or die (mysql_error($con));
$roomcount=mysql_fetch_array($check);
 $checkcount=$roomcount[0];
if($checkcount>=10)
{
?> <script>alert("Sorry Rooms Are not Available :( please try another Option !!");</script>
<?php }
else{
$s1="INSERT INTO roomdetail (username,checkin_date,checkout_date,room_type,no_of_room,amount)VALUES('".$username."','".$startdate."','".$enddate."','".$roomtype."','".$room_nos."','".$amount."')";
mysql_query($s1) or die (mysql_error($con));
header("location:success.php");
}
}
?>
<div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Reserve</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Reserve An Appointment </h4>
        </div>
        <div class="modal-body">
<div class="container">
  <h2>Basic Information for: <?php session_start(); if(isset($_SESSION['username'])){ echo $_SESSION['username']; } ?> </h2>
  <form class="form-horizontal" role="form" action="modal.php">
     <div class="form-group">
      <label class="control-label col-sm-2" for="num">Student Number:</label>
      <div class="col-sm-4">          
        <input type="number" class="form-control" id="num" placeholder="Example 1234566">
     </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="name"> Group:</label>
      <div class="col-sm-4">
        <input type="name" class="form-control" id="name" placeholder="Example TI13s1">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="fname"> Appointment Date:</label>
      <div class="col-sm-4">
        <input type="date" name="startdate1" class="form-control" id="fname" placeholder="startdate" value="<?php if(isset($_POST['startdate1'])){ echo $_POST['startdate1']; }?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="lname"> check out (for testing):</label>
      <div class="col-sm-4">
        <input type="date" name="enddate1" class="form-control" id="fname" placeholder="enddate" value="<?php if(isset($_POST['enddate1'])){ echo $_POST['enddate1']; }?>" onchange='this.form.submit()'>
      </div>
    </div>
  </form>
</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
