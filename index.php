<?php 
session_start();
require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Login page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: #636e72">
<div id="main-wrapper"> <!--to form that box-->
	<center>
    <h2>Login Form</h2>
	<img src="images/leo.jpg" alt="Avatar" class="avatar">
    </center>

		<form class="myform" action="index.php" method="post">
		
            
          		<label><b>Username</b></label><br>
				<input type="text" placeholder="Enter Username" name="username" required><br>
				<label><b>Password</b></label><br>
				<input type="password" placeholder="Enter Password" name="password" required><br>

				<input id="login_btn" name="login" value="login" type="submit"><br>
				<!-- submit pe database m data jaayega-->

				<a href="register.php"><input type="button" value="register" id="register_btn"></a>
	
				</form> <!-- value jo button p likha hua hai, name bahot useful hai-->
				<?php
					if(isset($_POST['login']))  // name login hai, login button ka
					{
						$username=$_POST['username'];
						$password=$_POST['password'];
						$encrypted_password = md5($password);

						$query="select * from user WHERE username='$username' AND password='$encrypted_password' ";
						$query_run = mysqli_query($con,$query); // user is table ka name
				 //echo mysql_num_rows($query_run);
				if(mysqli_num_rows($query_run)>0) // query returned more than 1 value i.e they exist so hoga login
				{
					//valid
					$_SESSION['username']=$username;
					header('location:homepage.php');  // jidr bhejna hai vo location
				}
			
				else
				{
					//invalid
					echo '<script type="type/javascript">alert("invalid credentials")</script>';
				}
			
			}
				
				
				?>
</div>

</body>
</html>