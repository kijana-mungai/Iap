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
        $mail->Host       = 'smtp.gmail.com';  
        $mail->SMTPAuth   = true;
        $mail->Username   = 'njagi.mungai@strathmore.edu';
        $mail->Password   = 'djti umzu jgcw hbgk';  
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
    <p>
        In order to continue, you need to 
        <a href='#'>click here</a> 
        to complete the registration process:
    </p>
    <p>
        <a href='https://yourdomain.com/confirm.php?email=$email' 
           style='background-color:#2563eb; color:white; padding:10px 20px; 
           text-decoration:none; border-radius:6px; font-size:16px;'>
           Complete Registration
        </a>
    </p>
    <br>
    <p>Regards,<br>Systems Admin<br> ICS 2.2</p>
";

        $mail->send();
        echo "✅ Confirmation email sent successfully to $email.";
    } catch (Exception $e) {
        echo "❌ Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
