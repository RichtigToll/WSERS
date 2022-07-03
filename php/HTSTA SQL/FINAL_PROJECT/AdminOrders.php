<?php
include_once("CommonCode.php");

if ($_SESSION["UserLoggedIn"] == false) {
    print "<script>alert('You are not logged in');</script>";
    print '<script>window.location.href = "Home.php";</script>';
    die();
}

if ($_SESSION["UserType"] != "Admin") {
    print "<script>alert('You are not an Admin');</script>";
    print '<script>window.location.href = "Home.php";</script>';
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./Bootstrap/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="./Bootstrap/bootstrap-5.2.0-beta1-dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='Navbar.css?t=<?= time(); ?>'>
    <link rel="icon" href="./images/Logo.png" type="image/icon type">
    <title>Orders</title>
</head>

<body>
    <?php
    $ActivePage = "CreateProduct";
    $URL =  "AdminOrders.php";
    $URL2 = "AdminOrders.php";
    include("ProductInfoNav.php");
    ?>

    <table class="table align-middle" style="margin-top: 4%; background-color: white;">
        <thead>
            <tr>
                <!-- Titles -->
                <th>OrderID</th>
                <th>User</th>
                <th>Product</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <!-- Column -->
                <th>16464</th>
                <td>UserName</td>
                <td>XBOX</td>
                <td>
                    <button type="submit" class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip" title="Remove item">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>