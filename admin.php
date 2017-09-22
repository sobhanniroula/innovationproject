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
					 $login="select * from admin where username='".$username."' and password ='".$password."'";
					 $result=mysql_query($login);
					 print_r($result);
					if(mysql_fetch_array($result)){
				 $_SESSION['logged_in']='true';
				 $_SESSION['username']=$username;
				header('Location:adminpanal.php');
					 exit();
					 } else {
					 $error='Incorrect details !!';
					 }
					       }
		}
  
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
		
		
		
		
		 
		 
	

	<div class="container">
	<section id="content">
		<form action="admin.php" method="POST">
			<h1 align="center">Admin Login</h1>
			<center>
			<?php  if (isset($error)) {?>
           <small style="color:#aa0000;"><?php echo $error; ?>
            <br /> <br />
           <?php } ?>
<input type="text" id="username" name="username" placeholder="Username"><br />
<input type="password" id="password" name="password" placeholder="Password"><br />
<input type="submit" value="Log in" name="sub" onClick="clicked()">
</center>

			
		</form>
	</section>
</div>

		
		






		
		
		































	</body>

</html>