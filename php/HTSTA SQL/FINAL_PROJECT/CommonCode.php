<?php
session_start();

if (!isset($_SESSION["UserLoggedIn"])) //If the SESSION UserLoggedIn is not set, you want to create it 
{
    $_SESSION["UserLoggedIn"] = false; //and make it equal to false
    //$_SESSION["UserLoggedIn"] = "UserNotLoggedIn"
}

if (!isset($_SESSION["Lang"])) {
    $_SESSION["Lang"] = "EN";
}

if (isset($_GET["LANG"])) {
    if (!in_array($_GET["LANG"], array("EN", "DE"))) {
        $_GET["LANG"] = "EN";
    }
    $_SESSION["Lang"] = $_GET["LANG"];
}

if (isset($_POST["LogoutHidden"])) {
    echo "<script> alert('Goodbye! // Auf Wiedersehen!'); </script>";
    session_unset();
    session_destroy();
    print '<script>window.location.href = "Home.php";</script>';

    die();
}

$host = "localhost";
$user = "root";
$psw = "";
$database = "MyProducts";
$portNo = 3306;

$connection = new mysqli($host, $user, $psw, $database, $portNo);

//mysqli_report(MYSQLI_REPORT_OFF);


// Code below: Products.php & ProductDetail.php

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
        if($_SESSION["Lang"] == "EN"){
            echo "<script> alert('You are not logged in'); </script>";
            print '<script>window.location.href = "Login.php";</script>';
        }else{
            echo "<script> alert('Du bist nicht angemeldet'); </script>";
            print '<script>window.location.href = "LoginGER.php";</script>';
        }
        die();
    }
}



// Code below: ShoppingCard.php

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

        if($_SESSION["Lang"] == "EN"){
            print "<script>alert('Your shoppingcard is empty')</script>";
            print '<script>window.location.href = "ShoppingCard.php";</script>';
        }else{
            print "<script>alert('Dein Einkaufswagen ist leer')</script>";
            print '<script>window.location.href = "ShoppingCardGER.php";</script>';
        }
        //header("Refresh:0");
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

        if($_SESSION["Lang"] == "EN"){
            print "<script>alert('Order successful')</script>";
            print '<script>window.location.href = "ShoppingCard.php";</script>';
        }else{
            print "<script>alert('Bestellung erfolgreich')</script>";
            print '<script>window.location.href = "ShoppingCardGER.php";</script>';
        }
        //header("Refresh:0");
        die();
    }
}
