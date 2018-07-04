<?php
session_start();
require('include/config.inc.php');
require('include/session.inc.php');
require('include/header.inc.php');
require('include/testdate.php');
?>

<html>
<body>

<form>

<center>
Username <input type="text" name="x">
<br><br>
Password <input type="Password" name="y">
<br><br>
<input type="submit" name="b1" value="ok">    
</center>

</form>


<?php 

if(isset($_REQUEST['b1']))
{


$username=$_GET["x"];
$password=$_GET["y"];


$c=mysqli_connect($db_host,$db_username,$db_password,$db_name);

$q="select * from login where username='$username' and password='$password'"; 


$rs=mysqli_query($c,$q);

if($row=mysqli_fetch_array($rs))
{
	$_SESSION['username']=$username;	
	echo"<script>window.location='home.php'</script>";
	     
}

else
{
	echo"<script>alert('Invalid username or password');</script>";
}

}
 ?>

</body>

</html>


