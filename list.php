<?php
require('include/config.inc.php');
require('include/session.inc.php');
require('include/header.inc.php');
require('include/status_updater.php');
$username = $_SESSION['username'];
?>
<html>
    <head>
        <script type="text/javascript" src="jquery.min.js"></script>
    </head>
<body><?php showNav(); ?>
<hr>

<div>
<select id="state_select"><option selected hidden value="">Choose Your State</option></select>
<select id="city_select"><option selected hidden value="">Choose Your City<option></select>
<select id="type_select"><option selected hidden value="">Choose Your Topic</option></select>
<button id="fetchBtn">View</button>
</div>
<div>Upcoming Events</div>
<div><table id="upcoming_event" border="1px">
    <thead>
    <tr>
		<th>Topic</th>
        <th>Initiater</th>
        <th>Accepter</th>
        <th>Start Date</th>
        <th>Start Time</th>
        <th>Notification</th>
    </tr>

</thead>
    <tbody></tbody>
</table>
</div>
    <script>
        var cleanedData = null;
        function fetchData(ajax_page,args)
            {
                $.ajax({
                    async:false,
                    url: ajax_page,
                    method: "POST",
                    data:args,
                    success: function(data){
                        try{
                        cleanedData = JSON.parse(data);
                        }
                        catch(e)
                        {
                            cleanedData = {};
                        }
                    }
                });
                return cleanedData;
            }
        function optionParser(select_element,data,class_value)
        {
            option_str  =   null;
            for(i=0;i<data.length;i++)
                        {
                            option_str  = "<option class='";
                            option_str  += class_value + "'>";
                            option_str  += data[i]['name'];
                            option_str  += "</option>"
                            $(select_element).append(option_str);
                        }

        }
        function printEventDetails(tab_id,status=1)// status = 0 (unavailable), 1 (available),2 (accepted), 3 (live),4 (over)
        {
            var tr_str='';
            var city = $("#city_select").val();
            var type= $("#type_select").val();
            data = fetchData("ajax_calls/ajax_event.php",{'city':city,'eventtype':type,'status':status});
            console.log(data);
            for(i=0;i<data.length;i++)
            {
                tr_str += '<tr>';
                tr_str += '<td>'+data[i]['name1']+' Vs. '+data[i]['name2']+'</td>';
                tr_str += '<td>'+data[i]['init_user']+'</td>';
                tr_str += '<td>'+data[i]['acce_user']+'</td>';
                tr_str += '<td>'+data[i]['date']+'</td>';
                tr_str += '<td>'+data[i]['time']+'</td>';
				tr_str +='<td><button id="notifyBtn_'+data[i]['id']+'" onclick="notifySubscribe('+data[i]['id']+')">Notify Me</button></td>';
                tr_str += '</tr>';
            }
            $(tab_id + " tbody").empty().append(tr_str);
        }
        function getData()
        {
            printEventDetails("#upcoming_event",2);
        }
        function selectChanger(select_element,ajax_page,args={},class_value='')
        {
           parsedData   = fetchData(ajax_page,args);
           if (parsedData != null)
           {
            optionParser(select_element,parsedData,class_value);

           }
        }
		function notifySubscribe(eventId)
		{
			user = getCookie("username");
            fetchData("ajax_calls/ajax_notify.php",{'event_id':eventId,'user':user});
            alert("subscribed");
            console.log("#notifyBtn_"+eventId);
            $("#notifyBtn_"+eventId).prop("disabled",true);
		}
        function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
        function init()
        {
            selectChanger("#state_select","ajax_calls/ajax_states.php");
            $("#state_select").change(function()
            {
                var state = $("#state_select").val();
                $("#city_select").empty();
                selectChanger("#city_select","ajax_calls/ajax_cities.php",{'state': state});
            });
            
            selectChanger("#type_select","ajax_calls/ajax_eventtype.php");
            $("#fetchBtn").click(getData);

        }
        $(document).ready(init);
    </script>
</body> 
</html>