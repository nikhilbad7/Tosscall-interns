<?php
session_start();
$username=$_SESSION['username'];
?>
<html>
	<head>
		<title>Start Topic</title>
	</head>
	<body>
		<ul>
			<!--<li><a href="start.php">Start</a></li>-->
			<li><a href="select1.php">Select</a></li>
			<li><a href="#">Watch</a></li>
			<li><a href="List.php">List</a></li>
			<li><a href="#">Notification</a></li>
			<li><a href="#">MyDiscussion</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
		<?php
			if(isset($_POST['initiate']))
			{
					$selectedtype = $_POST['selecttype'];
					$topic1 = $_POST['first'];
					$topic2 = $_POST['second'];
    				$c=mysqli_connect('localhost','root','','tosscall_db');
    				$query = "insert into topic (name1,name2) values ('$topic1','$topic2')";
    				$rs = mysqli_query($c,$query);
					$favour = $_POST['favour'];
					$date = $_POST['dd'];
					$time = $_POST['t'];
					$state = $_POST['selectedstate'];
					$city = $_POST['selectedcity'];
					$c=mysqli_connect('localhost','root','','tosscall_db');
    				$query = "insert into  event (name1,name2,eventtype,favour,date,time,init_user,city) values ('$topic1','$topic2','$selectedtype','$favour','$date','$time','$username','$city') ";
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
    				$c=mysqli_connect('localhost','root','','tosscall_db');
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
			<input type="text" name="first" id="fir">&nbsp;&nbsp;VS
			<input type="text" name="second" id="sec"> &nbsp;&nbsp;&nbsp;
			<input type="button" value="Done" onclick="topicdecided()">
			<br/><br/>
			<label>Favour</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<select id="favour" name="favour"></select>
				<script>
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
    		<input type="date" name="dd"><br/><br/>
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
    		<input type="submit" value="Submit" name="initiate">
    	</form>
	</body>
</html>