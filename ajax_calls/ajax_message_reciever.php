<?php 
session_start();

if(!isset($_SESSION['username']))
{
echo "<script>window.location='login.php'</script>";
}

    $user = $_SESSION['username'];
    $eventId = $_SESSION['event_id'];

	$current_time=date("H:i:s");
	$current_date=date("Y-m-d");

    # $date = $_REQUEST['date'];
    # $time = $_REQUEST['time'];

    $message = $_REQUEST['k1'];

$conn   =   mysqli_connect('localhost','root','','tosscall_db');

if ($conn)
{
echo $sql    =   "INSERT INTO message (event_id,user,message,date,time) VALUES ('$eventId','$user','$message','$current_date','$current_time');";

$result =   mysqli_query($conn,$sql);

if ($result)
{
  	echo "<script>alert(success)</script>";  
}
}
?>