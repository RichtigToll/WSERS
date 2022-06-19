<?php
session_start();

if (!isset($_SESSION["UserIn"])) {
    $_SESSION["UserIn"] = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    if (isset($_POST["LOGIN"])) {
        $_SESSION["UserIn"] = true;
    }

    if (isset($_POST["LOGOUT"])) {
        $_SESSION["UserIn"] = false;
    }
    ?>

    <?php
    if ($_SESSION["UserIn"]) { ?>

        <form method="POST">
            <input type="submit" name="LOGOUT" value="Logout">
        </form>

    <?php } else { ?>
    
        <form method="POST">
            <input type="submit" name="LOGIN" value="Login">
        </form>

    <?php } ?>
</body>

</html>