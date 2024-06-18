<?php

include 'connection.php';

$pwd = sha1($conn->real_escape_string($_POST['pwd']));
$npwd = sha1($conn->real_escape_string($_POST['npwd']));

$query = "SELECT * FROM user ";
$result = $conn->query($query);
$user = $result->fetch_assoc();

session_start();

if($pwd === $user['password']){
    $update = "UPDATE user SET password = '$npwd' ";
    $result = $conn->query($update);
    $_SESSION['pwdmsg'] = 'password successfuly changed';
    $_SESSION['pwdstatus'] = 'success';
}
else{
    $_SESSION['pwdmsg'] = 'wrong password';
    $_SESSION['pwdstatus'] = 'danger';
}

header('location: ../profile.php');

?>