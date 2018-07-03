<?php 
require('include/config.inc.php');
require('include/session.inc.php');
$id=$_REQUEST["k3"];
$c=mysqli_connect($db_host,$db_username,$db_passsord,$db_name);


$query="Update event  set acce_user='$username', status=2 where id='$id'";

$rs=mysqli_query($c,$query);

?>
