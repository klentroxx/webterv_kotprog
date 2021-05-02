<?php
include_once "Product.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$file = fopen("products.txt", "a+");
$_SESSION["feltoltottTermekek"] = [];
while (($line = fgets($file)) !== false) {
    $row = unserialize($line);
    $newProduct = new Product($row["name"], $row["quantity"], $row["best_before"], $row["important"], $row["unit"], $row["datetime_added"]);
    array_push($_SESSION["feltoltottTermekek"], $newProduct);
}
fclose($file);
