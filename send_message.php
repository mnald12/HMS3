<?php
    include 'db/connection.php';
    require 'admin/mailer/vendor/autoload.php';

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $msg = mysqli_real_escape_string($conn, $_POST['msg']);

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'hotelbook.hms@gmail.com';
    $mail->Password   = 'jfbpenkseuqrujwj';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    $mail->setFrom("$email", "$name");
    $mail->addAddress('hotelbook.hms@gmail.com', 'HOTELBOOK');

    $mail->isHTML(true);
    $mail->Subject = "$subject";
    $mail->Body    =  "$msg";
    $mail->AltBody = "$msg";

    $mail->send();

    session_start();
    $_SESSION['b-message'] = 'Your message has been sent, Thank You!';


    header('location: contacts.php#contacts');
?>  