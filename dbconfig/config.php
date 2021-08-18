<?php 
// to establish connect with database
$con=mysqli_connect("localhost","root","") or die("unable to connect"); //con is var, addof database,username,passw
mysqli_select_db($con,"samplelogindb"); //var,name of database
?>