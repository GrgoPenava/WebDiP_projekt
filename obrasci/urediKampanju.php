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
        }
    }
}

$kampanjaZaUrediti = array();
$popisProizvoda = array();
$IDodabraneKampanje = null;
if (isset($_GET["kampanja"])) {
    $IDodabraneKampanje = $_GET["kampanja"];
    $upitJednaKampanja = "SELECT * from kampanja WHERE ID_kampanja = '$IDodabraneKampanje'";
    $rezultatJedneKampanje = $veza->selectDB($upitJednaKampanja);
    if ($rezultatJedneKampanje->num_rows > 0) {
        while ($redakJedneKampanje = $rezultatJedneKampanje->fetch_assoc()) {
            if ($redakJedneKampanje["ID_korisnik"] != $trenutniKorisnik["ID_korisnik"] && $trenutniKorisnik["ID_uloga"] != 1) {
                Sesija::obrisiSesiju();
                header("Location: ../index.php");
                exit();
            }
            $kampanjaZaUrediti = $redakJedneKampanje;
            $smarty->assign('kampanjaZaUrediti', $kampanjaZaUrediti);

            $upitZaProizvode = "SELECT ID_proizvod from sadrzi WHERE ID_kampanja = '$IDodabraneKampanje'";
            $rezultatZaProizvode = $veza->selectDB($upitZaProizvode);
            if ($rezultatZaProizvode->num_rows > 0) {
                while ($redakZaProizvode = $rezultatZaProizvode->fetch_assoc()) {
                    array_push($popisProizvoda, $redakZaProizvode);
                }
            }
            $smarty->assign('popisProizvoda', $popisProizvoda);
        }
    }
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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['urediKampanju'])) {
    $naziv = $_POST["naziv"];
    $nazivEng = $_POST["naziv_eng"];
    $opis = $_POST["opis"];
    $opisEng = $_POST["opis_eng"];
    $datumIVrijemePocetka = date("Y-m-d H:i:s", strtotime($_POST["datum_i_vrijeme_pocetka"]));
    $datumIVrijemeZavrsetka = date("Y-m-d H:i:s", strtotime($_POST["datum_i_vrijeme_zavrsetka"]));;
    $tipKampanje = $_POST["tip_kampanje"];
    $proizvodi = $_POST["proizvodi"];

    $upitBrisanjeSadrziKampanjePrijeAzuriranja = "DELETE FROM sadrzi WHERE ID_kampanja = '$IDodabraneKampanje';";
    $rezultatBrisanjeSadrziKampanjePrijeAzuriranja = $veza->selectDB($upitBrisanjeSadrziKampanjePrijeAzuriranja);

    $upitBrisanjeKampanjePrijeAzuriranja = "DELETE FROM kampanja WHERE ID_kampanja = '$IDodabraneKampanje';";
    $rezultatBrisanjeKampanjePrijeAzuriranja = $veza->selectDB($upitBrisanjeKampanjePrijeAzuriranja);

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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['obrisiKampanju'])) {
    $upitBrisanjeSadrziKampanjePrijeAzuriranja = "DELETE FROM sadrzi WHERE ID_kampanja = '$IDodabraneKampanje';";
    $rezultatBrisanjeSadrziKampanjePrijeAzuriranja = $veza->selectDB($upitBrisanjeSadrziKampanjePrijeAzuriranja);

    $upitBrisanjeKampanjePrijeAzuriranja = "DELETE FROM kampanja WHERE ID_kampanja = '$IDodabraneKampanje';";
    $rezultatBrisanjeKampanjePrijeAzuriranja = $veza->selectDB($upitBrisanjeKampanjePrijeAzuriranja);

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
$smarty->display('../templates/urediKampanju_body.tpl');
$smarty->display('../templates/podnozje.tpl');
