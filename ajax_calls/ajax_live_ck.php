<?php 
require('../include/config.inc.php');
require('../include/session.inc.php');
$username = $_SESSION['username'];
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
$event_id=$_SESSION['event_id'];
$c=mysqli_connect($db_host,$db_username,$db_password,$db_name);
$query="select * from live where id=$event_id and user='$username'";
$rs2=mysqli_query($c,$query);

	if ($rs2)
 	{
 		$row2=mysqli_fetch_array($rs2);

 		if ($row2['status']==1) 
 		{
 			
 			echo "1";
 		}

 		else
 		{

 			echo "0";

 		}

	}
}
?>