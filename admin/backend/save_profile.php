<?php

include 'connection.php';

$name = mysqli_real_escape_string($conn, $_POST['name']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$username = mysqli_real_escape_string($conn, $_POST['username']);

$query = "SELECT * FROM user ";
$result = $conn->query($query);
$user = $result->fetch_assoc();

if($_FILES["file1"] !== null){
    $extension=array("jpeg","jpg","png","gif","jfif");
    $file_name=$_FILES["file1"]["name"];
    $file_tmp=$_FILES["file1"]["tmp_name"];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    if(in_array($ext,$extension)) {
        if(!file_exists("../.././img/".$file_name)) {
            move_uploaded_file($file_tmp=$_FILES["file1"]["tmp_name"],"../.././img/".$file_name);
            $update = "UPDATE user SET avatar = '$file_name' ";
            $result = $conn->query($update);
        }
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["file1"]["tmp_name"],"../.././img/".$newFileName);
            $update = "UPDATE user SET avatar = '$newFileName' ";
            $result = $conn->query($update);
        }
    }
}


if($name !== $user['name']){
    $update = "UPDATE user SET name = '$name' ";
    $result = $conn->query($update);
}

if($address !== $user['address']){
    $update = "UPDATE user SET address = '$address' ";
    $result = $conn->query($update);
}

if($email !== $user['email']){
    $update = "UPDATE user SET email = '$email' ";
    $result = $conn->query($update);
}

if($username !== $user['username']){
    $update = "UPDATE user SET username = '$username' ";
    $result = $conn->query($update);
}

header('location: ../profile.php');

?>