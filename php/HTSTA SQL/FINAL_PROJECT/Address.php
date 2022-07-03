<?php
include_once("CommonCode.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Contact us!</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='Navbar.css?t=<?= time(); ?>'>
    <link rel="icon" href="./images/Logo.png" type="image/icon type">
    <script src='main.js'></script>
</head>

<body>
    <?php
    $ActivePage = "Address";
    $FlagSelected = "SelectedFlag";
    $URL = "AddressGER.php";
    $URL2 = "Address.php";
    include("navigation.php");
    ?>

    <div class="Adressbox" >
        <div>
            <h3 class="TextSize30">Our Support!</h3>
        </div>
        <div>
            <h3 class="TextSize30">Team:</h3>
            <h1 class="TextSize20" id="InformationProduct">Francesco Linster</h1>
            <h1 class="TextSize20" id="InformationProduct">Diogo Carvalho</h1>
            <h1 class="TextSize20" id="InformationProduct">Jäff Glothen the 3rd</h1>
        </div>
        <div>
            <h3 class="TextSize30">Address:</h3>
            <h1 class="TextSize20" id="InformationProduct">Uelzecht Strooss 120 - L-4010 Esch-sur-Alzette</h1>
        </div>
        <div>
            <h3 class="TextSize30">Support:</h3>
            <h1 class="TextSize20" id="InformationProduct">+352 345 678 910</h1>
            <p> or </p>
            <h1 class="TextSize20" id="InformationProduct">linfr140@gmail.lu</h1>
        </div>
    </div>
</body>

</html>