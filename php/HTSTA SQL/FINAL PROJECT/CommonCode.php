<?php
session_start();

if(!isset($_SESSION["UserLoggedIn"])) //If the SESSION UserLoggedIn is not set, you want to create it 
{
    $_SESSION["UserLoggedIn"] = false; //and make it equal to false
    //$_SESSION["UserLoggedIn"] = "UserNotLoggedIn"
}

if(!isset($_SESSION["Lang"])) 
{
    $_SESSION["Lang"] = "EN"; 
}

if(isset($_GET["LANG"])) {
    $_SESSION["Lang"] = $_GET["LANG"];
}

$host = "localhost";
$user = "root";
$psw = "";
$database = "MyProducts";
$portNo = 3306;

$connection = new mysqli($host, $user, $psw, $database, $portNo);

mysqli_report(MYSQLI_REPORT_OFF);