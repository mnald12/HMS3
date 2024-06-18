<?php

include 'db/connection.php';

$id = mysqli_real_escape_string($conn, $_POST['bid']);

$bquery = "SELECT * FROM bookings Where booking_id = '$id' ";
$bresult = $conn->query($bquery);
$book = $bresult->fetch_assoc();

if($book === null){
    session_start();
    $_SESSION['delbooking'] = 'The ID you entered is invalid. If you need further assistance, contact our support team. Thank you.';
    header('location: cancelbooking.php#ebooking');
}
else{
    if($book['status'] === "Booked"){
        session_start();
        $_SESSION['delbooking'] = 'Your reservation has already been booked.';
        header('location: cancelbooking.php#ebooking');
    }
    else{
        $query = "DELETE FROM bookings WHERE id = '$id'";
        $conn->query($query);
        session_start();
        $_SESSION['delbooking'] = 'Your reservation has been successfully canceled.';
        header('location: cancelbooking.php#ebooking');
    }
}

?>