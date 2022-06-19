<?php
include_once("CommonCode.php");

if (isset($_POST["UserName"], $_POST["PswOne"], $_POST["PswTwo"])) {
    if ($_POST["PswOne"] !== $_POST["PswTwo"]) { // If a user didn't rewrite the password correctly
        print "<script>alert('Repeat your password')</script>";
        header("Refresh:0");
        die();
    }

    $sqlState = $connection->prepare("SELECT * FROM Users where UserName = ?"); //35 -> Before inserting the user, you gonna select the user to SEE if the user exists
    $sqlState->bind_param("s", $_POST["UserName"]); // You bind what the guy wrote
    $sqlState->execute(); //Execute the Select
    $resultéieren = $sqlState->get_result(); // Get the result of the Select
    $UserExists = $resultéieren->num_rows; //You count the rows of the result


    if ($UserExists == 0) { // There is no data found -> The user doesn't exists

        $HashPsw = password_hash($_POST["PswOne"], PASSWORD_DEFAULT); //Hash the password

        $sqlInsert = $connection->prepare("INSERT INTO Users (UserName, UserPsw) VALUES (?,?)"); // prepare the $connection with the commands which are written inside ""
        $sqlInsert->bind_param("ss", $_POST["UserName"], $HashPsw); //ss means string string. You gonna bind what the guy wrote on the inputs and the $HashPsw variable
        $sqlInsert->execute();

        $_SESSION["UserName"] = $_POST["UserName"]; //You store the username on the Session
        $_SESSION["UserLoggedIn"] = true; //The User just logged in

        header("Location: Home.php"); //Redirect to the homepage
        die(); //We don't want run ANYTHING else after the header
        
    }else{
        echo '<script> alert("User already exist") </script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Sign Up here</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='Navbar.css?t=<?= time(); ?>'>
    <script src='main.js'></script>
</head>

<body>
    <?php
    $ActivePage = "Form";
    $FlagSelected = "SelectedFlag";
    $URL = "SignUpGER.php";
    $URL2 = "SignUp.php";
    include("navigation.php");
    ?>


    <form class="SignUp" method="POST">
        <h3>SIGN UP HERE</h3>
        <div>
            <label>New Username</label>
            <input type="text" name="UserName" required>
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="PswOne" required>
        </div>
        <div>
            <label>Rewrite your password</label>
            <input type="password" name="PswTwo" required>
        </div>
        <div class="submit">
            <button type="submit" id="ButtonRegist">Sign Up</button>
        </div>
    </form>
</body>

</html>