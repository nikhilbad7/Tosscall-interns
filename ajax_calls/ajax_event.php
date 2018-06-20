
<?php 
require_once('../config.inc.php');
if(isset($_GET['city'])&&isset($_GET['eventtype'])&&isset($_GET['status']))
{
$city = $_GET['city'];
$eventtype=$_GET['eventtype'];
$status = $_GET['status'];
$returnArray = [];
$conn   =   mysql_connect("localhost","root","rut@localhost");
if ($conn)
{

mysql_select_db('tosscall_db');
$sql    =   "SELECT topic, init_user, acce_user, date, time FROM event WHERE ";
$sql .= "city='".$city."' and ";
$sql .= "eventtype='".$eventtype."' and ";
$sql .= "status='".$status."';";
$result =   mysql_query($sql);
if ($result)
{
    
while ($row[] =   mysql_fetch_assoc($result))
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