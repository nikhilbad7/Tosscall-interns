<?php
require('include/config.inc.php');
require('include/session.inc.php');
require('include/header.inc.php');
$username = $_SESSION['username'];
?>
<html>
	<head>
		<title>Notification</title>
	</head>
	<body>
		<?php showNav(); ?>
		<hr>
		<table border="1">
		<th>  Initiator </th>
		<th> Acceptor </th>
		<th> Type </th>
		<th> Topic</th>
		<th> Favour </th>
		<th> Date </th>
		<th> Time </th>
	    <th>Join Now</th>
	    <?php
	    	$c=mysqli_connect($db_host,$db_username,$db_password,$db_name);
	    	$query = " select * from notification where user='$username'";
	    	$result =   mysqli_query($c,$query);
	    	if($result){
	    		while($r=mysqli_fetch_array($result)){
	    			$eventid= $r['event_id'];
	    			$q = "select * from event where id='$eventid' and status=2";
	    			$rs =   mysqli_query($c,$q);
	    			if($rs){
	    				while($row=mysqli_fetch_array($rs)){
	    					$topic1= $row['name1'];
							$topic2= $row['name2'];
							$topic=$topic1." vs ".$topic2;
	    					echo "<tr><td>$row[init_user]</td><td>$row[acce_user]</td><td>$row[eventtype]</td><td>$topic</td><td> $row[favour] </td><td class='date'> $row[date] </td><td class='time'> $row[time] </td><td> <input type='button'  id=$row[id] value='Join'  class='join'> </td> </tr>   ";
	    				}
	    			}
	    		}
	    		echo "</table>";
	    	}
	    ?>
		</table>
	</body>
</html>