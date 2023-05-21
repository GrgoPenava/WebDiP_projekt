<?php
include '../privatno/funkcije.php';
require '../vanjske_biblioteke/smarty-4.3.0/libs/Smarty.class.php';
$veza = new Baza();
$veza->spojiDb();
$poruka = "";
$poruka_registracija = "";
$putanja = dirname(dirname($_SERVER['REQUEST_URI']));
$smarty = new Smarty();
$smarty->assign('imeprezimeboja', "style='color: black;'");
$smarty->assign('emailboja', "style='color: black;'");
$smarty->assign('lozinkaboja', "style='color: black;'");
$smarty->assign('potvrdiboja', "style='color: black;'");
$smarty->assign('imeprezimeprovjera', "");
$smarty->assign('emailprovjera', "");
$smarty->assign('lozinkaprovjera', "");
$smarty->assign('potvrdaprovjera', "");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['prijavaButton'])) {
  $email = $_POST['email'];
  $lozinka = $_POST['lozinka'];
  if (empty($email) === false && empty($lozinka) === false) {
    $upit = "SELECT * FROM DZ_4korisnik WHERE email='$email' AND lozinka='$lozinka'";
    $rezultat = $veza->selectDB($upit);
    if ($rezultat->num_rows > 0) {
      while ($redak = $rezultat->fetch_assoc()) {
        Sesija::kreirajKorisnika($redak["email"], $redak["ID_uloga"]);
      }
    } else {
      $poruka = "Neuspješna prijava, pokušajte ponovo!";
    }
  } else {
    $poruka = "Neuspješna prijava, pokušajte ponovo!";
  }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registracijaButton'])) { {
    $imeprezime = $_POST['imeprezime'];
    $email = $_POST['email'];
    $spol = $_POST['spol'];
    $lozinka = $_POST['lozinka'];
    $potvrdalozinke = $_POST['potvrdalozinke'];
    $imeprezime_split = explode(" ", $imeprezime);
    $ime = $imeprezime_split[0];
    $dinamicka_sol = 'asFgzCrfTSrfuu';
    $lozinka_kriptirana = hash('sha256', $lozinka . $dinamicka_sol);
    $prezime = "";
    $email_ispravan = false;
    if (isset($imeprezime_split[1])) {
      $prezime = $imeprezime_split[1];
      $smarty->assign('imeprezimeboja', "style='color: black;'");
    } else {
      $smarty->assign('imeprezimeboja', "style='color: red;'");
      $smarty->assign('imeprezimeprovjera', "Ime i prezime ne sadrži razmak ili nije uneseno");
      $poruka_registracija = "Neuspješna registracija, pokušajte ponovo!";
    }
    if (preg_match("/^[a-zA-Z0-9._+-]{1,64}@[a-zA-Z0-9.-]{1,253}\.(com|hr|info)$/", $email)) {
      $email_ispravan = true;
      $smarty->assign('emailboja', "style='color: black;'");
    } else {
      $smarty->assign('emailprovjera', "Neispravan format email adrese ili nije unesena");
      $smarty->assign('emailboja', "style='color: red;'");
    }
    $lozinka_ispravna = lozinka_provjera($lozinka);
    if ($lozinka_ispravna == false) {
      $poruka_registracija = "Neuspješna registracija, pokušajte ponovo!";
      $smarty->assign('lozinkaboja', "style='color: red;'");
      $smarty->assign('lozinkaprovjera', "Pogrešan format lozinke");
    } else {
      $smarty->assign('lozinkaboja', "style='color: black;'");
    }
    if ($lozinka != $potvrdalozinke || !isset($potvrdalozinke) || strlen($potvrdalozinke) < 1) {
      $smarty->assign('potvrdiboja', "style='color: red;'");
      $smarty->assign('potvrdaprovjera', "Potvrđena lozinka nije unesena ili nije ista kao prethodna");
      $poruka_registracija = "Neuspješna registracija, pokušajte ponovo!";
    } else {
      $smarty->assign('potvrdiboja', "style='color: black;'");
    }
    if (empty($email) === false && empty($ime) === false && empty($prezime) === false && $lozinka_ispravna == true && $email_ispravan == true && empty($lozinka) === false &&  empty($lozinka_kriptirana) === false && empty($spol) === false && empty($lozinka) === false && empty($potvrdalozinke) === false && $lozinka == $potvrdalozinke) {
      $upit = "INSERT INTO DZ_4korisnik (ime,prezime,lozinka,lozinka_sha256,email,spol,ID_uloga) VALUES ('$ime','$prezime','$lozinka','$lozinka_kriptirana','$email','$spol',3)";
      $rezultat = $veza->selectDB($upit);
      if ($rezultat) {
        header("Location: ../index.php");
      } else {
        $poruka_registracija = "Neuspješna registracija, pokušajte ponovo!";
      }
    } else {
      $poruka_registracija = "Neuspješna registracija, pokušajte ponovo!";
    }
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
$smarty->assign('naslov', "Autentikacija");
$smarty->assign('putanja', $putanja);
$smarty->display('../templates/header.tpl');
if (isset($_SESSION["uloga"])) {
  $smarty->assign('uloga', $_SESSION["uloga"]);
}

$smarty->display('../templates/navigacija.tpl');
$smarty->assign('poruka', $poruka);
$smarty->assign('poruka_registracija', $poruka_registracija);
$smarty->display('../templates/autentikacija_body.tpl');
$smarty->display('../templates/podnozje.tpl');


function lozinka_provjera($lozinka)
{
  if (strlen($lozinka) < 15 || strlen($lozinka) > 25 || !preg_match('/[A-Z]/', $lozinka) || !preg_match('/[a-z]/', $lozinka) || !preg_match('/[0-9]/', $lozinka) || strpos($lozinka, ' ') !== false) {
    return false;
  } else {
    $specijalniZnakovi = array('=', '*', '/', '%');
    foreach ($specijalniZnakovi as $znak) {
      if (strpos($lozinka, $znak) === 0 || substr($lozinka, -1) === $znak) {
        return false;
      }
    }
    return true;
  }
}
