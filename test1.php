<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "Wydanhdu@gmail.com";
    $subject = "New Customer Email";

    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.example.com';                     // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'your-smtp-username';                     // SMTP username
        $mail->Password   = 'your-smtp-password';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress($to);     // Add a recipient

        // Content
        $mail->isHTML(false);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = "Name: $name\nEmail: $email\n\nMessage:\n$message";

        $mail->send();
        echo 'Email sent successfully!';
    } catch (Exception $e) {
        echo "Error sending email. Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>

<body>

    <h2>Contact Us</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea><br>

        <input type="submit" value="Submit">
    </form>

</body>

</html>