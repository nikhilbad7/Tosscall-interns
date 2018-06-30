
<?php 
require('../include/config.inc.php');
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_REQUEST['event_id'])&& isset($_REQUEST['date_time']))
{
    //$user = $_SESSION['username'];
    $user = 'poonam';
    $eventId = $_REQUEST['event_id'];
    $dateTime = $_REQUEST['date_time'];
$returnArray = [];
$conn   =   mysqli_connect($db_host,$db_username,$db_password,$db_name);

if ($conn)
{
$sql    =   "SELECT id, user, message, date, time FROM message WHERE status=1 and event_id=";
$sql    .= $eventId." and concat(date,' ',time) < ";
$sql    .= "'".$dateTime."' and not user =";
$sql    .= "'".$user."' ORDER BY date DESC ,time DESC;";
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