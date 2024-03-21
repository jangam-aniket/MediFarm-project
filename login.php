<?php
include "_dbConnect.php";

session_start();
$_SESSION['username']=$username;

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login to MediFarm Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styleloginpage.css">
</head>

<body>
    <h1 class="text-center mt-5">Login to MediFarm Portal</h1>
    <div id="contain">
        <form action="/MediFarm/login.php" method="post" id="input-form" autocomplete="off">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="text" name="pass" class="form-control" id="exampleInputPassword1">
            </div>
            <input type="submit" name="login" class="btn btn-danger" value="Login">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>

<?php


if(isset($_POST['login'])){

$username=$_POST['email'];
$password=$_POST['pass'];

$sql="SELECT * from logindata where `Email_id`='$username' && `Password`='$password'";

$result=mysqli_query($conn,$sql);

if($row=mysqli_fetch_row($result))
{
echo "Record found!";
header('location:welcome.php');
}
else{
    echo "Failed";
}

}

?>