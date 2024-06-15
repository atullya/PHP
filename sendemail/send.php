<?php
// VERY VERY IMP NOTE
//INSENDER MAIL
// 1. Turn on 2-Step Verification
// 2. Create an app password

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["send"])) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'atulmzn1@gmail.com'; // your gmail address
        $mail->Password = 'riel pbvu obpg olpv'; // your gmail app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('atulmzn1@gmail.com'); // your gmail address
        $mail->addAddress($_POST["email"]);

        $mail->isHTML(true);
        $mail->Subject = $_POST["subject"];
        $mail->Body = $_POST["message"];

        // Enable verbose debug output
        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'html';

        $mail->send();

        echo "
        <script>
        alert('Sent successfully');
        window.location.href = 'index.php';
        </script>
        ";
    } catch (Exception $e) {
        echo "
        <script>
        alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');
        </script>
        ";
    }
}
?>



