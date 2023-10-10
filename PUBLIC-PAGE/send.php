<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông báo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        .success-message {
            display: none;
            padding: 20px;
            background-color: #4CAF50;
            color: white;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div id="successMessage" class="success-message">
        Email đã được gửi thành công!
    </div>

    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    if (isset($_POST["send"])) {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'nguyenphuqui170304@gmail.com';
        $mail->Password = 'thznrualajrbkrpv';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('Wydanhdu@gmail.com');
        $mail->addAddress($_POST["email"]);
        $mail->isHTML(true);
        $mail->Body = 'First Name: ' . $_POST["first-name"] . '<br>Last Name: ' . $_POST["last-name"] . '<br>Message: ' . $_POST["message"];

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
</body>
</html>
