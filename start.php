<html>
	<head>
		<title>Start Topic</title>
	</head>
	<body>
		<h1>Welcome to Start Page</h1>
		<form>
			<label>Select Type:</label>&nbsp;&nbsp;&nbsp;&nbsp;
			<select name="selecttype">
				<option value="politics">Politics</option>
				<option value="bollywood">Bollywood</option>
				<option value="hollywood">Hollywood</option>
				<option value="sports">Sports</option>
			</select>
			<br/><br/>
			<label>Topic</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="text" name="first">&nbsp;&nbsp;VS
			<input type="text" name="second"><br/><br/>
			<label>Favour</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="text" name="fav"><br/><br/>
			<label>Select Date</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    		<input type="date" name="dd"><br/><br/>
    		<label>Select Time</label>&nbsp;&nbsp;&nbsp;&nbsp;
    		<select name="time">
    			<?php
    				$i=1;
    				for($i=1;$i<=12;$i++){
    					echo "<option value='$i'>$i</option>";
    				}
    			?>
    		</select>&nbsp;&nbsp;
    		<select name="mode">
    			<option value="am">AM</option>
    			<option value="pm">PM</option>
    		</select><br/><br/>
    		<label>Select State</label>&nbsp;&nbsp;
    		<select id="state">
    		<script type="text/javascript">
    		var handles = ["Andhra Pradesh","Arunachal Pradesh","Assam","Bihar","Chhattisgarh","Dadra and Nagar Haveli","Daman and Diu","Delhi","Goa","Gujarat","Haryana","Himachal Pradesh","Jammu and Kashmir","Jharkhand","Karnataka","Kerala","Madhya Pradesh","Maharashtra","Manipur","Meghalaya","Mizoram","Nagaland","Orissa","Puducherry","Punjab", "Rajasthan","Sikkim","Tamil Nadu","Telangana","Tripura","Uttar Pradesh","Uttarakhand","West Bengal"];
    			var options="";
    			for(i=0;i<handles.length;i++){
    				options+='<option value="' + handles[i] + '">' + handles[i] + '</option>';
    			}
    			document.getElementById('state').innerHTML=options;
    		</script>
    		</select>
    		<br/><br/>
    		<label>Select City</label>&nbsp;&nbsp;&nbsp;
    		<select></select><br/><br/>
    		<input type="submit" value="Submit">
    	</form>
	</body>
</html>