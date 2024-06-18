<?php

include 'connection.php';

$id = mysqli_real_escape_string($conn, $_POST['id']);
$title = mysqli_real_escape_string($conn, $_POST['title']);
$text = mysqli_real_escape_string($conn, $_POST['text']);

$query = "SELECT * FROM services where id = '$id' ";
$result = $conn->query($query);
$services = $result->fetch_assoc();

if($title !== $services['title']){
    $update = "UPDATE services SET title = '$title' where id = '$id' ";
    $result = $conn->query($update);
}

if($text !== $services['text']){
    $update = "UPDATE services SET text = '$text' where id = '$id' ";
    $result = $conn->query($update);
}

header('location: ../services.php');

?>