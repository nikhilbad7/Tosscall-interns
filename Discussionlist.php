<?php
session_start();
require('include/testdate.php');
$current_time=date("H:i:s");
$current_date=date("Y-m-d");
$username=$_SESSION['username'];

if(!isset($_SESSION['username']))
{
echo "<script>window.location='login.php'</script>";
}
?>
<html>
	<head>
		<title>Discussion List</title>
	</head>
	<body>
		<ul>
			<li><a href="start.php">Start</a></li>
			<li><a href="Home.php">Home</a></li>
			<li><a href="Watch.php">Watch</a></li>
			<li><a href="List.php">List</a></li>
			<li><a href="#">Notification</a></li>
			<li><a href="select1.php">Select</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
		<hr>
		<p>Upcoming Discussions</p>
		<div>
			
					<?php
					
					$c=mysqli_connect('localhost','root','','tosscall_db');
					$q="select * from event where  (init_user='$username' or acce_user='$username') and status =2 ";
					
					$rs=mysqli_query($c,$q);
					if($rs){
					echo "<table border=1><th>Event Type</th><th>Topic</th><th>Favour</th><th>Initiator</th><th>Acceptor</th><th>Date</th><th>Time</th><th>City</th>";
					while($r=mysqli_fetch_array($rs)){
						if($current_date<$r['date']){
							$topic1= $r['name1'];
							$topic2= $r['name2'];
							$topic=$topic1." vs ".$topic2;
							echo"<tr><td>$r[eventtype]</td><td>$topic</td><td>$r[favour]</td><td>$r[init_user]</td><td>$r[acce_user]</td><td>$r[date]</td><td>$r[time]</td><td>$r[city]</td></tr>";
							
						}
						elseif ($current_date == $r['date']) {
								$time= $r['time'];
								if($current_time<$time){
									$topic1= $r['name1'];
									$topic2= $r['name2'];
									$topic=$topic1." vs ".$topic2;
									echo"<tr><td>$r[eventtype]</td><td>$topic</td><td>$r[favour]</td><td>$r[init_user]</td><td>$r[acce_user]</td><td>$r[date]</td><td>$r[time]</td><td>$r[city]</td></tr>";
								}
						}
					}
					echo "</table>"; }
					else{
						echo "not executed";
					}
					

					?>
		</div>
	</body