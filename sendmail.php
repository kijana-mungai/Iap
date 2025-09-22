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
                To complete your registration, please 
                <a href='http://localhost/Internet%20app/registation.php'$email'>click here</a>.
            </p>
            <br>
            <p>Regards,<br>Systems Admin<br>ICS 2.2</p>
        ";

        $mail->send();
        echo "✅ Confirmation email sent successfully to $email.";
    } catch (Exception $e) {
        echo "❌ Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>