<?php
include '../privatno/funkcije.php';
require '../vanjske_biblioteke/smarty-4.3.0/libs/Smarty.class.php';

$veza = new Baza();
$veza->spojiDb();
$putanja = dirname(dirname($_SERVER['REQUEST_URI']));
$smarty = new Smarty();

$trenutniKorisnik = array();
if (isset($_SESSION["uloga"])) {
    $smarty->assign('uloga', $_SESSION["uloga"]);
    $trenutniEmail = $_SESSION["korisnik"];
    $upitkorisnik = "SELECT * from korisnik WHERE email = '$trenutniEmail'";
    $rezultatkorisnik = $veza->selectDB($upitkorisnik);
    if ($rezultatkorisnik->num_rows > 0) {
        while ($redakkorisnik = $rezultatkorisnik->fetch_assoc()) {
            $trenutniKorisnik = $redakkorisnik;
        }
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
$korisnici = array();
$upit = "SELECT * from korisnik";
$rezultat = $veza->selectDB($upit);
if ($rezultat->num_rows > 0) {
    while ($redak = $rezultat->fetch_assoc()) {
        $korisnici[] = $redak;
    }
} else {
    $poruka = "Nema zapisa!";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['usernameButton'])) {
    $usernameKojiTrazi = $_POST['username'];
    if (strlen($usernameKojiTrazi) > 0) {
        $upit = "SELECT * from korisnik";
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
        $upit = "SELECT * from korisnik";
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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['prezimeButton'])) {
    $usernameKojiTrazi = $_POST['prezime'];
    if (strlen($usernameKojiTrazi) > 0) {
        $upit = "SELECT * from korisnik";
        $rezultat = $veza->selectDB($upit);
        $korisnici = array();
        if ($rezultat->num_rows > 0) {
            while ($redak = $rezultat->fetch_assoc()) {
                $korisnici[] = $redak;
            }
        }
        foreach ($korisnici as $kljuc => $vrijednost) {
            if (strpos($vrijednost["prezime"], $usernameKojiTrazi) === false) {
                unset($korisnici[$kljuc]);
            }
        }
        $brojZapisa = count($korisnici);
        $smarty->assign('korisnici', $korisnici);
        $smarty->assign('brojacZapisa', $brojZapisa);
    } else {
        $upit = "SELECT * from korisnik";
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

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['korisnikZakljucaj'])) {
    $idKorisnikaZaPromjenuu = $_GET["korisnikZakljucaj"];
    $upitPromjenaKorisnikBlokiran = "UPDATE korisnik SET blokiran=1 WHERE ID_korisnik = '$idKorisnikaZaPromjenuu'";
    $rezultatPromjenaKorisnikBlokiran = $veza->selectDB($upitPromjenaKorisnikBlokiran);
    $trenutniDatumIVrijemeZaDnevnik = date('Y-m-d H:i:s');
    $upitDnevnik = "INSERT INTO dnevnik_rada (ID_korisnik, datum_i_vrijeme_zapisa, radnja,opis) VALUES ('$trenutniKorisnik[ID_korisnik]','$trenutniDatumIVrijemeZaDnevnik','Zakljucavanje profila','Zakljucan profil: $idKorisnikaZaPromjenuu')";
    $rezultatDnevnik = $veza->selectDB($upitDnevnik);
    header("Location:" . $putanja . "/ostalo/popisSvihKorisnika.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['korisnikOtkljucaj'])) {
    $idKorisnikaZaPromjenuu = $_GET["korisnikOtkljucaj"];
    $upitPromjenaKorisnikBlokiran = "UPDATE korisnik SET blokiran=0 WHERE ID_korisnik = '$idKorisnikaZaPromjenuu'";
    $rezultatPromjenaKorisnikBlokiran = $veza->selectDB($upitPromjenaKorisnikBlokiran);
    $trenutniDatumIVrijemeZaDnevnik = date('Y-m-d H:i:s');
    $upitDnevnik = "INSERT INTO dnevnik_rada (ID_korisnik, datum_i_vrijeme_zapisa, radnja,opis) VALUES ('$trenutniKorisnik[ID_korisnik]','$trenutniDatumIVrijemeZaDnevnik','Otkljucavanje profila','Otkljucan profil: $idKorisnikaZaPromjenuu')";
    $rezultatDnevnik = $veza->selectDB($upitDnevnik);
    header("Location:" . $putanja . "/ostalo/popisSvihKorisnika.php");
}

$brojZapisa = count($korisnici);
$smarty->assign('brojacZapisa', $brojZapisa);
$smarty->assign('korisnici', $korisnici);
$smarty->assign('naslov', "Korisnici s profilom");
$smarty->assign('putanja', $putanja);
$smarty->display('../templates/header.tpl');

$smarty->display('../templates/navigacija.tpl');
$smarty->display('../templates/popisSvihKorisnika.tpl');
$smarty->display('../templates/podnozje.tpl');
