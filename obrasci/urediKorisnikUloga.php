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
            $smarty->assign('ID_korisnika', $trenutniKorisnik["ID_korisnik"]);
        }
    }
}

$korisnikKojegUredujem = array();
$uloge = array();
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['korisnik'])) {
    $idKorisnika = $_GET["korisnik"];
    $upitkorisnika = "SELECT * from korisnik WHERE ID_korisnik = '$idKorisnika'";
    $rezultatkorisnika = $veza->selectDB($upitkorisnika);
    if ($rezultatkorisnika->num_rows > 0) {
        while ($redakkorisnika = $rezultatkorisnika->fetch_assoc()) {
            $korisnikKojegUredujem = $redakkorisnika;
            $smarty->assign('korisnikZaUrediti', $korisnikKojegUredujem);

            $upitUloge = "SELECT * from uloga";
            $rezultatUloge = $veza->selectDB($upitUloge);
            if ($rezultatUloge->num_rows > 0) {
                while ($redakUloge = $rezultatUloge->fetch_assoc()) {
                    array_push($uloge, $redakUloge);
                }
            }
            $smarty->assign('sveUloge', $uloge);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['urediUloguKorisnika'])) {
    $IDkorisnikaZaUrediti = $_POST["ID_korisnik"];
    var_dump($IDkorisnikaZaUrediti);
    $ulogaNova = $_POST["uloga"];
    var_dump($ulogaNova);
    $upitUrediUlogu = "UPDATE korisnik SET ID_uloga = '$ulogaNova' WHERE ID_korisnik = '$IDkorisnikaZaUrediti'";
    $rezultatUredivanjaUloge = $veza->selectDB($upitUrediUlogu);
    header("Location:" . $putanja . "/index.php");
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
$smarty->assign('naslov', "Uredi korisnika");
$smarty->assign('putanja', $putanja);
$smarty->display('../templates/header.tpl');

$smarty->display('../templates/navigacija.tpl');
$smarty->display('../templates/urediKorisnika.tpl');
$smarty->display('../templates/podnozje.tpl');
