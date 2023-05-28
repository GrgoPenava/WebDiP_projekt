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

$dnevnik = array();
$upit = "SELECT d.*, k.email, k.username FROM dnevnik_rada AS d JOIN korisnik AS k ON d.ID_korisnik = k.ID_korisnik ORDER BY d.ID_radnje ASC";
$rezultat = $veza->selectDB($upit);
if ($rezultat->num_rows > 0) {
    while ($redak = $rezultat->fetch_assoc()) {
        array_push($dnevnik, $redak);
    }
} else {
    $poruka = "Nema zapisa!";
}
$brojZapisa = count($dnevnik);
$smarty->assign('dnevnik', $dnevnik);
$smarty->assign('brojacZapisa', $brojZapisa);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['usernameButton'])) {
    $usernameKojiTrazi = $_POST['username'];
    if (strlen($usernameKojiTrazi) > 0) {
        $dnevnik2 = array();
        $upit = "SELECT d.*, k.email, k.username FROM dnevnik_rada AS d JOIN korisnik AS k ON d.ID_korisnik = k.ID_korisnik ORDER BY d.ID_radnje ASC";
        $rezultat = $veza->selectDB($upit);
        if ($rezultat->num_rows > 0) {
            while ($redak = $rezultat->fetch_assoc()) {
                array_push($dnevnik2, $redak);
            }
        }
        foreach ($dnevnik2 as $kljuc2 => $vrijednost2) {
            if (strpos($vrijednost2["username"], $usernameKojiTrazi) === false) {
                unset($dnevnik2[$kljuc2]);
            }
        }
        $brojZapisa = count($dnevnik2);
        $smarty->assign('dnevnik', $dnevnik2);
        $smarty->assign('brojacZapisa', $brojZapisa);
    } else {
        $brojZapisa = count($dnevnik);
        $smarty->assign('brojacZapisa', $brojZapisa);
        $smarty->assign('dnevnik', $dnevnik);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['emailButton'])) {
    $emailKojiTrazi = $_POST['email'];
    if (strlen($emailKojiTrazi) > 0) {
        $upit3 = "SELECT d.*, k.email, k.username FROM dnevnik_rada AS d JOIN korisnik AS k ON d.ID_korisnik = k.ID_korisnik ORDER BY d.ID_radnje ASC";
        $rezultat3 = $veza->selectDB($upit3);
        $dnevnik3 = array();
        if ($rezultat3->num_rows > 0) {
            while ($redak3 = $rezultat3->fetch_assoc()) {
                array_push($dnevnik3, $redak3);
            }
        }
        foreach ($dnevnik3 as $kljuc3 => $vrijednost3) {
            if (strpos($vrijednost3["email"], $emailKojiTrazi) === false) {
                unset($dnevnik3[$kljuc3]);
            }
        }
        $brojZapisa = count($dnevnik3);
        $smarty->assign('dnevnik', $dnevnik3);
        $smarty->assign('brojacZapisa', $brojZapisa);
    } else {
        $brojZapisa = count($dnevnik);
        $smarty->assign('brojacZapisa', $brojZapisa);
        $smarty->assign('dnevnik', $dnevnik);
    }
} else {
    $brojZapisa = count($dnevnik);
    $smarty->assign('brojacZapisa', $brojZapisa);
    $smarty->assign('dnevnik', $dnevnik);
}

$smarty->assign('naslov', "Dnevnik rada");
$smarty->assign('putanja', $putanja);
$smarty->display('../templates/header.tpl');
if (isset($_SESSION["uloga"])) {
    $smarty->assign('uloga', $_SESSION["uloga"]);
}
$smarty->display('../templates/navigacija.tpl');
$smarty->display('../templates/dnevnik.tpl');
$smarty->display('../templates/podnozje.tpl');
