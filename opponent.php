<?php 
require('include/config.inc.php');
require('include/session.inc.php');
require('include/testdate.php');
$username = $_SESSION['username'];
$id=$_REQUEST["k3"];
$c=mysqli_connect($db_host,$db_username,$db_password,$db_name);


$query="Update event  set acce_user='$username', status=2 where id='$id'";

$rs=mysqli_query($c,$query);

?>
