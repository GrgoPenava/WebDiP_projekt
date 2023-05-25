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
if (isset($_SESSION["uloga"])) {
    $smarty->assign('uloga', $_SESSION["uloga"]);
    $trenutniEmail = $_SESSION["korisnik"];
}

$sveKampanje = array();
$upitSveKampanje = "SELECT * from tip_kampanje";
$rezultatSveKampanje = $veza->selectDB($upitSveKampanje);
if ($rezultatSveKampanje->num_rows > 0) {
    while ($redakSveKampanje = $rezultatSveKampanje->fetch_assoc()) {
        array_push($sveKampanje, $redakSveKampanje);
        $smarty->assign('sviTipoviKampanje', $sveKampanje);
    }
}

$idTrenutnogKorisnika = null;
$upitTrenutniKorisnik = "SELECT ID_korisnik from korisnik where email = '$trenutniEmail'";
$rezultatTrenutniKorisnik = $veza->selectDB($upitTrenutniKorisnik);
if ($rezultatTrenutniKorisnik->num_rows > 0) {
    while ($redakTrenutniKorisnik = $rezultatTrenutniKorisnik->fetch_assoc()) {
        var_dump($redakTrenutniKorisnik["ID_korisnik"]);
        $idTrenutnogKorisnika = $redakTrenutniKorisnik["ID_korisnik"];
        $smarty->assign('ID_korisnika', $idTrenutnogKorisnika);
    }
}

$sviProizvodi = array();
$upitSviProizvodi = "SELECT * from proizvod";
$rezultatSviProizvodi = $veza->selectDB($upitSviProizvodi);
if ($rezultatSviProizvodi->num_rows > 0) {
    while ($redakSviProizvodi = $rezultatSviProizvodi->fetch_assoc()) {
        array_push($sviProizvodi, $redakSviProizvodi);
        $smarty->assign('sviProizvodi', $sviProizvodi);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['kreirajKampanju'])) {
    $naziv = $_POST["naziv"];
    $nazivEng = $_POST["naziv_eng"];
    $opis = $_POST["opis"];
    $opisEng = $_POST["opis_eng"];
    $datumIVrijemePocetka = date("Y-m-d H:i:s", strtotime($_POST["datum_i_vrijeme_pocetka"]));
    $datumIVrijemeZavrsetka = date("Y-m-d H:i:s", strtotime($_POST["datum_i_vrijeme_zavrsetka"]));;
    $tipKampanje = $_POST["tip_kampanje"];
    $proizvodi = $_POST["proizvodi"];
    $upitUnosKampanjeUbazu = "INSERT INTO kampanja (naziv,naziv_eng,opis,opis_eng,datum_i_vrijeme_pocetka,datum_i_vrijeme_zavrsetka,ID_tip_kampanje,ID_korisnik)
     VALUES ('$naziv','$nazivEng','$opis','$opisEng','$datumIVrijemePocetka','$datumIVrijemeZavrsetka','$tipKampanje','$idTrenutnogKorisnika')";
    $rezultatUnosaUbazuKampanje = $veza->selectDB($upitUnosKampanjeUbazu);
    $upitZadnjiID = "SELECT ID_kampanja FROM kampanja ORDER BY ID_kampanja DESC LIMIT 1;";
    $rezultatZadnjiID = $veza->selectDB($upitZadnjiID);
    $IDkreiraneKampanje = null;
    while ($redakZadnjiID = $rezultatZadnjiID->fetch_assoc()) {
        $IDkreiraneKampanje = $redakZadnjiID["ID_kampanja"];
    }
    foreach ($proizvodi as $key => $value) {
        $upitUpisiUsadrzi = "INSERT INTO sadrzi (ID_proizvod,ID_kampanja) VALUES ('$value','$IDkreiraneKampanje')";
        $rezultatUpisiUSadrzi = $veza->selectDB($upitUpisiUsadrzi);
    }
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
$smarty->display('../templates/kreirajKampanju_body.tpl');
$smarty->display('../templates/podnozje.tpl');
