<?php
include_once "tartalom.php";
include_once "reg_session.php";
$userExists = false;
$message = "";

if (isset($_POST["req"])) {
    if (!isset($_POST["felhesznalo_nev"]) || !isset($_POST["nev"]) || !isset($_POST["jelszo"]) || !isset($_POST["jelszo_ujra"]) || !isset($_POST["telefon"]) || !isset($_POST["email"]) || !isset($_POST["iranyito_szam"]) || !isset($_POST["varos"]) || !isset($_POST["utca_nev"]) || !isset($_POST["hazszam"])) {
        die("<strong>HIBA:</strong> Minden kötelező mezőt ki kell tölteni! <a href='regisztracio.php'>Vissza a Regisztrációhoz</a>");
    }
    if (strlen($_POST["felhesznalo_nev"]) < 6) {
        die("<strong>HIBA:</strong> A felhasználónévnek legalább 6 karakter hosszúnak kell lennie! <a href='regisztracio.php'>Vissza a Regisztrációhoz</a>");
    }
    if (strlen($_POST["jelszo"]) < 8) {
        die("<strong>HIBA:</strong> A jelszónak legalább 6 karakter hosszúnak kell lennie! <a href='regisztracio.php'>Vissza a Regisztrációhoz</a>");
    }
    if (strlen($_POST["jelszo"]) < 8) {
        die("<strong>HIBA:</strong> A jelszónak legalább 8 karakter hosszúnak kell lennie! <a href='regisztracio.php'>Vissza a Regisztrációhoz</a>");
    }
    if ($_POST["iranyito_szam"] < 1000 || $_POST["iranyito_szam"] > 9999) {
        die("<strong>HIBA:</strong> A jelszónak legalább 8 karakter hosszúnak kell lennie! <a href='regisztracio.php'>Vissza a Regisztrációhoz</a>");
    }
    if ($_POST["jelszo"] !== $_POST["jelszo_ujra"]) {
        die("<strong>HIBA:</strong> A megadott jelszavak nem egyeznek! <a href='regisztracio.php'>Vissza a Regisztrációhoz</a>");
    }
    foreach ($_SESSION["regisztraltFelhasznalok"] as $user) {
        if ($user->getUsername() === $_POST["felhesznalo_nev"]) {
            $userExists = true;
            break;
        }
    }
    if ($userExists === true) {
        die("<strong>HIBA:</strong> A megadott felhasználónév foglalt! <a href='regisztracio.php'>Vissza a Regisztrációhoz</a>");
    } else {
        if (isset($_FILES["kep"])) {
            $extensions = ["jpg", "png"];
            $imageExtension = strtolower(pathinfo($_FILES["kep"]["name"], PATHINFO_EXTENSION));
            if (in_array($imageExtension, $extensions)) {
                if ($_FILES["kep"]["error"] === 0) {
                    if ($_FILES["kep"]["size"] <= 10485760) { // Max. 10 MB
                        $destination = "profil/" . $_POST["felhesznalo_nev"] . "." . $imageExtension;
                    } else {
                        die("<strong>HIBA:</strong> A kép mérete túl nagy! Maximális méret: 10 MB. <a href='regisztracio.php'>Vissza a Regisztrációhoz</a>");
                    }
                    if (move_uploaded_file($_FILES["kep"]["tmp_name"], $destination)) {
                        $message .= "Sikeres fájlfeltöltés";
                    } else {
                        die("<strong>HIBA:</strong> A kép mentése sikertelen! <a href='regisztracio.php'>Vissza a Regisztrációhoz</a>");
                    }
                } else {
                    die("<strong>HIBA:</strong> A kép feltöltése közben hiba lépett fel! Próbáld meg újra! <a href='regisztracio.php'>Vissza a Regisztrációhoz</a>");
                }
            } else {
                die("<strong>HIBA:</strong> A kép kiterjesztése nem megfelelő! Megfelelő formátumok: PNG, JPG. <a href='regisztracio.php'>Vissza a Regisztrációhoz</a>");
            }
        }
        $registrateUser = new User($_POST["felhasznalo_nev"], $_POST["nev"], $_POST["jelszo"], $_POST["telefon"], $_POST["email"], $_POST["iranyito_szam"], $_POST["varos"], $_POST["utca_nev"], $_POST["hazszam"], $_POST["emelet"], $_POST["ajto"], $_POST["felhesznalo_nev"] . "." . $imageExtension);
        array_push($_SESSION["regisztraltFelhasznalok"], $registrateUser);
        $registrateUser->writeFile();
        $message .= "Sikeres regisztráció!";
    }
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8"/>
    <meta name="author" content="Fityó András és Körmöczi Róbert"/>
    <meta name="description" content="Ez az oldal egy bevásárló listát valósít meg."/>
    <title>Regisztráció</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/regisztracio.css"/>
    <link rel="icon" href="img/favicon.ico"/>
    <link rel="stylesheet" media="print" href="css/print.css" />
</head>
<body>
<?php get_header("regisztracio"); ?>
<main>
    <div class="content-wrap">
        <div id="registration">
            <form action="regisztracio.php" method="post">

            </form>
        </div>
    </div>
</main>
</body>
</html>
