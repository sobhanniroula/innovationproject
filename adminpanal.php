<?php
session_start();
if(!isset($_SESSION["username"]))
{
	header("location:index.php");
}
else{
?>

  
  
<!doctype html>
<html>
	<head>
		<title> Photography challenge </title>
		<meta charset="UTF-8">
		<meta name="description" content="Photography challenge">
		<meta name="keywords" content="HTML,CSS,XML,JavaScript,Php">
		<meta name="author" content="Sobhan Niroula">
		<link rel="stylesheet" type="text/css" href="style.css">
		
		
	</head>

	<body>
		
<center>	
	<div class="container">
	<section id="content">	
<br>	
			<h1>Hello Admin</h1>
			
			<br>
			
									
			<?php
	  include('include/db_con.php');
	  $sql="select * from participants ";
	  $row=mysql_query($sql) or die (mysql_error($con));
	 
	  ?>
	  
	  <p> Participant detail: </p>
	  	  <?php
	  
	  while($data=mysql_fetch_array($row))
	  {
	  ?>
	  
	  <ul>
	  <li>ID: <?php echo $data[user_id]; ?></li>
	  <li>Fist name: <?php echo $data[first_name]; ?></li>
	  <li>Last name: <?php echo $data[last_name]; ?></li>
	  <li>Email address: <?php echo $data[email]; ?></li>
	  <li>Photography type: <?php echo $data[type]; ?></li>
	  <li>Photo: <img src="<?php echo $data[path]; ?>"/> </li>
	  <li><a href="delete.php?id=<?php echo $data[user_id]; ?>">delete</a></li>
	  </ul>
	  <br>
	  <hr>
	  <br>
	  
	  <?php
	  }
	  
	  
	  ?>
	  </table>
	  
	  </div>
</center>


		
		
		 
		 
	

	





	</body>

</html>
