<div class="navbar">
    <img src="./images/GLUXeng.png" text="Welcome" width="21%">
    <h3>INFO PAGE</h3>
    <div id="alllinks">
        <a href="Products.php" class="mainnavbar">Back</a>
    </div>
    <div id="flag">
        <img id="LanguageLogo" src="./images/SwitchLANG.png" alt="Deutsch">
        <div class="down">
            <a href="<?= $URL; ?>"> <img src="./images/German.png" alt="Deutsch" class="FlagSize"></a>
            <a href="<?= $URL2; ?>" > <img <?php if (isset($FlagSelected)) if ($FlagSelected == "SelectedFlag") { print("id = 'FlagSelected'");} ?> src="./images/English.png" alt="English" class="FlagSize"></a>
        </div>
    </div>
</div>