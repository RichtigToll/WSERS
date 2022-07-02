<?php
include_once("CommonCode.php");


if ($_SESSION["UserLoggedIn"] == false) {
    print "<script> alert('Du bist nicht angemeldet') </script>";
    print "<script> window.location.href = 'LoginGER.php' </script>";
    die();
}

if (isset($_POST["deleteProduct"])) {
    if (isset($_SESSION["shoppingcard"][$_POST["deleteProduct"]])) {
        unset($_SESSION["shoppingcard"][$_POST["deleteProduct"]]);
    } else {
        die();
    }
}

if (isset($_POST["quantity"], $_POST["quantityProductID"])) {
    if (!is_numeric($_POST["quantity"])) {
        die();
    }

    if (!isset($_SESSION["shoppingcard"][$_POST["quantityProductID"]])) {
        die();
    } else {
        if ($_POST["quantity"] != 0) {
            $_SESSION["shoppingcard"][$_POST["quantityProductID"]] = $_POST["quantity"];
        } else {
            unset($_SESSION["shoppingcard"][$_POST["quantityProductID"]]);
        }
    }
}


if (isset($_POST["FinishOrder"]) && $_SESSION["UserLoggedIn"] == true) {

    if (count($_SESSION["shoppingcard"]) == 0) {
        print "<script>alert('Dein Einkaufswagen ist leer')</script>";
        header("Refresh:0");
        die();
    } else {
        $uniqueOrderId = $_SESSION["UserName"] . time(); //creating unique order id
        $sqlInsert12 = $connection->prepare("INSERT into Orders (OrderNumber, UserId) VALUES(?,?)");
        $sqlInsert12->bind_param("si", $uniqueOrderId, $_SESSION["UserId"]);
        $sqlInsert12->execute();

        foreach ($_SESSION["shoppingcard"] as $idProduct => $quantity) {
            $sqlInsert13 = $connection->prepare("INSERT into OrderList(ProductID, ProductQuantity, OrderNumber) VALUES(?,?,?)");
            $sqlInsert13->bind_param("iis", $idProduct, $quantity, $uniqueOrderId);
            $sqlInsert13->execute();
        }

        $_SESSION["shoppingcard"]  = [];
        print "<script>alert('Bestellung erfolgreich!')</script>";
        header("Refresh:0");
        die();
    }
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
    <title>Einkaufswagen</title>
    <style>
        #ShopCardNav {
            transform: translateX(-6%);
        }
    </style>
</head>

<body>
    <?php
    $ActivePage = "Products";
    $FlagSelectedGER = "SelectedFlag";
    $URL = "ShoppingCardGER.php";
    $URL2 = "ShoppingCard.php";
    include("ProductInfoNav.php");
    ?>



    <section class="h-100 gradient-custom" style="margin-top:100px;">
        <div class="container py-5">
            <div class="row d-flex justify-content-center my-4">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Einkaufswagen</h5>
                        </div>
                        <div class="card-body">
                            <!-- Single item -->
                            <?php
                            $totalOrder = 0;
                            foreach ($_SESSION["shoppingcard"] as $idProduct => $quantity) {
                                $sqlStatement = $connection->prepare("SELECT * from Products natural join Descriptions where ProductID=? AND LanID=1");
                                $sqlStatement->bind_param("s", $idProduct);
                                $sqlStatement->execute();
                                $result = $sqlStatement->get_result();

                                $row = $result->fetch_assoc();

                                $totalOrder = $totalOrder + ($row["Price"] * $quantity);
                            ?>
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                        <!-- Image -->
                                        <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                            <a href="ProductDetail.php?ProductID=<?= $row["ProductID"] ?>">
                                                <img src="./images/<?= $row["ProductImage"] ?>" class="w-100" alt="<?= $row["ProductName"] ?>" />
                                            </a>
                                        </div>
                                        <!-- Image -->
                                    </div>


                                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                        <!-- Data -->
                                        <p><strong><?= $row["ProductName"] ?></strong></p>
                                        <form method="POST">
                                            <input type="hidden" value="<?= $row["ProductID"] ?>" name="deleteProduct">
                                            <button type="submit" class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip" title="Remove item">Löschen</button>
                                        </form>
                                        <!-- Data -->
                                    </div>

                                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                        <!-- Quantity -->
                                        <div class="d-flex mb-4" style="max-width: 300px">
                                            <div class="form-outline">
                                                <form method="POST" id="quantityID<?= $row["ProductID"] ?>">
                                                    <label class="form-label" for="form1">Menge</label>
                                                    <input id="form1" min="0" name="quantity" value="<?= $quantity ?>" type="number" class="form-control" onchange="document.getElementById('quantityID<?= $row['ProductID'] ?>').submit();">
                                                    <input type="hidden" value="<?= $row["ProductID"] ?>" name="quantityProductID">
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Quantity -->

                                        <!-- Price -->
                                        <p class="text-start text-md-center">
                                            <strong>Preis: <?= $row["Price"] ?>€</strong>
                                        </p>
                                        <!-- Price -->
                                    </div>
                                </div>
                                <hr class="my-4">
                            <?php
                            }
                            ?>


                            <!-- Single item -->
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <p><strong>Bei der heutigen Bestellung ist die erwartete Versandlieferung zwischen dem:</strong></p>
                            <p class="mb-0">8.07.2022 - 12.07.2022</p>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0">Insgesamt</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Produkte
                                    <span><?= $totalOrder ?>€</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    Lieferung
                                    <span>Gratis</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>Insgesamt:</strong>
                                    </div>
                                    <span><strong><?= $totalOrder ?>€</strong></span>
                                </li>
                            </ul>

                            <form method="POST">
                                <button name="FinishOrder" type="submit" class="btn btn-primary btn-lg btn-block">Bestellen</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>