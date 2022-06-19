<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page to create new animals into the db</title>
</head>

<body>
    <?php
    $host = "localhost";
    $user = "root";
    $psw = "";
    $database = "AnimalSelector";
    $portNo = 3306;

    $connection = new mysqli($host, $user, $psw, $database, $portNo);
    // prepare the $connection with the commands which are written inside ""

    if (isset($_POST["newAnimal"])) {
        //print "You want to insert a " . $_POST["newAnimal"] . " into the database";
        $sqlStatement = $connection->prepare("INSERT INTO Animals(AnimalName, Continent) VALUES (?,?)"); // We prepare first the insert and then the Select
        $sqlStatement->bind_param("ss", $_POST["newAnimal"], $_POST["continentOfAnimal"]); //ss means syntax syntax
        if ($sqlStatement->execute()) {
            print("We inserted the " .$_POST["newAnimal"]. "into the database <br>");
        } else {
            print("We did not insert the " .$_POST["newAnimal"]. "into the database <br>"); //If the animal already exists
        }
    }

    $sqlStatement = $connection->prepare("SELECT * from Animals");
    if ($sqlStatement == false) {
        die("Incorrect SQL statement!");
    }
    $sqlStatement->execute();
    $result = $sqlStatement->get_result();
    $NumberOfAnimals = $result->num_rows;

    if ($NumberOfAnimals == 0) {
        print "No animals were found";
    } else {
        while ($row = $result->fetch_assoc()) {
            print $row["AnimalName"] . " " . $row["Continent"] . "<br>";
        }
    }
    ?>

    <form method="POST">
        <input name="newAnimal">
        <select name="continentOfAnimal">
            <option>Europe</option>
            <option>America</option>
            <option>Africa</option>
            <option>Asia</option>
            <option>Australia&Oceania</option>
            <option>Antarctica</option>
        </select>
        <input type="submit" value="GO!">
    </form>
</body>

</html>