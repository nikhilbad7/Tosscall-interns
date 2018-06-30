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
echo "<script>window.location='home.php'</script>"
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
            <div>
            
                <!--Message-->
                <div>

                </div>
                <div>

                </div>

            </div>
        </div>
    </body>
</html>