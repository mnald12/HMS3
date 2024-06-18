<?php 

include './db/connection.php';

$contactsQuerry = "SELECT * FROM contacts";
$contactsResult = $conn->query($contactsQuerry);
$contacts = $contactsResult->fetch_assoc();

?>
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<div class="container-fluid bg-dark px-0">
    <div class="row gx-0">
        <div class="col-lg-3 bg-dark d-none d-lg-block" style="background-color: darkblue !important;">
            <a href="index.php" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                <h1 style="color: white !important; text-shadow: 0 1px 2px white;" class="m-0 text-primary text-uppercase"><?= $home['brand_name'] ?></h1>
            </a>
        </div>
        <div class="col-lg-9">
            <div class="row gx-0 bg-white d-none d-lg-flex">
                <div class="col-lg-7 px-5 text-start">
                    <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                        <i class="fa fa-envelope text-primary me-2"></i>
                        <p class="mb-0"><?= $contacts['email'] ?></p>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center py-2">
                        <i class="fa fa-phone-alt text-primary me-2"></i>
                        <p class="mb-0"><?= $contacts['number'] ?></p>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                <a href="index.html" class="navbar-brand d-block d-lg-none">
                    <h1 class="m-0 text-primary text-uppercase"><?= $home['brand_name'] ?></h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="index.php" class="nav-item nav-link <?= $_SESSION['nav-active'] == 'index' ? 'active' : '' ?>">Home</a>
                        <a href="about.php" class="nav-item nav-link <?= $_SESSION['nav-active'] == 'about' ? 'active' : '' ?>">About</a>
                        <a href="services.php" class="nav-item nav-link <?= $_SESSION['nav-active'] == 'services' ? 'active' : '' ?>">Services</a>
                        <a href="rooms.php" class="nav-item nav-link <?= $_SESSION['nav-active'] == 'rooms' ? 'active' : '' ?>">Rooms</a>
                        <a href="booking.php" class="nav-item nav-link <?= $_SESSION['nav-active'] == 'booking' ? 'active' : '' ?>">Booking</a>
                        <a href="contacts.php" class="nav-item nav-link <?= $_SESSION['nav-active'] == 'contacts' ? 'active' : '' ?>">Contact</a>
                        <a href="edit-booking.php" class="nav-item nav-link <?= $_SESSION['nav-active'] == 'ebooking' ? 'active' : '' ?>">Edit Booking</a>
                    </div>
                    <a href="booking.php" style="background-color: firebrick !important; border: none" class="btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block">Book A Room<i class="fa fa-arrow-right ms-3"></i></a>
                </div>
            </nav>
        </div>
    </div>
</div>