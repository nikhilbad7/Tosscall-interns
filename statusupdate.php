<?php
require('include/config.inc.php');
require('include/session.inc.php');
require('include/header.inc.php');
		$status_of_user=$_GET['status'];
		$id_of_user = $_GET['id'];
		$c=mysqli_connect($db_host,$db_username,$db_passsord,$db_name);
		$query = " update event set status = '$status_of_user' where id='$id_of_user'";
		
		$rs = mysqli_query($c,$query);
		
 ?>
