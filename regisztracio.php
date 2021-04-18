<?php
include_once "tartalom.php";
include_once "reg_session.php";
$userExists = false;
$message = "";

if (isset($_POST["registration"])) {
    if (!isset($_POST["felhasznalo_nev"]) || !isset($_POST["nev"]) || !isset($_POST["jelszo"]) || !isset($_POST["jelszo_ismet"]) || !isset($_POST["telefon"]) || !isset($_POST["email"]) || !isset($_POST["iranyito_szam"]) || !isset($_POST["varos"]) || !isset($_POST["utca_nev"]) || !isset($_POST["hazszam"])) {
        die("<strong>HIBA:</strong> Minden kötelező mezőt ki kell tölteni! <a href='regisztracio.php'>Vissza a Regisztrációhoz</a>");
    }
    if (strlen($_POST["felhasznalo_nev"]) < 6) {
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
    if ($_POST["jelszo"] !== $_POST["jelszo_ismet"]) {
        die("<strong>HIBA:</strong> A megadott jelszavak nem egyeznek! <a href='regisztracio.php'>Vissza a Regisztrációhoz</a>");
    }
    foreach ($_SESSION["regisztraltFelhasznalok"] as $user) {
        if ($user->getUsername() === $_POST["felhasznalo_nev"]) {
            $userExists = true;
            break;
        }
    }
    if ($userExists === true) {
        die("<strong>HIBA:</strong> A megadott felhasználónév foglalt! <a href='regisztracio.php'>Vissza a Regisztrációhoz</a>");
    } else {
        $imageExtension = null;
        if (is_uploaded_file($_FILES["kep"]["tmp_name"])) {
            $extensions = ["jpg", "jpeg", "png"];
            $imageExtension = strtolower(pathinfo($_FILES["kep"]["name"], PATHINFO_EXTENSION));
            if (in_array($imageExtension, $extensions)) {
                if ($_FILES["kep"]["error"] === 0) {
                    if ($_FILES["kep"]["size"] <= 10485760) { // Max. 10 MB
                        $destination = "./profil/" . $_POST["felhasznalo_nev"] . "." . $imageExtension;
                    } else {
                        die("<strong>HIBA:</strong> A kép mérete túl nagy! Maximális méret: 10 MB. <a href='regisztracio.php'>Vissza a Regisztrációhoz</a>");
                    }
                    if (move_uploaded_file($_FILES["kep"]["tmp_name"], $destination)) {
                        $message .= "Sikeres fájlfeltöltés!<br />";
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
        $registrateUser = new User($_POST["felhasznalo_nev"], $_POST["nev"], $_POST["jelszo"], $_POST["telefon"], $_POST["email"], $_POST["iranyito_szam"], $_POST["varos"], $_POST["utca_nev"], $_POST["hazszam"], $_POST["emelet"], $_POST["ajto"], (!is_null($imageExtension)) ? $_POST["felhasznalo_nev"] . "." . $imageExtension : "");
        array_push($_SESSION["regisztraltFelhasznalok"], $registrateUser);
        $registrateUser->writeFile();
        $message .= "Sikeres regisztráció!<br />";
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
        <div id="registration_container">
            <?php
                echo "<p>" . $message . "</p>"
            ?>
            <form action="regisztracio.php" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Felhasználói adatok</legend>
                    <div class="input_box">
                        <label for="felhasznalo_nev"><span class="required">*</span>Felhasználónév:</label>
                        <input type="text" id="felhasznalo_nev" name="felhasznalo_nev" placeholder="Pl. bakos12" required/>
                    </div>
                    <div class="input_box">
                        <label for="jelszo"><span class="required">*</span>Jelszó:</label>
                        <input type="password" id="jelszo" name="jelszo" placeholder="Min. 8 karakter" required/>
                    </div>
                    <div class="input_box">
                        <label for="jelszo_ismet"><span class="required">*</span>Jelszó ismét:</label>
                        <input type="password" id="jelszo_ismet" name="jelszo_ismet" placeholder="Min. 8 karakter" required/>
                    </div>
                    <div class="input_box">
                        <label for="email"><span class="required">*</span>E-mail:</label>
                        <input type="email" id="email" name="email" placeholder="Pl. vezeteknev.keresztnev@pelda.hu" required/>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Személyes adatok</legend>
                    <div class="input_box">
                        <label for="nev"><span class="required">*</span>Név:</label>
                        <input type="text" id="nev" name="nev" placeholder="Név" required/>
                    </div>
                    <div class="input_box">
                        <label for="telefon"><span class="required">*</span>Telefonszám:</label>
                        <input type="tel" id="telefon" name="telefon" placeholder="pl. +36123456789" required/>
                    </div>
                    <div class="input_box">
                        <label for="iranyito_szam"><span class="required">*</span>Irányítószám:</label>
                        <input type="number" id="iranyito_szam" name="iranyito_szam" placeholder="pl. 1112" min="1000" max="9999" required/>
                    </div>
                    <div class="input_box">
                        <label for="varos"><span class="required">*</span>Város:</label>
                        <input type="text" id="varos" name="varos" placeholder="pl. Szeged" required/>
                    </div>
                    <div class="input_box">
                        <label for="utca_nev"><span class="required">*</span>Közterület neve (utca, út stb.):</label>
                        <input type="text" id="utca_nev" name="utca_nev" placeholder="pl. Erzsébet utca" required/>
                    </div>
                    <div class="input_box">
                        <label for="hazszam"><span class="required">*</span>Házszám:</label>
                        <input type="number" id="hazszam" name="hazszam" placeholder="pl. 12" required/>
                    </div>
                    <div class="input_box">
                        <label for="emelet">Épület/emelet:</label>
                        <input type="text" id="emelet" name="emelet" placeholder="pl. C/5"/>
                    </div>
                    <div class="input_box">
                        <label for="ajto">Ajtó:</label>
                        <input type="number" id="ajto" name="ajto" placeholder="pl. 15"/>
                    </div>
                    <div class="input_box">
                        <label for="kep">Profilkép:</label>
                        <input type="file" id="kep" name="kep" accept=".jpeg,.png,.jpg"/>
                    </div>
                </fieldset>
                <input type="submit" id="registration" name="registration" value="Regisztrálok">
            </form>
        </div>
    </div>
</main>
</body>
</html>
