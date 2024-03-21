<?php

$servername="localhost";
$username="user";
$password="";
$databasename="medifarm";

$conn=mysqli_connect($servername,$username,$password,$databasename);

if(!$conn)
{
die("Connection Error".mysqli_connect_error());
}
// else{
//     echo"Connection successful!";
// }

?>