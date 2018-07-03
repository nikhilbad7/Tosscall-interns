<?php
require('include/config.inc.php');
require('include/session.inc.php');
require('include/header.inc.php');
require('include/testdate.php');
$username = $_SESSION['username'];
$current_date=date("Y-m-d");
$NewDate=date('Y-m-d', strtotime("+7 days"));
?>
<html>
	<head>
		<title>Start Topic</title>
	</head>
	<body>
		<?php showNav(); ?>
		<?php
			$msg=array();
			if(isset($_POST['initiate']))
			{		$i=0;
				if(empty($_POST['selecttype']) || empty($_POST['first']) || empty($_POST['second'])|| empty($_POST['favour']) || empty($_POST['dd']) || empty($_POST['t']) || empty($_POST['selectedstate']) ||  empty($_POST['selectedcity']))
				{
					$msg[$i]="Please full fill all requirement";
					++$i;
				}
					$selectedtype = $_POST['selecttype'];
					$topic1 = $_POST['first'];
					$topic2 = $_POST['second'];
    				$c=mysqli_connect($db_host,$db_username,$db_passsord,$db_name);
    				$query = "insert into topic (name1,name2) values ('$topic1','$topic2')";
    				$rs = mysqli_query($c,$query);
					$favour = $_POST['favour'];
					$date = $_POST['dd'];
					$time = $_POST['t'];
					//$timeout = strtotime("+30 minutes", strtotime("$time"));
					$combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));

					$timeout = date('Y-m-d H:i:s', strtotime("+30 minutes", strtotime("$combinedDT")));


					$state = $_POST['selectedstate'];
					$city = $_POST['selectedcity'];
					$c=mysqli_connect($db_host,$db_username,$db_passsord,$db_name);
    				$query = "insert into  event (name1,name2,eventtype,favour,date,time,init_user,city,mergedatetime,timeout) values ('$topic1','$topic2','$selectedtype','$favour','$date','$time','$username','$city','$combinedDT','$timeout') ";
    				
    				$rs = mysqli_query($c,$query);
    				if($rs){
    					echo "<script>alert('inserted')</script>";
    					echo "<script>window.location='Home.php'</script>";
    				}
    				else{
    					echo "<script>alert('error in inserting')</script>";
    				}
			}
		?>
		<h1>Welcome to Start Page</h1>
		<form method="post">
			<label>Select Type:</label>&nbsp;&nbsp;&nbsp;&nbsp;
			<select name="selecttype" >
				<?php
    				$c=mysqli_connect($db_host,$db_username,$db_passsord,$db_name);
    				$query = "select * from eventtype";
    				$rs = mysqli_query($c,$query);
    				while($row=mysqli_fetch_array($rs))
					{
		
						echo "<option value='$row[name]'>$row[name]</option>";	
					}
    			?>

				
			</select>
			<br/><br/>
			<label>Topic</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="text" name="first" id="fir" onfocus="onenter()" onfocusout="onleave(1)">&nbsp;&nbsp;VS
			<input type="text" name="second" id="sec" onfocus="onenter()" onfocusout="onleave(2)"> &nbsp;&nbsp;&nbsp;
			<input type="button" value="Done" onclick="topicdecided()">
			<br/><br/>
			<label>Favour</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<select id="favour" name="favour"></select>
				<script>
					function currentdate(){
						//console.log("nikhil");
					var current_date = "<?php echo $current_date;?>";
					var afterweekdate = "<?php echo $NewDate;?>";
					
					//console.log(current_date);
					//return current_date;
					document.getElementById('date').setAttribute('min',current_date);
					document.getElementById('date').setAttribute('max',afterweekdate);

					}
					function onenter(){
							document.getElementById("fir").style.color = "green";
					}
					function onleave(n){
						if(n==1){
							var topic1= document.getElementById("fir").value;
							var length1 = topic1.length;
							if(length1==0){
								alert("please fill the topic1");
							}
						}
						if(n==2){
							var topic2= document.getElementById("sec").value;
							var length2 = topic2.length;
							if(length2==0){
								alert("please fill the topic2");
							}
						}
					}
					var count=1;
					function topicdecided(){
					
					if(count==1){
					var first=document.getElementById('fir').value;
					var second=document.getElementById('sec').value;
					var x = document.getElementById("favour");
  				    var option1 = document.createElement("option");
  				    option1.text = first;
  				    x.add(option1);
  				    var option2 = document.createElement("option");
  				    option2.text = second;
  				    x.add(option2);
  				}
  				
  				++count;
				}
				</script>
			<br/><br/>
			<label>Select Date</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		<input type="date" id = "date" name="dd" min="" max="" onclick="currentdate()" ><br/><br/>
    		<label>Select Time</label>&nbsp;&nbsp;&nbsp;&nbsp;
    		<input type="time" name="t"><br/><br/>
    		<label>Select State</label>&nbsp;&nbsp;
    		<select id="stateselected" onchange="mystate()" name='selectedstate'>
    			<?php
    				$c=mysqli_connect('localhost','root','','tosscall_db');
    				$query = "select * from state";
    				$rs = mysqli_query($c,$query);
    				while($row=mysqli_fetch_array($rs))
					{
		
						echo "<option value='$row[name]'>$row[name]</option>";	
					}
    			?>
    		</select>
    		<br/><br/>
    		<label>Select City</label>&nbsp;&nbsp;&nbsp;
    		<select id="selectedcity" name="selectedcity">
    		<script type="text/javascript">
    			function mystate(){
    				var state= document.getElementById("stateselected").value;
    				//console.log(state);
    				var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
          					
							options="";
							options += '<option value="' + this.responseText + '">' + this.responseText + '</option>';

							document.getElementById("selectedcity").innerHTML= options;
    						}
  						};
 				    xhttp.open("GET", "statefetch.php?state="+state, true);
  					xhttp.send();

    			}
    		</script>
    		</select><br/><br/>
    		<!--<input type="datetime-local" name="dt"> -->
    		<input type="submit" value="Submit"  name="initiate">
    	</form>
	</body>
</html>