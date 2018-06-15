<html>
	<head>
		<title>List</title>
	</head>
	<body>
		<h1 align="center">List page</h1>
		<form>
		<label>Select Type</label>&nbsp;&nbsp;&nbsp;
		<select>
				<option value="politics">Politics</option>
				<option value="bollywood">Bollywood</option>
				<option value="hollywood">Hollywood</option>
				<option value="sports">Sports</option>
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
    	<hr>
    	<table width="500px">
    		<th>Type</th>
    		<th>Topic</th>
    		<th>Your Name</th>
    		<th>Opponent</th>
    		<th>Date</th>
    		<th>Time</th>
    		<th>Notification</th>
    	</table>
	</body>
</html>