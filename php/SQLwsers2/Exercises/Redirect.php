<?php
if (isset($_POST["mynumber"])) { //WE ALWAYS PUT THE HEADER CODE ON TOP OF THE FILE
    if ($_POST["mynumber"] == 1) {
        header("Location:Redirect2.php");
        die();
    }
}
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
    small test redirect
    <form method="POST">
        <input type="text" name="mynumber">
        <button type="Submit">GO</button>
    </form>

</body>

</html>