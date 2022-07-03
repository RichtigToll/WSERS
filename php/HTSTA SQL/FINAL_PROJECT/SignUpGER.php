<?php
include_once("CommonCode.php");

if (isset($_POST["UserName"], $_POST["PswOne"], $_POST["PswTwo"])) {
    if ($_POST["UserName"] == "" || $_POST["PswOne"] == "") {
        print "<script>alert('Geben sie einen Benutzernamen oder Passwort ein!')</script>";
        header("Refresh:0");
        die();
    }

    if ($_POST["PswOne"] !== $_POST["PswTwo"]) {
        print "<script>alert('Wiederhole dein Passwort')</script>";
        header("Refresh:0");
        die();
    }

    $sqlState = $connection->prepare("SELECT * FROM Users where UserName = ?");
    $sqlState->bind_param("s", $_POST["UserName"]);
    $sqlState->execute();
    $resultéieren = $sqlState->get_result(); 
    $UserExists = $resultéieren->num_rows;


    if ($UserExists == 0) {
        $row = $resultéieren->fetch_assoc();
        $HashPsw = password_hash($_POST["PswOne"], PASSWORD_DEFAULT);

        $sqlInsert = $connection->prepare("INSERT INTO Users (UserName, UserPsw, UserType) VALUES (?,?,'Normal')");
        $sqlInsert->bind_param("ss", $_POST["UserName"], $HashPsw);
        $sqlInsert->execute();

        $sqlID = $connection->prepare("SELECT UserId from Users ORDER BY UserId DESC LIMIT 1");
        $sqlID->execute();
        $result = $sqlID->get_result();
        $row = $result->fetch_assoc();

        $_SESSION["UserName"] = $_POST["UserName"];
        $_SESSION["UserLoggedIn"] = true;
        $_SESSION["shoppingcard"] = [];
        $_SESSION["UserType"] = 'Normal';
        $_SESSION["UserId"] = $row["UserId"];

        print '<script>window.location.href = "HomeGER.php";</script>';
        die();

    } else {
        echo '<script> alert("Benutzer existiert schon") </script>';
        print '<script>window.location.href = "SignUpGER.php";</script>';
        die();
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Regristrieren</title>
    <link rel='stylesheet' type='text/css' media='screen' href='Navbar.css?t=<?= time(); ?>'>
    <link rel="icon" href="./images/Logo.png" type="image/icon type">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>
    <?php
    $ActivePage = "Form";
    $FlagSelectedGER = "SelectedFlag";
    $URL = "SignUpGER.php";
    $URL2 = "SignUp.php";
    include("ProductInfoNav.php");
    ?>

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <h3 style="margin-top: 10px;">Neues Konto</h3>
            </div>


            <!-- Login Form -->
            <form method="POST">
                <input type="text" id="login" class="fadeIn second" name="UserName" placeholder="Neuer Benutzername">
                <input type="password" id="password" class="fadeIn third" name="PswOne" placeholder="Neues Passwort">
                <input type="password" id="password" class="fadeIn third" name="PswTwo" placeholder="Passwort erneut eingeben">
                <input type="submit" class="fadeIn fourth" value="Regristrieren">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                Du hast ein Konto? <a class="underlineHover" href="LoginGER.php">Anmelden!</a>
            </div>

        </div>
    </div>


</body>

</html>