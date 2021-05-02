<?php
include_once "tartalom.php";
include_once "reg_session.php";
include_once "termek_session.php";
if (!isset($_SESSION["user"])) {
    header("Location: bejelentkezes.php");
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Fityó András és Körmöczi Róbert"/>
    <meta name="description" content="Ez az oldal egy bevásárló listát valósít meg."/>
    <title>Új termék hozzáadása</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/uj_hozzaadasa.css"/>
    <link rel="icon" href="img/favicon.ico"/>
    <link rel="stylesheet" media="print" href="css/print.css"/>
</head>
<body>
<?php get_header("uj_hozzaadasa"); ?>
<main>
    <div class="content-wrap">
        <?php
        if (isset($_POST["submit"])) {
            if (!isset($_POST["name"]) || !isset($_POST["quantity"]) || !isset($_POST["unit"])) {
                die("<div class='message'><strong>HIBA:</strong> A megjelölt mezők kitöltése kötelező: Árucikk, Mennyiség, Mértékegység <a href='uj_hozzaadasa.php'>Vissza az Új listaelemhez</a></div></div></main></body></html>");
            }
            $newProduct = new Product($_POST["name"], $_POST["quantity"], isset($_POST["best_before"]) ? $_POST["best_before"] : "", isset($_POST["important"]) ? $_POST["important"] : "", $_POST["unit"], isset($_POST["datetime_added"]) ? $_POST["datetime_added"] : "");
            array_push($_SESSION["feltoltottTermekek"], $newProduct);
            $newProduct->writeFile();
            $_POST = null;
            die("<div class='message'><strong>Új listaelem sikeresen felvéve.</strong> <a href='uj_hozzaadasa.php'>Új listaelem felvétele</a></div></div></main></body></html>");
        }
        ?>
        <form action="uj_hozzaadasa.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="form-input">
                <label for="name"><span class="required">*</span>Árucikk:</label>
                <input type="text" name="name" id="name" size="30" required/>
            </div>
            <div class="form-input">
                <label for="quantity"><span class="required">*</span>Mennyiség:</label>
                <input type="number" name="quantity" id="quantity" step="0.001" required/>
            </div>
            <div class="form-input">
                <label for="best_before">Lejárati dátum:</label>
                <input type="date" id="best_before" name="best_before" value="<?php echo date("Y-m-d") ?>">
            </div>
            <div class="form-input row">
                <label for="important">Nagyon fontos?</label>
                <input type="checkbox" id="important" name="important" value="important">
            </div>
            <fieldset>
                <legend><span class="required">*</span>Mértékegység</legend>
                <div class="input-row">
                    <div class="form-input">
                        <label for="kg">Kg</label>
                        <input type="radio" id="kg" name="unit" value="kg" required>
                    </div>
                    <div class="form-input">
                        <label for="pieces">Darab</label>
                        <input type="radio" id="pieces" name="unit" value="db" required>
                    </div>
                </div>
            </fieldset>
            <div class="form-input">
                <input type="reset" id="reset" value="Űrlap ürítése">
            </div>
            <div class="form-input">
                <input type=hidden id="datetime_added" name="datetime_added" value="<?php echo date("Y.m.d. H:i:s") ?>"/>
            </div>
            <div class="form-input">
                <input type="submit" name="submit" value="Új hozzáadása">
            </div>
            <div class="required-warning">
                <span class="required">*</span>: A mezők kitöltése kötelező
            </div>
        </form>
    </div>
</main>
</body>
</html>
