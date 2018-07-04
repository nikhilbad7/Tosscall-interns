
<?php 
require('../include/config.inc.php');
require('../include/session.inc.php');
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_SESSION['username'])&& isset($_REQUEST['event_id'])&& isset($_REQUEST['date']) && isset($_REQUEST['time'])&& isset($_REQUEST['message']))
{
    $user = $_SESSION['username'];
    $eventId = $_REQUEST['event_id'];
    $date = $_REQUEST['date'];
    $time = $_REQUEST['time'];
    $message = $_REQUEST['message'];
$returnArray = [];
$conn   =   mysqli_connect($db_host,$db_username,$db_password,$db_name);

if ($conn)
{
$sql    =   "INSERT INTO message (event_id,user,message,date,time) VALUES ($eventId,$user,$message,$date,$time);";
$result =   mysqli_query($conn,$sql);
if ($result)
{
    
while ($row[] =   mysqli_fetch_assoc($result))
{
    $returnArray = $row; 
}
if($returnArray)
{
echo json_encode($returnArray);
}

}
}
}
?>