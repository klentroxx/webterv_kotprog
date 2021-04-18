<?php
include_once "tartalom.php";
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Fityó András és Körmöczi Róbert"/>
    <meta name="description" content="Ez az oldal egy bevásárló listát valósít meg."/>
    <title>Szegedi áruházak</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/terkep.css"/>
    <link rel="icon" href="img/favicon.ico"/>
    <link rel="stylesheet" media="print" href="css/print.css" />
</head>
<body>
<?php get_header("terkep"); ?>
<main>
    <div id="content">
        <div class="content-wrap">
            <p class="maptext"> Néhány szegedi bevásárló hely:</p>
            <img src="img/uzletek.png" alt="uzletek" class="picture" usemap="#uzletek" width="1124" height="672">
            <map name="uzletek">
                <area shape="rect" coords="150,50,170,90" href="https://auchan.hu/" alt="Auchan">
                <area shape="rect" coords="550,165,580,200" href="https://tesco.hu/" alt="Tesco">
            </map>
        </div>
    </div>
</main>
</body>
</html>
