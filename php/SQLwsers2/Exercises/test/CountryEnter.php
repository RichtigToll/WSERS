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

    $host = "localhost";
    $user = "root";
    $psw = "";
    $database = "Countries";
    $portNo = 3306;
    $connection = new mysqli($host, $user, $psw, $database, $portNo);

    if (isset($_POST["UserCountry"])) {
        $mySQL = $connection->prepare("INSERT INTO MyCountries (CountryName) VALUES (?)");
        $mySQL->bind_param("s", $_POST["UserCountry"]);
        $mySQL->execute();
    }


    ?>

    <form method="POST">
        <input name="UserCountry" type="text" placeholder="Country">
        <button>Submit</button>
    </form>

    <?php
    $SelectSQL = $connection->prepare("SELECT CountryName from MyCountries");
    $SelectSQL->execute();
    $result = $SelectSQL->get_result();
    ?>

    <form method="POST">
        <?php
        while ($row = $result->fetch_assoc()) { ?>

            <p>You entered the Country: <?= $row["CountryName"] ?></p>

        <?php
        } 
        ?>
    </form>
</body>

</html>