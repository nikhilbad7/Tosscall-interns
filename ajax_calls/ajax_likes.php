
<?php 
require('../include/config.inc.php');
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_REQUEST['message_id']))
{
    $user = $_SESSION['username'];
    $messageId = $_REQUEST['message_id'];
$returnArray = [];
$conn   =   mysqli_connect($db_host,$db_username,$db_password,$db_name);

if ($conn)
{
$sql    =   "SELECT message_id,liker_user,count(liker_user) as count FROM likes WHERE status=1 and message_id=$messageId;";
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