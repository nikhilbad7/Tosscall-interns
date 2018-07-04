<?php 

session_start();
$username=$_SESSION['username'];
$event_id=$_SESSION['event_id'];

if(!isset($_SESSION['username']))
{
echo "<script>window.location='login.php'</script>";
}


$c=mysqli_connect('localhost','root','','tosscall_db');

#$query="select * from live where id=$event_id ";

/*echo $query="UPDATE live
	SET status = 
	CASE 
	  WHEN id == '$event_id' AND user == '$username'
    THEN 0
 	  WHEN id == '$event_id' AND user != '$username'
    THEN 1
 	 ELSE status
	END
	WHERE id  in ($event_id)";*/

$query1="UPDATE live 
	SET status =0 WHERE user='$username'";


$query2="UPDATE live 
	SET status =1 WHERE user!='$username'";

$rs1=mysqli_query($c,$query1);

$rs2=mysqli_query($c,$query2);

if($rs1 && $rs2)
{
	echo"<script>alert('success')</script>";
}