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
	<script type="text/javascript" src="jquery.min.js"></script>
</head>
<body>
	<ul>
			<li><a href="start.php">Start</a></li>
			<li><a href="Home.php">Home</a></li>
			<li><a href="Watch.php">Watch</a></li>
			<li><a href="List.php">List</a></li>
			<li><a href="#">Notification</a></li>
			<li><a href="Discussionlist.php">MyDiscussion</a></li>
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

<div id="x">
	<!--<script type="text/javascript">
		function join(){
		alert($(this).id);	
	var initiator = $(this).closest('tr').find('.initiator').text();
	var date = $(this).closest('tr').find('.date').text();
	var time = $(this).closest('tr').find('.time').text();
	alert(initiator);
	alert(date);
	alert(time); 
} 
		
	</script> -->
</div>


<script type="text/javascript">
	

$(document).ready(function(){
		$("#b1").click(function(){
			var type=$("#type").val();
			var city=$("#city").val();
			
			$.post('select2.php',{k1:type,k2:city},function(data){
				
				$("#x").html(data);
			});
		});


		$("body").on("click",".join",function(){
			var id=	$(this).attr("id");
			//var initiator = $(this).attr('init_user');
			//var date
			$.post('opponent.php',{k3:id},function(data){
				location.reload();
				//$("#x").html(data);
			});
			
		})
	});

	/*function join(this){
	var initiator = $(this).closest('tr').find('.initiator').text();
	var date = $(this).closest('tr').find('.date').text();
	var time = $(this).closest('tr').find('.time').text();
	alert(initiator);
	alert(date);
	alert(time);
} */
</script>
</body>
</html>
