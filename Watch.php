<html>
    <head>
        <script type="text/javascript" src="jquery.min.js"></script>
    </head>
<body>
    <ul>
            <li><a href="start.php">Start</a></li>
            <li><a href="Home.php">Home</a></li>
            <li><a href="select1.php">Select</a></li>
            <li><a href="List.php">List</a></li>
            <li><a href="#">Notification</a></li>
            <li><a href="Discussionlist.php">MyDiscussion</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
<hr>

<div>
<select id="state_select"><option selected hidden value="">Choose Your State</option></select>
<select id="city_select"><option selected hidden value="">Choose Your City<option></select>
<select id="type_select"><option selected hidden value="">Choose Your Topic</option></select>
<button id="fetchBtn">View</button>
</div>
<div>Live</div>
<div><table id="live_event" border="1px">
    <thead>
    <tr>
        <th>Topic</th>
        <th>Initiater</th>
        <th>Accepter</th>
        <th>Start Date</th>
        <th>Start Time</th>
    </tr>

</thead>
    <tbody></tbody>
</table>
</div>
<div>Over</div>
<div><table id="over_event" border="1px">
        <thead>
                <tr>
                    <th>Topic</th>
                    <th>Initiater</th>
                    <th>Accepter</th>
                    <th>Start Date</th>
                    <th>Start Time</th>
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
                    Type: "json",
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
            for(i=0;i<data.length;i++)
            {
                tr_str += '<tr>';
                tr_str += '<td>'+data[i]['name1']+' Vs. '+data[i]['name2']+'</td>';
                tr_str += '<td>'+data[i]['init_user']+'</td>';
                tr_str += '<td>'+data[i]['acce_user']+'</td>';
                tr_str += '<td>'+data[i]['date']+'</td>';
                tr_str += '<td>'+data[i]['time']+'</td>';
                tr_str += '</tr>';
            }
            $(tab_id + " tbody").empty().append(tr_str);
        }
        function getData()
        {
            printEventDetails("#live_event",3);
            printEventDetails("#over_event",4);
        }
        function selectChanger(select_element,ajax_page,args={},class_value='')
        {
           parsedData   = fetchData(ajax_page,args);
           if (parsedData != null)
           {
            optionParser(select_element,parsedData,class_value);

           }
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