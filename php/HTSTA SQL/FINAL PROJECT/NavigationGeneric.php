<?php

function BuildNavBar($Buttons, $Links, $ActivePage)
{

?>
    <div class="navbar">
        <div>
            <h1><img src="./images/vdl.jpg" text="GemengKlierf" width="100px" height="60px"></h1>
        </div>
        <div id="alllinks">

            <?php
            for ($i = 0; $i < count($Buttons); $i++) { ?>
                <a href="<?= $Links[$i] ?>" <?php if ($ActivePage == $i) {
                                                print("class = 'active'");
                                            } ?> class="mainnavbar"><?= $Buttons[$i] ?></a>
                <?php if ($Buttons == 3) { ?>
                    <div id="contact">
                        <a class="mainnavbar"><?= $Buttons[$i] ?></a>
                        <div class="downtwo">
                            <a href="<?= $Links[$i] ?>"><?= $Buttons[$i] ?></a>
                            <a href="<?= $Links[$i] ?>"><?= $Buttons[$i] ?></a>
                        </div>
                    </div>
                <?php } ?>

            <?php }
            $URL = $Links[$ActivePage];
            $URL2 = $URL;

            include_once("LanguageSelector.php"); ?>


        </div> <!-- This DIV seperate Buttons with LANGlogo -->
    </div>

<?php

} ?>