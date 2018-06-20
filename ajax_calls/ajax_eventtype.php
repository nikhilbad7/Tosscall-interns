
<?php 
require_once('../config.inc.php');
$returnArray = [];
$conn   =   mysql_connect("localhost","root","rut@localhost");
if ($conn)
{

mysql_select_db('tosscall_db');
$sql    =   "SELECT name FROM eventtype WHERE status=1;";
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
?>