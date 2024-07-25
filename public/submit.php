<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $time = $_POST['time'];
    $email = 'mika.griebsch@gmail.com';

    if (!empty($date) && !empty($time) && !empty($email)) {
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 0;                      
            $mail->isSMTP();                            
            $mail->Host       = 'smtp.gmail.com';       
            $mail->SMTPAuth   = true;                   
            $mail->Username   = 'mika.griebsch@gmail.com'; // SMTP-Benutzername
            $mail->Password   = 'pjxt swjn vbdj hcug';    // SMTP-Passwort (App-spezifisches Passwort)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 

            // Empfänger
            $mail->setFrom('mika.griebsch@gmail.com', 'Mailer'); // Absenderadresse
            $mail->addAddress('mika.griebsch.schule@gmail.com'); // Empfängeradresse

            // Inhalt der E-Mail
            $mail->isHTML(false);                       // E-Mail-Format auf Text setzen
            $mail->Subject = 'Neue Terminbuchung';      // Betreff der E-Mail
            $mail->Body    = "Datum: $date\nZeit: $time\nE-Mail: $email"; // Inhalt der E-Mail

            // E-Mail senden
            $mail->send();
            echo 'E-Mail wurde erfolgreich gesendet.';
        } catch (Exception $e) {
            // Fehler beim Senden der E-Mail
            echo "Fehler beim Senden der E-Mail: {$mail->ErrorInfo}";
        }
    } else {
        // Fehlende Felder im Formular
        echo "Bitte füllen Sie alle Felder aus.";
    }
} else {
    // Ungültige Anfrage
    echo "Ungültige Anfrage.";
}
?>
