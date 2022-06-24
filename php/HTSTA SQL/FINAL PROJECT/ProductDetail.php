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
    <title>Product Details</title>
</head>

<body>
    <?php
    $ActivePage = "Home";
    $FlagSelected = "SelectedFlag";
    $URL = "ProductDetailGER.php";
    $URL2 = "ProductDetail.php";
    include("ProductInfoNav.php");
    //navbar("Home","HomeGER.php", ["Home", "My Products", "About", "Contact"]);
    ?>

    <?php
    if (isset($_GET["ProductID"])) {

        $sqlStatement = $connection->prepare("SELECT * from Products natural join Descriptions where ProductID=?");
        $sqlStatement->bind_param("s", $_GET["ProductID"]);
        $sqlStatement->execute();
        $result = $sqlStatement->get_result();
        $numberofproducts = $result->num_rows;


        if ($numberofproducts == 0) {
            print("<h1>No Products were found :(</h1>");
        } else {
            $row = $result->fetch_assoc();

    ?>
            <div class="allproducts">
                <div class="ThisProductInfo">
                    <h1><?= $row["ProductName"] ?></h1>
                    <h3>
                        <?= $row["DescText"] ?>
                    </h3>
                    <h3 style="text-align: center;">
                        <?= $row["DescText2"] ?> <br><br>
                        <p style="text-align: center;"> Price: <?= $row["Price"] ?>€</p>
                    </h3>
                    <a> <img src="<?= $row["ProductImage"] ?>" alt="Product" class="ProductStyle"> </a>
                    <div>
                        <a href="<?= $row["ProductLink"] ?>"> <input value="Shopping Cart" type="submit" id="ColorSubmitProducts" class="ItalicStyle"> </a>
                    </div>
                </div>
            </div>


    <?php
        }


    } else {
        die("Hacker");
    }
    ?>
</body>

</html>