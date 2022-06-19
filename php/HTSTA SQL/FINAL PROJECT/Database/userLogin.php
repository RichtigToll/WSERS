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

    if (isset($_POST["UserName"], $_POST["PswOne"])) {
        $host = "localhost";
        $user = "root";
        $psw = "";
        $database = "Shop";
        $portNo = 3306;

        $connection = new mysqli($host, $user, $psw, $database, $portNo);
        $sqlInsert = $connection->prepare("Select * from Users WHERE UserName=?");
        // prepare the $connection with the commands which are written inside ""
        $sqlInsert->bind_param("s", $_POST["UserName"]); //ss means string string. bind_param is LINKING with the preparation       
        $sqlInsert->execute();
        $result = $sqlInsert->get_result();
        $row = $result->fetch_assoc();
        $numberofrows = $result->num_rows;

        if($numberofrows > 0 && $row["UserName"] === $_POST["UserName"] &&  $row["UserPsw"] === $_POST["PswOne"]){
            print("You are logged in!");
        }else{
            print("You are not logged in!");
        }

        
    }
    ?>

        <h1>This is my login page</h1>
        <form method="POST">
            <p>Username: </p><input type="text" name="UserName" placeholder="Username">
            <p>Password: </p><input type="password" name="PswOne" placeholder="Password">
            <input type="submit" value="Log in">
        </form>
    
</body>

</html>