<?php

include_once "tartalom.php";
include_once "reg_session.php";
if (!isset($_SESSION["user"])) {
    header("Location: bejelentkezes.php");
}

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8"/>
    <meta name="author" content="Fityó András és Körmöczi Róbert"/>
    <meta name="description" content="Ez az oldal egy bevásárló listát valósít meg."/>
    <title>Bejelentkezés</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/bejelentkezes.css"/>
    <link rel="icon" href="img/favicon.ico"/>
    <link rel="stylesheet" media="print" href="css/print.css"/>
</head>
<body>
<?php get_header("profil"); ?>
<main>
    <div id="profil">
        <div class="content-wrap">
            <h1>Saját profil</h1>
            <?php echo (!empty($_SESSION["user"]->getImage()) ? '<img src="profil/' . $_SESSION["user"]->getImage() . '" alt="Felhasználó kép"/>' : "&nbsp;") .  '
            <p>Név: ' . $_SESSION["user"]->getName() .
                '</p>
            <p>Felhasználónév: ' . $_SESSION["user"]->getUsername() .
                '</p>
            <form id="logout" action="bejelentkezes.php" method="post" enctype="multipart/form-data">
                <input type="submit" value="Kijelentkezés" name="logout"/>
                <br/>
                <br/>
            </form>
            '; ?>
        </div>
    </div>
</main>
</body>
</html>
