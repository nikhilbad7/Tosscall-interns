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

	    $_SESSION['event_id']=$row['id'];
	    
   
/* echo "<input type='hidden' value='$row[id]' id='t1'>";
 
 $query="select * from live where id=$row[id]";

$rs2=mysqli_query($c,$query);

	if (rs2)
 	{
 		$row2=mysqli_fetch_array($rs);
	}
*/
}

else
{
echo "<script>window.location='home.php'</script>";
}

 ?>


<html>
<head>
	<script type="text/javascript" src="jquery.min.js"></script>
</head>
    <body>
        <style type="text/css">
    
    #cd
    {
        position: fixed;
        top:10px;
        right: 10px;
        background-color: black;
        font-family: impact;
        font-size: 30px;
        color: white;
        height: 6%
    }
        </style>

    <script type="text/javascript">


      
            

    var m=29,s=59;
    
    var x=setInterval(function()
    {
      
     document.getElementById("cd").innerHTML="Time Left : "+m+":"+s;
     s--;

    if(m==0 && s==-1)
     {         
        alert("Discussion Over");
        clearInterval(x);
        clearInterval(y);
     window.location="Home.php";
     }

     if(s==-1)
     {
        s=59;
        m--;
     }

     if(m<=5)
     {
        document.getElementById("cd").style.color='red';
     
     }

    },1000);


     $(document).ready(function(){
            $("body").on("click",".b1",function(){
                var message=$("#message_box").val();
               

            $.post('ajax_calls/ajax_message_reciever.php',{k1:message},function(data){
            	//alert(data);
                //$(".b1").attr("disabled", true); 
               	$("#message_box").val('');
            	
            	});

            $.post('ajax_calls/ajax_live_update.php',{},function(data){
            		//alert(data);


            });

            });
            
        })
    


</script>

<script type="text/javascript">

	var z,s2=59,t=0;

	setInterval(function()
	{
		$.post('ajax_calls/ajax_live_ck.php',{},function(data){
		
			z=data;

		});

	},500);

	
    var y=setInterval(function()
    {
    	 if (z==0) 
	{
        //clearInterval(y);
       // $(".b1").hide();
         $(".b1").attr("disabled", true);
        s2=59,t=0;
        document.getElementById("time").innerHTML="Wait for Your Turn";
    }
     else
     {
     	//$(".b1").show();
     	//$("b1").removeAttr("disabled");

         $(".b1").attr("disabled", false);
     document.getElementById("time").innerHTML="Your Turn [ "+t+":"+s2+" ] " ;
     s2--;

    

     if(s2==0)
     {          
        //clearInterval(y);
        s2=59,t=0;
       // $(".b1").hide();
        $(".b1").attr("disabled", true);
        $.post('ajax_calls/ajax_live_update.php',{},function(data){});
        document.getElementById("time").innerHTML="Wait for Your Turn";

     }
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
    

	setInterval(function()
	{
		$.post('ajax_calls/ajax_msg_fetch.php',{},function(data){
		$("#msg").html(data);
		});

	},1000);


</script>


        
        
        <!--Discussion Panel-->

        <div>
            <!--Discussion Details-->
            <div id="cd"></div>
            <div>
            <?php
            echo "Discussion Topic :<br>";
            echo " $row[eventtype] &nbsp;&nbsp;&nbsp; : &nbsp; ";
            echo "$row[name1] &nbsp;&nbsp; VS &nbsp;&nbsp; $row[name2] <br>";
            echo "$row[init_user] &nbsp;($row[favour]) &nbsp;&nbsp; and &nbsp;&nbsp; 
            $row[acce_user]&nbsp;(against) ";

            ?>    
            </div>

            
            <!--Input Box-->
            <div id="input">
               
                <p id="time"></p>
                <textarea rows="value" id="message_box" cols="value" placeholder="Enter your msg..."></textarea>
                <input type="button" name="b1" class="b1" value="Post">

            	

            </div>
            
            <!--Message Panel-->
            <div>
            
                <!--Message-->
                <p id="msg"></p>

            </div>
        </div>
    </body>
</html>