<?php 
session_start();

# $username=$_SESSION['username'];
$event_id=$_SESSION['event_id'];

if(!isset($_SESSION['username']))
{
echo "<script>window.location='login.php'</script>";
}


$c=mysqli_connect('localhost','root','','tosscall_db');

$query="select * from message where event_id=$event_id";


$ck=mysqli_query($c,$query);


while($r=mysqli_fetch_array($ck))
{
	echo"<b>$r[user]</b> &nbsp;&nbsp; : &nbsp;&nbsp; <i>$r[message]</i><br><br>";
	   
}

 ?>