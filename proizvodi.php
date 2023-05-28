<?php
include './privatno/funkcije.php';
require './vanjske_biblioteke/smarty-4.3.0/libs/Smarty.class.php';

$veza = new Baza();
$veza->spojiDb();

$putanja = dirname($_SERVER['REQUEST_URI']);
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
$smarty->assign('naslov', "Početna stranica");
$smarty->assign('putanja', $putanja);
$smarty->display('./templates/header.tpl');
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
            $smarty->assign("IDTrenutnogKorisnika", $trenutniKorisnik["ID_korisnik"]);
            $smarty->assign("UlogaTrenutnogKorisnika", $trenutniKorisnik["ID_uloga"]);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['kampanja'])) {
    $kampanja = $_GET["kampanja"];
    $upit = "SELECT p.*
    FROM kampanja k
    JOIN sadrzi s ON k.ID_kampanja = s.ID_kampanja
    JOIN proizvod p ON s.ID_proizvod = p.ID_proizvod
    WHERE k.ID_kampanja = '$kampanja';
    ";
    $rezultat = $veza->selectDB($upit);
    $proizvodi = array();
    if ($rezultat->num_rows > 0) {
        while ($redak = $rezultat->fetch_assoc()) {
            array_push($proizvodi, $redak);
        }
        $smarty->assign('proizvodi', $proizvodi);
        $upit2 = "SELECT * from korisnik WHERE email = '$trenutniEmail'";
        $rezultat2 = $veza->selectDB($upit2);
        if ($rezultat2->num_rows > 0) {
            while ($redak2 = $rezultat2->fetch_assoc()) {
                if ($redak2["ID_profil"] !== null && isset($redak2["ID_profil"]) && !empty($redak2["ID_profil"])) {
                    $smarty->assign('imaprofil', true);
                    $smarty->assign('idkampanje', $kampanja);
                    $upitModeratorIzKampanje = "SELECT ID_korisnik FROM kampanja WHERE ID_kampanja = '$kampanja'";
                    $rezultatModeratorIzKampanje = $veza->selectDB($upitModeratorIzKampanje);
                    if ($rezultatModeratorIzKampanje->num_rows > 0) {
                        while ($redakModeratorIzKampanje = $rezultatModeratorIzKampanje->fetch_assoc()) {
                            $smarty->assign('IdModeratora', $redakModeratorIzKampanje["ID_korisnik"]);
                        }
                    }
                }
            }
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['kupinovcem'])) {
    $upisanNovac = $_POST["unesenavrijednost"];
    $idProizvod = $_POST["id_proizvod"];
    $idKampanjeIzSmarty = $_POST["id_kampanje_iz_smarty"];
    $upitproizvod = "SELECT * from proizvod WHERE ID_proizvod = '$idProizvod'";
    $rezultatproizvod = $veza->selectDB($upitproizvod);
    if ($rezultatproizvod->num_rows > 0) {
        while ($redakproizvod = $rezultatproizvod->fetch_assoc()) {
            if ($upisanNovac === $redakproizvod["cijena"]) {
                $upitsmanji = "UPDATE proizvod SET kolicina = kolicina - 1 WHERE ID_proizvod = '$idProizvod'";
                $rezultatsmanji = $veza->selectDB($upitsmanji);

                $upitProvjeraZaStatus = "SELECT kolicina,id_status_proizvoda FROM proizvod WHERE ID_proizvod = '$idProizvod'";
                $rezultatProvjeraZaStatus = $veza->selectDB($upitProvjeraZaStatus);
                if ($rezultatProvjeraZaStatus->num_rows > 0) {
                    while ($redakZaStatus = $rezultatProvjeraZaStatus->fetch_assoc()) {
                        var_dump($redakZaStatus);
                        if ($redakZaStatus["kolicina"] == 0 || $redakZaStatus["kolicina"] == null) {
                            $upitUpisiZaStatus = "UPDATE proizvod SET id_status_proizvoda = 2 WHERE ID_proizvod = '$idProizvod'";
                            $rezultatUpisiZaStatus = $veza->selectDB($upitUpisiZaStatus);
                        }
                    }
                }

                $upitpovecajbodove = "UPDATE korisnik SET broj_bodova = broj_bodova + '$redakproizvod[bodovi_za_kupovinu]' WHERE email = '$trenutniEmail';";
                $rezultatpovecajbodove = $veza->selectDB($upitpovecajbodove);

                $upitPovecajBrojKupljenihProizvodaUKampanji = "UPDATE kampanja SET broj_kupljenih_proizvoda = broj_kupljenih_proizvoda + 1 WHERE ID_kampanja = '$idKampanjeIzSmarty';";
                $rezultatPovecajBrojKupljenihProizvodaUKampanji = $veza->selectDB($upitPovecajBrojKupljenihProizvodaUKampanji);

                $upitkorisnik = "SELECT * from korisnik WHERE email = '$trenutniEmail'";
                $rezultatkorisnik = $veza->selectDB($upitkorisnik);
                if ($rezultatkorisnik->num_rows > 0) {
                    while ($redakkorisnik = $rezultatkorisnik->fetch_assoc()) {
                        $trenutniDatum = date("Y-m-d");
                        $upitzaupisubazukupnje = "INSERT INTO kupio (ID_korisnik,ID_proizvod,kolicina,datum_kupnje) VALUES ('$redakkorisnik[ID_korisnik]','$idProizvod',1,'$trenutniDatum')";
                        $rezultatupisikorisniku2 = $veza->selectDB($upitzaupisubazukupnje);
                        header("Location:" . $putanja . "/index.php");
                    }
                }
            }
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['kupibodovima'])) {
    $idProizvod = $_POST["id_proizvod"];
    $idKampanjeIzSmarty = $_POST["id_kampanje_iz_smarty"];
    $upitkorisnik = "SELECT * from korisnik WHERE email = '$trenutniEmail'";
    $rezultatkorisnik = $veza->selectDB($upitkorisnik);
    if ($rezultatkorisnik->num_rows > 0) {
        while ($redakkorisnik = $rezultatkorisnik->fetch_assoc()) {
            $upitproizvod = "SELECT * from proizvod WHERE ID_proizvod = '$idProizvod'";
            $rezultatproizvod = $veza->selectDB($upitproizvod);
            if ($rezultatproizvod->num_rows > 0) {
                while ($redakproizvod = $rezultatproizvod->fetch_assoc()) {
                    if ($redakkorisnik["broj_bodova"] > $redakproizvod["cijena_u_bodovima"]) {
                        $upitsmanjibodove = "UPDATE korisnik SET broj_bodova = broj_bodova - '$redakproizvod[cijena_u_bodovima]' WHERE email = '$trenutniEmail';";
                        $rezultatsmanjibodove = $veza->selectDB($upitsmanjibodove);
                        $upitsmanjikolicinuzajedan = "UPDATE proizvod SET kolicina = kolicina - 1 WHERE ID_proizvod = '$idProizvod'";
                        $rezultatsmanjikolicinuzajedan = $veza->selectDB($upitsmanjikolicinuzajedan);


                        $upitProvjeraZaStatus = "SELECT kolicina,id_status_proizvoda FROM proizvod WHERE ID_proizvod = '$idProizvod'";
                        $rezultatProvjeraZaStatus = $veza->selectDB($upitProvjeraZaStatus);
                        if ($rezultatProvjeraZaStatus->num_rows > 0) {
                            while ($redakZaStatus = $rezultatProvjeraZaStatus->fetch_assoc()) {
                                if ($redakZaStatus["kolicina"] == 0 || $redakZaStatus["kolicina"] == null) {
                                    $upitUpisiZaStatus = "UPDATE proizvod SET id_status_proizvoda = 2 WHERE ID_proizvod = '$idProizvod'";
                                    $rezultatUpisiZaStatus = $veza->selectDB($upitUpisiZaStatus);
                                }
                            }
                        }


                        $trenutniDatum = date("Y-m-d");
                        $upitupisiproizvodkorisniku = "INSERT INTO kupio (ID_korisnik,ID_proizvod,kolicina,datum_kupnje) VALUES ('$redakkorisnik[ID_korisnik]','$idProizvod',1,'$trenutniDatum')";
                        $rezultatupisikorisniku = $veza->selectDB($upitupisiproizvodkorisniku);
                        $upitPovecajBrojKupljenihProizvodaUKampanji = "UPDATE kampanja SET broj_kupljenih_proizvoda = broj_kupljenih_proizvoda + 1 WHERE ID_kampanja = '$idKampanjeIzSmarty';";
                        $rezultatPovecajBrojKupljenihProizvodaUKampanji = $veza->selectDB($upitPovecajBrojKupljenihProizvodaUKampanji);
                    }
                }
            }
        }
    }
    header("Location:" . $putanja . "/index.php");
}

$smarty->display('./templates/navigacija.tpl');
$smarty->display('./templates/proizvodi_body.tpl');
$smarty->display('./templates/podnozje.tpl');
