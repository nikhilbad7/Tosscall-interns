<?php
		session_start();
$username=$_SESSION['username'];
if(!isset($_SESSION['username']))
{
echo "<script>window.location='login.php'</script>";
}
		$state=$_GET['state'];
		$c=mysqli_connect('localhost','root','','tosscall_db');
		$query = " select name from city where state = '$state'";
		$rs = mysqli_query($c,$query);
		while($row=mysqli_fetch_array($rs)){
			echo $row['name'];
		}
 ?>
