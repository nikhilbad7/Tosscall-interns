<?php 
require('../include/config.inc.php');
require('../include/session.inc.php');
require('../include/testdate.php');
$username = $_SESSION['username'];

//echo $username;
$c=mysqli_connect($db_host,$db_username,$db_password,$db_name);
$query="select * from event where status=1 or status=2 or status=3";
$rs=mysqli_query($c,$query);
if($rs){
	while($r=mysqli_fetch_array($rs))
{
 $currentdt = date('Y-m-d H:i:s');
 $starttime = $r['mergedatetime'];
 $endtime = $r['timeout'];
 if((($starttime <= $currentdt) && ($currentdt <= $endtime)) && $r['status']==2)
 {
 		$query0="Update event set status=3 where id=$r[id]";
 		$rs0=mysqli_query($c,$query0);
 		//if($rs0){echo " changed from 2 to 3";}
 }
 	elseif (($starttime <= $currentdt) && $r['status']==1) 
 	{
 		$query1="Update event set status=0 where id=$r[id]";
 		$rs1=mysqli_query($c,$query1);
 		//if($rs1){echo " changed from 1 to 0 <br>";}
 	}

  elseif (($currentdt >= $endtime) && $r['status']==2) 
 {
 	 	$query2="Update event set status=0 where id=$r[id]";
 	 	//opponent got but discussion never started
 	    $rs2=mysqli_query($c,$query2);
 	    //if($rs2){echo " changed from 2 to 0";}
 }

 elseif (($currentdt >= $endtime) && $r['status']==3) 
 {
 	 	$query3="Update event set status=4 where id=$r[id]";
 	    $rs3=mysqli_query($c,$query3);
 	   //if($rs3){ echo " changed from 3 to 4";}
 }
}



}
?>