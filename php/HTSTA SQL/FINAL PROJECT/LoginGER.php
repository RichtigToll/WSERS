<?php
include_once("CommonCode.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anmelden</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='Navbar.css?t=<?= time(); ?>'>
</head>

<body>
    <?php
    $ActivePage = "Login";
    $FlagSelectedGER = "SelectedFlag";
    $URL = "LoginGER.php";
    $URL2 = "Login.php";
    include("navigationGER.php");
    ?>

    <?php
    /*if (isset($_POST["user"], $_POST["password"])) {
        $filename = "./Database/Users.txt";
        $NameExistsCheck = fopen($filename, "r");
        $UserNameFound = false;
        while (($line = fgets($NameExistsCheck)) !== false) {
            $Userandpasswordarray = explode(";", $line);
            if ($_POST["user"] == $Userandpasswordarray[0] && $_POST["password"] == $Userandpasswordarray[1]) {
                $UserNameFound = true;
                print("<h3 id='UserExists'>WELCOME / WËLKOMM / WILLKOMMEN</h3>");
            }
        }
        if ($UserNameFound == false) {
            print("<h3 id='UserNotExists'>Try again / Nach eng kéier probéiere w.e.g. / Bitte nochmal versuchen </h3>");
            header("Refresh:3");
        }
        fclose($NameExistsCheck);
    } */
    ?>
    <form class="Login" method="POST">
        <h3>Login</h3>
        <div>
            <label>Benutzername</label>
            <input type="text" name="user">
        </div>
        <div>
            <label>Passwort</label>
            <input type="password" name="password">
        </div>
        <!--<div id="MessageBox">
            <label>Your question</label>
            <textarea cols="5" style="width:200px;height:100px;"></textarea>
        </div>
        <div class="submit">
            <input type="submit" value="Login" id="ButtonRegist">
        </div>-->

        <?php

        session_start();
        $_SESSION["UserLogin"] = false;
        if (isset($_SESSION["UserLogin"])) {

            if (isset($_POST["LoginButton"])) {
                echo '<script> alert("Login successful! / Du bass ageloggt! / Du bist angemeldet!") </script>';
                $_SESSION["UserLogin"] = true;
            }

            if (isset($_POST["LogoutButton"])) {
                echo '<script> alert("You are logged out! / Du goufs ofgemellt! / Du bist abgemeldet!") </script>';
                $_SESSION["UserLogin"] = false;
            }

            if ($_SESSION["UserLogin"] == true) { ?>
                <form method="POST">
                    <input type="submit" name="LogoutButton" value="Abmelden" id="ColorSubmitProducts" class="ItalicStyle">
                </form>
            <?php } else { ?>
                <form method="POST">
                    <input type="submit" name="LoginButton" value="Anmelden" id="ColorSubmitProducts">
                </form>
        <?php }
        }
        ?>
    </form>
</body>

</html>