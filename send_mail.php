<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "assets/PHPMailer/src/PHPMailer.php";
require "assets/PHPMailer/src/SMTP.php";
require "assets/PHPMailer/src/Exception.php";

include_once "mail_to_myself.php";


if (isset($_POST['submitted'])) {
    $from_name = $_POST['sendername'];
    $from_mail = $_POST['sender'];
    $to = "marvin.rosskothen@outlook.de";
    $subject = $_POST['topic'];
    $message = $_POST['message'];


//Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.office365.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'marvin.rosskothen@outlook.de';                     //SMTP username
        $mail->Password = 'SECRET';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($from_mail, $from_name);
        $mail->addAddress($to, 'Marvin Roßkothen');     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = getMail($from_name, $from_mail, $message);
        $mail->AltBody = 'Please use an email client which supports HTML.';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Error: {$mail->ErrorInfo}";
    }
}
?>