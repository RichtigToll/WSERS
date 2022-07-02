<?php
include_once("CommonCode.php");
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Schreibt uns!</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='Navbar.css?t=<?= time(); ?>'>
    <script src='main.js'></script>
</head>

<?php
    $ActivePage = "Address";
    $FlagSelectedGER = "SelectedFlag";
    $URL = "AddressGER.php";
    $URL2 = "Address.php";
    include("navigation.php");
?>

<div class="Adressbox">
    <div>
        <h3 class="TextSize30">Unser Support!</h1>
    </div>
    <div>
        <h3 class="TextSize30">Team:</h1>
        <h1 class="TextSize20" id="InformationProduct">Francesco Linster</h1>
        <h1 class="TextSize20" id="InformationProduct">Diogo Carvalho</h1>
        <h1 class="TextSize20" id="InformationProduct">Jäff Glothen the 3rd</h1>
    </div>
    <div>
        <h3 class="TextSize30">Adresse:</h1>
        <h1 class="TextSize20" id="InformationProduct">Uelzecht-Strooss 420, L-4201 Esch an der Alzette</h1>
    </div>
    <div>
        <h3 class="TextSize30">Support:</h1>
        <h1 class="TextSize20" id="InformationProduct">+352 345 678 910</h1>
        oder
        <h1 class="TextSize20" id="InformationProduct">+352 109 876 543</h1>
    </div>
</div>
</div>
</body>

</html>