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
            $sviTipoviProizvoda = array();
            $upitTipoviProizvoda = "SELECT * from tip_proizvoda";
            $rezultatTipoviProizvoda = $veza->selectDB($upitTipoviProizvoda);
            if ($rezultatTipoviProizvoda->num_rows > 0) {
                while ($redakTipProizvoda = $rezultatTipoviProizvoda->fetch_assoc()) {
                    array_push($sviTipoviProizvoda, $redakTipProizvoda);
                }
                $smarty->assign('sviTipoviProizvoda', $sviTipoviProizvoda);
            }
            $sviStatusi = array();
            $upitStatusi = "SELECT * from status_proizvoda";
            $rezultatStatusi = $veza->selectDB($upitStatusi);
            if ($rezultatStatusi->num_rows > 0) {
                while ($redakStatusi = $rezultatStatusi->fetch_assoc()) {
                    array_push($sviStatusi, $redakStatusi);
                }
                $smarty->assign('sviStatusi', $sviStatusi);
            }

            $sviKorisnici = array();
            $upitKorisnici = "SELECT * from korisnik WHERE ID_uloga <=2";
            $rezultatKorisnici = $veza->selectDB($upitKorisnici);
            if ($rezultatKorisnici->num_rows > 0) {
                while ($redakKorisnici = $rezultatKorisnici->fetch_assoc()) {
                    array_push($sviKorisnici, $redakKorisnici);
                }
                $smarty->assign('sviKorisnici', $sviKorisnici);
            }

            $smarty->assign('proizvodZaUrediti', $proizvod);
        }
    }
}




if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['urediProizvod'])) {
    $idProizvoda = $_POST["ID_proizvod"];
    $naziv = $_POST["naziv"];
    $naziv_eng = $_POST["naziv_eng"];
    $opis = $_POST["opis"];
    $opis_eng = $_POST["opis_eng"];
    $kolicina = $_POST["kolicina"];
    $cijena = $_POST["cijena"];
    $cijena_eng = $_POST["cijena_eng"];
    $cijena_u_bodovima = $_POST["cijena_u_bodovima"];
    $bodovi_za_kupovinu = $_POST["bodovizakupovinu"];
    $status = $_POST["status_proizvoda"];
    $tip = $_POST["tip_proizvoda"];
    $moderator = $_POST["id_korisnik"];
    $slika = $_FILES["slika"];
    $blobFormat = addslashes(file_get_contents($slika["tmp_name"]));
    $upitUrediProizvod = "UPDATE proizvod SET naziv = '$naziv', naziv_eng = '$naziv_eng', opis='$opis',opis_eng='$opis_eng', slika = '$blobFormat', kolicina = '$kolicina', cijena = '$cijena',cijena_eng='$cijena_eng',cijena_u_bodovima='$cijena_u_bodovima',bodovi_za_kupovinu='$bodovi_za_kupovinu',id_status_proizvoda='$status',ID_tip_proizvoda='$tip',ID_korisnik='$moderator' WHERE ID_proizvod = '$idProizvoda'";
    $rezultatUrediProizvod = $veza->selectDB($upitUrediProizvod);
    header("Location:" . $putanja . "/ostalo/proizvodiPopis.php");
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
$smarty->assign('naslov', "Uredi Proizvod");
$smarty->assign('putanja', $putanja);
$smarty->display('../templates/header.tpl');

$smarty->display('../templates/navigacija.tpl');
$smarty->display('../templates/urediCijeliProizvod.tpl');
$smarty->display('../templates/podnozje.tpl');
