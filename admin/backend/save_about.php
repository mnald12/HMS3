
<?php

include 'connection.php';

$title = mysqli_real_escape_string($conn, $_POST['title']);
$text = mysqli_real_escape_string($conn, $_POST['text']);

if($_FILES["file1"] !== null){
    $extension=array("jpeg","jpg","png","gif","jfif");
    $file_name=$_FILES["file1"]["name"];
    $file_tmp=$_FILES["file1"]["tmp_name"];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    if(in_array($ext,$extension)) {
        if(!file_exists("../.././img/".$file_name)) {
            move_uploaded_file($file_tmp=$_FILES["file1"]["tmp_name"],"../.././img/".$file_name);
            $update = "UPDATE about SET image1 = '$file_name' ";
            $result = $conn->query($update);
        }
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["file1"]["tmp_name"],"../.././img/".$newFileName);
            $update = "UPDATE about SET image1 = '$newFileName' ";
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
            $update = "UPDATE about SET image2 = '$file_name' ";
            $result = $conn->query($update);
        }
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["file2"]["tmp_name"],"../.././img/".$newFileName);
            $update = "UPDATE about SET image2 = '$newFileName' ";
            $result = $conn->query($update);
        }
    }
}

if($_FILES["file3"] !== null){
    $extension=array("jpeg","jpg","png","gif","jfif");
    $file_name=$_FILES["file3"]["name"];
    $file_tmp=$_FILES["file3"]["tmp_name"];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    if(in_array($ext,$extension)) {
        if(!file_exists("../.././img/".$file_name)) {
            move_uploaded_file($file_tmp=$_FILES["file3"]["tmp_name"],"../.././img/".$file_name);
            $update = "UPDATE about SET image3 = '$file_name' ";
            $result = $conn->query($update);
        }
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["file3"]["tmp_name"],"../.././img/".$newFileName);
            $update = "UPDATE about SET image3 = '$newFileName' ";
            $result = $conn->query($update);
        }
    }
}

if($_FILES["file4"] !== null){
    $extension=array("jpeg","jpg","png","gif","jfif");
    $file_name=$_FILES["file4"]["name"];
    $file_tmp=$_FILES["file4"]["tmp_name"];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    if(in_array($ext,$extension)) {
        if(!file_exists("../.././img/".$file_name)) {
            move_uploaded_file($file_tmp=$_FILES["file4"]["tmp_name"],"../.././img/".$file_name);
            $update = "UPDATE about SET image4 = '$file_name' ";
            $result = $conn->query($update);
        }
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["file4"]["tmp_name"],"../.././img/".$newFileName);
            $update = "UPDATE about SET image4 = '$newFileName' ";
            $result = $conn->query($update);
        }
    }
}

$query = "SELECT * FROM about";
$result = $conn->query($query);
$about = $result->fetch_assoc();

if($title !== $about['title']){
    $update = "UPDATE about SET title = '$title' ";
    $result = $conn->query($update);
}

if($text !== $about['text']){
    $update = "UPDATE about SET text = '$text' ";
    $result = $conn->query($update);
}

header('location: ../about.php');

?>