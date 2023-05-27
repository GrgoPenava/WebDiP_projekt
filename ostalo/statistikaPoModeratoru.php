<?php
include '../privatno/funkcije.php';
require '../vanjske_biblioteke/smarty-4.3.0/libs/Smarty.class.php';
if (!isset($_SESSION["uloga"]) || $_SESSION["uloga"] != 1) {
    Sesija::obrisiSesiju();
    header("Location: ../index.php");
    exit();
}
$putanja = dirname(dirname($_SERVER['REQUEST_URI']));
$smarty = new Smarty();
$veza = new Baza();
$veza->spojiDb();

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
}

$moderatori = array();
$upitModeratori = "SELECT k.ID_korisnik, k.username, k.email, COUNT(*) AS broj_prodanih_proizvoda FROM kupio kpo JOIN proizvod p ON kpo.ID_proizvod = p.ID_proizvod JOIN korisnik k ON p.ID_korisnik = k.ID_korisnik GROUP BY k.ID_korisnik, k.username;";
$rezultatModeratori = $veza->selectDB($upitModeratori);
if ($rezultatModeratori->num_rows > 0) {
    while ($redakModeratori = $rezultatModeratori->fetch_assoc()) {
        array_push($moderatori, $redakModeratori);
        $smarty->assign('korisnici', $moderatori);
    }
}
$brojac = count($moderatori);
if ($brojac > 0) {
    $smarty->assign('brojacZapisa', $brojac);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['usernameButton'])) {
    $usernameKojiTrazi = $_POST['username'];
    if (strlen($usernameKojiTrazi) > 0) {
        $upit = "SELECT k.ID_korisnik, k.username, k.email, COUNT(*) AS broj_prodanih_proizvoda FROM kupio kpo JOIN proizvod p ON kpo.ID_proizvod = p.ID_proizvod JOIN korisnik k ON p.ID_korisnik = k.ID_korisnik GROUP BY k.ID_korisnik, k.username;";
        $rezultat = $veza->selectDB($upit);
        $korisnici = array();
        if ($rezultat->num_rows > 0) {
            while ($redak = $rezultat->fetch_assoc()) {
                $korisnici[] = $redak;
            }
        }
        foreach ($korisnici as $kljuc => $vrijednost) {
            if (strpos($vrijednost["username"], $usernameKojiTrazi) === false) {
                unset($korisnici[$kljuc]);
            }
        }
        $brojZapisa = count($korisnici);
        $smarty->assign('korisnici', $korisnici);
        $smarty->assign('brojacZapisa', $brojZapisa);
    } else {
        $upit = "SELECT k.ID_korisnik, k.username, k.email, COUNT(*) AS broj_prodanih_proizvoda FROM kupio kpo JOIN proizvod p ON kpo.ID_proizvod = p.ID_proizvod JOIN korisnik k ON p.ID_korisnik = k.ID_korisnik GROUP BY k.ID_korisnik, k.username;";
        $rezultat = $veza->selectDB($upit);
        $korisnici = array();
        if ($rezultat->num_rows > 0) {
            while ($redak = $rezultat->fetch_assoc()) {
                $korisnici[] = $redak;
            }
        }
        $brojZapisa = count($korisnici);
        $smarty->assign('korisnici', $korisnici);
        $smarty->assign('brojacZapisa', $brojZapisa);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['emailButton'])) {
    $usernameKojiTrazi = $_POST['email'];
    if (strlen($usernameKojiTrazi) > 0) {
        $upit = "SELECT k.ID_korisnik, k.username, k.email, COUNT(*) AS broj_prodanih_proizvoda FROM kupio kpo JOIN proizvod p ON kpo.ID_proizvod = p.ID_proizvod JOIN korisnik k ON p.ID_korisnik = k.ID_korisnik GROUP BY k.ID_korisnik, k.username;";
        $rezultat = $veza->selectDB($upit);
        $korisnici = array();
        if ($rezultat->num_rows > 0) {
            while ($redak = $rezultat->fetch_assoc()) {
                $korisnici[] = $redak;
            }
        }
        foreach ($korisnici as $kljuc => $vrijednost) {
            if (strpos($vrijednost["email"], $usernameKojiTrazi) === false) {
                unset($korisnici[$kljuc]);
            }
        }
        $brojZapisa = count($korisnici);
        $smarty->assign('korisnici', $korisnici);
        $smarty->assign('brojacZapisa', $brojZapisa);
    } else {
        $upit = "SELECT k.ID_korisnik, k.username, k.email, COUNT(*) AS broj_prodanih_proizvoda FROM kupio kpo JOIN proizvod p ON kpo.ID_proizvod = p.ID_proizvod JOIN korisnik k ON p.ID_korisnik = k.ID_korisnik GROUP BY k.ID_korisnik, k.username;";
        $rezultat = $veza->selectDB($upit);
        $korisnici = array();
        if ($rezultat->num_rows > 0) {
            while ($redak = $rezultat->fetch_assoc()) {
                $korisnici[] = $redak;
            }
        }
        $brojZapisa = count($korisnici);
        $smarty->assign('korisnici', $korisnici);
        $smarty->assign('brojacZapisa', $brojZapisa);
    }
}


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
$smarty->assign('naslov', "Kreiraj kampanju");
$smarty->assign('putanja', $putanja);
$smarty->display('../templates/header.tpl');

$smarty->display('../templates/navigacija.tpl');
$smarty->display('../templates/statistikaPoModeratoru.tpl');
$smarty->display('../templates/podnozje.tpl');
