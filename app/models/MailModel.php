<?php

//namespace Model;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../../vendor/autoload.php';
class MailModel
{
    public function sendMail($titre, $description, $emailContact,$emailRecipient)
    {
        try {
            $mail = new PHPMailer(true);

            // Configuration du serveur SMTP
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'zooarcadia2024@gmail.com';                     //SMTP username   
            $mail->Password   = '';      
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            // Destinataire, expéditeur et réponse
            $mail->setFrom('zooarcadia2024@gmail.com', $emailContact);
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
