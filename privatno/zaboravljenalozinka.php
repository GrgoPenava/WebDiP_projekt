<?php
include 'baza.class.php';
$veza = new Baza();
$veza->spojiDb();

$email = $_POST['email'];
if (empty($email) === false) {
    $upit = "SELECT * FROM korisnik WHERE email='$email'";
    $rezultat = $veza->selectDB($upit);
    if ($rezultat->num_rows > 0) {
        $lozinka = uniqid("Zz0");
        $upitpostavilozinku = "UPDATE korisnik SET lozinka = '$lozinka' WHERE email = '$email'";
        $rezultatpostavilozinku = $veza->selectDB($upitpostavilozinku);

        $to = $email;
        $subject = "Lozinka";
        $message = '
        Vaša nova lozinka je: ' . $lozinka . '
        Ugodan ostatak dana.
        ';
        $headers = "From : gpenava@student.foi.hr";
        if (mail($to, $subject, $message, $headers)) {
            echo json_encode(array('pronaden_email' => true));
        } else {
            echo json_encode(array('pronaden_email' => false));
        }
    } else {
        echo json_encode(array('pronaden_email' => false));
    }
} else {
    echo json_encode(array('pronaden_email' => false));
}
