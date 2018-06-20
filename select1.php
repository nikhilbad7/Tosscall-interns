<?php
session_start();
$username=$_SESSION['username'];
if(!isset($_SESSION['username']))
{
echo "<script>window.location='login.php'</script>";
}

?>


<html>
<head>
	<script type="text/javascript" src="jq.js"></script>
</head>
<body>
	<ul>
			<li><a href="start.php">Start</a></li>
			<!--<li><a href="select1.php">Select</a></li>-->
			<li><a href="#">Watch</a></li>
			<li><a href="List.php">List</a></li>
			<li><a href="#">Notification</a></li>
			<li><a href="#">MyDiscussion</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
<hr>





Type :<select name="type" id="type">

<?php 
 
$c=mysqli_connect('localhost','root','','tosscall_db');

$query="select * from eventtype";

$rs=mysqli_query($c,$query);

while($r=mysqli_fetch_array($rs))
{
	echo"<option value='$r[name]'>
	       $r[name]
	     </option>";
 
}
?>
</select>



City :<select name="city" id="city">


<?php 
 
$c=mysqli_connect('localhost','root','','tosscall_db');

$s1="select * from city ";

$ck1=mysqli_query($c,$s1);

while($r1=mysqli_fetch_array($ck1))
{
	echo"<option value='$r1[name]'>
	       $r1[name]
	     </option>";

}
?>
</select>

<input type="button" name="b1" id="b1" value="Show">

<div id="x"></div>


<script type="text/javascript">
	

$(document).ready(function(){
		$("#b1").click(function(){
			var type=$("#type").val();
			var city=$("#city").val();
			
			$.post('select2.php',{k1:type,k2:city},function(data){
				$("#x").html(data);
			});
		});
	});


</script>
</body>
</html>
