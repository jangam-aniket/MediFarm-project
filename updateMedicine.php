<?php
include "_dbConnect.php";

session_start();

$id=$_GET['id'];

        $sql="SELECT * FROM medicines where Id='$id'";

                $result=mysqli_query($conn,$sql);
                 $row=mysqli_fetch_assoc($result);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MediFarm- Update </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <!-- session -->
    <?php
              
                $userpro=$_SESSION['username'];
                if($userpro==true)
                {}
                else{header('location:login.php');}
                ?>

    <div class="container">
        <h1>MediFarm Admin to Update medicines</h1>
        <form method="post">
            <!-- <input type="hidden" name="id" value="" class="form-label"> -->
            <div class="mb-3">
                <label for="Med-name" class="form-label">Medicine name</label>
                <input type="text" class="form-control" id="med-name" name="Medname"
                    value="<?php echo $row["Med_name"]; ?>" aria-describedby="medHelp">
            </div>
            <div class="mb-3">
                <label for="Med-price" class="form-label">Medicine Price</label>
                <input type="number" class="form-control" id="med-price" name="Medprice"
                    value="<?php echo $row["Med_price"]; ?>" aria-describedby="medHelp">
            </div>
            <div class="mb-3">
                <label for="Quantity" class="form-label">Quantity/Tab</label>
                <input type="number" class="form-control" id="med-quantity" name="Medquantity"
                    value="<?php echo $row["Quantity_tab"]; ?>" aria-describedby="medHelp">
            </div>
            <div class="mb-3">
                <label for="Owner name" class="form-label">Owned By</label>
                <input type="text" class="form-control" id="own-by" name="Ownby" value="<?php echo $row["Owned_By"]; ?>"
                    aria-describedby="medHelp">
            </div>
            <div class="mb-3">
                <label for="Manufacture date" class="form-label">Manufacture Date</label>
                <input type="date" class="form-control" id="man-date" name="Mandate"
                    value="<?php echo $row["Manufacture_Date"]; ?>" aria-describedby="medHelp">
            </div>
            <div class="mb-3">
                <label for="Med-name" class="form-label">Expiry Date </label>
                <input type="date" class="form-control" id="ex-date" name="Exdate"
                    value="<?php echo $row["Expiry_Date"]; ?>" aria-describedby="medHelp">
            </div>
            <input type="submit" name="update" value="Update" class="btn btn-primary">
        </form>
    </div>

    <?php
        if(isset($_POST["update"]))
        {
            
                // $id=$_POST["id"];
                $Med_name=$_POST["Medname"];
                $Med_price=$_POST["Medprice"];
                $Med_quantity=$_POST["Medquantity"];
                $Own_by=$_POST["Ownby"];
                $Man_date=$_POST["Mandate"];
                $Ex_date=$_POST["Exdate"];

                 $sql="UPDATE `medicines` set `Med_name` = '$Med_name', `Med_price` = '$Med_price', `Quantity_tab` ='$Med_quantity', `Owned_By` = '$Own_by', `Manufacture_Date` = '$Man_date', `Expiry_Date` = '$Ex_date' where `Id` = '$id'";

                 $result=mysqli_query($conn,$sql);
     
    if($result)
    {
    echo"Successfully updated records!";
    header("location:welcome.php");
    exit;
    }
    else{
    echo"Failed!";
    }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>