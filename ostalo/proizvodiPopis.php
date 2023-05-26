<?php
include '../privatno/funkcije.php';
require '../vanjske_biblioteke/smarty-4.3.0/libs/Smarty.class.php';

$veza = new Baza();
$veza->spojiDb();
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

$trenutniEmail = null;
$trenutniKorisnik = array();
if (isset($_SESSION["uloga"])) {
    $smarty->assign('uloga', $_SESSION["uloga"]);
    $trenutniEmail = $_SESSION["korisnik"];
    $upitkorisnik = "SELECT * from korisnik WHERE email = '$trenutniEmail'";
    $rezultatkorisnik = $veza->selectDB($upitkorisnik);
    if ($rezultatkorisnik->num_rows > 0) {
        while ($redakkorisnik = $rezultatkorisnik->fetch_assoc()) {
            $trenutniKorisnik = $redakkorisnik;
            $smarty->assign('Idkorisnika', $trenutniKorisnik['ID_korisnik']);
            $smarty->assign('Ulogakorisnika', $trenutniKorisnik['ID_uloga']);
        }
    }
    if ($trenutniKorisnik["ID_uloga"] != 1) {
        Sesija::obrisiSesiju();
        header("Location: ../index.php");
        exit();
    }
}

$proizvodi = array();
$upit = "SELECT * from proizvod";
$rezultat = $veza->selectDB($upit);
if ($rezultat->num_rows > 0) {
    while ($redak = $rezultat->fetch_assoc()) {
        array_push($proizvodi, $redak);
    }
} else {
    $poruka = "Nema zapisa!";
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['usernameButton'])) {
}

$brojZapisa = count($proizvodi);
$smarty->assign('brojacZapisa', $brojZapisa);
$smarty->assign('proizvodi', $proizvodi);
$smarty->assign('naslov', "Popis");
$smarty->assign('putanja', $putanja);
$smarty->display('../templates/header.tpl');
if (isset($_SESSION["uloga"])) {
    $smarty->assign('uloga', $_SESSION["uloga"]);
}
$smarty->display('../templates/navigacija.tpl');
$smarty->display('../templates/proizvodiPopis.tpl');
$smarty->display('../templates/podnozje.tpl');
