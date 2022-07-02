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
        $sqlStatement = $connection->prepare("SELECT * from Products natural join Descriptions where LanID=1");
        $sqlStatement->execute();
        $result = $sqlStatement->get_result();
        $numberofproducts = $result->num_rows;

        while ($row = $result->fetch_assoc()) { ?>

            <div class="thisproduct">
                <h1><?= $row["ProductName"] ?></h1>
                    <h2>Price: <?= $row["Price"] ?>€</h2>
                <p id="InformationProduct">Click on the picture for more information</p>
                <a href="ProductDetail.php?ProductID=<?= $row["ProductID"] ?>"> <img src="./images/<?= $row["ProductImage"] ?>" alt="Product" width="300px" ></a>
                <form method="POST">
                    <input type="hidden" value="<?= $row["ProductID"] ?>" name="idOrder">
                    <select name="Quantity">
                        <?php
                        for ($i = 1; $i <= 10; $i++) {
                        ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <input value="Shopping card" type="submit" id="ColorSubmitProducts" class="ItalicStyle">
                </form>
            </div>

        <?php
        }
        ?>
    </div>
</body>

</html>