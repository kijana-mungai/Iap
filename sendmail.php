<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer classes
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name  = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';   // Gmail SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'njagi.mungai@strathmore.edu'; // your Gmail
        $mail->Password   = 'djti umzu jgcw hbgk';   // ⚠️ Gmail App Password, not your Gmail login password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Sender and recipient
        $mail->setFrom('yourgmail@gmail.com', 'Systems Admin');
        $mail->addAddress($email, $name);

        // Email content
        $mail->isHTML(true);
        $mail->Subject = "ICS 2.2 Account Registration";
        $mail->Body    = "
            <p>Hello <strong>$name</strong>,</p>
            <p>You requested an account on <b>ICS 2.2</b>.</p>
            <p>In order to continue, please click the button below:</p>
            <p>
              <a href='https://yourdomain.com/confirm.php?email=$email' 
                 style='background-color:#2563eb; color:white; padding:10px 20px; 
                 text-decoration:none; border-radius:6px; font-size:16px;'>
                 Complete Registration
              </a>
            </p>
            <br>
            <p>Regards,<br>Systems Admin</p>
        ";

        $mail->send();
        echo "✅ Confirmation email sent successfully to $email.";
    } catch (Exception $e) {
        echo "❌ Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
