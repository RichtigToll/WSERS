<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1 {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;

        }

        .OneProduct {
            font-size: 12px;
            width: 100px;
            height: 100px;
            background-color: bisque;
            margin: 10px;
            border: 2px solid black;
        }
    </style>
</head>

<body>
    <?php
    include_once("CommonCode.php");


    if ($_SESSION["UserLoggedIn"] == true && isset($_POST["BuyProduct"])) {
        //print ("You want to buy the product with id: ".$_POST["BuyProduct"]);
        //$shopCart = $_SESSION["ShoppingCart"];
        //$itemToBuy = $_POST["BuyProduct"];
        if (isset($_SESSION["ShoppingCart"][$_POST["BuyProduct"]])) {
            $_SESSION["ShoppingCart"][$_POST["BuyProduct"]]++;
        } else {
            $_SESSION["ShoppingCart"][$_POST["BuyProduct"]] = 1;
        }
    }

    ?>
    <h1>
        <?php

        $sqlProducts = $connection->prepare("SELECT * from Products");
        $sqlProducts->execute();
        $result = $sqlProducts->get_result();
        while ($row = $result->fetch_assoc()) {
        ?>

            <div class="OneProduct">
                Name: <?= $row["ProductName"] ?>
                Description: <?= $row["ProductDesc"] ?>
                Price: <?= $row["ProductPrice"]; ?>

                <form method="POST">
                    <input type="hidden" name="BuyProduct" value="<?= $row["ProductId"] ?>">
                    <input type="submit" value="BUY">
                </form>
            </div>
        <?php
        }
        ?>

    </h1>
</body>

</html>