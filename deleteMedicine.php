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