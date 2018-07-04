<?php 
$conn   =   mysql_connect("localhost","root","rut@localhost");
if ($conn)
{

mysql_select_db('tosscall_db');
$data = '{
    "AP":"Andhra Pradesh",
    "AR":"Arunachal Pradesh",
    "AS":"Assam",
    "BR":"Bihar",
    "CG":"Chhattisgarh",
    "Chandigarh":"Chandigarh",
    "DN":"Dadra and Nagar Haveli",
    "DD":"Daman and Diu",
    "DL":"Delhi",
    "GA":"Goa",
    "GJ":"Gujarat",
    "HR":"Haryana",
    "HP":"Himachal Pradesh",
    "JK":"Jammu and Kashmir",
    "JH":"Jharkhand",
    "KA":"Karnataka",
    "KL":"Kerala",
    "MP":"Madhya Pradesh",
    "MH":"Maharashtra",
    "MN":"Manipur",
    "ML":"Meghalaya",
    "MZ":"Mizoram",
    "NL":"Nagaland",
    "OR":"Orissa",
    "PB":"Punjab",
    "PY":"Pondicherry",
    "RJ":"Rajasthan",
    "SK":"Sikkim",
    "TN":"Tamil Nadu",
    "TR":"Tripura",
    "UP":"Uttar Pradesh",
    "UK":"Uttarakhand",
    "WB":"West Bengal"
 }';
$myArr = json_decode($data,true);
$sql    =   "insert into state (name) values ";
foreach($myArr as $key=>$value)
{
    
    $sql .="('".$value."'),";
    

}
echo $sql = rtrim($sql,",").";";
$result =   mysql_query($sql);
if ($result)
{
    echo "added";
}
}
?>