<?php
    session_start();
    $_SESSION['nav-active'] = 'services';

    include 'db/connection.php';

    $services = [];
    $servicesQuerry = "SELECT * FROM services";
    $servicesResults = $conn->query($servicesQuerry);
    while($row = $servicesResults->fetch_assoc()){
        $services[] = $row; 
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
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Services</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Services</li>
                        </ol>
                    </nav>
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
    <?php include 'components/footer.php' ?>
</body>
</html>