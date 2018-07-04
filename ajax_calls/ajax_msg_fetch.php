<?php 
require('../include/config.inc.php');
require('../include/session.inc.php');
$username = $_SESSION['username'];
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
$event_id=$_SESSION['event_id'];
$c=mysqli_connect($db_host,$db_username,$db_password,$db_name);
$query="select * from message where event_id=$event_id";
$ck=mysqli_query($c,$query);
while($r=mysqli_fetch_array($ck))
{
	echo"<b>$r[user]</b> &nbsp;&nbsp; : &nbsp;&nbsp; <i>$r[message]</i><br><br>";
	   
}
}
?>