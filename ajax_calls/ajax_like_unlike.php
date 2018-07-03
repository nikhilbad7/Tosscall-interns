
<?php 
require('../include/config.inc.php');
require('../include/session.inc.php');
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_REQUEST['message_id'])&& isset($_REQUEST['date']) && isset($_REQUEST['time']) && isset($_REQUEST['like_status']))
{
    $user = $_SESSION['username'];
    $messageId = $_REQUEST['message_id'];
    $date = $_REQUEST['date'];
    $time = $_REQUEST['time'];
    $likeStatus =   $_REQUEST['like_status'];
$conn   =   mysqli_connect($db_host,$db_username,$db_password,$db_name);

if ($conn)
{
    if ($likeStatus == 0)
    {
  $sql = "INSERT INTO likes (message_id, liker_user, date,time)
  SELECT * FROM (SELECT ".$messageId.",'".$user."','".$date."','".$time."') AS tmp
  WHERE NOT EXISTS (
      SELECT liker_user,message_id FROM likes WHERE liker_user = '".$user."' and message_id = ".$messageId." and status = 1
  ) LIMIT 1;";
    }
    else
    {
        $sql    =   "DELETE FROM likes WHERE liker_user ='".$user."' AND message_id = ".$messageId." and status = 1";

    }
$result =   mysqli_query($conn,$sql);
if ($result)
{
echo json_encode('{"operation_status": 1}');
}
else
{
    echo json_encode('{"operation_status": 0}');
}

}
}
?>