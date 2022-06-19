<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include_once("CommonCode.php");

    if (isset($_POST["BuyAll"])) {
        if (count($_SESSION["ShoppingCart"]) == 0) {
            //If order list is empty, do not allowed to continue with the payment
            print("No empty orders allowed");
        } else {
            $uniqueOrderId = time() . $_SESSION["User"];
            //Start inserting
            $sqlInsert = $connection->prepare("INSERT INTO Orders(OrderId,UserId) VALUES (?,?)");
            $sqlInsert->bind_param("si", $uniqueOrderId, $_SESSION["UserId"]);
            //no get_result needed because you are using an insert
            $sqlInsert->execute();

            //insert items into the list table
            foreach($_SESSION["ShoppingCart"] as $key -> $value){
                $sqlInsert=$connection->prepare("INSERT INTO List(ProductId, AmountOfItems, OrderId) VALUES (?,?,?)");
                $sqlInsert->bind_param()
            }
        }
    }

    if (isset($_POST["ProductToDelete"])) {
        unset($_SESSION["ShoppingCart"][$_POST["ProductToDelete"]]);
    }

    if (!$_SESSION["UserLoggedIn"]) {

        header("Location: Products.php");
        die();
    }

    ?>

    <h1>Here is a list</h1>
    <ul>
        <?php
        $totalPrice = 0;
        foreach ($_SESSION["ShoppingCart"] as $key => $value) {
// ALWAYS FIRST INSERT AND THEN SELECT THINGS FROM THE DATABASE
            $sqlSelect = $connection->prepare("SELECT ProductName, ProductPrice, ProductId from Products WHERE ProductId = ?");
            $sqlSelect->bind_param("i", $key);
            $sqlSelect->execute();
            $result2 = $sqlSelect->get_result();
            $row = $result2->fetch_assoc();
        ?>

            <li>You want item <?= $row["ProductName"] ?>, <?= $value ?> times It will cost you <?= $row["ProductPrice"] * $value ?>
                <form method="POST">
                    <input type="hidden" name="ProductToDelete" value="<?= $row["ProductId"] ?>">
                    <input type="submit" name="removeItem" value="Remove">
                </form>
            </li>

        <?php
            $totalPrice += $row["ProductPrice"] * $value;
        }

        ?>

        <h2>Total amount= <?= $totalPrice ?></h2>
    </ul>

    <form method="POST">
        <input type="submit" name="BuyAll" value="FINISH ORDER">
    </form>
</body>

</html>