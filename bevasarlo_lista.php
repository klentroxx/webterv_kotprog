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
    <title>Bevásárló lista</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/bevasarlo_lista.css"/>
    <link rel="icon" href="img/favicon.ico"/>
    <link rel="stylesheet" media="print" href="css/print.css"/>
</head>
<body>
<?php get_header("bevasarlo_lista"); ?>

<table>
    <tr>
        <th id="product"> Termék</th>
        <th id="amount">Mennyiség</th>
        <th id="important">Fontos?</th>
    </tr>

    <?php
    if (isset($_SESSION["feltoltottTermekek"])) :
        foreach ($_SESSION["feltoltottTermekek"] as $product) :
            ?>
            <tr>
                <td headers="product"><?php echo $product->getName(); ?></td>
                <td headers="amount"
                    class="amount"><?php echo $product->getQuantity() . " " . $product->getUnit(); ?></td>
                <td headers="important"
                    class="important"><?php echo $product->getIsImportant() === "important" ? "Igen" : "Nem"; ?></td>
            </tr>
        <?php
        endforeach;
    endif;
    ?>
</table>

</body>
</html>
