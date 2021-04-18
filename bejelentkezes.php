<?php
include_once "tartalom.php";
include_once "reg_session.php";

if (isset($_POST["login"])) {
    if (isset($_POST["unamelogin"]) && isset($_POST["pwlogin"])) {
        $loggedin = false;
        foreach ($_SESSION["regisztraltFelhasznalok"] as $userobj) {
            if ($userobj->getUsername() == $_POST["unamelogin"] && $userobj->getPassword() == $_POST["pwlogin"]) {
                $loggedin = true;
                $_SESSION["user"] = $userobj;
                break;
            }
        }
        if (!$loggedin) {
            die("<strong>Hiba: </strong> Hibás adat. <a href='bejelentkezes.php'>Vissza a bejeletkezeshez</a>");
        }
    }else{
        die("<strong>Hiba: </strong> Valamelyik mező nincs kitöltve! <a href='bejelentkezes.php'>Vissza a bejeletkezeshez</a>");
    }

}

if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
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
<?php get_header("bejelentkezes"); ?>
<main>
    <div id="profil">
        <div class="content-wrap">
            <h1>Saját profil</h1>
            <?php
            if (!isset($_SESSION["user"])) {
                echo '
            <p>Jelentkezzen be!</p>
                <form id="login" action="bejelentkezes.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Bejelentkezés</legend>
                        <label for="unamelogin">Felhasználónév:</label>
                        <br/>
                        <input required type="text" id="unamelogin" name="unamelogin" tabindex="1"/>
                        <br/>
                        <br/>
                        <label for="pwlogin">Jelszó:</label>
                        <br/>
                        <input required type="password" id="pwlogin" name="pwlogin" tabindex="2" placeholder="********"/>
                        <br/>
                        <br/>
                        <input type="submit" value="Bejelentkezés" name="login"/>
                    </fieldset>
                </form>

            ';
            } else {
                echo (!empty($_SESSION["user"]->getImage()) ? '<img src="profil/' . $_SESSION["user"]->getImage() . '" alt="Felhasználó kép"/>' : "&nbsp;") .  '    
                    <p>Név: ' . $_SESSION["user"]->getName() .
                '</p>
                    <p>Felhasználónév: ' . $_SESSION["user"]->getUsername() .
                '</p>
                    <form id="logout" action="bejelentkezes.php" method="post" enctype="multipart/form-data">
                    <input type="submit" value="Kijelentkezés" name="logout"/>
                    <br/>
                    <br/>
                    </form>
                ';

            }
            ?>
        </div>
    </div>
</main>
</body>
</html>



