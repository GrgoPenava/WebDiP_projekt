<?php
include '../privatnoo/funkcije.php';
require '../vanjske_biblioteke/smarty-4.3.0/libs/Smarty.class.php';
if (!isset($_SESSION["uloga"])) {
  Sesija::obrisiSesiju();
  header("Location: ../index.php");
  exit();
}
$putanja = dirname(dirname($_SERVER['REQUEST_URI']));
$smarty = new Smarty();
$veza = new Baza();
$veza->spojiDb();

if (isset($_SESSION["uloga"])) {
  $posiljateljIzPrijave = $_SESSION["korisnik"];
  $smarty->assign('posiljateljIzPrijave', $posiljateljIzPrijave);
} else {
  $smarty->assign('porukaGreske', "Nije moguće unijeti pošiljatelja iz prijave");
  $smarty->assign('posiljateljIzPrijave', "");
}




if (isset($_POST['submitObrasca'])) {
  $posiljatelj = $_POST['posiljatelj'];
  $primatelj = $_POST['primatelj'];
  $naslov = $_POST['naslov'];
  $pristiglaPostoji = false;
  $poslanaPostoji = false;
  $nacrtPostoji = false;
  $smecePostoji = false;
  $nezeljenaPostoji = false;
  $vaznoPostoji = false;
  $sadrzaj = $_POST['sadrzaj'];
  $broj = $_POST['broj'];
  $url = $_POST['url'];
  $kategorijeporuke = "";
  if (isset($_POST['pristigla'])) {
    $pristiglaPostoji = true;
    $kategorijeporuke .= "pristigla, ";
  }
  if (isset($_POST['poslana'])) {
    $kategorijeporuke .= "poslana, ";
    $poslanaPostoji = true;
  }
  if (isset($_POST['nacrt'])) {
    $kategorijeporuke .= "nacrt, ";
    $nacrtPostoji = true;
  }
  if (isset($_POST['smece'])) {
    $kategorijeporuke .= "smece, ";
    $smecePostoji = true;
  }
  if (isset($_POST['nezeljena'])) {
    $kategorijeporuke .= "nezeljena, ";
    $nezeljenaPostoji = true;
  }
  if (isset($_POST['vazno'])) {
    $kategorijeporuke .= "vazno, ";
    $vaznoPostoji = true;
  }
  if (($pristiglaPostoji || $poslanaPostoji || $nacrtPostoji || $smecePostoji || $nezeljenaPostoji || $vaznoPostoji) && !($pristiglaPostoji && $poslanaPostoji)) {
    $kategorijeporuke = rtrim($kategorijeporuke, ", ");
    $trenutno_vrijeme = date('Y-m-d H:i:s');
    $upit = "INSERT INTO poruke (posiljatelj,primatelj,kategorija,naslov,sadrzaj,datum_i_vrijeme,kontakt,url,ID_status) VALUES ('$posiljatelj','$primatelj','$kategorijeporuke','$naslov','$sadrzaj','$trenutno_vrijeme','$broj','$url',0)";
    $rezultat = $veza->selectDB($upit);
    if ($rezultat) {
      $smarty->assign('porukaUspjeha', "Uspješno je upisana poruka u bazu podataka.");
    } else {
      $smarty->assign('porukaGreske', "Nije moguće upisati poruku u bazu podataka.");
    }
  } else {
    $smarty->assign('porukaGreske', "Nije odabrana niti jedna kategorija poruke ili su istovremeno odabrane pristigla i poslana.");
  }
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
$smarty->assign('naslov', "Obrazac");
$smarty->assign('putanja', $putanja);
$smarty->display('../templates/header.tpl');
if (isset($_SESSION["uloga"])) {
  $smarty->assign('uloga', $_SESSION["uloga"]);
} else {
  $_SESSION['uloga'] = 5;
  $smarty->assign('uloga', $_SESSION["uloga"]);
}
$smarty->display('../templates/navigacija.tpl');
$smarty->display('../templates/obrazac_body.tpl');
$smarty->display('../templates/podnozje.tpl');


@$idPoruke = $_POST['idPorukeIzTablice'];
if (empty($idPoruke) === false) {
  /* $upit = "UPDATE poruke SET ID_status = 1 WHERE id_poruke = '$idPoruke'";
  $rezultat = $veza->selectDB($upit); */
  $upitDobivanjaPoruke = "SELECT * FROM poruke WHERE id_poruke='$idPoruke'";
  $rezultatPoruke = $veza->selectDB($upitDobivanjaPoruke);
  header("Location: ../obrasci/obrazac.php");
  if ($rezultatPoruke == true) {
    echo $rezultatPoruke;
  } else {
    echo json_encode(array('odgovor' => false));
  }
}
