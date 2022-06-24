<?php
include_once("CommonCode.php");

if ($_SESSION["UserLoggedIn"] == false) {
    print "<script> alert('You are not logged in') </script>";
    print "<script> window.location.href = 'Login.php' </script>";
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='Navbar.css?t=<?= time(); ?>'>
    <title>Document</title>
</head>

<body>
    <?php
    $ActivePage = "Products";
    $FlagSelected = "SelectedFlag";
    $URL = "ProductsGER.php";
    $URL2 = "Products.php";
    include("navigation.php");
    ?>

    <div id="top">
        <?php
        print_r($_SESSION["shoppingcard"]);
        ?>
    </div>

</body>

</html>