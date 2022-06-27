<?php
if ($_SESSION["Lang"] == "EN") {
?>
<div class="navbar">
    <img src="./images/GLUXeng.png" style="transform: translateX(1%);" text="LuxGovernment" width="17%" >
    <div id="alllinks">
        <a href="Home.php" class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Home") { print("active");} ?>">Home</a>
        <a href="Products.php"  class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Products") { print("active");} ?>">My Products</a>
        <a href="About.php"  class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "About") { print("active");} ?>">About</a>
        <a href="Address.php"  class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Address") { print("active");} ?>">Contact us!</a>
        
<?php if($_SESSION["UserLoggedIn"]){ ?>
<div id="contact">
    <a class="navbarborders" style="background-color: lightgrey">Account</a>
        <div class="downtwo">
            <a href="ShoppingCard.php" id="blacktext" class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Login") { print(" active");} ?>">Shopping card</a>
            <a href="Forum.php" id="blacktext" class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Login") { print(" active");} ?>">Forum</a>
            <?php if($_SESSION["UserType"] == "Admin"){
                ?>
                <a href="AdminOrders.php" id="blacktext" class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Login") { print(" active");} ?>">Orders</a>
                <?php
            } ?>
            <a onclick="document.getElementById('formLogout').submit();" href="#" id="blacktext" class="navbarborders">Logout</a>
        </div>
    </div>
    

    <form method="POST" hidden id="formLogout">
        <input type="text" name="LogoutHidden">
    </form>
<?php
if(isset($_POST["LogoutHidden"])){
    session_unset();
    session_destroy();
    header('Location: Home.php');
    die();
}
}else{
    ?>
<div id="contact">
            <a class="navbarborders" style="background-color: lightgrey">Account</a>
            <div class="downtwo">
                <a href="Login.php" id="blacktext"  class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Login") { print(" active");} ?>">Login</a>
                <a href="SignUp.php" id="blacktext"  class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Form") { print(" active");} ?>">Sign Up</a>
            </div>
        </div>
    <?php
} ?>        
       
    </div>
    <?php 
    include_once("LanguageSelector.php");
    ?>
</div>

<!-- GERMAN VERSION RIGHT HERE BELOW -->

<?php } else { ?>
<div class="navbar">
    <img src="./images/GLUXger.png" style="transform: translateX(1%);" text="LuxGovernment" width="17%" >
        <div id="alllinks">
            <a href="HomeGER.php" class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Home") { print("active");} ?>">Startseite</a>
            <a href="ProductsGER.php"  class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Products") { print("active");} ?>">Meine Produkte</a>
            <a href="AboutGER.php"  class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "About") { print("active");} ?>">Info</a>
            <a href="AddressGER.php"  class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Address") { print("active");} ?>">Kontaktieren</a>
        
    <?php if($_SESSION["UserLoggedIn"]){ ?>
            <div id="contact">
                <a class="navbarborders" style="background-color: lightgrey">Konto</a>
                    <div class="downtwo">
                        <a href="ShoppingCard.php" id="blacktext" class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Login") { print(" active");} ?>">Einkaufswagen</a>
                        <a href="Forum.php" id="blacktext" class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Login") { print(" active");} ?>">Chatten</a>
                        <?php if($_SESSION["UserType"] == "Admin"){ ?>
                            <a href="AdminOrders.php" id="blacktext" class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Login") { print(" active");} ?>">Bestellungen</a>
                        <?php } ?>
                        <a onclick="document.getElementById('formLogoutTwo').submit();" href="#" id="blacktext" class="navbarborders">Abmelden</a>
                    </div>
            </div>
    
    <form method="POST" hidden id="formLogoutTwo">
        <input type="text" name="LogoutHiddenTwo">
    </form>

    <?php
    if(isset($_POST["LogoutHiddenTwo"])){
        session_unset();
        session_destroy();
        header('Location: HomeGER.php');
        die();
    }
    }else{
    ?>
<div id="contact">
            <a class="navbarborders" style="background-color: lightgrey">Konto</a>
            <div class="downtwo">
                <a href="LoginGER.php" id="blacktext"  class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Login") { print(" active");} ?>">Anmelden</a>
                <a href="SignUpGER.php" id="blacktext"  class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Form") { print(" active");} ?>">Registrieren</a>
            </div>
        </div>
    <?php
} } ?>        
       
    </div>
    <?php 
    include_once("LanguageSelector.php");
    ?>
</div>