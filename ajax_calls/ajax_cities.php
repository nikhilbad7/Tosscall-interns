
<?php 
require_once('../config.inc.php');
if(isset($_GET['state']))
{
$state = $_GET['state'];
$returnArray = [];
$conn   =   mysql_connect("localhost","root","rut@localhost");
if ($conn)
{

mysql_select_db('tosscall_db');
$sql    =   "SELECT name FROM city WHERE status=1 and state='";
$sql    .= $state."';";
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