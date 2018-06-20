<?php 
//require_once('../config.inc.php');
$return_arr =   [];

$conn   =   mysql_connect("localhost","root","");
if ($conn)
{
mysql_select_db('tosscall');
//$sql    =   "SELECT id, name FROM `city` WHERE status=1 AND state_id=2;";
//$sql    =   "SELECT id ,name FROM state WHERE status=1;";
//$sql    =   "SELECT id, name FROM event WHERE status=1;";
$sql    =   "SELECT id, name FROM eventtype WHERE status=1;";
$result =   mysql_query($sql);
if (!$result)
{
    die("Could not get data: ".mysql_error());
    exit();

}
while ($row[] =   mysql_fetch_assoc($result))
{
    $return_arr =   $row;
 
}
if($return_arr)
{
echo json_encode($return_arr);
}
}
?>