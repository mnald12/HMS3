<?php
    include 'backend/connection.php';
    $bookings = [];
    $bookingQuerry = "SELECT * FROM bookings Where status = 'Pending' ";
    $bookingResults = $conn->query($bookingQuerry);
    while($row = $bookingResults->fetch_assoc()){
        $bookings[] = $row; 
    }
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <?php include './model/header.php' ?>
</head>
<body>
    <?php include './model/loader.php' ?>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <?php include './model/sidebar.php' ?>
        <div class="page-wrapper">

            <div class="page-breadcrumb pt-1 pb-1">
                <div class="row align-items-center">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                              <li class="breadcrumb-item"><a href="dashboard.php" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                              <li class="breadcrumb-item active" aria-current="page">Booking</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Booking</h1> 
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th><b>Name</b></th>
                                        <th><b>Room</b></th>
                                        <th><b>Check In</b></th>
                                        <th><b>Check Out</b></th>
                                        <th><b>Created</b></th>
                                        <th><b>Action</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach( $bookings as $row): ?>
                                        <tr>
                                            <td><?= $row['first_name'] ." " .$row['last_name'] ?></td>
                                            <td><?= $row['room'] ?></td>
                                            <td><?= $row['check_in'] ?></td>
                                            <td><?= $row['check_out'] ?></td>
                                            <td><?= $row['created'] ?></td>
                                            <td>
                                                <a href="viewer.php?id=<?= $row['id'] ?>"><span class="badge bg-success">view</span></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <?php include './model/footer.php' ?>
        </div>
    </div>
    <?php include './model/scripts.php' ?>\
</body>
</html>