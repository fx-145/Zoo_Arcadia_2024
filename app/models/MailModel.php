<?php
require_once __DIR__ . '../../../vendor/autoload.php';
//use Dotenv\Dotenv;

//$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
//$dotenv->load();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class MailModel
{
    public function sendMail($titre, $description, $emailContact, $emailRecipient)
    {
        try {
            $mail = new PHPMailer(true);

            // Configuration du serveur SMTP
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['MAIL_ADDRESS'];                     //SMTP username   
            $mail->Password = $_ENV['MAIL_PASSWORD'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // Destinataire, expéditeur et réponse
            $mail->setFrom($_ENV['MAIL_ADDRESS'], $emailContact);
            $mail->addAddress($emailRecipient, '');
            $mail->addReplyTo($emailContact, '');

            // Contenu du message
            $mail->isHTML(true);
            $mail->Subject = $titre;
            $mail->msgHTML($description, __DIR__);

            // Envoi du message
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
