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
    $sqlState = $connection->prepare("SELECT CountryName from MyCountries");
    $sqlState->execute();
    $result = $sqlState->get_result();
    ?>

    <form method="POST">
        <?php
        while ($row = $result->fetch_assoc()) { ?>

            <h1><?= $row["CountryName"] ?></h1>

        <?php
        }
        ?>
    </form>



</body>

</html>