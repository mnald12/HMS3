<?php
    session_start();
    $_SESSION['nav-active'] = 'ebooking';

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
                    <h1 class="display-3 text-white mb-3 animated slideInDown" id="h1b">Cancel Booking</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="edit-booking.php">Edit booking</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Cancel booking</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container-fluid pb-5" id="ebooking">
            <?php if(isset($_SESSION['delbooking'])): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $_SESSION['delbooking']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['delbooking']); ?>
            <?php endif ?>
            <div class="alert alert-primary">
            To cancel your booking, please enter the booking ID provided in the confirmation email we sent you. This ID is necessary to locate and process your cancellation. If you have any issues or need assistance, please contact our support team. Thank you.    
            </div>
            <form action="deletebooking.php" method="post" class="form pb-4">
                <div class="input-group">
                    <input type="input" name="bid" class="form-control rounded" placeholder="Enter booking ID..." />
                    <button type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>Submit</button>
                </div>
            </form>
        </div>
    <?php include 'components/footer.php' ?>
</body>

</html>