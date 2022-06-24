<div class="navbar">
    <img src="./images/GLUXeng.png" style="transform: translateX(1%);" text="LuxGovernment" width="21%">
    <?php
    if ($_SESSION["Lang"] == "EN") {
    ?>
        <h3>INFO PAGE</h3>
        <div id="alllinks">
            <a href="Products.php" class="navbarborders">Back</a>
        </div>
    <?php
    } else { ?>
        <div class="navbar">
            <img src="./images/GLUXger.png" style="transform: translateX(1%);" text="LuxGovernment" width="20%">
            <h3>INFORMATIONEN</h3>
            <div id="alllinks">
                <a href="ProductsGER.php" class="navbarborders">Zurück</a>
            </div>
        <?php
    }
        ?>
        <?php
        include_once("LanguageSelector.php");
        ?>
        </div>