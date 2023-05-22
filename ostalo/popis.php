<?php
include '../privatnoo/funkcije.php';
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
$upit = "SELECT * from poruke";
$rezultat = $veza->selectDB($upit);
$redci = array();
if ($rezultat->num_rows > 0) {
  while ($redak = $rezultat->fetch_assoc()) {
    $redci[] = $redak;
  }
} else {
  $poruka = "Neuspješna prijava, pokušajte ponovo!";
}
$brojZapisa = count($redci);
$smarty->assign('brojZapisa', $brojZapisa);
$smarty->assign('podaciTablice', $redci);

$smarty->assign('naslov', "Popis");
$smarty->assign('putanja', $putanja);
$smarty->display('../templates/header.tpl');
if (isset($_SESSION["uloga"])) {
  $smarty->assign('uloga', $_SESSION["uloga"]);
} else {
  $_SESSION['uloga'] = 5;
  $smarty->assign('uloga', $_SESSION["uloga"]);
}
$smarty->display('../templates/navigacija.tpl');
$smarty->display('../templates/popis_body.tpl');
$smarty->display('../templates/podnozje.tpl');

/* if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pretrazi'])) {
  $trazi = $_POST['trazi'];
  $redciFilter = array();
  if (empty($trazi) === false) {
    $upit = "SELECT * FROM poruke WHERE naslov = '$trazi' OR primatelj = '$trazi' OR posiljatelj = '$trazi'";
    $rezultat = $veza->selectDB($upit);
    if ($rezultat->num_rows > 0) {
      while ($redak = $rezultat->fetch_assoc()) {
        $redciFilter[] = $redak;
      }
    } else {
      $poruka = "Neuspješna prijava, pokušajte ponovo!";
    }
    var_dump($redciFilter);
    $smarty->assign('podaciTabliceFilter', $redciFilter);
  }
} */
