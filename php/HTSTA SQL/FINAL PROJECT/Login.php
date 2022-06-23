<?php
include_once("CommonCode.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login here</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='Navbar.css?t=<?= time(); ?>'>
    <link rel='stylesheet' type='text/css' media='screen' href='LoginLogout.css?t=<?= time(); ?>'>
</head>

<body>
    <?php
    $ActivePage = "Login";
    $FlagSelected = "SelectedFlag";
    $URL = "LoginGER.php";
    $URL2 = "Login.php";
    include("navigation.php");
    ?>

    <?php

    if (isset($_POST["user"], $_POST["password"])) {

        $sqlState = $connection->prepare("SELECT * FROM Users where UserName = ?"); //Before inserting the user, you gonna select the user to SEE if the user exists
        $sqlState->bind_param("s", $_POST["user"]); // You bind what the guy wrote
        $sqlState->execute(); //Execute the Select
        $resultéieren = $sqlState->get_result(); // Get the result of the Select
        $UserExists = $resultéieren->num_rows; //You count the rows of the result


        if ($UserExists == 1) { //Checks if there is ONLY 1 user with the ONLY 1 username. Depending of how many users you have, you might have more than 1 row
            $row = $resultéieren->fetch_assoc(); //If the user exists, it copies (fetch) the row to the $row

            if (password_verify($_POST["password"], $row["UserPsw"])) { //You gonna verify what the USER wrote on the INPUT, with the HASHED password on the database

                $_SESSION["UserName"] = $_POST["user"]; //You store the username on the Session
                $_SESSION["UserLoggedIn"] = true; //The User just logged in

                header("Location: Home.php"); //Redirect to the homepage
                die(); //We don't want run ANYTHING else after the header
            } else { // If it doesn't verify
                echo '<script> alert("Password does not match") </script>'; //alert
            }
        } else {
            echo '<script> alert("User does not exist") </script>';
        }
    }

    ?>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <h3 style="margin-top: 10px;">Login Page</h3>
            </div>

            <!-- Login Form -->
            <form>
                <input type="text" id="login" class="fadeIn second" name="login" placeholder="Username">
                <input type="text" id="password" class="fadeIn third" name="login" placeholder="Password">
                <input type="submit" class="fadeIn fourth" value="Login">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                No Account? <a class="underlineHover" href="SignUp.php">Sign Up!</a>
            </div>

        </div>
    </div>

    <form class="Login" method="POST">
        <h3>Login</h3>
        <div>
            <label>Username</label>
            <input type="text" name="user">
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class="submit">
            <button type="submit" id="ButtonRegist">Login</button>
        </div>
    </form>
</body>

</html>