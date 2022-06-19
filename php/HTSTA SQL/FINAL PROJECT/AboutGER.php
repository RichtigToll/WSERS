<?php
include_once("CommonCode.php");
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Über</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='Navbar.css?t=<?= time(); ?>'>
    <script src='main.js'></script>
</head>

<body>
    <?php
    $ActivePage = "About";
    $FlagSelectedGER = "SelectedFlag";
    $URL = "AboutGER.php";
    $URL2 = "About.php";
    include("navigationGER.php");
    ?>

    <div id="top">
        <div>
            <h1 id="BigTextAbout">Die Geschichte von der "FINAL PROJECT" Webseite</h1>
        </div>
        <div>
            <h1>Sommer 2019 - Das Erlenen von HTML</h1>
            <h1>Winter 2019 - Das Erlenen von CSS</h1>
            <h1>Sommer 2020 - Beginn der "FINAL PROJECT" Webseite</h1>
            <h1>Sommer 2020 - Die erste Version der Seite</h1>
            <h1>Herbst 2021 - Neubearbeitung der "FINAL PROJECT" Webseite</h1>
            <h1>Herbst 2021 - Das Hinzufügen von PHP Code</h1>
            <h1>Winter 2022 - Die zweite Version der Seite</h1>
        </div>
    </div>
</body>

</html>