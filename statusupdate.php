<?php
session_start();
$username=$_SESSION['username'];
if(!isset($_SESSION['username']))
{
echo "<script>window.location='login.php'</script>";
}
		$status_of_user=$_GET['status'];
		$id_of_user = $_GET['id'];
		$c=mysqli_connect('localhost','root','','tosscall_db');
		$query = " update event from city where state = '$state' and id='$id_of_user'";
		$rs = mysqli_query($c,$query);
		
 ?>
