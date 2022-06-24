<div id="flag">
        <img id="LanguageLogo" src="./images/SwitchLANG.png" alt="Deutsch">
        <div class="down">
            <a href="<?= $URL; ?>?LANG=DE"> <img src="./images/German.png" alt="Deutsch" class="FlagSize"></a>
            <a href="<?= $URL2; ?>?LANG=EN" > <img <?php if (isset($FlagSelected)) if ($FlagSelected == "SelectedFlag") { print("id = 'FlagSelected'");} ?> src="./images/English.png" alt="English" class="FlagSize"></a>
        </div>
    </div>