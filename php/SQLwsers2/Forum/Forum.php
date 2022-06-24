<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <style>
    div{
        border: 2px solid red;
        
    }
    .builtdiffrent{
        background-color: lightblue;
    }
    </style>
</head>
<body>
<?php
      $host="localhost";
    $user="root";
    $psw="";
    $portnu=3306;
    $database="Forum";
    $connection= new mysqli($host,$user,$psw,$database,$portnu);
    $message=0;
    if(isset($_POST["UserName"])){
        $name=$_POST["UserName"];
        $text=$_POST["UserText"];
        $insert=$connection->prepare("Insert INTO Text(UserName, UserText) Values (?,?)");
        $insert->bind_param("ss",$name,$text);
        $insert->execute();
        header("Refresh:0");
        die();
    }
$textdisplay=$connection->prepare("SELECT UserName, UserText from Text order by TextID");
$textdisplay->execute();
$result=$textdisplay->get_result();
while($row=$result->fetch_assoc()){ 
    $message++;
    if($message%2){
    ?>

<div>
<p><?= $row["UserName"];?></p>
<p><?= $row["UserText"]?></p>
</div>
<?php
    }
    else{
    ?>

<div class="builtdiffrent">
<p><?= $row["UserName"];?></p>
<p><?= $row["UserText"]?></p>
</div>
<?php
    }
}
    ?>
    <form method="POST">
    <input type="text" placeholder="Name" name="UserName">
    <input type="textarea" placeholder="Your Text" name="UserText">
    <input type="submit" value="Send" name="Submit">
    </form>
</body>
</html>