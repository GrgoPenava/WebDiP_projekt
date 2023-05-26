<?php
include 'dnevnik.class.php';
include 'baza.class.php';
include 'sesija.class.php';

$direktorij = getcwd();

$dnevnik = new Dnevnik();
$dnevnik->setNazivDatoteke("./izvorne_datoteke/dnevnik.log");

Sesija::kreirajSesiju();

if (isset($_GET["odjava"])) {
    Sesija::obrisiSesiju();
    header("Location: ../index.php");
}

if (isset($_POST['jezici'])) {
    $odabraniJezik = $_POST['jezici'];
    $_SESSION['odabrani_jezik'] = $_POST['jezici'];
}
