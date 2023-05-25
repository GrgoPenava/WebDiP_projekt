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
            $smarty->assign('ID_korisnika', $trenutniKorisnik["ID_korisnik"]);
        }
    }
}

$IDodabranogProizvoda = null;
$proizvod = array();
if (isset($_GET["proizvod"])) {
    $IDodabranogProizvoda = $_GET["proizvod"];
    $upitProizvod = "SELECT * from proizvod WHERE ID_proizvod = '$IDodabranogProizvoda'";
    $rezultatProizvod = $veza->selectDB($upitProizvod);
    if ($rezultatProizvod->num_rows > 0) {
        while ($redakProizvod = $rezultatProizvod->fetch_assoc()) {
            $proizvod = $redakProizvod;
            if ($proizvod["ID_korisnik"] != $trenutniKorisnik["ID_korisnik"] && $trenutniKorisnik["ID_uloga"] != 1) {
                Sesija::obrisiSesiju();
                header("Location: ../index.php");
                exit();
            }
            $smarty->assign('proizvodZaUrediti', $proizvod);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['urediProizvod'])) {
    $idProizvoda = $_POST["ID_proizvod"];
    $bodoviZaKupovinu = $_POST["bodovi_za_kupovinu"];
    $cijenaUBodovima = $_POST["cijena_u_bodovima"];
    $upitProizvodSubmit = "UPDATE proizvod SET bodovi_za_kupovinu = '$bodoviZaKupovinu', cijena_u_bodovima = '$cijenaUBodovima' WHERE ID_proizvod = '$idProizvoda'";
    $rezultatProizvodSubmit = $veza->selectDB($upitProizvodSubmit);
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
$smarty->assign('naslov', "Kreiraj kampanju");
$smarty->assign('putanja', $putanja);
$smarty->display('../templates/header.tpl');

$smarty->display('../templates/navigacija.tpl');
$smarty->display('../templates/urediProizvod.tpl');
$smarty->display('../templates/podnozje.tpl');
