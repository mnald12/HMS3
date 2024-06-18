<?php
    include 'connection.php';
    require '../mailer/vendor/autoload.php';

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $msg = mysqli_real_escape_string($conn, $_POST['msg']);

    $update = "UPDATE bookings SET status = 'Rejected' where id = '$id' ";
    $result = $conn->query($update);

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

    $mail->setFrom('hotelbook.hms@gmail.com', 'HOTELBOOK');
    $mail->addAddress("$email", "$name");

    $mail->isHTML(true);
    $mail->Subject = 'Date already booked!';
    $mail->Body    =  "$msg";
    $mail->AltBody = "$msg";

    $mail->send();

    header('location: ../booking.php');
?>  