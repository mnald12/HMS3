<?php
    session_start();
    $_SESSION['nav-active'] = 'ebooking';
    
    include 'db/connection.php';

    $bid = mysqli_real_escape_string($conn, $_POST['bid']);

    $bquery = "SELECT * FROM bookings Where booking_id = '$bid' ";
    $bresult = $conn->query($bquery);
    $book = $bresult->fetch_assoc();

    if($book === null){
        session_start();
        $_SESSION['ebookingf'] = 'The ID you entered is invalid, no longer found. Please double-check the ID and try again. If you need further assistance, contact our support team. Thank you.';
        header('location: edit-booking.php#ebooking');
    }

    if($book['status'] === "Booked"){
        session_start();
        $_SESSION['ebookingf'] = 'Your reservation has already been booked.';
        header('location: edit-booking.php#ebooking');
    }

    $rooms = [];
    $roomsQuerry = "SELECT * FROM rooms";
    $roomsResults = $conn->query($roomsQuerry);
    while($row = $roomsResults->fetch_assoc()){
        $rooms[] = $row; 
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'components/header.php' ?>
</head>
<body>
    <div class="container-xxl bg-white p-0">
        <?php include 'components/navbar.php' ?>
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Booking</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Booking</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container-xxl py-5">
            <div class="container" id="booking">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Room Booking</h6>
                    <h1 class="mb-5">Book A <span class="text-primary text-uppercase">Luxury Room</span></h1>
                </div>
                <div class="row g-5">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded wow zoomIn" data-wow-delay="0.1s" src="img/about-1.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded wow zoomIn" data-wow-delay="0.5s" src="img/about-3.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded wow zoomIn" data-wow-delay="0.7s" src="img/about-4.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <form method="post" action="save_edited_booking.php" enctype="multipart/form-data">
                                <div class="row g-3">
                                    <input type="text" name="id" value="<?= $book['id'] ?>" hidden>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" value="<?= $book['first_name'] ?>" class="form-control" name="fname" id="fname" placeholder="First Name" required>
                                            <label for="fname">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" value="<?= $book['last_name'] ?>" class="form-control" name="lname" id="lname" placeholder="Last Name" required>
                                            <label for="lname">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="date" value="<?= $book['birth_date'] ?>" class="form-control" name="bday" id="bday" placeholder="Birthdate" required>
                                            <label for="bday">Birthdate</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" value="<?= $book['country'] ?>" class="form-control" name="country" id="country" placeholder="Country" required>
                                            <label for="country">Country</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" value="<?= $book['address'] ?>" class="form-control" name="add" id="add" placeholder="Address" required>
                                            <label for="add">Address</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" value="<?= $book['email'] ?>" class="form-control" name="email" id="email" placeholder="Email" required>
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" value="<?= $book['number'] ?>" class="form-control" name="number" id="num" placeholder="Phone Number" required>
                                            <label for="num">Phone Number</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <select class="form-select" id="selectid" name="idtype">
                                              <option value="Gov ID" <?= $book['id_type'] === "Gov ID" ? "selected" : "" ?>>Gov ID</option>
                                              <option value="Passport ID" <?= $book['id_type'] === "Passport ID" ? "selected" : "" ?>>Passport ID</option>
                                              <option value="Others" <?= $book['id_type'] === "Others" ? "selected" : "" ?>>Others</option>
                                            </select>
                                            <label for="selectid">Select Id</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" value="<?= $book['id_number'] ?>" class="form-control" name="idnumber" id="idnum" placeholder="ID Number" required>
                                            <label for="idnum">ID Number</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating date" id="date3" data-target-input="nearest">
                                            <input type="text" value="<?= $book['check_in'] ?>" name="checkin" class="form-control datetimepicker-input" id="checkin" placeholder="Check In" data-target="#date3" data-toggle="datetimepicker" required />
                                            <label for="checkin">Check In</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating date" id="date4" data-target-input="nearest">
                                            <input type="text" value="<?= $book['check_out'] ?>" name="checkout" class="form-control datetimepicker-input" id="checkout" placeholder="Check Out" data-target="#date4" data-toggle="datetimepicker" required />
                                            <label for="checkout">Check Out</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <select class="form-select" id="select1" name="adult">
                                              <option value="1" <?= $book['adult'] === "1" ? "selected" : "" ?>>Adult 1</option>
                                              <option value="2" <?= $book['adult'] === "2" ? "selected" : "" ?>>Adult 2</option>
                                              <option value="3" <?= $book['adult'] === "3" ? "selected" : "" ?>>Adult 3</option>
                                            </select>
                                            <label for="select1">Select Adult</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <select class="form-select" id="select2" name="child">
                                              <option value="0" <?= $book['child'] === "0" ? "selected" : "" ?>>Child 0</option>
                                              <option value="1" <?= $book['child'] === "1" ? "selected" : "" ?>>Child 1</option>
                                              <option value="2" <?= $book['child'] === "2" ? "selected" : "" ?>>Child 2</option>
                                              <option value="3" <?= $book['child'] === "3" ? "selected" : "" ?>>Child 3</option>
                                            </select>
                                            <label for="select2">Select Child</label>
                                          </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <select class="form-select" id="select3" name="room">
                                              <?php foreach( $rooms as $row): ?>
                                                <option value="<?= $row['name'] ?>" <?= $row['name'] === $book['room'] ? "selected" : "" ?>><?= $row['name'] ?></option>
                                              <?php endforeach ?>
                                            </select>
                                            <label for="select3">Select Room Type</label>
                                          </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" name="message" placeholder="Special Request" id="message" style="height: 100px"><?= $book['request'] ?></textarea>
                                            <label for="message">Special Request</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="file" class="form-control" name="file1" id="idfile">
                                            <label for="idfile">ID Picture</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button style="background-color: darkorange;" class="btn btn-primary w-100 py-3" type="submit">Update Booking</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include 'components/footer.php' ?>
</body>
</html>