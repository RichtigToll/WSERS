<?php
include_once("CommonCode.php");
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Startseite</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='Navbar.css?t=<?= time(); ?>'>
    <script src='main.js'></script>
</head>

<body>
    <?php
    $ActivePage = "Home";
    $FlagSelectedGER = "SelectedFlag";
    $URL = "HomeGER.php";
    $URL2 = "Home.php";
    include("navigation.php");
    ?>
    
    <div id="top">
        <h1 id="Bigtitlehome">WILLKOMMEN ZUR "FINAL PROJECT" SEITE!</h1>
        <h1>Was ist Lorem Ipsum?</h1>
        <h2>Lorem Ipsum ist ein einfacher Demo-Text für die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text seit 1500, als ein unbekannter Schriftsteller eine Hand voll Wörter nahm und diese durcheinander warf um ein Musterbuch zu erstellen. Es hat nicht nur 5 Jahrhunderte überlebt, sondern auch in Spruch in die elektronische Schriftbearbeitung geschafft (bemerke, nahezu unverändert). Bekannt wurde es 1960, mit dem erscheinen von "Letraset", welches Passagen von Lorem Ipsum enhielt, so wie Desktop Software wie "Aldus PageMaker" - ebenfalls mit Lorem Ipsum.</h2>
        <h1>Wo kommt es her?</h1>
        <h2>Glauben oder nicht glauben, Lorem Ipsum ist nicht nur ein zufälliger Text. Er hat Wurzeln aus der Lateinischen Literatur von 45 v. Chr, was ihn über 2000 Jahre alt macht. Richar McClintock, ein Lateinprofessor des Hampden-Sydney College in Virgnia untersuche einige undeutliche Worte, "consectetur", einer Lorem Ipsum Passage und fand eine unwiederlegbare Quelle. Lorem Ipsum komm aus der Sektion 1.10.32 und 1.10.33 des "de Finibus Bonorum et Malorum" (Die Extreme von Gut und Böse) von Cicero, geschrieben 45 v. Chr. Dieses Buch ist Abhandlung der Ethiktheorien, sehr bekannt wärend der Renaissance. Die erste Zeile des Lorem Ipsum, "Lorem ipsum dolor sit amet...", kommt aus einer Zeile der Sektion 1.10.32.</h2>
        <h1>Warum benutzen wir es?</h1>
        <h2>Es ist ein lang erwiesener Fakt, dass ein Leser vom Text abgelenkt wird, wenn er sich ein Layout ansieht. Der Punkt, Lorem Ipsum zu nutzen, ist, dass es mehr oder weniger die normale Anordnung von Buchstaben darstellt und somit nach lesbarer Sprache aussieht. Viele Desktop Publisher und Webeditoren nutzen mittlerweile Lorem Ipsum als den Standardtext, auch die Suche im Internet nach "lorem ipsum" macht viele Webseiten sichtbar, wo diese noch immer vorkommen. Mittlerweile gibt es mehrere Versionen des Lorem Ipsum, einige zufällig, andere bewusst.</h2>
    </div>
</body>

</html>