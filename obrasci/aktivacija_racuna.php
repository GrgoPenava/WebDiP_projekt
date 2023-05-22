<?php
include '../privatno/funkcije.php';
require '../vanjske_biblioteke/smarty-4.3.0/libs/Smarty.class.php';
$veza = new Baza();
$veza->spojiDb();

$poruka = "";
$putanja = dirname(dirname($_SERVER['REQUEST_URI']));
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
$smarty->assign('naslov', "O autoru");
$smarty->assign('putanja', $putanja);
$smarty->display('../templates/header.tpl');
if (isset($_SESSION["uloga"])) {
    $smarty->assign('uloga', $_SESSION["uloga"]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['aktivirajButton'])) {
    $email = $_POST['email'];
    $aktivacijskiKod = $_POST['aktivacijskiKod'];
    if (empty($email) === false && empty($aktivacijskiKod) === false) {
        $upit = "SELECT * FROM korisnik WHERE email='$email' AND aktivacijski_kod='$aktivacijskiKod'";
        $rezultat = $veza->selectDB($upit);
        if ($rezultat->num_rows > 0) {
            while ($redak = $rezultat->fetch_assoc()) {
                if (isset($redak["email"]) && isset($redak["aktivacijski_kod"]) && isset($redak["datum_registracije"])) {
                    if ($redak["aktiviran_racun"] == 0) {
                        $datumIVrijemeIzBaze = date('Y-m-d H:i:s', strtotime($redak["datum_registracije"]));
                        $trenutnoDatumIVrijeme = date('Y-m-d H:i:s');
                        $timestampIzBaze = strtotime($datumIVrijemeIzBaze);
                        $timestampTrenutno = strtotime($trenutnoDatumIVrijeme);
                        $razlikaUSatima = abs(($timestampTrenutno - $timestampIzBaze) / 3600);
                        if ($razlikaUSatima < 7) {
                            $poruka = "Uspješno aktiviran račun!";
                            $upit2 = "UPDATE korisnik SET aktiviran_racun=1 WHERE email='$email' AND aktivacijski_kod='$aktivacijskiKod'";
                            $rezultat2 = $veza->selectDB($upit2);
                        } else {
                            $poruka = "Aktivacijski kod je istekao, prošlo je 7 sati!";
                            $upit2 = "DELETE FROM korisnik WHERE email='$email' AND aktiviran_racun=1";
                            $rezultat2 = $veza->selectDB($upit2);
                        }
                    } else {
                        $poruka = "Račun je već aktiviran!";
                    }
                }
            }
        } else {
            $poruka = "Neuspješna aktivacija, pogrešno uneseni podaci!";
        }
    } else {
        $poruka = "Neuspješna aktivacija, morate unijeti podatke!";
    }
}

$smarty->assign('poruka', $poruka);
$smarty->display('../templates/navigacija.tpl');
$smarty->display('../templates/aktivacija_racuna.tpl');
$smarty->display('../templates/podnozje.tpl');
