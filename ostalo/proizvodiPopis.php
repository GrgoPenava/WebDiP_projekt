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
$upit = "SELECT p.*, k.username FROM proizvod AS p JOIN korisnik AS k ON p.ID_korisnik = k.ID_korisnik";
$rezultat = $veza->selectDB($upit);
if ($rezultat->num_rows > 0) {
    while ($redak = $rezultat->fetch_assoc()) {
        array_push($proizvodi, $redak);
    }
} else {
    $poruka = "Nema zapisa!";
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['usernameButton'])) {
    $moderatorKojiTrazi = $_POST['moderator'];
    if (strlen($moderatorKojiTrazi) > 0) {
        $upit2 = "SELECT p.*, k.username FROM proizvod AS p JOIN korisnik AS k ON p.ID_korisnik = k.ID_korisnik";
        $rezultat2 = $veza->selectDB($upit2);
        $proizvodi2 = array();
        if ($rezultat2->num_rows > 0) {
            while ($redak2 = $rezultat2->fetch_assoc()) {
                array_push($proizvodi2, $redak2);
            }
        }
        foreach ($proizvodi2 as $kljuc2 => $vrijednost2) {
            if (strpos($vrijednost2["username"], $moderatorKojiTrazi) === false) {
                unset($proizvodi2[$kljuc2]);
            }
        }
        $brojZapisa = count($proizvodi2);
        $smarty->assign('proizvodi', $proizvodi2);
        $smarty->assign('brojacZapisa', $brojZapisa);
    } else {
        $brojZapisa = count($proizvodi);
        $smarty->assign('brojacZapisa', $brojZapisa);
        $smarty->assign('proizvodi', $proizvodi);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nazivButton'])) {
    $nazivKojiTrazi = $_POST['naziv'];
    if (strlen($nazivKojiTrazi) > 0) {
        $upit3 = "SELECT p.*, k.username FROM proizvod AS p JOIN korisnik AS k ON p.ID_korisnik = k.ID_korisnik";
        $rezultat3 = $veza->selectDB($upit3);
        $proizvodi3 = array();
        if ($rezultat3->num_rows > 0) {
            while ($redak3 = $rezultat3->fetch_assoc()) {
                array_push($proizvodi3, $redak3);
            }
        }
        foreach ($proizvodi3 as $kljuc3 => $vrijednost3) {
            if (strpos($vrijednost3["naziv"], $nazivKojiTrazi) === false) {
                unset($proizvodi3[$kljuc3]);
            }
        }
        $brojZapisa = count($proizvodi3);
        $smarty->assign('proizvodi', $proizvodi3);
        $smarty->assign('brojacZapisa', $brojZapisa);
    } else {
        $brojZapisa = count($proizvodi);
        $smarty->assign('brojacZapisa', $brojZapisa);
        $smarty->assign('proizvodi', $proizvodi);
    }
} else {
    $brojZapisa = count($proizvodi);
    $smarty->assign('brojacZapisa', $brojZapisa);
    $smarty->assign('proizvodi', $proizvodi);
}

$smarty->assign('naslov', "Proizvodi");
$smarty->assign('putanja', $putanja);
$smarty->display('../templates/header.tpl');
if (isset($_SESSION["uloga"])) {
    $smarty->assign('uloga', $_SESSION["uloga"]);
}
$smarty->display('../templates/navigacija.tpl');
$smarty->display('../templates/proizvodiPopis.tpl');
$smarty->display('../templates/podnozje.tpl');
