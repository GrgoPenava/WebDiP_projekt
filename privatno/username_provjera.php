<?php
include 'baza.class.php';
$veza = new Baza();
$veza->spojiDb();

$username = $_POST['username'];
if (empty($username) === false) {
    $upit = "SELECT * FROM korisnik WHERE username='$username'";
    $rezultat = $veza->selectDB($upit);
    if ($rezultat->num_rows > 0) {
        echo json_encode(array('pronaden_username' => true));
    } else {
        echo json_encode(array('pronaden_username' => false));
    }
} else {
    echo json_encode(array('pronaden_username' => false));
}
