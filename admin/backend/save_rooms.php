
<?php

include 'connection.php';

$id = mysqli_real_escape_string($conn, $_POST['id']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$bed = mysqli_real_escape_string($conn, $_POST['bed']);
$bath = mysqli_real_escape_string($conn, $_POST['bath']);
$wifi = mysqli_real_escape_string($conn, $_POST['wifi']);
$text = mysqli_real_escape_string($conn, $_POST['text']);

if($_FILES["file1"] !== null){
    $extension=array("jpeg","jpg","png","gif","jfif");
    $file_name=$_FILES["file1"]["name"];
    $file_tmp=$_FILES["file1"]["tmp_name"];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    if(in_array($ext,$extension)) {
        if(!file_exists("../.././img/".$file_name)) {
            move_uploaded_file($file_tmp=$_FILES["file1"]["tmp_name"],"../.././img/".$file_name);
            $update = "UPDATE rooms SET images = '$file_name' where id = '$id' ";
            $result = $conn->query($update);
        }
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["file1"]["tmp_name"],"../.././img/".$newFileName);
            $update = "UPDATE rooms SET images = '$newFileName' where id = '$id' ";
            $result = $conn->query($update);
        }
    }
}

$query = "SELECT * FROM rooms where id = '$id' ";
$result = $conn->query($query);
$rooms = $result->fetch_assoc();

if($name !== $rooms['name']){

    $old = $rooms['name'];

    $update2 = "UPDATE bookings SET room = '$name' where room = '$old' ";
    $result2 = $conn->query($update2);

    $update1 = "UPDATE room SET room_type = '$name' where room_type = '$old' ";
    $result1 = $conn->query($update1);

    $update = "UPDATE rooms SET name = '$name' where id = '$id' ";
    $result = $conn->query($update);

}

if($price !== $rooms['price']){
    $update = "UPDATE rooms SET price = '$price' where id = '$id' ";
    $result = $conn->query($update);
}

if($bed !== $rooms['bed']){
    $update = "UPDATE rooms SET bed = '$bed' where id = '$id' ";
    $result = $conn->query($update);
}

if($bath !== $rooms['bath']){
    $update = "UPDATE rooms SET bath = '$bath' where id = '$id' ";
    $result = $conn->query($update);
}

if($wifi !== $rooms['wifi']){
    $update = "UPDATE rooms SET wifi = '$wifi' where id = '$id' ";
    $result = $conn->query($update);
}

if($text !== $rooms['text']){
    $update = "UPDATE rooms SET text = '$text' where id = '$id' ";
    $result = $conn->query($update);
}

header('location: ../rooms.php');

?>