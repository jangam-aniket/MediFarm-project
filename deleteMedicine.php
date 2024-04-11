<?php
// Prevent caching
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
</head>

<body>

</body>

</html>
<?php
include "_dbConnect.php";
     session_start();
     ?>
<?php

                $userpro=$_SESSION['username'];
                if($userpro==true)
                {}
                else{header('location:login.php');}
            ?>
<?php
$id=$_GET['id'];

$sql="DELETE FROM `medicines` WHERE `medicines`.`Id` = '$id'";
$result=mysqli_query($conn,$sql);


if($result)
{
echo "Successfully deleted the record!";
header("location:welcome.php");
exit;
}
else
{
echo "Failed!";
}

?>