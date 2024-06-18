<?php
    include 'connection.php';
    require '../mailer/vendor/autoload.php';

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $room = mysqli_real_escape_string($conn, $_POST['room']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $bquery = "SELECT * FROM bookings where id = '$id' ";
    $bresult = $conn->query($bquery);
    $book = $bresult->fetch_assoc();

    $b_ci = $book['check_in'];
    $b_co = $book['check_out'];

    $insert="INSERT Into schedule (booking_id, room_number, check_in, check_out) 
    VALUES ('$id', '$room', '$b_ci', '$b_co')";
    $res=mysqli_query($conn, $insert);

    $update = "UPDATE bookings SET status = 'Booked' where id = '$id' ";
    $result = $conn->query($update);
    
    $update2 = "UPDATE bookings SET room_number = '$room' where id = '$id' ";
    $result2 = $conn->query($update2);

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

    $mail->setFrom('hotelbook.hms@gmail.com', 'AMATEL');
    $mail->addAddress("$email", "$name");

    $mail->isHTML(true);
    $mail->Subject = 'Room booked!';
    $mail->Body    =  "Hello $name you have successfully booked a room. Your room number is $room";
    $mail->AltBody = "Hello $name you have successfully booked a room. Your room number is $room";

    $mail->send();

    header('location: ../booking.php');
?>  