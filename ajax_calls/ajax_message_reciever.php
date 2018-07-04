<?php 
require('../include/config.inc.php');
require('../include/session.inc.php');
$username = $_SESSION['username'];
if($_SERVER['REQUEST_METHOD'] === 'POST')
{    $user = $_SESSION['username'];
    $eventId = $_SESSION['event_id'];
	$current_time=date("H:i:s");
	$current_date=date("Y-m-d");
    $message = $_REQUEST['k1'];
    $conn   =   mysqli_connect($db_host,$db_username,$db_password,$db_name);
    if ($conn)
    {
        $sql    =   "INSERT INTO message (event_id,user,message,date,time) VALUES ('$eventId','$user','$message','$current_date','$current_time');";
        $result =   mysqli_query($conn,$sql);
    }
}
?>