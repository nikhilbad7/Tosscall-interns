<?php 
require('../include/config.inc.php');
$notAllowed = ["status","*"];
if(isset($_POST['req']))
{
    $params = $_POST;
    $_POST['data'] = 
    switch($params['req'])
    {
        case 'state':
                        $query = "SELECT name from "

        break;
        case 'city':
        break;
        case 'event':
        break;
        case 'eventtype':
        break;
    }
}
function dataValidater($str)
{
    if()
    {
        //
        return TRUE;        
    }
    return FALSE;
}
function queryMaker($params_data)
{
    $query ='';
    return $query;
}

function fetchDataFromServer($query)
{
    $resultJson ={};
    $conn   =   mysql_connect($db_host,$db_username,$db_password);
    if ($conn)
    {
        mysql_select_db($db_name);
        
        $result =   mysql_query($sql);
        if ($result)
        {
            while ($row[] =   mysql_fetch_assoc($result))
            {
                $returnJson = $row; 
            }
        }
    }
    return json_encode($resultJson);
}
?>_POST$conn   =   mysql_connect($db_host,$db_username,$db_password);