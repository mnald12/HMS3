<?php

include 'connection.php';

$id = mysqli_real_escape_string($conn, $_GET['id']);
$loc = mysqli_real_escape_string($conn, $_GET['loc']);

$query = "DELETE FROM bookings WHERE id = '$id'";
$result = $conn->query($query);

$sched = "SELECT * FROM schedule where booking_id = '$id' ";
$schedRes = $conn->query($sched);
$schedule = $schedRes->fetch_assoc();
$count = $schedRes->num_rows;

if($count > 0){
    $sid = $schedule['id'];
    $delete = "DELETE FROM schedule WHERE id = '$sid'";
    $dresult = $conn->query($delete);
}

header("location: ../$loc.php");

?>