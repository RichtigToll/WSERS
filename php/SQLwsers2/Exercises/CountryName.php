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
    $database = "firstdatabase";
    $portNo = 3306;

    $connection = new mysqli($host, $user, $psw, $database, $portNo);
    $sqlStatement = $connection->prepare("SELECT * from countries");
    // prepare the $connection with the commands which are written inside ""
    if ($sqlStatement == false) {
        die("Incorrect SQL statement!");
    }
    $sqlStatement->execute();
    $result = $sqlStatement->get_result();
    ?>

    <table>
        <tr>
            <th>CountryName</th>
        </tr>
        <?php
        $rowNum = $result->num_rows;

        if ($rowNum == 0) {
            print("No DATA");
        } else {
            while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row["CountryName"]; ?></td>
                </tr>
        <?php
            }
        }
        ?>

    </table>
</body>

</html>