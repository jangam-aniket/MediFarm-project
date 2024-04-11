<?php
// Prevent caching
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
?>

<?php
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
    <title>MediFarm for medico!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
</head>

<body>


    <!-- Navigation Bar -->
    <div class="nav-bar">
        <nav class="navbar navbar-expand-lg bg-danger">
            <div class="container-fluid">
                <a class="navbar-brand" id="decor" href="#">MediFarm</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active mx-4" id="decor" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-4" id="decor" href="#">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-4" id="decor" href="#">Contact us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-4" id="decor" href="/MediFarm/addMedicine.php">Add Medicines</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light me-2" type="submit">Search</button>
                        <a href="/MediFarm/logout.php"><input class="btn btn-outline-light" type="button" name="logout"
                                value="Logout"></a>
                    </form>
                </div>
            </div>
        </nav>
    </div>

    <marquee behavior="sliding" class="blink" direction="left">Welcome to MediFarm portal</marquee>


    <!-- products list -->
    <div class="product-list mt-5">
        <table class="myTable" id="myTable">
            <thead>
                <tr>
                    <th>Med_id</th>
                    <th>Med-name</th>
                    <th>Med-price</th>
                    <th>Quantity/tab</th>
                    <th>Owned By</th>
                    <th>Manufacture Date</th>
                    <th>Expiry Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                <!-- session  -->
                <?php
             
                $userpro=$_SESSION['username'];
                if($userpro==true)
                {}
                else{header('location:login.php');}
                ?>

                <?php

            $sql="select * from `medicines`";
            $result=mysqli_query($conn,$sql);
        
                $id=1;

                while($row=mysqli_fetch_assoc($result))
                {

                echo "<tr>
                    <td>$id</td>
                    <td>$row[Med_name]</td>
                    <td>$row[Med_price]</td>
                    <td>$row[Quantity_tab]</td>
                    <td>$row[Owned_By]</td>
                    <td>$row[Manufacture_Date]</td>
                    <td>$row[Expiry_Date]</td>
                    <td><a href='/MediFarm/updateMedicine.php?id=$row[Id]' class='btn btn-danger'>Update</a> <a
                            href='/MediFarm/deleteMedicine.php?id=$row[Id]' class='btn btn-danger'>Delete</a></td>
                </tr>";
                $id++;
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>