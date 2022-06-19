<?php
session_start();
if(!isset($_SESSION["username"])){
    $_SESSION["username"] = "Unknown";
}


if(!isset($_SESSION["itemToBuy"])){
    $_SESSION["itemToBuy"] = "Unknown";
}
?>