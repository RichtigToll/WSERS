<?php
include_once("CommonCode.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" action="myBadAPI.php">
        <input type="hidden" name="SENDER" value="secondPage.php">
        <input type="text" name="Username">
        <input type="submit" name="Go">
    </form>
</body>
</html>