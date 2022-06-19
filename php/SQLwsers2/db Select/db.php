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
    $database = "People";
    $portNo = 3306;

    $connection = new mysqli($host, $user, $psw, $database, $portNo);
    $sqlStatement = $connection->prepare("SELECT * from countries ORDER BY CountryId");
    $sqlStatement->execute();
    $result = $sqlStatement->get_result();
    ?>

    <form method="POST">
        Countries: <select name="mySelect">
            <option>Select</option>
            <?php
            while ($row = $result->fetch_assoc()) { ?>

                <option value="<?= $row["CountryID"]; ?>"><?= $row["CountryName"]; ?></option>

            <?php } ?>
        </select>
        <button type="submit">Submit</button>
    </form>

    <br>
    <br>

    <?php

    if (isset($_POST["mySelect"])) { 
        $sqlStatement2 = $connection->prepare("SELECT * FROM Cities WHERE CityId=?");
        $sqlStatement2->bind_param("s", $_POST["mySelect"]);
        $sqlStatement2->execute();
        $result2 = $sqlStatement2->get_result();
        ?>
        <form method="POST">
            Cities of the selected country:
                <?php
                while ($row2 = $result2->fetch_assoc()) { ?>

                    <h1 value="<?= $row2["CityId"]; ?>"><?= $row2["CityName"]; ?></h1>

                <?php } ?>
            </select>
        </form>

    <?php } else { ?>
        <form method="POST">
            Cities: 
        </form>
    <?php } ?>

</body>

</html>