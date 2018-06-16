<<<<<<< HEAD
<html>
<body>


Type :<select name="z">

<?php 
 
$c=mysqli_connect('localhost','root','','tosscall');

$s="select * from topic";

$ck=mysqli_query($c,$s);

while($r=mysqli_fetch_array($ck))
{
	echo"<option value=$r[name]>
	       $r[name]
	     </option>";
 
}
?>
</select>


City :<select name="y">


<?php 
 
$c=mysqli_connect('localhost','root','','tosscall');

$s1="select * from city ";

$ck1=mysqli_query($c,$s1);

while($r1=mysqli_fetch_array($ck1))
{
	echo"<option value=$r1[name]>
	       $r1[name]
	     </option>";
 
}
?>
</select>


<?php 

$s2="select * from event where eventtype_id=$r[name] and city_id=$r1[name] and status=1";

$ck2=mysqli_query($c,$s2);

echo"<table>";
echo"<tr>   <td> Name </td><td> Type </td><td> Initiator </td><td> Topic </td><td> Favour </td>
<td> Date </td><td> Time </td>     </tr>   ";

while ($r2=mysqli_fetch_array($ck2)) 
{
	echo"<tr> <td> $r2[init_user_id] </td><td> $r2[eventtype_id] </td><td> $r2[topic_id] </td><td>
	 $r2[favour] </td><td> $r2[date] </td><td> $r2[time] </td> 
	<td> <input type='button' id='b1' value='Select'> </td> </tr>   ";
}



 ?>
=======
<html>
<body>


Type :<select name="z">

<?php 
 
$c=mysqli_connect('localhost','root','','tosscall');

$s="select * from topic";

$ck=mysqli_query($c,$s);

while($r=mysqli_fetch_array($ck))
{
	echo"<option value=$r[name]>
	       $r[name]
	     </option>";
 
}
?>
</select>


City :<select name="y">


<?php 
 
$c=mysqli_connect('localhost','root','','tosscall');

$s1="select * from city ";

$ck1=mysqli_query($c,$s1);

while($r1=mysqli_fetch_array($ck1))
{
	echo"<option value=$r1[name]>
	       $r1[name]
	     </option>";
 
}
?>
</select>


<?php 

$s2="select * from event where eventtype_id=$r[name] and city_id=$r1[name] and status=1";

$ck2=mysqli_query($c,$s2);

echo"<table>";
echo"<tr>   <td> Name </td><td> Type </td><td> Initiator </td><td> Topic </td><td> Favour </td>
<td> Date </td><td> Time </td>     </tr>   ";

while ($r2=mysqli_fetch_array($ck2)) 
{
	echo"<tr> <td> $r2[init_user_id] </td><td> $r2[eventtype_id] </td><td> $r2[topic_id] </td><td>
	 $r2[favour] </td><td> $r2[date] </td><td> $r2[time] </td> 
	<td> <input type='button' id='b1' value='Select'> </td> </tr>   ";
}



 ?>
>>>>>>> 78b0cc000058692af7938fc8d901102c1e5c19ee
