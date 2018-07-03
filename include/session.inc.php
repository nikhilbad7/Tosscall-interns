<?php
session_start();
$_SESSION['username']='poonam';
if(!isset($_SESSION['username']))
{
header('Location: /login.php');
}
?>