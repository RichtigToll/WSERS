<?php

function BuildNavBar($Buttons, $Links, $ActivePage, $Language)
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

            <?php } ?>


        </div> <!-- This DIV seperate Buttons with LANGlogo -->

        <?php if ($Language == "English") { ?>
            <div id="flag">
                <img id="LanguageLogo" src="./images/SwitchLANG.png" alt="Logo">
                <div class="down">
                    <a href=""> <img src="./images/German.png" alt="Deutsch" class="FlagSize"></a>
                    <a href=""> <img id='FlagSelected' src="./images/English.png" alt="English" class="FlagSize"></a>
                </div>
            </div> <?php } else { ?>


            <div id="flag">
                <img id="LanguageLogo" src="./images/SwitchLANG.png" alt="Deutsch">
                <div class="down">
                    <a href=""> <img id='FlagSelected' src="./images/German.png" alt="Deutsch" class="FlagSize"></a>
                    <a href=""> <img src="./images/English.png" alt="English" class="FlagSize"></a>
                </div>
            </div> <?php } ?>
    </div>
    </div>
<?php } ?>