<?php
require "config.php";

$user=$_GET["username"];
$pass=$_GET["password"];

$sql="SELECT UserName ,Password FROM user_master WHERE UserName=$user AND Password= $pass";
$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
$num = mysqli_num_rows($result);
// If the email and password are not present in the database, the mysqli_num_rows returns 0, it is assigned to $num.
if ($num == 0) {
 
  $msg="Incorrect Username or Password."; 
  //echo $msg;
   header("location:login.php");

} else {  
  $row = mysqli_fetch_array($result);
 header('location: index.php');
}
?>