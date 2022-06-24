<div id="flag">
    <img id="LanguageLogo" src="./images/LANG.png" alt="Deutsch">
    <div class="down">
        <?php 
            if(isset($_GET["ProductID"])){
                $URL = $URL . "?ProductID=" . $_GET["ProductID"] . "&LANG=DE";
                $URL2 = $URL2 . "?ProductID=" . $_GET["ProductID"]. "&LANG=EN";
            } else {
                $URL = $URL . "?LANG=DE";
                $URL2 = $URL2 . "?LANG=EN";
            }
        ?>
        <a href="<?= $URL; ?>"> <img <?php if (isset($FlagSelectedGER)) if ($FlagSelectedGER == "SelectedFlag") {  print("id = 'FlagSelected'"); } ?> src="./images/German.png" alt="Deutsch" class="FlagSize"></a>
        <a href="<?= $URL2; ?>"> <img <?php if (isset($FlagSelected)) if ($FlagSelected == "SelectedFlag") {  print("id = 'FlagSelected'"); } ?> src="./images/English.png" alt="English" class="FlagSize"></a>
    </div>
</div>