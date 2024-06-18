<?php

include 'connection.php';

$address = mysqli_real_escape_string($conn, $_POST['address']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$number = mysqli_real_escape_string($conn, $_POST['number']);

$query = "SELECT * FROM contacts ";
$result = $conn->query($query);
$contacts = $result->fetch_assoc();

if($address !== $contacts['address']){
    $update = "UPDATE contacts SET address = '$address' ";
    $result = $conn->query($update);
}

if($email !== $contacts['email']){
    $update = "UPDATE contacts SET email = '$email' ";
    $result = $conn->query($update);
}

if($number !== $contacts['number']){
    $update = "UPDATE contacts SET number = '$number' ";
    $result = $conn->query($update);
}

header('location: ../contacts.php');

?>