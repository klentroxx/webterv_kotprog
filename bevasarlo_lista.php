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
    <title>Bevásárló lista</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bevasarlo_lista.css" />
    <link rel="icon" href="img/favicon.ico" />
    <link rel="stylesheet" media="print" href="css/print.css" />
</head>
<body>
<?php get_header("bevasarlo_lista"); ?>

<table>
    <tr>
        <th id="product"> Termék</th>
        <th id="amount">Mennyiség</th>
    </tr>
    <tr>
        <td headers="product">Csirkemell</td>
        <td headers="amount" class="amount">2 kg</td>
    </tr>
    <tr>
        <td headers="product">Papírtörlő</td>
        <td headers="amount" class="amount">1 db</td>
    </tr>
    <tr>
        <td headers="product">Mosogatószer</td>
        <td headers="amount" class="amount">1 db</td>
    </tr>
    <tr>
        <td headers="product">Kézfertőtlenítő</td>
        <td headers="amount" class="amount">2 db</td>
    </tr>
</table>

</body>
</html>
