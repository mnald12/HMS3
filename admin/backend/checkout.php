<?php
    include 'connection.php';

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $bquery = "SELECT * FROM bookings where id = '$id' ";
    $bresult = $conn->query($bquery);
    $book = $bresult->fetch_assoc();

    $sched = "SELECT * FROM schedule where booking_id = '$id' ";
    $schedRes = $conn->query($sched);
    $schedule = $schedRes->fetch_assoc();

    $sid = $schedule['id'];

    $update = "UPDATE bookings SET status = 'Checked Out' where id = '$id' ";
    $result = $conn->query($update);

    $delete = "DELETE FROM schedule WHERE id = '$sid'";
    $dresult = $conn->query($delete);

    header('location: ../checkedin.php');
?>  