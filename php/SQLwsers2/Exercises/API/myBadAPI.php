<?php
include_once("CommonCode.php");

if(!isset($_POST["SENDER"]))
{
    print("Unkown request sent to this API. Please provide the SENDER");
    die();
}

if(isset($_SESSION["username"])){
    $_SESSION["username"] = $_POST["Username"];
    header("Location:" . $_POST["SENDER"]);
    die();
}


if(isset($_SESSION["itemToBuy"])){
    $_SESSION["itemToBuy"] = $_POST["ItemToBuy"];
}

header("Location:" . $_POST["SENDER"]);
die();
?>