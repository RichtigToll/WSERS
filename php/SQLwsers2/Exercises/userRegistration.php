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
    mysqli_report(MYSQLI_REPORT_OFF);


    if (isset($_POST["UserName"], $_POST["PswOne"], $_POST["PswTwo"])) {
        if ($_POST["UserName"] == "" or $_POST["PswOne"] == "" or $_POST["PswTwo"] == "") { //If a user forget an input
            print "<script>alert('Something is wrong')</script>";
            header("Refresh:0");
        }
        if ($_POST["PswOne"] != $_POST["PswTwo"]) { // If a user didn't rewrite the password correctly
            print "You didn't write your password equaly";
        }

        if ($_POST["PswOne"] == $_POST["PswTwo"]) {
            $host = "localhost";
            $user = "root";
            $psw = "";
            $database = "MyProducts";
            $portNo = 3306;

            $connection = new mysqli($host, $user, $psw, $database, $portNo);
            $sqlInsert = $connection->prepare("INSERT INTO Users (UserName, UserPsw) VALUES (?,?)");
            // prepare the $connection with the commands which are written inside ""
            $sqlInsert->bind_param("ss", $_POST["UserName"], $_POST["PswOne"]); //ss means string string. bind_param is LINKING with the preparation       

            if (!$sqlInsert->execute()) { //If the Username already exists
                print("We did not insert the " . $_POST["UserName"] . " into the database <br>");
            } else {
                print("We inserted the " . $_POST["UserName"] . " into the database <br>");
            }
        }
    }

    ?>
    <h1>User registration form</h1>
    Please fill in the following to signup with our website:

    <form method="POST">
        <p>Username: </p><input type="text" name="UserName" placeholder="Username">
        <p>Password: </p><input type="password" name="PswOne" placeholder="Password">
        <p>Repeat password: </p><input type="password" name="PswTwo" placeholder="Confirm password">
        <input type="submit" value="Register">
    </form>
</body>

</html>