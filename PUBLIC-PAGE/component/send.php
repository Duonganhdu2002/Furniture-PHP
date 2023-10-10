<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'nguyenphuqui170304@gmail.com'; // Địa chỉ Gmail của bạn
    $mail->Password = 'thznrualajrbkrpv'; // Mật khẩu ứng dụng Gmail của bạn
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('Wydanhdu@gmail.com'); // Địa chỉ Gmail của bạn

    $mail->addAddress($_POST["email"]);

    $mail->isHTML(true);

    $mail->Body = 'First Name: ' . $_POST["first-name"] . '<br>Last Name: ' . $_POST["last-name"] . '<br>Message: ' . $_POST["message"];

    try {
        $mail->send();
        echo "
            <script>
            alert('Sent Successfully');
            window.location.href = 'content-8.php';
            </script>
        ";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
