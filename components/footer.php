<?php

    include './db/connection.php';

    $services = [];
    $servicesQuerry = "SELECT * FROM services";
    $servicesResults = $conn->query($servicesQuerry);
    while($row = $servicesResults->fetch_assoc()){
        $services[] = $row; 
    }

?>
<div class="container-fluid bg-dark text-light footer wow fadeIn" data-wow-delay="0.1s" style="background-color: darkblue !important;">
    <div class="container pb-5">
        <div class="row g-5">
            <div class="col-md-6 col-lg-4">
                <div style="background-color: firebrick;" class="rounded p-4">
                    <a href="index.html"><h1 class="text-white text-uppercase mb-3"><?= $home['brand_name'] ?></h1></a>
                    <p class="text-white mb-0">
                        Discover A Brand Luxurious Hotel, feel the nature, feel the realness
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <h6 class="section-title text-start text-primary text-uppercase mb-4">Contact</h6>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i><?= $contacts['address'] ?></p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i><?= $contacts['number'] ?></p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i><?= $contacts['email'] ?></p>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="row gy-5 g-4">
                    <div class="col-md-6">
                        <h6 class="section-title text-start text-primary text-uppercase mb-4">Company</h6>
                        <a class="btn btn-link" href="./about.php">About Us</a>
                        <a class="btn btn-link" href="./contacts.php">Contact Us</a>
                        <a class="btn btn-link" href="booking.php#booking">Book a room</a>
                    </div>
                    <div class="col-md-6">
                        <h6 class="section-title text-start text-primary text-uppercase mb-4">Services</h6>
                        <?php foreach( $services as $row): ?>
                            <p class="mb-2"><?= $row['title'] ?></p>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#"><?= $home['brand_name'] ?></a>, All Right Reserved. 
                    Designed By <a class="border-bottom" href="https://htmlcodex.com">AJ & Co.</a>
                </div>
            </div>
        </div>
    </div>
</div>
<a style="background-color: firebrick;" href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="js/main.js"></script>