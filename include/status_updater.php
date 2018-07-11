<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
	setInterval(function()
	{
		$.post('ajax_calls/ajax_status_update.php',{},function(data){
			//console.log(data);
		});

	},5000);
</script>
