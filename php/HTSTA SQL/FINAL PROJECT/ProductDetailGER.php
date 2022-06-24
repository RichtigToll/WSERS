<?php
include_once("CommonCode.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='Navbar.css?t=<?= time(); ?>'>
    <title>Mehr Informationen</title>
</head>

<body>
    <?php
    $ActivePage = "Home";
    $FlagSelected = "SelectedFlag";
    $URL = "ProductDetailGER.php?ProductID=" . $_GET["ProductID"];
    $URL2 = "ProductDetail.php?ProductID=" . $_GET["ProductID"];
    include("ProductInfoNav.php");
    //navbar("Home","HomeGER.php", ["Home", "My Products", "About", "Contact"]);
    ?>

    <?php
    if (isset($_GET["ProductID"])) {

        $filename = './Database/NewProductsGER.csv';

        if (file_exists($filename)) {
            $handle = fopen($filename, "r");

            while (($line = fgets($handle)) !== false) {
                $arrayOfPieces = explode(";", $line);
                if ($_GET["ProductID"] == $arrayOfPieces[4]) {
    ?>
                    <div class="allproducts">
                        <div class="ThisProductInfo">
                            <h1><?= $arrayOfPieces[0] ?></h1>
                            <h3>
                                <?= $arrayOfPieces[1] ?>
                            </h3>
                            <h3 style="text-align: center;">
                                <?= $arrayOfPieces[6] ?> <br><br>
                                <p style="text-align: center;"> Preis: <?= $arrayOfPieces[2] ?> </p>
                            </h3>
                            <a> <img src="<?= $arrayOfPieces[3] ?>" alt="Product" class="ProductStyle"> </a>
                            <div>
                                <a href="<?= $arrayOfPieces[5] ?>"> <input value="Bestellen" type="submit" id="ColorSubmitProducts" class="ItalicStyle"> </a>
                            </div>
                        </div>
                    </div>
    <?php
                    break;
                }
            }
        } else {
            die("File not found");
        }
    } else {
        die("Hacker");
    }
    ?>
</body>

</html>