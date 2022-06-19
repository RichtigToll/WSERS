<div class="navbar">
<img src="./images/GLUXger.png" style="transform: translateX(1%);" text="LuxGovernment" width="20%">
    <h3>INFORMATIONEN</h3>
    <div id="alllinks">
        <a href="ProductsGER.php" class="navbarborders">Zurück</a>
    </div>
    <div id="flag">
        <img id="LanguageLogo" src="./images/SwitchLANG.png" alt="Deutsch">
        <div class="down">
            <a href="<?= $URL; ?>"> <img <?php if (isset($FlagSelected)) if ($FlagSelected == "SelectedFlag") { print("id = 'FlagSelected'");} ?> src="./images/German.png" alt="English" class="FlagSize"></a>
            <a href="<?= $URL2; ?>" > <img src="./images/English.png" alt="Deutsch" class="FlagSize"></a>
        </div>
    </div>
</div>