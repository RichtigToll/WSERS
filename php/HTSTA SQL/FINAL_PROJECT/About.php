<?php
include_once("CommonCode.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>About</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='Navbar.css?t=<?= time(); ?>'>
    <script src='main.js'></script>
</head>

<body>
    <?php
    $ActivePage = "About";
    $FlagSelected = "SelectedFlag";
    $URL = "AboutGER.php";
    $URL2 = "About.php";
    include("navigation.php");
    ?>

    <div id="top">
        <div>
            <h1 id="BigTextAbout">History of the Website!</h1>
        </div>
        <div>
            <h1>Summer 2019 - Starting of HTML studies</h1>
            <h1>Winter 2019 - Starting of CSS studies</h1>
            <h1>Summer 2020 - Starting creation of FINAL PROJECT</h1>
            <h1>Summer 2020 - First version of FINAL PROJECT</h1>
            <h1>Autumn 2021 - Restart of the FINAL PROJECT Website</h1>
            <h1>Autumn 2021 - Adding PHP to the FINAL PROJECT Website</h1>
            <h1>Winter 2022 - Second version of FINAL PROJECT</h1>
            <h1>Spring 2022 - Implementing SQL</h1>
        </div>
    </div>
</body>

</html>