<?php
    session_start();
    $_SESSION['nav-active'] = 'about';

    include 'db/connection.php';

    $aboutQuerry = "SELECT * FROM about";
    $aboutResult = $conn->query($aboutQuerry);
    $about = $aboutResult->fetch_assoc();

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
                    <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <h6 class="section-title text-start text-primary text-uppercase">About Us</h6>
                        <h1 class="mb-4"><?= $about['title'] ?></h1>
                        <p class="mb-4"><?= $about['text'] ?></p>
                        <div class="row g-3 pb-4">
                            <?php foreach( $rooms as $row): ?>
                                <?php
                                    $name = $row['name'];
                                    $query = "SELECT * FROM room WHERE room_type = '$name' ";
                                    $result = $conn->query($query);
                                    $total = $result->num_rows;
                                ?>
                                <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                                    <div class="border rounded p-1">
                                        <div class="border rounded text-center p-4">
                                            <i class="fa fa-hotel fa-2x text-primary mb-2"></i>
                                            <h2 class="mb-1" data-toggle="counter-up"><?= $total ?></h2>
                                            <p class="mb-0"><?= $row['name'] ?> Rooms</p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <a style="background-color: firebrick;" class="btn btn-primary py-3 px-5 mt-2" href="booking.php#booking">Book a Room</a>
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="img/<?= $about['image1'] ?>" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="img/<?= $about['image2'] ?>">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="img/<?= $about['image3'] ?>">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="img/<?= $about['image4'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include 'components/footer.php' ?>
</body>
</html>