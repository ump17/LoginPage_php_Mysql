<?php 
require 'dbconfig/config.php'; // to form conection
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: #636e72">
<div id="main-wrapper">
	<center>
    <h2>Registration Form</h2>
	<img src="images/leo.jpg" alt="Avatar" class="avatar">
    </center>

		<form class="myform" action="register.php" method="post">
		
            <!-- name diya becoz php usko ref karna hai -->
          		<label><b>Username</b></label><br>
				<input name="username" type="text" placeholder="Enter Username" name="username" required><br>
				<label><b>Password</b></label><br>
				<input  name="password" type="password" placeholder="Enter Password" name="your password" required><br>
				<label><b> confirm Password</b></label><br>
				<input name="cpassword" type="password" placeholder="Enter Password" name="confirm password" required><br>
			     <input name= "submit_btn" type="submit" id="signup_btn" value=" sign up"/><br>
				 <!--name to get reference and compare-->
			    <a href="index.php"  type="button" id="back_btn" value="back_btn"></a>
			</form>
		  <?php
			  if(isset($_POST['submit_btn']))
			  {
				//  echo '<script type="text/javascript">alert("button clicked")</script>'; for popup
				 @$username=$_POST['username'];
				 @$password=$_POST['password'];
				 @$cpassword=$_POST['cpassword'];
				 
				 if($password==$cpassword)
				{
					$encrypted_password = md5($password);
					 $query = "select * from user WHERE username='$username'";
					 //echo $query;
				 $query_run = mysqli_query($con,$query);
				 // con vo config.php wala
				 //echo mysql_num_rows($query_run);
				if(mysqli_num_rows($query_run)>0)  // when user already exist
						 {
							 echo '<script type="text/javascript">alert("This Username Already exists.. Please try another username!")</script>';
						 }
						 else
			            {
							$query="insert into user values('$username','$encrypted_password')"; // user= table_name
							$query_run=mysqli_query($con,$query);  //mysqli_querry runs the query
							if($query_run)                        // if query run successfully
							{
								echo '<script type="text/javascript">alert("user registered")</script>';
							}
							else{
								echo '<script type="text/javascript">alert("error")</script>';
							}
						}
				 
				  }
				  else{ // if passwd match nhi kiya
					echo '<script type="text/javascript">alert("password not matched")</script>';
				  }
				}
		  ?>
</div>

</body>
</html>