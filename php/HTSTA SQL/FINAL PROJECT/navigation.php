<div class="navbar">
    <img src="./images/GLUXeng.png" style="transform: translateX(1%);" text="LuxGovernment" width="17%" >
    <div id="alllinks">
        <a href="Home.php" class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Home") { print("active");} ?>">Home</a>
        <a href="Products.php"  class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Products") { print("active");} ?>">My Products</a>
        <a href="About.php"  class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "About") { print("active");} ?>">About</a>
        <a href="Address.php"  class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Address") { print("active");} ?>">Contact us!</a>
        
<?php if($_SESSION["UserLoggedIn"]){
?>
<div id="contact">
    <a class="navbarborders" style="background-color: lightgrey">Account</a>
        <div class="downtwo">
        <a href="ShoppingCard.php" id="blacktext" class="navbarborders <?php if (isset($ActivePage)) if ($ActivePage == "Login") { print(" active");} ?>">Shopping card</a>
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