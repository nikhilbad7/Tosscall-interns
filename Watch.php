<head>
<body>
<?php 
$conn   =   mysql_connect("localhost","root","");
if ($conn)
{
echo "Conencted Successfully";
}
mysql_select_db('tosscall');
$sql    =   "SELECT * FROM State WHERE status=1;";
$result =   mysql_query($sql,$conn);
if (!$result)
{
    die("Could not get data: ".mysql_error());
    exit();

}
while ($row =   mysql_fetch_array($result))
{
 
}
?>
<select id="state" onchange="on_state_select()">
</select>
</body>
</head>