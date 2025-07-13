<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once __DIR__ . '/../vendor/autoload.php';

function sendVerificationMail(string $toEmail, string $token, string $from, string $fromName): bool {
    $mail = new PHPMailer(true);
    try {
        // SMTP configuration example - adjust as needed
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'user@example.com';
        $mail->Password = 'secret';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($from, $fromName);
        $mail->addAddress($toEmail);

        $mail->isHTML(true);
        $mail->Subject = 'Confirm your email';
        $link = 'http://localhost/verify.php?token=' . urlencode($token);
        $mail->Body = "<p>Merci de confirmer votre adresse e-mail en cliquant <a href='{$link}'>ici</a>.</p>";
        $mail->AltBody = "Merci de confirmer votre adresse e-mail: {$link}";

        return $mail->send();
    } catch (Exception $e) {
        return false;
    }
}
