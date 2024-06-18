<?php

include 'db/connection.php';
require 'admin/mailer/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$uiid = uniqid(rand(10000,99999));
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$bday = mysqli_real_escape_string($conn, $_POST['bday']);
$country = mysqli_real_escape_string($conn, $_POST['country']);
$add = mysqli_real_escape_string($conn, $_POST['add']);
$number = mysqli_real_escape_string($conn, $_POST['number']);
$idtype = mysqli_real_escape_string($conn, $_POST['idtype']);
$idnumber = mysqli_real_escape_string($conn, $_POST['idnumber']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$checkin = mysqli_real_escape_string($conn, $_POST['checkin']);
$checkout = mysqli_real_escape_string($conn, $_POST['checkout']);
$adult = mysqli_real_escape_string($conn, $_POST['adult']);
$child = mysqli_real_escape_string($conn, $_POST['child']);
$room = mysqli_real_escape_string($conn, $_POST['room']);
$message = mysqli_real_escape_string($conn, $_POST['message']);
$date = date("m/d/Y");

if($_FILES["file1"] !== null){
    $extension=array("jpeg","jpg","png","gif","jfif");
    $file_name=$_FILES["file1"]["name"];
    $file_tmp=$_FILES["file1"]["tmp_name"];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    if(in_array($ext,$extension)) {
        if(!file_exists("./img/".$file_name)) {
            move_uploaded_file($file_tmp=$_FILES["file1"]["tmp_name"],"./img/".$file_name);
            $insert="INSERT Into bookings (booking_id, first_name, last_name, birth_date, address, country, number, id_number, id_type, id_file, email, check_in, check_out, adult, child, room, status, request, created) VALUES ('$uiid', '$fname', '$lname', '$bday', '$add', '$country', '$number', '$idnumber', '$idtype', '$file_name', '$email', '$checkin', '$checkout', '$adult', '$child', '$room', 'Pending', '$message', '$date')";
            mysqli_query($conn, $insert);
        }
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["file1"]["tmp_name"],"./img/".$newFileName);
            $insert="INSERT Into bookings (booking_id, first_name, last_name, birth_date, address, country, number, id_number, id_type, id_file, email, check_in, check_out, adult, child, room, status, request, created) VALUES ('$uiid', '$fname', '$lname', '$bday', '$add', '$country', '$number', '$idnumber', '$idtype', '$newFileName', '$email', '$checkin', '$checkout', '$adult', '$child', '$room', 'Pending', '$message', '$date')";
            mysqli_query($conn, $insert);
        }
    }

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'hotelbook.hms@gmail.com';
    $mail->Password   = 'jfbpenkseuqrujwj';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    $mail->setFrom('hotelbook.hms@gmail.com', 'HOTELBOOK');
    $mail->addAddress("$email", "$fname $lname");

    $mail->isHTML(true);
    $mail->Subject = 'Booking Confirmation and Reservation ID';
    $mail->Body    = "Your booking reservation has been sent! Please use this ID to edit or cancel your reservation: $uiid. Once your reservation is booked by the admin, you cannot edit or cancel your reservation. Thank you";
    $mail->AltBody = "Your booking reservation has been sent! Please use this ID to edit or cancel your reservation: $uiid. Once your reservation is booked by the admin, you cannot edit or cancel your reservation. Thank you";

    $mail->send();

    session_start();
    $_SESSION['booking'] = 'Your request has been sent! Please check your email for our response, Thank You!';
}
else{
    session_start();
    $_SESSION['booking'] = 'Submition failed! Please upload the picture of your id, Thank You!';
}

header('location: booking.php#booking');
?>