<?php 

session_start();
$username=$_SESSION['username'];
$event_id=$_SESSION['event_id'];

if(!isset($_SESSION['username']))
{
echo "<script>window.location='login.php'</script>";
}


$c=mysqli_connect('localhost','root','','tosscall_db');

$query="select * from live where id=$event_id and user='$username'";

$rs2=mysqli_query($c,$query);

	if ($rs2)
 	{
 		$row2=mysqli_fetch_array($rs2);

 		if ($row2['status']==1) 
 		{
 			
 			echo "1";



 			/* echo "
 			<p id='time'></p>
                <textarea rows='value' id='message' cols='value' placeholder='Enter your msg...'></textarea>
                <input type='button' name='b1' class='post' value='Post'>


 			"; */
 		}

 		else
 		{

 			echo "0";

 		}

	}
	?>