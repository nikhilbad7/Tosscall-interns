<?php
require('include/config.inc.php');
require('include/session.inc.php');
require('include/header.inc.php');
require('include/status_updater.php');
$username = $_SESSION['username'];
?>


<html>
<head>
	<script type="text/javascript" src="jq.js"></script>
	<script type="text/javascript" src="jquery.min.js"></script>
</head>
<body>
<?php showNav() ?>
<hr>





Type :<select name="type" id="type">

<?php 
 
$c=mysqli_connect($db_host,$db_username,$db_password,$db_name);

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
 
$c=mysqli_connect($db_host,$db_username,$db_password,$db_name);

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
			$.post('opponent.php',{k3:id},function(data){
				location.reload();
			});
			
		})
	});

</script>
</body>
</html>
