<?php
include '../privatno/funkcije.php';
require '../vanjske_biblioteke/smarty-4.3.0/libs/Smarty.class.php';

$veza = new Baza();
$veza->spojiDb();
$putanja = dirname(dirname($_SERVER['REQUEST_URI']));
if (!isset($_SESSION["uloga"])) {
    Sesija::obrisiSesiju();
    header("Location: ../index.php");
    exit();
}
$smarty = new Smarty();
if (isset($_POST['jezici'])) {
    $odabraniJezik = $_POST['jezici'];
    $_SESSION['odabrani_jezik'] = $_POST['jezici'];
}
if (isset($_SESSION['odabrani_jezik']) && $_SESSION['odabrani_jezik'] == "engleskiJezik") {
    $smarty->assign('jezik_oznacen_engleski', "selected");
} else {
    $smarty->assign('jezik_oznacen_engleski', "");
}
if (isset($_SESSION['odabrani_jezik']) && $_SESSION['odabrani_jezik'] == "hrvatskiJezik") {
    $smarty->assign('jezik_oznacen_hrvatski', "selected");
} else {
    $smarty->assign('jezik_oznacen_hrvatski', "");
}
if (isset($_SESSION['odabrani_jezik']) && $_SESSION['odabrani_jezik'] == "njemackiJezik") {
    $smarty->assign('jezik_oznacen_njemacki', "selected");
} else {
    $smarty->assign('jezik_oznacen_njemacki', "");
}
$trenutniEmail = null;
if (isset($_SESSION["uloga"])) {
    $trenutniEmail = $_SESSION["korisnik"];
}
var_dump($trenutniEmail);
$korisnik = array();
$upit = "SELECT * from korisnik WHERE email='$trenutniEmail'";
$rezultat = $veza->selectDB($upit);
if ($rezultat->num_rows > 0) {
    while ($redak = $rezultat->fetch_assoc()) {
        $korisnik = $redak;
    }
}
$smarty->assign('korisnik', $korisnik);
$smarty->assign('naslov', "Profil");
$smarty->assign('putanja', $putanja);
$smarty->display('../templates/header.tpl');
if (isset($_SESSION["uloga"])) {
    $smarty->assign('uloga', $_SESSION["uloga"]);
}
$smarty->display('../templates/navigacija.tpl');
if ($korisnik["ID_profil"] == NULL || empty($korisnik["ID_profil"])) {
} else {
    $smarty->display('../templates/profil.tpl');
}
$smarty->display('../templates/podnozje.tpl');
