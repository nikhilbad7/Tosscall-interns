<?php 
require('../include/config.inc.php');
require('../include/session.inc.php');
$username = $_SESSION['username'];
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
$event_id=$_SESSION['event_id'];
$c=mysqli_connect($db_host,$db_username,$db_password,$db_name);
$query1="UPDATE live 
	SET status =0 WHERE user='$username'";
$query2="UPDATE live 
	SET status =1 WHERE user!='$username'";

$rs1=mysqli_query($c,$query1);

$rs2=mysqli_query($c,$query2);
}
?>