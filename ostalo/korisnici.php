<?php
include '../privatno/funkcije.php';
require '../vanjske_biblioteke/smarty-4.3.0/libs/Smarty.class.php';

$veza = new Baza();
$veza->spojiDb();
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
$korisnici = array();
$upit = "SELECT * from korisnik WHERE ID_profil IS NOT NULL";
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
    $upit = "SELECT * from korisnik WHERE ID_profil IS NOT NULL";
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
    $upit = "SELECT * from korisnik WHERE ID_profil IS NOT NULL";
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

$brojZapisa = count($korisnici);
$smarty->assign('brojacZapisa', $brojZapisa);
$smarty->assign('korisnici', $korisnici);
$smarty->assign('naslov', "Popis");
$smarty->assign('putanja', $putanja);
$smarty->display('../templates/header.tpl');
if (isset($_SESSION["uloga"])) {
  $smarty->assign('uloga', $_SESSION["uloga"]);
}
$smarty->display('../templates/navigacija.tpl');
$smarty->display('../templates/korisnici_body.tpl');
$smarty->display('../templates/podnozje.tpl');
