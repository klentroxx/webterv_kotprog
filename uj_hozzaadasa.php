<?php
include_once "tartalom.php";
include_once "reg_session.php";

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Fityó András és Körmöczi Róbert" />
    <meta name="description" content="Ez az oldal egy bevásárló listát valósít meg." />
    <title>Új termék hozzáadása</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/uj_hozzaadasa.css" />
    <link rel="icon" href="img/favicon.ico" />
    <link rel="stylesheet" media="print" href="css/print.css" />
</head>
<body>
<?php get_header("uj_hozzaadasa"); ?>
   <form action="uj_cikk_felvetele.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <label for="arunev">Árucikk: <input type="text" name="arunev" id="arunev" size="30" /></label> <br />
        <label for="darab">Darabszám: <input type="number" name="darab" id="darab" required /></label> <br />
        <label>rejtett: <input type=hidden name="rejtett" /></label> <br />
        <label for="best-before">Lejárati dátum: <input type="date" id="best-before"></label> <br />
        <label for="important">Nagyon fontos? <input type="checkbox" id="important"></label>
        <label for="reset"><input type="reset" id="reset"></label>
        <fieldset>
            <legend>Mértékegység</legend>

            <label for="kg">kg</label>
            <input type="radio" name="unit" id="kg">
            <label for="db">Darab</label>
            <input type="radio" name="unit" id="db">
        </fieldset>

        <input type="submit" name="submit" value="Elküld">
    </form>
</body>
</html>
