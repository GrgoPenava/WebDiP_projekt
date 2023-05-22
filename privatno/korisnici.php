<?php
include '../privatno/funkcije.php';
require '../vanjske_biblioteke/smarty-4.3.0/libs/Smarty.class.php';
$veza = new Baza();
$veza->spojiDb();

$korisnici = array();
$putanja = dirname(dirname($_SERVER['REQUEST_URI']));
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
$smarty->assign('naslov', "O autoru");
$smarty->assign('putanja', $putanja);
$smarty->display('../templates/header.tpl');
if (isset($_SESSION["uloga"])) {
    $smarty->assign('uloga', $_SESSION["uloga"]);
}

$upit = "SELECT * FROM korisnik";
$rezultat = $veza->selectDB($upit);
if ($rezultat->num_rows > 0) {
    while ($redak = $rezultat->fetch_assoc()) {
        array_push($korisnici, $redak);
    }
    $smarty->assign('korisnici', $korisnici);
}
$brojZapisa = count($korisnici);
$smarty->assign('brojacZapisa', $brojZapisa);
$smarty->display('../templates/navigacija.tpl');
$smarty->display('../templates/korisnici.tpl');
$smarty->display('../templates/podnozje.tpl');
