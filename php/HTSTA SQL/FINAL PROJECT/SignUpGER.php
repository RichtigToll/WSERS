<?php
include_once("CommonCode.php");
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Anmelden</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='Navbar.css?t=<?= time(); ?>'>
    <script src='main.js'></script>
</head>

<body>
    <?php
    $ActivePage = "Form";
    $FlagSelectedGER = "SelectedFlag";
    $URL = "SignUpGER.php";
    $URL2 = "SignUp.php";
    include("navigationGER.php");
    ?>

<form class="SignUp" method="POST">
        </div>
        <h3>Regist- rieren</h3>
        <div>
            <label>Neuer Benutzername</label>
            <input type="text" name="user">
        </div>
        <div>
            <label>Passwort</label>
            <input type="password" name="password">
        </div>
        <div>
            <label>Passwort wiederholen</label>
            <input type="password" name="repeatpassword">
        </div>
        <div class="submit">
            <input type="submit" value="Sign Up" id="ButtonRegist">
        </div>
    </form>

    <?php

    if (isset($_POST["user"], $_POST["password"], $_POST["repeatpassword"])) {
        if ($_POST["user"] == "" or $_POST["password"] == "" or $_POST["repeatpassword"] == "") {
            print "<script>alert('Etwas ist schief gelaufen')</script>";
            die();
        }

        $filename = "./Database/Users.txt";

        if ($_POST["password"] != $_POST["repeatpassword"]) {
            print "<script>alert('Lerne zu schreiben!');</script>";
            die();
        }

        $NameExistsCheck = fopen($filename, "r");
        while (($line = fgets($NameExistsCheck)) !== false) {
            $Userandpasswordarray = explode(";", $line);
            if ($_POST["user"] == $Userandpasswordarray[0]) {
                print "<script>alert('Benutzername wurde schon genutzt!');</script>";
                die();
            }
        }
        $fp = fopen($filename, 'a');
        $newuser = $_POST["user"] . ";" . $_POST["password"] . "\n";

        fwrite($fp, $newuser);
        fclose($fp);
    }

    ?>
</body>

</html>