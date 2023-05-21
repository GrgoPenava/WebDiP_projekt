<?php
include 'baza.class.php';
$veza = new Baza();
$veza->spojiDb();

$idPoruke = $_POST['idPorukeIzTablice'];
if (empty($idPoruke) === false) {
    $upit = "DELETE FROM poruke WHERE ID_poruke='$idPoruke'";
    $rezultat = $veza->selectDB($upit);
    if ($rezultat == true) {
        echo json_encode(array('obrisan_zapis' => true));
    } else {
        echo json_encode(array('obrisan_zapis' => false));
    }
} else {
    echo json_encode(array('obrisan_zapis' => false));
}
