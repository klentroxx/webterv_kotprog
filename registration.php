<?php
include_once "User.php";
session_start();
$file = fopen("users.txt", "a+");
$_SESSION["regisztraltFelhasznalok"] = [];
while (($line = fgets($file)) !== false) {
    $row = unserialize($line);
    $newUser = new User($row["felhasznalo_nev"], $row["nev"], $row["jelszo"], $row["telefon"], $row["email"], $row["iranyito_szam"], $row["varos"], $row["utca_nev"], $row["hazszam"], $row["emelet"], $row["ajto"], $row["kep"]);
    array_push($_SESSION["regisztraltFelhasznalok"], $newUser);
}
fclose($file);