<?php
include '../privatno/funkcije.php';
require '../vanjske_biblioteke/smarty-4.3.0/libs/Smarty.class.php';
if (!isset($_SESSION["uloga"]) || $_SESSION["uloga"] >= 3) {
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
    if ($trenutniKorisnik["ID_uloga"] > 2) {
        Sesija::obrisiSesiju();
        header("Location: ../index.php");
        exit();
    }
}

$sveKampanje = array();
if ($trenutniKorisnik["ID_uloga"] != 1) {
    $upitSveKampanje = "SELECT * from kampanja WHERE ID_korisnik = '$trenutniKorisnik[ID_korisnik]'";
} else {
    $upitSveKampanje = "SELECT * from kampanja";
}
$rezultatSveKampanje = $veza->selectDB($upitSveKampanje);
if ($rezultatSveKampanje->num_rows > 0) {
    while ($redakSveKampanje = $rezultatSveKampanje->fetch_assoc()) {
        array_push($sveKampanje, $redakSveKampanje);
        $smarty->assign('sveKampanje', $sveKampanje);
        $smarty->assign('sveKampanjeEncode', json_encode($sveKampanje));
        $brojZapisa = count($sveKampanje);
        $smarty->assign('brojacZapisa', $brojZapisa);
    }
}

$idTrenutnogKorisnika = null;
$upitTrenutniKorisnik = "SELECT ID_korisnik from korisnik where email = '$trenutniEmail'";
$rezultatTrenutniKorisnik = $veza->selectDB($upitTrenutniKorisnik);
if ($rezultatTrenutniKorisnik->num_rows > 0) {
    while ($redakTrenutniKorisnik = $rezultatTrenutniKorisnik->fetch_assoc()) {
        $idTrenutnogKorisnika = $redakTrenutniKorisnik["ID_korisnik"];
        $smarty->assign('ID_korisnika', $idTrenutnogKorisnika);
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nazivButton'])) {
    $nazivKojiTrazi = $_POST['naziv'];
    if (strlen($nazivKojiTrazi) > 0) {
        if ($trenutniKorisnik["ID_uloga"] != 1) {
            $upit = "SELECT * from kampanja WHERE ID_korisnik = '$trenutniKorisnik[ID_korisnik]'";
        } else {
            $upit = "SELECT * from kampanja";
        }
        $rezultat = $veza->selectDB($upit);
        $korisnici = array();
        if ($rezultat->num_rows > 0) {
            while ($redak = $rezultat->fetch_assoc()) {
                $korisnici[] = $redak;
            }
        }
        foreach ($korisnici as $kljuc => $vrijednost) {
            if (strpos($vrijednost["naziv"], $nazivKojiTrazi) === false) {
                unset($korisnici[$kljuc]);
            }
        }
        $brojZapisa = count($korisnici);
        $smarty->assign('sveKampanje', $korisnici);
        $smarty->assign('sveKampanjeEncode', json_encode($korisnici));
        $smarty->assign('brojacZapisa', $brojZapisa);
    } else {
        if ($trenutniKorisnik["ID_uloga"] != 1) {
            $upit = "SELECT * from kampanja WHERE ID_korisnik = '$trenutniKorisnik[ID_korisnik]'";
        } else {
            $upit = "SELECT * from kampanja";
        }
        $rezultat = $veza->selectDB($upit);
        $korisnici = array();
        if ($rezultat->num_rows > 0) {
            while ($redak = $rezultat->fetch_assoc()) {
                $korisnici[] = $redak;
            }
        }
        $brojZapisa = count($korisnici);
        $smarty->assign('sveKampanje', $korisnici);
        $smarty->assign('sveKampanjeEncode', json_encode($korisnici));
        $smarty->assign('brojacZapisa', $brojZapisa);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['proizvodiButton'])) {
    $nazivKojiTrazi = $_POST['brojproizvodakojisetrazi'];
    if (strlen($nazivKojiTrazi) > 0) {
        if ($trenutniKorisnik["ID_uloga"] != 1) {
            $upit = "SELECT * from kampanja WHERE ID_korisnik = '$trenutniKorisnik[ID_korisnik]'";
        } else {
            $upit = "SELECT * from kampanja";
        }
        $rezultat = $veza->selectDB($upit);
        $korisnici = array();
        if ($rezultat->num_rows > 0) {
            while ($redak = $rezultat->fetch_assoc()) {
                $korisnici[] = $redak;
            }
        }
        foreach ($korisnici as $kljuc => $vrijednost) {
            if (strpos($vrijednost["broj_kupljenih_proizvoda"], $nazivKojiTrazi) === false) {
                unset($korisnici[$kljuc]);
            }
        }
        $brojZapisa = count($korisnici);
        $smarty->assign('sveKampanje', $korisnici);
        $smarty->assign('sveKampanjeEncode', json_encode($korisnici));
        $smarty->assign('brojacZapisa', $brojZapisa);
    } else {
        if ($trenutniKorisnik["ID_uloga"] != 1) {
            $upit = "SELECT * from kampanja WHERE ID_korisnik = '$trenutniKorisnik[ID_korisnik]'";
        } else {
            $upit = "SELECT * from kampanja";
        }
        $rezultat = $veza->selectDB($upit);
        $korisnici = array();
        if ($rezultat->num_rows > 0) {
            while ($redak = $rezultat->fetch_assoc()) {
                $korisnici[] = $redak;
            }
        }
        $brojZapisa = count($korisnici);
        $smarty->assign('sveKampanje', $korisnici);
        $smarty->assign('sveKampanjeEncode', json_encode($korisnici));
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
$smarty->display('../templates/statistikaKampanja.tpl');
$smarty->display('../templates/podnozje.tpl');
