<div class="navbar">
    <img src="./images/GLUXger.png" style="transform: translateX(1%);" text="LuxGovernment" width="17%">
    <div id="alllinks">
        <a href="HomeGER.php" class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Home") { print("class = active");} ?>">Startseite</a>
        <a href="ProductsGER.php" class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Products") { print("class = active");} ?>">Meine Produkte</a>
        <a href="AboutGER.php" class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "About") { print("class = active");} ?>">Geschichte</a>
        <div id="contact">
            <a class="navbarborders" style="background-color: lightgrey">Profil</a>
            <div class="downtwo">
                <a href="LoginGER.php" id="blacktext" class="navbarborders <?php if($ActivePage == "Login") { print ("class = active");} ?>">Anmelden</a>
                <a href="SignUpGER.php" id="blacktext" class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Form") { print(" active");} ?>">Registrieren</a>
            </div>
        </div>
            <a href="AddressGER.php" class="navbarborders <?php if($ActivePage == "Address") { print ("class = active");} ?>">Kontakt</a>
    </div>
    <?php 
    include_once("LanguageSelector.php");
    ?>
</div>