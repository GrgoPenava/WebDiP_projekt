<?php
include 'baza.class.php';
$veza = new Baza();
$veza->spojiDb();

$email = $_POST['email'];
if (empty($email) === false) {
    $upit = "SELECT * FROM DZ_4korisnik WHERE email='$email'";
    $rezultat = $veza->selectDB($upit);
    if ($rezultat->num_rows > 0) {
        echo json_encode(array('pronaden_email' => true));
    } else {
        echo json_encode(array('pronaden_email' => false));
    }
} else {
    echo json_encode(array('pronaden_email' => false));
}
