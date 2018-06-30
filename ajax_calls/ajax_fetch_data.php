<?php 
require('../include/config.inc.php');
$return_arr =   [];

$conn   =   mysqli_connect($db_host,$db_username,$db_password,$db_name);
if ($conn)
{
$sql    =   "SELECT id, name FROM eventtype WHERE status=1;";
$result =   mysqli_query($conn,$sql);
if (!$result)
{
    die("Could not get data: ".mysqli_error());
    exit();

}
while ($row[] =   mysqli_fetch_assoc($result))
{
    $return_arr =   $row;
 
}
if($return_arr)
{
echo json_encode($return_arr);
}
}
?>