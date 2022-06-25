<div class="navbar">

    <?php
    if ($_SESSION["Lang"] == "EN") {
    ?>
        <img src="./images/GLUXeng.png" id="ShopCardNav" text="LuxGovernment" width="17%">
        <h3>EXTRA PAGE</h3>
        <div id="alllinks">
            <a href="Products.php" class="navbarborders" style="text-decoration: none;">Back</a>
        </div>
    <?php
    } else { ?>
        <div class="navbar">
            <img src="./images/GLUXger.png" style="transform: translateX(1%); transform: translateY(-10%);" text="LuxGovernment" width="20%">
            <h3>EXTRA SEITE</h3>
            <div id="alllinks">
                <a href="ProductsGER.php" class="navbarborders" style="text-decoration: none;">Zurück</a>
            </div>
        <?php
    }
        ?>
        <?php
        include_once("LanguageSelector.php");
        ?>
        </div>