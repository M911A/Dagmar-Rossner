<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 2; // Debug-Ausgabe aktivieren, um mehr Details zu sehen
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'mika.griebsch@gmail.com';
    $mail->Password   = 'pjxt swjn vbdj hcug'; // Dein App-spezifisches Passwort
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('mika.griebsch@gmail.com', 'Mika Griebsch');
    $mail->addAddress('mika.griebsch.schule@gmail.com');

    $mail->isHTML(false);
    $mail->Subject = 'Test E-Mail';
    $mail->Body    = 'Dies ist eine Test-E-Mail.';

    $mail->send();
    echo 'Test-E-Mail wurde erfolgreich gesendet.';
} catch (Exception $e) {
    echo "Fehler beim Senden der E-Mail: {$mail->ErrorInfo}";
}
?>
