<?php
session_start();
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


$z=$_GET["x"];
$v=$_GET["y"];


$c=mysqli_connect('localhost','root','','tosscall');

$s="select * from login where username='$z' and password='$v'"; 


$ck=mysqli_query($c,$s);

if($row=mysqli_fetch_array($ck))
{
	$_SESSION['u']=$z;
	
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


