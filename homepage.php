<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Home page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: #636e72">
<div id="main-wrapper">
	<center>
	<h2>Home page</h2>
	<h3>welcome 
		<?php echo $_SESSION['username']?></h3>  <!-- username is sesssion variable-->
	<img src="images/leo.jpg" alt="Avatar" class="avatar">
    </center>

		<form class="myform" action="homepage.php" method="post">
			<input name="logout" type="submit" id="logout_btn" value="log out"/><br>
		</form>
		<?php
		  if(isset($_POST['logout']))
		  {
		  session_destroy();
		  header('location:index.php');
		}
		?>
</body>
</html>