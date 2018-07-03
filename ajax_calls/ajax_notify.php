
<?php 
require('../include/config.inc.php');
require('../include/session.inc.php');
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_REQUEST['event_id'])&&isset($_REQUEST['user']))
{
$event_id = $_REQUEST['event_id'];
$user = $_REQUEST['user'];
$returnArray = [];
$conn   =   mysqli_connect($db_host,$db_username,$db_password,$db_name);
if ($conn)
{
$sql    =   "insert into notification (event_id,user) values('$event_id','$user');";
$result =   mysqli_query($conn,$sql);
if ($result)
{
    echo $result;
    if($returnArray)
    {
    echo json_encode($returnArray);
    }
}
}
}
?>