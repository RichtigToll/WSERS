<?php
include_once("CommonCode.php");

if (isset($_POST["user"], $_POST["password"])) {

    $sqlState = $connection->prepare("SELECT * FROM Users where UserName = ?");
    $sqlState->bind_param("s", $_POST["user"]);
    $sqlState->execute();
    $resultéieren = $sqlState->get_result();
    $UserExists = $resultéieren->num_rows;


    if ($UserExists == 1) {
        $row = $resultéieren->fetch_assoc();

        if (password_verify($_POST["password"], $row["UserPsw"])) {

            $_SESSION["UserName"] = $_POST["user"];
            $_SESSION["UserLoggedIn"] = true;
            $_SESSION["shoppingcard"] = [];
            $_SESSION["UserType"] = $row["UserType"];
            $_SESSION["UserId"] = $row["UserId"];

            print '<script>window.location.href = "Home.php";</script>';
            die();

        } else {
            echo '<script> alert("Falsches Passwort") </script>';
        }
    } else {
        echo '<script> alert("Benutzer existiert nicht") </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Anmelden</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='Navbar.css?t=<?= time(); ?>'>
    <link rel="icon" href="./images/Logo.png" type="image/icon type">
</head>

<body>
    <?php
    $ActivePage = "Login";
    $FlagSelectedGER = "SelectedFlag";
    $URL = "LoginGER.php";
    $URL2 = "Login.php";
    include("ProductInfoNav.php");
    ?>

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <h3 style="margin-top: 10px;">Dein Konto</h3>
            </div>


            <!-- Login Form -->
            <form method="POST">
                <input type="text" class="fadeIn second" name="user" placeholder="Benutzername">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="Passwort">
                <input type="submit" class="fadeIn fourth" value="Anmelden">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                Kein Konto? <a class="underlineHover" href="SignUpGER.php">Regristrieren!</a>
            </div>

        </div>
    </div>
</body>

</html>