
<?php 
require('../include/config.inc.php');
require('../include/session.inc.php');
$result =0;
$liked = 0;
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_REQUEST['message_id']))
{
    $user = $_SESSION['username'];
    $messageId = $_REQUEST['message_id'];
$conn   =   mysqli_connect($db_host,$db_username,$db_password,$db_name);
  $sql = "SELECT id FROM likes WHERE message_id =$messageId AND liker_user='".$user."' LIMIT 1;";
if($result =   mysqli_query($conn,$sql))
{
    if (mysqli_num_rows($result) != 0)
    {
        $liked = 1;
    }
}

}
echo json_encode('{"liked" :'.$liked.'}');
?>