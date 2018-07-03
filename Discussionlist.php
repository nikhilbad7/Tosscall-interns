<?php
require('include/config.inc.php');
require('include/session.inc.php');
require('include/header.inc.php');
require('include/testdate.php');
$username = $_SESSION['username'];
$current_time=date("H:i:s");
$current_date=date("Y-m-d");
$username=$_SESSION['username'];
?>
<html>
	<head>
		<title>Discussion List</title>
	</head>
	<body>
		<?php showNav(); ?>
		<hr>
		
		<div>
					<?php
					$status_of_user=1;
					$id_of_user=1;
					function ajax_request($status,$id){
							echo "<script>
									var status_of_user=".$status.";" ;
									 echo "var id_of_user =".$id.";";
									echo "var xhttp = new XMLHttpRequest();
									xhttp.onreadystatechange = function() {
										if (this.readyState == 4 && this.status == 200) {
												
    										}
  									};
				 				    xhttp.open('GET', 'statusupdate.php?status='+status_of_user+'&id='+id_of_user, true);
				  					xhttp.send(); 
				  					</script>";
					}
					$c=mysqli_connect($db_host,$db_username,$db_password,$db_name);
					$query1 =" select * from event where (acce_user  IS  NULL) and (status = 1)";
					$rs1=mysqli_query($c,$query1);
					if($rs1){
						while($r=mysqli_fetch_array($rs1)){
						$id_of_user = $r['id'];
						$time= $r['time'];
				  		if ($current_date >= $r['date']) {
				  						if($current_date > $r['date']){
				  							$status_of_user=0; //event dead and discussion never done
				  							ajax_request($status_of_user,$id_of_user);
				  						}
										else{
										if($current_time >= $time){
											$status_of_user=0; //event dead and discussion never done
											ajax_request($status_of_user,$id_of_user);
												  	}
												  }
				  			}
					}
				}
					$query2="select * from event where  (init_user='$username' or acce_user='$username') and status =2 ";
					$rs=mysqli_query($c,$query2);
					if($rs){
						$count =0;
						while($r=mysqli_fetch_array($rs)){
							++$count;
						}
						if($count == 0){
						echo "<h1>No discussions</h1>";
						}
						elseif($count!=0){
							echo "<p>Upcoming Discussions</p>";
					echo "<table border=1><th>Event Type</th><th>Topic</th><th>Favour</th><th>Initiator</th><th>Acceptor</th><th>Date</th><th>Time</th><th>City</th>";
					while($r=mysqli_fetch_array($rs)){
						$id_of_user = $r['id'];
						$time= $r['time'];
						if($current_date<$r['date']){
							$topic1= $r['name1'];
							$topic2= $r['name2'];
							$topic=$topic1." vs ".$topic2;
							echo"<tr><td>$r[eventtype]</td><td>$topic</td><td>$r[favour]</td><td>$r[init_user]</td><td>$r[acce_user]</td><td>$r[date]</td><td>$r[time]</td><td>$r[city]</td></tr>";	
						}
						elseif ($current_date == $r['date']) {
								if($current_time<$time){
									$topic1= $r['name1'];
									$topic2= $r['name2'];
									$topic=$topic1." vs ".$topic2;
									echo"<tr><td>$r[eventtype]</td><td>$topic</td><td>$r[favour]</td><td>$r[init_user]</td><td>$r[acce_user]</td><td>$r[date]</td><td>$r[time]</td><td>$r[city]</td></tr>";
								}
								elseif($current_time >= $time){
									$status_of_user =3; //live-
									ajax_request($status_of_user,$id_of_user);
									header('Location: Discussion.php');
										}												
						}	
					}
				}
					echo "</table>"; }
					
										$query3="select * from event where  (init_user='$username' or acce_user='$username') and status =3 ";
					$rs=mysqli_query($c,$query3);
					if($rs){
						while($r=mysqli_fetch_array($rs)){
						$id_of_user = $r['id'];
						$user_time = $r['time'];
						$endTime = strtotime("+30 minutes", strtotime($user_time));
						$finalTime = date('H:i:s', $endTime);
						if($finalTime <= $current_time){	
				  						$status_of_user =4; //Discussion completed and Time over
				  						ajax_request($status_of_user,$id_of_user);
				  						echo "<script> location.reload() </script>";
				  					}
				  				}
					}
					?>
		</div>
	</body 