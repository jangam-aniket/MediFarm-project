<?php
// Prevent caching
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
?>

<?php

use LDAP\Result;

include "_dbConnect.php";
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MediFarm- Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <?php
                
                    $userpro=$_SESSION['username'];
                    if($userpro==true)
                    {}
                    else{header('location:login.php');}
                    ?>
    <div class="container">
        <h1>MediFarm Admin to add medicines</h1>
        <form method="post">
            <div class="mb-3">
                <label for="Med-name" class="form-label">Medicine name</label>
                <input type="text" class="form-control" id="med-name" name="Med-name" aria-describedby="medHelp">
            </div>
            <div class="mb-3">
                <label for="Med-price" class="form-label">Medicine Price</label>
                <input type="number" class="form-control" id="med-price" name="Med-price" aria-describedby="medHelp">
            </div>
            <div class="mb-3">
                <label for="Quantity" class="form-label">Quantity/Tab</label>
                <input type="number" class="form-control" id="med-quantity" name="Med-quantity"
                    aria-describedby="medHelp">
            </div>
            <div class="mb-3">
                <label for="Owner name" class="form-label">Owned By</label>
                <input type="text" class="form-control" id="own-by" name="Own-by" aria-describedby="medHelp">
            </div>
            <div class="mb-3">
                <label for="Manufacture date" class="form-label">Manufacture Date</label>
                <input type="date" class="form-control" id="man-date" name="Man-date" aria-describedby="medHelp">
            </div>
            <div class="mb-3">
                <label for="Med-name" class="form-label">Expiry Date</label>
                <input type="date" class="form-control" id="ex-date" name="Ex-date" aria-describedby="medHelp">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- Add medicines in the database -->
    <?php
    
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
     
        $Med_name=$_POST['Med-name'];
        $Med_price=$_POST['Med-price'];
        $Med_quantity=$_POST['Med-quantity'];
        $Own_by=$_POST['Own-by'];
        $Man_date=$_POST['Man-date'];
        $Ex_date=$_POST['Ex-date'];

        $sql="INSERT INTO `medicines` ( `Med_name`, `Med_price`, `Quantity_tab`, `Owned_By`, `Manufacture_Date`, `Expiry_Date`) 
        VALUES ('$Med_name', '$Med_price', '$Med_quantity', '$Own_by', '$Man_date', '$Ex_date')";
    $result=mysqli_query($conn,$sql);
?>
    <?php

        if($result)
        {
            // echo"Successfully added record!";
            echo '<div class="alert alert-success" role="alert">
            Successfully Added record!
            </div>';
            $timer=2;
            header("Refresh:$timer; url=welcome.php");
        }
        else
        {
            echo "Failed!!";
        }
        $Med_name="";
        $Med_price="";
        $Med_quantity="";
        $Own_by="";
        $Man_date="";
        $Ex_date="";
        // exit;
        
    }

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>