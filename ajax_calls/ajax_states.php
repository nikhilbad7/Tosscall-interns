
<?php 
require_once('../config.inc.php');

$conn   =   mysql_connect("localhost","root","");
if ($conn)
{
echo "Conencted Successfully";
}
mysql_select_db('tosscall');
$sql    =   "SELECT name FROM State WHERE status=1;";
$result =   mysql_query($sql);
if (!$result)
{
    die("Could not get data: ".mysql_error());
    exit();

}
while ($row =   mysql_fetch_array($result))
{
 
}
?>