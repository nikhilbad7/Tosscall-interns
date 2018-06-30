<?php
session_start();
$username=$_SESSION['username'];
if(!isset($_SESSION['username']))
{
echo "<script>window.location='login.php'</script>";
}


$c=mysqli_connect('localhost','root','','tosscall_db');

$query="select * from event where ((init_user='$username') or (acce_user='$username')) and (status=3)";

$rs=mysqli_query($c,$query);

if ($rs) 
{
    $row=mysqli_fetch_array($rs);

    if ($row['favour']=$row['name1']) 
    {
        $against=$row['name2'];
    }
    else
    {
        $against=$row['name1'];
    }
}

else
{
echo "<script>window.location='home.php'</script>";
}

?>


<html>
    <body>
        <style type="text/css">
    
    #msg
    {
        position: fixed;
        top:10px;
        right: 10px;
        background-color: black;
        font-family: impact;
        font-size: 30px;
        color: white;
        height: 10%
    }
        </style>

    <script type="text/javascript">
            

    var m=29,s=59,s2=59,t=0;
    
    var x=setInterval(function()
    {
      
     document.getElementById("msg").innerHTML="Time Left : "+m+":"+s;
     s--;

     if(m==0 && s==-1)
     {         
        alert("Discussion Over");
        clearInterval(x);
        window.location="Home.php";
        
     }

     if(s==-1)
     {
        s=59;
        m--;
     }


     if(m<=5)
     {
        document.getElementById("msg").style.color='red';
     
     }

    },1000);



    var y=setInterval(function()
    {
      
     document.getElementById("time").innerHTML="Your Turn [ "+t+":"+s2+" ] " ;
     s--;

     
     if(s2==0)
     {          
        clearInterval(y);
        document.getElementById("time").innerHTML="Wait for Your Turn";

     }


    },1000);



   
   /* window.onload = function() 
    {
    window.setTimeout(setDisabled, 60000);
    }


    function setDisabled() 
    {
    document.getElementById('yourButton').disabled = false;
    } */
    


        </script>
        
        <!--Discussion Panel-->

        <div>
            <!--Discussion Details-->
            <div id="msg"></div>
            <div>
            <?php
            echo "Discussion Topic :<br>";
            echo " $row[eventtype] (&nbsp)(&nbsp)(&nbsp) : (&nbsp) ";
            echo "$row[name1] (&nbsp)(&nbsp) VS (&nbsp)(&nbsp) $row[name2] <br>";
            echo "$row[init_user](&nbsp)($row[favour]) (&nbsp)(&nbsp) and (&nbsp)(&nbsp) 
            $row[acce_user](&nbsp)($against) ";

            ?>    
            </div>

            
            <!--Input Box-->
            <div id="input">
                <p id="time"></p>
                <textarea rows="value" cols="value" placeholder="Enter your msg..."></textarea>
                <input type="button" name="b1" value="Post">

            </div>
            
            <!--Message Panel-->
    <div id="message-panel">
    <!--Message-->

</div>
        </div>
        <script type="text/javascript" src="jquery.min.js"></script>
    <script>
        var cleanedData = null;
        function fetchData(ajax_page,args)
            {
                $.ajax({
                    async:false,
                    url: ajax_page,
                    type:"post",
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
            function currentDate()
            {
                var today = new Date();
                return(today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate());
            }
            function currentTime()
            {
                var today = new Date();
                return(today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds());
            }
            function messageFetcher(event)
            {
               a= fetchData("ajax_calls/ajax_messages.php",{'event_id':event,'date_time':currentDate()+''+currentTime()});
                messageParser(a);
            }
            function messageParser(data)
            {
                message_panel = $("#message-panel");
                for(i=0;i<data.length;i++)
                {
                    var like_status = likeChecker(data[i]['id']);
                    _str = '<div id='+data[i]['id']+' class="message-row">';
                    _str += '<div class="user">'+data[i]['user']+': </div>';
                    _str += '<div class="message">'+data[i]['message']+'</div>';
                    _str += '<button class="like" onclick="like_unlike(';
                    if (like_status==1)
                    {
                    _str += data[i]['id']+','+like_status+')">Unlike</button>';

                    }
                    else
                    {
                        _str += data[i]['id']+','+like_status+')">Like</button>';
                    }
                    _str += '</div>';
                    message_panel.append(_str);
                    likesParser(data[i]['id']);
                }
                
               
            }
            function like_unlike(messageId,like_status)
            {
                result = fetchData("ajax_calls/ajax_like_unlike.php",{'message_id':messageId,'like_status':like_status,'date':currentDate(),'time':currentTime});
                if (JSON.parse(result)['operation_status'])
                {

                    if ($("#message-panel #"+messageId+" .like").html() == 'Like')
                    {
                        $("#message-panel #"+messageId+" .like").html('Unlike');
                        $("#message-panel #"+messageId+" .like").attr('onclick','like_unlike('+messageId+',1)');

                    }
                    else
                    {
                        $("#message-panel #"+messageId+" .like").html('Like');
                        $("#message-panel #"+messageId+" .like").attr('onclick','like_unlike('+messageId+',0)');
                    }
                }
                likesParser(messageId);
            }
            function likeChecker(messageId)
            {
                
                result = fetchData("ajax_calls/ajax_liked_or_not.php",{'message_id':messageId});
                return(JSON.parse(result)['liked']);
            }
            function likesParser(messageId)
            {
                data = fetchData("ajax_calls/ajax_likes.php",{'message_id':messageId});
               currentNode = $("#message-panel #"+messageId);
               if(currentNode.find(".like-count").length >0)
               {
                   currentNode.find(".like-count").html(data[0]['count']);
               }
               else
               {
                _str = '<div class="like-count">'+data[0]['count']+'</div>';
                currentNode.append(_str);
               }
            }
            function messageSender(message)
            {
                currentDate = currentDate();
                currentTime = currentTime();
                if((message != null) || (message != ''))
                {
                    
                fetchData("ajax_calls/ajax_messages_receiver.php",{'event_id':event,'date':currentDate(),'time':currentTime(),'message':message});
                }
            }
            function init()
            {
                messageFetcher(1);
            }
            $(document).ready(init);
            </script>
    </body>
</html>