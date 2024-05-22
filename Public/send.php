<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


if(isset($_POST["send"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    // $mail->SMTPDebug = 2;  // chế độ ghi chú này trong môi trường sản xuất
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;
    $mail->Username = 'nguyenphuqui170304@gmail.com'; // Địa chỉ Gmail của bạn
    $mail->Password = 'thznrualajrbkrpv'; // Mật khẩu ứng dụng Gmail của bạn
    $mail->SMTPSecure = 'tls';  // Sử dụng TLS , SSL
    $mail->Port = 587;  // Sử dụng cổng 587 , ssl 465

    $mail->setFrom($_POST["email"], $_POST["email"]); // sender email
    $mail->addReplyTo('nguyenphuqui170304@gmail.com',"Phu Qui");
    $mail->addAddress('nguyenphuqui170304@gmail.com', 'Receiver Name');

    $mail->isHTML(true); 

    $mail->Subject = 'Phan hoi cua khach hang'; // Chủ đề email
    $mail->Body = 'First Name: ' . $_POST["first-name"] . '<br>Last Name: ' . $_POST["last-name"] . '<br>Message: ' . $_POST["message"]; // Nội dung email

    try {
        $mail->send();
        echo "
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sent Successfully',
                        showConfirmButton: false,
                        timer: 2500,
                    }).then(function() {
                        window.location.href = 'index.php?pid=5';
                    });
                });
            </script>
        ";
    } catch (Exception $e) {
        echo "
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Message could not be sent. Mailer Error: {$mail->ErrorInfo}',
                });
            </script>
        ";
    }
}
?>

