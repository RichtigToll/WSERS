<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .comment {
            height: 50px;
            width: 200px;
            background-color: red;
        }

        .comment:nth-child(2n) {
            height: 50px;
            width: 200px;
            background-color: yellow;
        }
    </style>
</head>

<body>
    <?php
    $name = "localhost";
    $user = "root";
    $pwd = "";
    $database = "FORUMS";
    $connection = mysqli_connect($Names, $user, $pwd, $database);

    //Insert Comments
    if (isset($_POST['myNames'])) {
        $Names = $_POST['myNames'];
        $Texts = $_POST['myTexts'];
        $insert = $connection->prepare("INSERT INTO MyMessages(Names, Texts) VALUES (?, ?)");
        $insert->bind_param("ss", $Names, $Texts);
        $insert->execute();
    }

    //Show MyMessages

    ?>
    <div class="comment-section">
        <?php
        $commentrows = $connection->prepare("SELECT Names, Texts FROM MyMessages ORDER BY TextssID");
        $commentrows->execute();
        $resultMyMessages = $commentrows->get_result();
        while ($res2 = $resultMyMessages->fetch_assoc()) {
        ?>
            <div class="comment">
                <p class="user"><?= $res2['Names'] ?></p>
                <p class="message"><?= $res2['Texts'] ?></p>
            </div>
        <?php
        }
        ?>
    </div>
    <form action="" method="POST">
        <input type="Texts" value="Names" Names="commNames">
        <input type="Textsarea" value="Comment Texts" Names="commTexts">
        <input type="submit" value="Send" Names="submitBtn">
    </form>
    <script>
    </script>
</body>

</html>