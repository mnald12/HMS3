<?php

include 'db/connection.php';

$id = mysqli_real_escape_string($conn, $_POST['id']);

$bquery = "SELECT * FROM bookings Where booking_id = '$id' ";
$bresult = $conn->query($bquery);
$book = $bresult->fetch_assoc();

$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$bday = mysqli_real_escape_string($conn, $_POST['bday']);
$country = mysqli_real_escape_string($conn, $_POST['country']);
$add = mysqli_real_escape_string($conn, $_POST['add']);
$number = mysqli_real_escape_string($conn, $_POST['number']);
$idtype = mysqli_real_escape_string($conn, $_POST['idtype']);
$idnumber = mysqli_real_escape_string($conn, $_POST['idnumber']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$checkin = mysqli_real_escape_string($conn, $_POST['checkin']);
$checkout = mysqli_real_escape_string($conn, $_POST['checkout']);
$adult = mysqli_real_escape_string($conn, $_POST['adult']);
$child = mysqli_real_escape_string($conn, $_POST['child']);
$room = mysqli_real_escape_string($conn, $_POST['room']);
$message = mysqli_real_escape_string($conn, $_POST['message']);
$date = date("m/d/Y");

if($_FILES["file1"] !== null){
    $extension=array("jpeg","jpg","png","gif","jfif");
    $file_name=$_FILES["file1"]["name"];
    $file_tmp=$_FILES["file1"]["tmp_name"];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    if(in_array($ext,$extension)) {
        if(!file_exists("./img/".$file_name)) {
            move_uploaded_file($file_tmp=$_FILES["file1"]["tmp_name"],"./img/".$file_name);

            $fupdate = "UPDATE bookings SET id_file = '$file_name' where id = '$id' ";
            $conn->query($fupdate);

            if($fname !== $book['first_name']){
                $update = "UPDATE bookings SET first_name = '$fname' where id = '$id' ";
                $conn->query($update);
            }
            if($lname !== $book['last_name']){
                $update = "UPDATE bookings SET last_name = '$lname' where id = '$id' ";
                $conn->query($update);
            }
            if($bday !== $book['birth_date']){
                $update = "UPDATE bookings SET birth_date = '$bday' where id = '$id' ";
                $conn->query($update);
            }
            if($country !== $book['country']){
                $update = "UPDATE bookings SET country = '$country' where id = '$id' ";
                $conn->query($update);
            }
            if($add !== $book['address']){
                $update = "UPDATE bookings SET address = '$add' where id = '$id' ";
                $conn->query($update);
            }
            if($number !== $book['number']){
                $update = "UPDATE bookings SET number = '$number' where id = '$id' ";
                $conn->query($update);
            }
            if($idtype !== $book['id_type']){
                $update = "UPDATE bookings SET id_type = '$idtype' where id = '$id' ";
                $conn->query($update);
            }
            if($idnumber !== $book['id_number']){
                $update = "UPDATE bookings SET id_number = '$idnumber' where id = '$id' ";
                $conn->query($update);
            }
            if($email !== $book['email']){
                $update = "UPDATE bookings SET email = '$email' where id = '$id' ";
                $conn->query($update);
            }
            if($checkin !== $book['check_in']){
                $update = "UPDATE bookings SET check_in = '$checkin' where id = '$id' ";
                $conn->query($update);
            }
            if($checkout !== $book['check_out']){
                $update = "UPDATE bookings SET check_out = '$checkout' where id = '$id' ";
                $conn->query($update);
            }
            if($adult !== $book['adult']){
                $update = "UPDATE bookings SET adult = '$adult' where id = '$id' ";
                $conn->query($update);
            }
            if($child !== $book['child']){
                $update = "UPDATE bookings SET child = '$child' where id = '$id' ";
                $conn->query($update);
            }
            if($message !== $book['request']){
                $update = "UPDATE bookings SET request = '$message' where id = '$id' ";
                $conn->query($update);
            }
        }
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["file1"]["tmp_name"],"./img/".$newFileName);

            $fupdate = "UPDATE bookings SET id_file = '$newFileName' where id = '$id' ";
            $conn->query($fupdate);

            if($fname !== $book['first_name']){
                $update = "UPDATE bookings SET first_name = '$fname' where id = '$id' ";
                $conn->query($update);
            }
            if($lname !== $book['last_name']){
                $update = "UPDATE bookings SET last_name = '$lname' where id = '$id' ";
                $conn->query($update);
            }
            if($bday !== $book['birth_date']){
                $update = "UPDATE bookings SET birth_date = '$bday' where id = '$id' ";
                $conn->query($update);
            }
            if($country !== $book['country']){
                $update = "UPDATE bookings SET country = '$country' where id = '$id' ";
                $conn->query($update);
            }
            if($add !== $book['address']){
                $update = "UPDATE bookings SET address = '$add' where id = '$id' ";
                $conn->query($update);
            }
            if($number !== $book['number']){
                $update = "UPDATE bookings SET number = '$number' where id = '$id' ";
                $conn->query($update);
            }
            if($idtype !== $book['id_type']){
                $update = "UPDATE bookings SET id_type = '$idtype' where id = '$id' ";
                $conn->query($update);
            }
            if($idnumber !== $book['id_number']){
                $update = "UPDATE bookings SET id_number = '$idnumber' where id = '$id' ";
                $conn->query($update);
            }
            if($email !== $book['email']){
                $update = "UPDATE bookings SET email = '$email' where id = '$id' ";
                $conn->query($update);
            }
            if($checkin !== $book['check_in']){
                $update = "UPDATE bookings SET check_in = '$checkin' where id = '$id' ";
                $conn->query($update);
            }
            if($checkout !== $book['check_out']){
                $update = "UPDATE bookings SET check_out = '$checkout' where id = '$id' ";
                $conn->query($update);
            }
            if($adult !== $book['adult']){
                $update = "UPDATE bookings SET adult = '$adult' where id = '$id' ";
                $conn->query($update);
            }
            if($child !== $book['child']){
                $update = "UPDATE bookings SET child = '$child' where id = '$id' ";
                $conn->query($update);
            }
            if($message !== $book['request']){
                $update = "UPDATE bookings SET request = '$message' where id = '$id' ";
                $conn->query($update);
            }
        }
    }
}
else{
    if($fname !== $book['first_name']){
        $update = "UPDATE bookings SET first_name = '$fname' where id = '$id' ";
        $conn->query($update);
    }
    if($lname !== $book['last_name']){
        $update = "UPDATE bookings SET last_name = '$lname' where id = '$id' ";
        $conn->query($update);
    }
    if($bday !== $book['birth_date']){
        $update = "UPDATE bookings SET birth_date = '$bday' where id = '$id' ";
        $conn->query($update);
    }
    if($country !== $book['country']){
        $update = "UPDATE bookings SET country = '$country' where id = '$id' ";
        $conn->query($update);
    }
    if($add !== $book['address']){
        $update = "UPDATE bookings SET address = '$add' where id = '$id' ";
        $conn->query($update);
    }
    if($number !== $book['number']){
        $update = "UPDATE bookings SET number = '$number' where id = '$id' ";
        $conn->query($update);
    }
    if($idtype !== $book['id_type']){
        $update = "UPDATE bookings SET id_type = '$idtype' where id = '$id' ";
        $conn->query($update);
    }
    if($idnumber !== $book['id_number']){
        $update = "UPDATE bookings SET id_number = '$idnumber' where id = '$id' ";
        $conn->query($update);
    }
    if($email !== $book['email']){
        $update = "UPDATE bookings SET email = '$email' where id = '$id' ";
        $conn->query($update);
    }
    if($checkin !== $book['check_in']){
        $update = "UPDATE bookings SET check_in = '$checkin' where id = '$id' ";
        $conn->query($update);
    }
    if($checkout !== $book['check_out']){
        $update = "UPDATE bookings SET check_out = '$checkout' where id = '$id' ";
        $conn->query($update);
    }
    if($adult !== $book['adult']){
        $update = "UPDATE bookings SET adult = '$adult' where id = '$id' ";
        $conn->query($update);
    }
    if($child !== $book['child']){
        $update = "UPDATE bookings SET child = '$child' where id = '$id' ";
        $conn->query($update);
    }
    if($message !== $book['request']){
        $update = "UPDATE bookings SET request = '$message' where id = '$id' ";
        $conn->query($update);
    }
}

session_start();
$_SESSION['ebooking'] = 'Your booking details have been updated!';

header('location: edit-booking.php#ebooking');
?>