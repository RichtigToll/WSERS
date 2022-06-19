<?php
include_once("CommonCode.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Products</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='Navbar.css?t=<?= time(); ?>'>
    <script src='main.js'></script>
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
        <h1>New products!</h1>
    </div>
    <div class="allproducts">

        <?php
        $handle = fopen("./Database/NewProducts.csv", "r") or die("File not found");
        while (($line = fgets($handle)) !== false) {
            $arrayOfPieces = explode(";", $line);
            if (count($arrayOfPieces) == 7) { ?>

                <div class="thisproduct">
                    <h1><?= $arrayOfPieces[0] ?></h1>
                    <p id="InformationProduct">Click on the picture to get more informations</p>
                    <a href="ProductDetail.php?ProductID=<?= $arrayOfPieces[4] ?>"> <img src="<?= $arrayOfPieces[3] ?>" alt="Product"> </a>
                    <a href="<?= $arrayOfPieces[5] ?>"> <input value="Order" type="submit" id="ColorSubmitProducts" class="ItalicStyle"> </a>
                </div>

        <?php }
        }

        fclose($handle); ?>
    </div>
</body>

</html>