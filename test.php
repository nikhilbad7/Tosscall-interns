<?php
require('include/testdate.php');
$current_time=date("H:i:s");
$current_date=date("Y-m-d");

$combinedDT = date('Y-m-d H:i:s', strtotime("$current_date $current_time"));
echo $combinedDT;
for($i=0;$i<$combinedDT.length;$i++){
echo $combinedDT[$i];
}
?>