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
$korisnik = array();
$kupljeniProizvodi = array();
$upit = "SELECT k.*, p.slika
FROM korisnik k
JOIN profil p ON k.ID_profil = p.ID_profil
WHERE k.email = '$trenutniEmail';
";
$rezultat = $veza->selectDB($upit);
if ($rezultat->num_rows > 0) {
    while ($redak = $rezultat->fetch_assoc()) {
        $korisnik = $redak;
    }
    $upit2 = "SELECT p.*, k.datum_kupnje, k.kolicina, (p.cijena * k.kolicina) AS ukupna_cijena FROM proizvod p JOIN kupio k ON p.ID_proizvod = k.ID_proizvod WHERE k.ID_korisnik = '$korisnik[ID_korisnik]' ORDER BY k.datum_kupnje DESC";
    $rezultat2 = $veza->selectDB($upit2);
    if ($rezultat2->num_rows > 0) {
        while ($redak2 = $rezultat2->fetch_assoc()) {
            array_push($kupljeniProizvodi, $redak2);
        }
        $smarty->assign('kupljeniproizvodi', $kupljeniProizvodi);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['kreirajprofilButton'])) {
    $nadimak = $_POST["nadimak"];
    $slika = $_FILES["slika"];
    $blobFormat = addslashes(file_get_contents($slika["tmp_name"]));
    $upit3 = "INSERT INTO profil (nadimak,slika_putanja,boja,slika) VALUES ('$nadimak','test','plava','$blobFormat')";
    $rezultat3 = $veza->selectDB($upit3);
    $upit4 = "SELECT ID_profil FROM profil ORDER BY ID_profil DESC LIMIT 1;";
    $rezultat4 = $veza->selectDB($upit4);
    while ($redak4 = $rezultat4->fetch_assoc()) {
        $upit5 = "UPDATE korisnik SET ID_profil='$redak4[ID_profil]' WHERE email='$trenutniEmail'";
        $rezultat5 = $veza->selectDB($upit5);
        header("Location: " . $_SERVER['PHP_SELF']);
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
if (isset($korisnik["ID_profil"]) && $korisnik["ID_profil"] == NULL || empty($korisnik["ID_profil"])) {
    $smarty->display('../templates/kreirajprofil.tpl');
} else {
    $smarty->display('../templates/profil.tpl');
}
$smarty->display('../templates/podnozje.tpl');
