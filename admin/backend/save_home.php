
<?php

include 'connection.php';

$brand = mysqli_real_escape_string($conn, $_POST['brand']);
$h1 = mysqli_real_escape_string($conn, $_POST['headline1']);
$h2 = mysqli_real_escape_string($conn, $_POST['headline2']);
$text = mysqli_real_escape_string($conn, $_POST['text']);

if($_FILES["file1"] !== null){
    $extension=array("jpeg","jpg","png","gif","jfif");
    $file_name=$_FILES["file1"]["name"];
    $file_tmp=$_FILES["file1"]["tmp_name"];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    if(in_array($ext,$extension)) {
        if(!file_exists("../.././img/".$file_name)) {
            move_uploaded_file($file_tmp=$_FILES["file1"]["tmp_name"],"../.././img/".$file_name);
            $update = "UPDATE home SET bgd_image = '$file_name' ";
            $result = $conn->query($update);
        }
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["file1"]["tmp_name"],"../.././img/".$newFileName);
            $update = "UPDATE home SET bgd_image = '$newFileName' ";
            $result = $conn->query($update);
        }
    }
}

if($_FILES["file2"] !== null){
    $extension=array("jpeg","jpg","png","gif","jfif");
    $file_name=$_FILES["file2"]["name"];
    $file_tmp=$_FILES["file2"]["tmp_name"];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    if(in_array($ext,$extension)) {
        if(!file_exists("../.././img/".$file_name)) {
            move_uploaded_file($file_tmp=$_FILES["file2"]["tmp_name"],"../.././img/".$file_name);
            $update = "UPDATE home SET image = '$file_name' ";
            $result = $conn->query($update);
        }
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["file2"]["tmp_name"],"../.././img/".$newFileName);
            $update = "UPDATE home SET image = '$newFileName' ";
            $result = $conn->query($update);
        }
    }
}

$query = "SELECT * FROM home";
$result = $conn->query($query);
$home = $result->fetch_assoc();

if($brand !== $home['brand_name']){
    $update = "UPDATE home SET brand_name = '$brand' ";
    $result = $conn->query($update);
}

if($h1 !== $home['display_text1']){
    $update = "UPDATE home SET display_text1 = '$h1' ";
    $result = $conn->query($update);
}

if($h2 !== $home['display_text2']){
    $update = "UPDATE home SET display_text2 = '$h2' ";
    $result = $conn->query($update);
}

if($text !== $home['text']){
    $update = "UPDATE home SET text = '$text' ";
    $result = $conn->query($update);
}

header('location: ../home.php');

?>