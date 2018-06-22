
<?php 
require('../include/config.inc.php');
if(isset($_GET['city'])&&isset($_GET['eventtype'])&&isset($_GET['status']))
{
$city = $_GET['city'];
$eventtype=$_GET['eventtype'];
$status = $_GET['status'];
$returnArray = [];
$conn   =   mysqli_connect($db_host,$db_username,$db_password,$db_name);
if ($conn)
{
$sql    =   "SELECT id,topic, init_user, acce_user, date, time FROM event WHERE ";
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