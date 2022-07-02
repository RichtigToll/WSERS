<?php
include_once("CommonCode.php");

if (isset($_POST["UserName"], $_POST["PswOne"], $_POST["PswTwo"])) {
    if ($_POST["UserName"] == "" || $_POST["PswOne"] == "") {
        print "<script>alert('Give a Username/Password')</script>";
        header("Refresh:0");
        die();
    }

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
        $row = $resultéieren->fetch_assoc();
        $HashPsw = password_hash($_POST["PswOne"], PASSWORD_DEFAULT); //Hash the password

        $sqlInsert = $connection->prepare("INSERT INTO Users (UserName, UserPsw, UserType) VALUES (?,?,'Normal')"); // prepare the $connection with the commands which are written inside ""
        $sqlInsert->bind_param("ss", $_POST["UserName"], $HashPsw); //ss means string string. You gonna bind what the guy wrote on the inputs and the $HashPsw variable
        $sqlInsert->execute();

        //Get the ID of the user that we just inserted
        $sqlID = $connection->prepare("SELECT UserId from Users ORDER BY UserId DESC LIMIT 1");
        $sqlID->execute();
        $result = $sqlID->get_result();
        $row = $result->fetch_assoc();

        $_SESSION["UserName"] = $_POST["UserName"]; //You store the username on the Session
        $_SESSION["UserLoggedIn"] = true; //The User just logged in
        $_SESSION["shoppingcard"] = []; // This creates an empty (shopping cart) array
        $_SESSION["UserType"] = 'Normal';
        $_SESSION["UserId"] = $row["UserId"];

        header("Location: Home.php"); //Redirect to the homepage
        die(); //We don't want run ANYTHING else after the header

    } else {
        echo '<script> alert("User already exist") </script>';
        header("Refresh:0");
        die();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Sign Up here</title>
    <link rel='stylesheet' type='text/css' media='screen' href='Navbar.css?t=<?= time(); ?>'>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>
    <?php
    $ActivePage = "Form";
    $FlagSelected = "SelectedFlag";
    $URL = "SignUpGER.php";
    $URL2 = "SignUp.php";
    include("ProductInfoNav.php");
    ?>

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <h3 style="margin-top: 10px;">Sign Up Page</h3>
            </div>


            <!-- Login Form -->
            <form method="POST">
                <input type="text" id="login" class="fadeIn second" name="UserName" placeholder="New Username">
                <input type="password" id="password" class="fadeIn third" name="PswOne" placeholder="New Password">
                <input type="password" id="password" class="fadeIn third" name="PswTwo" placeholder="Rewrite your password">
                <input type="submit" class="fadeIn fourth" value="Sign up">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                You have an Account? <a class="underlineHover" href="Login.php">Login!</a>
            </div>

        </div>
    </div>
</body>

</html>