<?php 
session_start();

$a=$_REQUEST["k1"];
$b=$_REQUEST["k2"];

$c=mysqli_connect('localhost','root','','tosscall');


$s2="select * from event where eventtype_id=$a and city_id=$b and status=1";

$ck2=mysqli_query($c,$s2);

echo"<table>";
echo"<tr>   <td> Name </td><td> Type </td><td> Initiator </td><td> Topic </td><td> Favour </td>
<td> Date </td><td> Time </td> <td></td>     </tr>   ";

while ($r2=mysqli_fetch_array($ck2)) 
{
	echo"<tr> <td> $r2[init_user_id] </td><td> $r2[eventtype_id] </td><td> $r2[topic_id] </td><td>
	 $r2[favour] </td><td> $r2[date] </td><td> $r2[time] </td> 
	<td> <input type='button' id='b2' value='Join'> </td> </tr>   ";
}



 ?>
