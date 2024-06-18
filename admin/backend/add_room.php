<?php

    include 'connection.php';

    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $rnumber = mysqli_real_escape_string($conn, $_POST['rnumber']);

    $insert="INSERT Into room (room_type, room_number) VALUES ('$type', '$rnumber')";
    $res=mysqli_query($conn, $insert);

    header("location: ../room.php?rname=$type");

?>