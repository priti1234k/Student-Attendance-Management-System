<?php
$host="localhost:3306";
$user="root";
$pass="";
$db="sams";
$conn=mysqli_connect($host,$user,$pass,$db);

if(!$conn)
{
die('could not connect'.mysqli_connect_error());
}
//echo "connected successfully";
?>