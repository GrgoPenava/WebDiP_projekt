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
if (isset($_SESSION["uloga"])) {
  $smarty->assign('uloga', $_SESSION["uloga"]);
}

$upit = "SELECT kampanja.*, korisnik.ime, korisnik.prezime, SUM(IFNULL(proizvod.kolicina, 0)) AS broj_proizvoda
FROM kampanja
JOIN korisnik ON kampanja.ID_korisnik = korisnik.ID_korisnik
LEFT JOIN sadrzi ON kampanja.ID_kampanja = sadrzi.ID_kampanja
LEFT JOIN proizvod ON sadrzi.ID_proizvod = proizvod.ID_proizvod
GROUP BY kampanja.ID_kampanja
ORDER BY broj_proizvoda DESC;";
$rezultat = $veza->selectDB($upit);
$kampanje = array();
if ($rezultat->num_rows > 0) {
  while ($redak = $rezultat->fetch_assoc()) {
    array_push($kampanje, $redak);
  }
  $smarty->assign('kampanje', $kampanje);
} else {
  $poruka = "Error!";
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['datumButton'])) {
  $upit = "SELECT kampanja.*, korisnik.ime, korisnik.prezime, SUM(IFNULL(proizvod.kolicina, 0)) AS broj_proizvoda
  FROM kampanja
  JOIN korisnik ON kampanja.ID_korisnik = korisnik.ID_korisnik
  LEFT JOIN sadrzi ON kampanja.ID_kampanja = sadrzi.ID_kampanja
  LEFT JOIN proizvod ON sadrzi.ID_proizvod = proizvod.ID_proizvod
  GROUP BY kampanja.ID_kampanja
  ORDER BY broj_proizvoda DESC;";
  $rezultat = $veza->selectDB($upit);
  $kampanje = array();
  if ($rezultat->num_rows > 0) {
    while ($redak = $rezultat->fetch_assoc()) {
      array_push($kampanje, $redak);
    }
    $smarty->assign('kampanje', $kampanje);
  } else {
    $poruka = "Error!";
  }
  $pocetak = date("Y-m-d", strtotime($_POST['prvidatum']));
  $kraj = date("Y-m-d", strtotime($_POST['drugidatum']));
  if (strlen($_POST['prvidatum'] > 2)) {
    var_dump($_POST['prvidatum']);
    foreach ($kampanje as $kampanja => $redak) {
      if (date("Y-m-d", strtotime($redak['datum_i_vrijeme_pocetka'])) < $pocetak) {
        unset($kampanje[$kampanja]);
      }
    }
    $smarty->assign('kampanje', $kampanje);
  }
  if (strlen($_POST['drugidatum'] > 2)) {
    var_dump($_POST['drugidatum']);
    foreach ($kampanje as $kampanja => $redak) {
      if (date("Y-m-d", strtotime($redak['datum_i_vrijeme_zavrsetka'])) > $kraj) {
        unset($kampanje[$kampanja]);
      }
    }
    $smarty->assign('kampanje', $kampanje);
  }
  if (strlen($_POST['drugidatum'] > 2) && strlen($_POST['prvidatum'] > 2)) {
    foreach ($kampanje as $kampanja => $redak) {
      if (date("Y-m-d", strtotime($redak['datum_i_vrijeme_pocetka'])) < $pocetak || date("Y-m-d", strtotime($redak['datum_i_vrijeme_zavrsetka'])) > $kraj) {
        unset($kampanje[$kampanja]);
      }
    }
    $smarty->assign('kampanje', $kampanje);
  }
}
$smarty->display('./templates/navigacija.tpl');
$smarty->display('./templates/kampanje_body.tpl');
$smarty->display('./templates/podnozje.tpl');
