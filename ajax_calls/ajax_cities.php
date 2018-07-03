
<?php 
require('../include/config.inc.php');
require('../include/session.inc.php');
if(isset($_GET['state']))
{
$state = $_GET['state'];
$returnArray = [];
$conn   =   mysqli_connect($db_host,$db_username,$db_password,$db_name);
if ($conn)
{
$sql    =   "SELECT name FROM city WHERE status=1 and state='";
$sql    .= $state."';";
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