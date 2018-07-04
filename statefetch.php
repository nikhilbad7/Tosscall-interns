<?php
require('include/config.inc.php');
require('include/session.inc.php');
require('include/header.inc.php');
$username = $_SESSION['username'];
		$state=$_GET['state'];
		$c=mysqli_connect($db_host,$db_username,$db_password,$db_name);
		$query = " select name from city where state = '$state'";
		$rs = mysqli_query($c,$query);
		while($row=mysqli_fetch_array($rs)){
			echo $row['name'];
		}
 ?>