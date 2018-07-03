
<?php 
require('../include/config.inc.php');
require('../include/session.inc.php');
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_REQUEST['city'])&&isset($_REQUEST['eventtype'])&&isset($_REQUEST['status']))
{
$city = $_REQUEST['city'];
$eventtype=$_REQUEST['eventtype'];
$status = $_REQUEST['status'];
$returnArray = [];
$conn   =   mysqli_connect($db_host,$db_username,$db_password,$db_name);
if ($conn)
{
$sql    =   "SELECT id,name1,name2, init_user, acce_user, date, time FROM event WHERE ";
$sql .= "city='".$city."' and ";
$sql .= "eventtype='".$eventtype."' and ";
$sql .= "status='".$status."';";
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