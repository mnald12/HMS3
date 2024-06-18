<?php
    include 'connection.php';

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $update = "UPDATE bookings SET status = 'Checked In' where id = '$id' ";
    $result = $conn->query($update);

    header('location: ../booked.php');
?>  