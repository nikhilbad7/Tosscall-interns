<?php 
session_start();
$username=$_SESSION['username'];
if(!isset($_SESSION['username']))
{
echo "<script>window.location='login.php'</script>";
}
$id=$_REQUEST["k3"];
$c=mysqli_connect('localhost','root','','tosscall_db');


$query="Update event  set acce_user='$username', status=2 where id='$id'";

$rs=mysqli_query($c,$query);

?>
