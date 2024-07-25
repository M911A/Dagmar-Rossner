<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $time = $_POST['time'];
    $email = 'mika.griebsch@gmail.com';

    // Überprüfen, ob die Felder nicht leer sind
    if (!empty($date) && !empty($time) && !empty($email)) {
        // E-Mail senden
        $to = 'mika.griebsch.schule@gmail.com'; // Deine E-Mail-Adresse
        $subject = 'Neue Terminbuchung';
        $message = "Datum: $date\nZeit: $time\nE-Mail: $email";
        $headers = 'From: ' . $email . "\r\n" .
            'Reply-To: ' . $email . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        if (mail($to, $subject, $message, $headers)) {
            echo "E-Mail wurde erfolgreich gesendet.";
        } else {
            echo "Fehler beim Senden der E-Mail.";
        }
    } else {
        echo "Bitte füllen Sie alle Felder aus.";
    }
} else {
    echo "Ungültige Anfrage.";
}
?>
