
<?php 
require('../include/config.inc.php');
if(isset($_GET['event_id'])&&isset($_GET['user']))
{
$event_id = $_GET['event_id'];
$user = $_GET['user'];
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