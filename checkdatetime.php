<?php
session_start();
require('include/config.inc.php');
//require('include/session.inc.php');
require('include/header.inc.php');
$username=$_SESSION['username'];
if(!isset($_SESSION['username']))
{
echo "<script>window.location='login.php'</script>";
}
		$combinedate=$_GET['combinedDT'];
		$beforetime = date('Y-m-d H:i:s', strtotime("-30 minutes", strtotime("$combinedate")));
		$c=mysqli_connect($db_host,$db_username,$db_password,$db_name);
		$query = "select * from event where ((init_user = '$username') or( acce_user ='$username')) and ( '$combinedate' BETWEEN '$beforetime' AND timeout)";
		//echo $query;
		$rs = mysqli_query($c,$query);
		if($rs){
				$count =0;
				while($r=mysqli_fetch_array($rs)){
							++$count;
						}
				if($count >0){
					echo "false";
				}
				elseif ($count == 0) {
					echo "true";
				}
		}
		else{
			echo "true";
		}
 ?>

					