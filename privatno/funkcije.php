<?php
include 'dnevnik.class.php';
include 'baza.class.php';
include 'sesija.class.php';

$direktorij = getcwd();
$putanja = dirname(dirname($_SERVER['REQUEST_URI']));

$veza = new Baza();
$veza->spojiDb();

$dnevnik = new Dnevnik();
$dnevnik->setNazivDatoteke("./izvorne_datoteke/dnevnik.log");

Sesija::kreirajSesiju();

if (isset($_GET["odjava"])) {
    $trenutniEmail = $_SESSION["korisnik"];
    $upitkorisnik = "SELECT * from korisnik WHERE email = '$trenutniEmail'";
    $rezultatkorisnik = $veza->selectDB($upitkorisnik);
    if ($rezultatkorisnik->num_rows > 0) {
        while ($redakkorisnik = $rezultatkorisnik->fetch_assoc()) {
            $trenutniDatumIVrijemeZaDnevnik = date('Y-m-d H:i:s');
            $upitDnevnik = "INSERT INTO dnevnik_rada (ID_korisnik, datum_i_vrijeme_zapisa, radnja) VALUES ('$redakkorisnik[ID_korisnik]','$trenutniDatumIVrijemeZaDnevnik','Odjava')";
            $rezultatDnevnik = $veza->selectDB($upitDnevnik);
        }
    }
    Sesija::obrisiSesiju();
    //header("Location:" . $putanja . "/index.php");
}

if (isset($_POST['jezici'])) {
    $odabraniJezik = $_POST['jezici'];
    $_SESSION['odabrani_jezik'] = $_POST['jezici'];
}
