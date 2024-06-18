<?php
    session_start();
    $_SESSION['nav-active'] = 'index';

    include 'db/connection.php';

    $aboutQuerry = "SELECT * FROM about";
    $aboutResult = $conn->query($aboutQuerry);
    $about = $aboutResult->fetch_assoc();

    $services = [];
    $servicesQuerry = "SELECT * FROM services";
    $servicesResults = $conn->query($servicesQuerry);
    while($row = $servicesResults->fetch_assoc()){
        $services[] = $row; 
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
        <div class="container-fluid p-0 mb-5">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100" src="img/<?= $home['bgd_image'] ?>" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Luxury Living</h6>
                                <h1 class="display-3 text-white mb-4 animated slideInDown"><?= $home['display_text1'] ?></h1>
                                <a href="rooms.php" style="background: firebrick !important; color: white;" class="btn py-md-3 px-md-5 me-3 animated slideInLeft">Our Rooms</a>
                                <a href="booking.php#booking" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Book A Room</a>
                            </div>
                        </div>
                    </div>
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
        <div class="container-xxl py-5 px-0 wow zoomIn" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="col-md-6 bg-dark d-flex align-items-center" style="background-color: darkblue !important;">
                    <div class="p-5">
                        <h6 class="section-title text-start text-white text-uppercase mb-3">Luxury Living</h6>
                        <h1 class="text-white mb-4"><?= $home['display_text2'] ?></h1>
                        <p class="text-white mb-4"><?= $home['text'] ?></p>
                        <a style="background-color: firebrick;" href="rooms.php" class="btn btn-primary py-md-3 px-md-5 me-3">Our Rooms</a>
                        <a href="booking.php#booking" class="btn btn-light py-md-3 px-md-5">Book A Room</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="img/<?= $home['image'] ?>" alt="" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Our Services</h6>
                    <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Services</span></h1>
                </div>
                <div class="row g-4">
                    <?php foreach( $services as $row): ?>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <a class="service-item rounded">
                                <div class="service-icon bg-transparent border rounded p-1">
                                    <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                        <i class="<?= $row['icon'] ?>"></i>
                                    </div>
                                </div>
                                <h5 class="mb-3"><?= $row['title'] ?></h5>
                                <p class="text-body mb-0"><?= $row['text'] ?></p>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Our Rooms</h6>
                    <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Rooms</span></h1>
                </div>
                <div class="row g-4">
                    <?php foreach( $rooms as $row): ?>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                            <div class="room-item shadow rounded overflow-hidden">
                                <div class="position-relative">
                                    <img class="img-fluid" src="img/<?= $row['images'] ?>" alt="">
                                    <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">₱<?= $row['price'] ?>/Night</small>
                                </div>
                                <div class="p-4 mt-2">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5 class="mb-0"><?= $row['name'] ?></h5>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <small class="border-end me-3 pe-3"><i class="fa fa-bed text-primary me-2"></i><?= $row['bed'] ?> Bed</small>
                                        <small class="border-end me-3 pe-3"><i class="fa fa-bath text-primary me-2"></i><?= $row['bath'] ?> Bath</small>
                                        <small><i class="fa fa-wifi text-primary me-2"></i>Wifi - <?= $row['wifi'] ?></small>
                                    </div>
                                    <p class="text-body mb-3"><?= $row['text'] ?></p>
                                    <div class="d-flex justify-content-between">
                                    <a style="background-color: firebrick;" class="btn btn-sm btn-dark rounded py-2 px-4" href="booking2.php?rt=<?= $row['name'] ?>">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Contact Us</h6>
                    <h1 class="mb-5"><span class="text-primary text-uppercase">Contact</span> For Any Query</h1>
                </div>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="row gy-4">
                            <div class="col-md-4">
                                <h6 class="section-title text-start text-primary text-uppercase">Email</h6>
                                <p><i class="fa fa-envelope-open text-primary me-2"></i><?= $contacts['email'] ?></p>
                            </div>
                            <div class="col-md-4">
                                <h6 class="section-title text-start text-primary text-uppercase">Call</h6>
                                <p><i class="fa fa-envelope-open text-primary me-2"></i><?= $contacts['number'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                        <iframe class="position-relative rounded w-100 h-100"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.995748270835!2d124.00509771404337!3d12.972123518378474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a0ef174bd54bd7%3A0x699725aad1562887!2sACLC%20-%20Sorsogon!5e0!3m2!1sen!2sph!4v1680367079248!5m2!1sen!2sph"
                            frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0">
                        </iframe>
                    </div>
                    <div class="col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" placeholder="Your Name">
                                            <label for="name">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" placeholder="Your Email">
                                            <label for="email">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" placeholder="Subject">
                                            <label for="subject">Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                            <label for="message">Message</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button style="background-color: firebrick;" class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
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