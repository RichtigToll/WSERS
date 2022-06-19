<?php
include_once("CommonCode.php");
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Produkte</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='Navbar.css?t=<?= time(); ?>'>
    <script src='main.js'></script>
</head>

<body>
    <?php
    $ActivePage = "Products";
    $FlagSelectedGER = "SelectedFlag";
    $URL = "ProductsGER.php";
    $URL2 = "Products.php";
    include("navigationGER.php");
    ?>
    <div id="top">
        <h1>Neue Produkte!</h1>
    </div>
    <div class="allproducts">

        <?php
        $handle = fopen("./Database/NewProductsGER.csv", "r") or die("File not found");
        while (($line = fgets($handle)) !== false) {
            $arrayOfPieces = explode(";", $line);
            if (count($arrayOfPieces) == 7) { ?>

                <div class="thisproduct">
                    <h1><?= $arrayOfPieces[0] ?></h1>
                    <p id="InformationProduct">Klicke auf das Bild für mehr Informationen</p>
                    <a href="ProductDetailGER.php?ProductID=<?= $arrayOfPieces[4] ?>"> <img src="<?= $arrayOfPieces[3] ?>" alt="Product"> </a>
                    <a href="<?= $arrayOfPieces[5] ?>"> <input value="Bestellen" type="submit" id="ColorSubmitProducts" class="ItalicStyle"> </a>
                </div>

        <?php }
        }

        fclose($handle); ?>
    </div>
</body>

</html>