<html>
<body>


Type :<select name="z" id="z">

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



City :<select name="y" id="y">


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

<p id="x"></p>


<script type="text/javascript">
	

$(document).ready(function(){
		$("#b1").click(function(){
			var m=$("#z").val();
			var n=$("#y").val();

			$.post('select2.php',{k1:m,k2:n},function(data){
				$("#x").html(data);
			});
		});
	});


</script>
</body>
</html>
