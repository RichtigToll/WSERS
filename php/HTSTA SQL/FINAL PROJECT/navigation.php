<div class="navbar">
    <img src="./images/GLUXeng.png" style="transform: translateX(1%);" text="LuxGovernment" width="21%">
    <div id="alllinks">
        <a href="Home.php" style="text-decoration: none;" class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Home") { print("active");} ?>">Home</a>
        <a href="Products.php" style="text-decoration: none;" class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Products") { print("active");} ?>">My Products</a>
        <a href="About.php" style="text-decoration: none;" class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "About") { print("active");} ?>">About</a>
        <a href="Address.php" style="text-decoration: none;" class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Address") { print("active");} ?>">Contact us!</a>
        
<?php if($_SESSION["UserLoggedIn"]){
?>
    <a onclick="document.getElementById('formLogout').submit();" href="#" class="navbarborders">Logout</a>

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
                <a href="Login.php" id="blacktext" style="text-decoration: none;" class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Login") { print(" active");} ?>">Login</a>
                <a href="SignUp.php" id="blacktext" style="text-decoration: none;" class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Form") { print(" active");} ?>">Sign Up</a>
            </div>
        </div>
    <?php
} ?>        

        
    </div>
    <div id="flag">
        <img id="LanguageLogo" src="./images/SwitchLANG.png" alt="Deutsch">
        <div class="down">
            <a href="<?= $URL; ?>"> <img src="./images/German.png" alt="Deutsch" class="FlagSize"></a>
            <a href="<?= $URL2; ?>" > <img <?php if (isset($FlagSelected)) if ($FlagSelected == "SelectedFlag") { print("id = 'FlagSelected'");} ?> src="./images/English.png" alt="English" class="FlagSize"></a>
        </div>
    </div>
</div>