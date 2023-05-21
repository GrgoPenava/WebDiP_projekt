<?php
include 'baza.class.php';
$veza = new Baza();
$veza->spojiDb();

$idPoruke = $_POST['idPorukeIzTablice'];
if (empty($idPoruke) === false) {
    $upit = "UPDATE poruke SET ID_status = 1 WHERE id_poruke = '$idPoruke'";
    $rezultat = $veza->selectDB($upit);
    if ($rezultat == true) {
        echo json_encode(array('odgovor' => true));
    } else {
        echo json_encode(array('odgovor' => false));
    }
}
