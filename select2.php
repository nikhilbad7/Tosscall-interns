<?php 
session_start();
$username=$_SESSION['username'];
if(!isset($_SESSION['username']))
{
echo "<script>window.location='login.php'</script>";
}
$type=$_REQUEST["k1"];
$city=$_REQUEST["k2"];
$c=mysqli_connect('localhost','root','','tosscall_db');


$query="select * from event where eventtype='$type' and city='$city' and init_user!='$username' and status=1";

$rs=mysqli_query($c,$query);
if($rs){

echo"<table>";
echo"<th>  Initiator </th><th> Type </th><th> Topic1 </th><th> Topic2 </th><th> Favour </th>
<th> Date </th><th> Time </th> <th>Join Now</th>";

while ($row=mysqli_fetch_array($rs)) 
{
	echo"<tr> <td class='initiator'> $row[init_user] </td><td> $row[eventtype] </td><td> $row[name1] </td><td>$row[name2]</td>
	 <td> $row[favour] </td><td class='date'> $row[date] </td><td class='time'> $row[time] </td> 
	<td> <input type='button'  id=$row[id] value='Join'  class='join'> </td> </tr>   ";
}
echo "</table>";
}



 ?>
