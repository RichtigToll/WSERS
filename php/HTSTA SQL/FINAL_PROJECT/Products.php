<?php
include_once("CommonCode.php");

if (isset($_POST["idOrder"])) { // This if statement is used when the order button is clicked
    if ($_SESSION["UserLoggedIn"]) {

        $sqlStatement2 = $connection->prepare("SELECT * from Products WHERE ProductID=?"); // Select to see if the productID exist in database
        $sqlStatement2->bind_param("s", $_POST["idOrder"]);
        $sqlStatement2->execute();
        $result2 = $sqlStatement2->get_result();

        if ($result2->num_rows == 1) { // ProductID is unique so, if there is only 1 row found from the select above, its good
            if (is_numeric($_POST["Quantity"])) { // IF it-s numeric
                if ($_POST["Quantity"] < 1 || $_POST["Quantity"] > 10) { // IF is-s smaller than 1 or bigger than 10, then die
                    die();
                }
            } else {
                die(); // If it-s not NUMERIC, die
            }


            if (isset($_SESSION["shoppingcard"][$_POST["idOrder"]])) { //the product is already inside the shopping cart and you want to add more of that product
                $_SESSION["shoppingcard"][$_POST["idOrder"]] = $_SESSION["shoppingcard"][$_POST["idOrder"]] + $_POST["Quantity"]; //bla = bla + quantity
            } else {
                $_SESSION["shoppingcard"] += [$_POST["idOrder"] => $_POST["Quantity"]]; //here the product is not inside the shopping cart yet
            }
        } else {
            die(); // IF the product was not found it should die, which means the input that is hidden, its value was changed so die
        }
    } else {
        echo "<script> alert('You are not logged In'); window.location = window.location.href; </script>";
        // header("Refresh:0");
        die();
    }
}
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
                <a style="color: inherit;" target="_blank" href="<?= $row["ProductLink"] ?>">
                    <h2>Price: <?= $row["Price"] ?>€</h2>
                </a>
                <p id="InformationProduct">Click on the picture for more information</p>
                <a href="ProductDetail.php?ProductID=<?= $row["ProductID"] ?>"> <img src="./images/<?= $row["ProductImage"] ?>" alt="Product"></a>
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