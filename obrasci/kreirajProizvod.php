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


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['kreirajProizvod'])) {
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
    if ($kolicina == 0) {
        $status = 2;
    }
    $upitUrediProizvod = "INSERT INTO proizvod (naziv,naziv_eng,opis,opis_eng,slika,kolicina,cijena,cijena_eng,cijena_u_bodovima,bodovi_za_kupovinu,id_status_proizvoda,ID_tip_proizvoda,ID_korisnik) VALUES ('$naziv','$naziv_eng','$opis','$opis_eng','$blobFormat','$kolicina','$cijena','$cijena_eng','$cijena_u_bodovima','$bodovi_za_kupovinu','$status','$tip','$moderator')";
    $rezultatUrediProizvod = $veza->selectDB($upitUrediProizvod);
    $trenutniDatumIVrijemeZaDnevnik = date('Y-m-d H:i:s');
    $upitDnevnik = "INSERT INTO dnevnik_rada (ID_korisnik, datum_i_vrijeme_zapisa, radnja, opis) VALUES ('$trenutniKorisnik[ID_korisnik]','$trenutniDatumIVrijemeZaDnevnik','Kreiranje proizvoda','Proizvod: $naziv')";
    $rezultatDnevnik = $veza->selectDB($upitDnevnik);
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
$smarty->assign('naslov', "Kreiraj Proizvod");
$smarty->assign('putanja', $putanja);
$smarty->display('../templates/header.tpl');

$smarty->display('../templates/navigacija.tpl');
$smarty->display('../templates/kreirajProizvod.tpl');
$smarty->display('../templates/podnozje.tpl');
